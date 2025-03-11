<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\EmailSetting;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Transaction;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Middleware\AuthenticateExclude;
use Illuminate\Support\Facades\Log;
use App\Mail\OrdercreationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;


class PaymentsController extends Controller
{


    public function __construct()
    {
        $this->middleware(AuthenticateExclude::class)->except('index');
    }


    public function paymentReports()
    {
        if (Auth::check() && Auth::user()->is_admin == 1) {
            $payments = Payment::with('product')->orderBy('id', 'DESC')->get();

        }
        else{
            $payments = Payment::with('product')->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        }

        return view('admin.pages.payment-method.payments', compact('payments'));

    }

    public function paymentSuccess()
    {

        try {
            $sessionId = Session::get('sessionId');
//        $productId = Session::get('productId');
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            $response = $stripe->checkout->sessions->retrieve($sessionId);


            if ($response->payment_status == 'paid') {


                $subCategory_detail = SubCategory::findOrFail($response->metadata->product_id);
                $orderData = [
                    'user_id' => auth()->user()->id,
                    'name' => $subCategory_detail->name,
                    'description' => $subCategory_detail->description,
                    'image' => $subCategory_detail->image ?? null,
                    'price' => $subCategory_detail->price ?? null,
                    'currency' => 'USD',
                    'subcategory_id' => $subCategory_detail->id,
                ];


                $desData = Session::get('des_data');

                $order = new Order();
                $order->user_id = $orderData['user_id'];
                $order->name = $orderData['user_id'];
                $order->description = $desData;
                $order->image = $orderData['image'];
                $order->price = $orderData['price'];  // Price from SubCategory, adjust if needed
                $order->currency = 'USD';
                $order->subcategory_id = $orderData['subcategory_id'];
                $order->payment_status = 1;
                $order->payment_method = 'stripe';
                $order->status = 'Completed';
                $order->save();

                $payment = Payment::where('id', $response->metadata->payment_id)->first();
                $payment->status = 'success';
                $payment->order_id = $order->id;
                $payment->is_processed = 1;
                $payment->payment_post_status = json_encode($response);
                $payment->reference_number = $response->payment_intent;
                $payment->save();

                if ($response['amount_total'] / 100 < $orderData['price']) {
                    $payment->status = 'fraud';
                    $payment->save();
                }

                $user = User::find($orderData['user_id']);
                if($user)
                {
                    if($user)
                    {
                        $fromEmail = EmailSetting::first();
						 try {
							 
							Mail::to($user->email)
								->send(new OrdercreationEmail($order, 'techflix.com', $fromEmail->mail_from_address));
								
						 } catch (\Exception $e) {

							//dd($e->getMessage());
							// Handle the exception
				//            return redirect()->back()->with('error', $e->getMessage());

				//            return redirect()->route('success');
						}
                    }
                }



//                Mail::to('recipient@example.com')->send($email);
                return redirect()->route('success');

            } else {
                return redirect()->route('home')
                    ->with('success', 'Payment cancelled.');
            }
        } catch (\Exception $e) {

            dd($e->getMessage());
            // Handle the exception
//            return redirect()->back()->with('error', $e->getMessage());

//            return redirect()->route('success');
        }

    }

    public function index($id, Request $request)
    {
        try {
            $decryptedId = decryptstring($id);

            $subCategory_detail = SubCategory::findOrFail($decryptedId);
            if ($request->payment_type == 'stripe') {
                $payment_method = PaymentMethod::where('name', 'stripe')->where('status', 1)->first();

                $desData = Session::get('des_data');
                $payment = new Payment();
                $payment->order_id = null;
                $payment->product_id = $subCategory_detail->id;
                $payment->user_id = auth()->user()->id;
                $payment->reference_number = null;
                $payment->is_processed = 0;
                $payment->payment_method = 'stripe';
                $payment->amount = $subCategory_detail->price ?? null;
                $payment->checkout_amount = $subCategory_detail->price ?? null;
                $payment->old_balance = 0;
                $payment->payment_details = $subCategory_detail->description;
                $payment->payment_post_status = null;
                $payment->status = 'pending';
                $payment->save();

                $stripe = new \Stripe\StripeClient($payment_method->stripe_secret);

                $redirectUrl = route('payment.success');
                $response = $stripe->checkout->sessions->create([
                    'success_url' => $redirectUrl,
                    'customer_email' => auth()->user()->email,
                    'payment_method_types' => ['link', 'card'],
                    'metadata' => [
                        'payment_id' => $payment->id,
                        'product_id' => $subCategory_detail->id,
                    ],
                    'line_items' => [
                        [
                            'price_data' => [
                                'product_data' => [
                                    'name' => $subCategory_detail->name,
                                ],
                                'unit_amount' => 100 * $subCategory_detail->price,
                                'currency' => 'USD',
                            ],
                            'quantity' => 1
                        ],
                    ],

                    'mode' => 'payment',
                    'allow_promotion_codes' => true,
                ]);

                $sessionId = Session::put('sessionId', $response['id']);
                $productId = Session::put('productId', $decryptedId);
                return redirect($response['url']);
            } elseif ($request->payment_type == 'BinancePay') {


                $payment_method = PaymentMethod::where('name', 'BinancePay')->where('status', 1)->first();


                $shop_id = $payment_method->secret_key;
                $api_key = $payment_method->stripe_secret;

//            return redirect()->route('home')
//                ->with('success', 'Live credentials is required.');

                $orderData = [
                    'user_id' => auth()->user()->id,
                    'name' => $subCategory_detail->name,
                    'description' => $subCategory_detail->description,
                    'image' => $subCategory_detail->image ?? null,
                    'price' => $subCategory_detail->price ?? null,
                    'currency' => 'USD',
                    'subcategory_id' => $subCategory_detail->id,
                ];

                $desData = Session::get('des_data');
                $order = new Order();
                $order->user_id = $orderData['user_id'];
                $order->name = $orderData['user_id'];
                $order->description = $desData;
                $order->image = $orderData['image'];
                $order->price = $orderData['price'];  // Price from SubCategory, adjust if needed
                $order->currency = 'USD';
                $order->subcategory_id = $orderData['subcategory_id'];
                $order->payment_status = 0;
                $order->payment_method = 'Binance Pay';
                $order->status = 'Pending';
                $order->save();


                $payment = new Payment();
                $payment->order_id = $order->id;
                $payment->product_id = $subCategory_detail->id;
                $payment->user_id = auth()->user()->id;
                $payment->reference_number = null;
                $payment->is_processed = 0;
                $payment->payment_method = 'Binance Pay';
                $payment->amount = $subCategory_detail->price ?? null;
                $payment->checkout_amount = $subCategory_detail->price ?? null;
                $payment->old_balance = 0;
                $payment->payment_details = $subCategory_detail->description;
                $payment->payment_post_status = null;
                $payment->status = 'pending';
                $payment->save();


                $order_id = $order->id;
                $amount = $orderData['price'];
                $product_name = 'balance';

                $return_url = 'https://test.com/webhook/binance-pay';

                $amount = number_format((float)$amount, 2, '.', '');;

                $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $nonce = '';
                for ($i = 1; $i <= 32; $i++) {
                    $pos = mt_rand(0, strlen($chars) - 1);
                    $char = $chars[$pos];
                    $nonce .= $char;
                }
                $ch = curl_init();
                $timestamp = round(microtime(true) * 1000);
                // Request body
                $request = array(
                    "env" => array(
                        "terminalType" => "WEB"
                    ),
                    "merchantTradeNo" => $order_id,
                    "orderAmount" => $amount,
                    "currency" => "USDT",
                    "goods" => array(
                        "goodsType" => "01",
                        "goodsCategory" => "D000",
                        "referenceGoodsId" => $order_id,
                        "goodsName" => $subCategory_detail->id,
                        "goodsDetail" => $desData
                    )
                );


                $json_request = json_encode($request);
                $payload = $timestamp . "\n" . $nonce . "\n" . $json_request . "\n";
                $binance_pay_key = $shop_id;
                $binance_pay_secret = $api_key;
                $signature = strtoupper(hash_hmac('SHA512', $payload, $binance_pay_secret));
                $headers = array();
                $headers[] = "Content-Type: application/json";
                $headers[] = "BinancePay-Timestamp: $timestamp";
                $headers[] = "BinancePay-Nonce: $nonce";
                $headers[] = "BinancePay-Certificate-SN: $binance_pay_key";
                $headers[] = "BinancePay-Signature: $signature";

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_URL, "https://bpay.binanceapi.com/binancepay/openapi/v2/order");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json_request);

                $result = curl_exec($ch);
                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                }
                curl_close($ch);

                //var_dump($result);
                dd($result);
                $response = json_decode($result, true);

                $data = $response['data']['checkoutUrl'];

                //Redirect user to the payment page


            } elseif ($request->payment_type == 'PerfectMoney') {

                $desData = Session::get('des_data');
                $payment = new Payment();
                $payment->order_id = null;
                $payment->product_id = $subCategory_detail->id;
                $payment->user_id = auth()->user()->id;
                $payment->reference_number = null;
                $payment->is_processed = 0;
                $payment->payment_method = 'perfect money';
                $payment->amount = $subCategory_detail->price ?? null;
                $payment->checkout_amount = $subCategory_detail->price ?? null;
                $payment->old_balance = 0;
                $payment->payment_details = $subCategory_detail->description;
                $payment->payment_post_status = null;
                $payment->status = 'pending';
                $payment->save();

                $baseUrl = 'https://techflix.com';

                $payment_method = PaymentMethod::where('name', 'PerfectMoney')->where('status', 1)->first();


                $data = [
                    'product_name' => $subCategory_detail->name,
                    'PAYMENT_AMOUNT' => $subCategory_detail->price,
                    'PAYEE_ACCOUNT' => $payment_method->pm_account_id,
                    'PAYEE_NAME' => $baseUrl,
                    'PAYMENT_ID' => $payment->id,
                    'STATUS_URL' => $baseUrl . '/perfect-money/status',
                    'PAYMENT_URL' => $baseUrl . '/perfect-money/payment',
                    'NOPAYMENT_URL' => $baseUrl . '/payment/cancel',
                    'SUGGESTED_MEMO' => $desData,
                    'BAGGAGE_FIELDS' => $subCategory_detail->name,
                    'FIELD_1' => auth()->user()->id,
                ];

                return view('vendor.laravelperfectmoney.perfectmoney', compact('data'));
            } elseif ($request->payment_type == 'Cryptomus') {

                $desData = Session::get('des_data');
                $payment = new Payment();
                $payment->order_id = null;
                $payment->product_id = $subCategory_detail->id;
                $payment->user_id = auth()->user()->id;
                $payment->reference_number = null;
                $payment->is_processed = 0;
                $payment->payment_method = 'Cryptomus';
                $payment->amount = $subCategory_detail->price ?? null;
                $payment->checkout_amount = $subCategory_detail->price ?? null;
                $payment->old_balance = 0;
                $payment->payment_details = $subCategory_detail->description;
                $payment->payment_post_status = null;
                $payment->status = 'pending';
                $payment->save();
				
                $baseUrl = 'https://techflix.com';

                $payment_method = PaymentMethod::where('name', 'Cryptomus')->where('status', 1)->first();

				$final_upload = number_format((float)$subCategory_detail->price, 2, '.', '');
				
				
				
				$attributes = array(
					"amount" => $final_upload,
					"currency" => 'USD',
					"order_id" => strval($payment->id),
					'subtract'	=> '100',
					'from_referral_code'	=> 'nGl3AL',
					"url_return" => $baseUrl . '/cryptomus/status',
					"url_success" => $baseUrl . '/cryptomus/status',
					"url_callback" => $baseUrl . '/cryptomus/payment',
					"is_payment_multiple" => true,
					'additional_data'	=> strval($payment->id),
				);
				
				
				$data = json_encode($attributes);
				$sign = md5(base64_encode($data) . $payment_method->stripe_secret );
		
				//dd($payment_method);

                //$json_request = json_encode($request);
               
				$ch = curl_init();
				
				
				$headers = array();
                $headers[] = "Content-Type: application/json";
               
                $headers[] = "merchant:".$payment_method->secret_key;
                $headers[] = "sign:$sign";

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_URL, "https://api.cryptomus.com/v1/payment");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

                $result = curl_exec($ch);
                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                }
                curl_close($ch);

                //var_dump($result);
				//exit;
                //dd($result);
                $response = json_decode($result, true);

                if( isset($response['result']['url']) ){
					
					echo "<script>window.location.href = '".$response['result']['url']."';</script>";
					exit;
					
				}else{
					echo "Error in processing contact administrator ".$result;
					exit;
				}
				
				
            }elseif ($request->payment_type == 'Oddoktpay') {

                $desData = Session::get('des_data');
                $payment = new Payment();
                $payment->order_id = null;
                $payment->product_id = $subCategory_detail->id;
                $payment->user_id = auth()->user()->id;
                $payment->reference_number = null;
                $payment->is_processed = 0;
                $payment->payment_method = 'Oddoktpay';
                $payment->amount = $subCategory_detail->price ?? null;
                $payment->checkout_amount = $subCategory_detail->price ?? null;
                $payment->old_balance = 0;
                $payment->payment_details = $subCategory_detail->description;
                $payment->payment_post_status = null;
                $payment->status = 'pending';
                $payment->save();
				
                $baseUrl = 'https://techflix.com';

                $payment_method = PaymentMethod::where('name', 'Oddoktpay')->where('status', 1)->first();

				$final_upload = number_format((float)$subCategory_detail->price, 2, '.', '');
				
				$final_upload = floatval($payment_method->paypal_sandbox_client_id) * floatval($final_upload);
				
				
				$data = [
		
					'full_name'  	=> auth()->user()->email,
					'email' 		=> auth()->user()->email,
					'amount'        => floatval($final_upload),
					'metadata'    	=> 
						[
							'order_id'    => $payment->id,
							'product_id'  => $payment->id,
						],
					'redirect_url'   => $baseUrl . '/cryptomus/payment', 
					'return_type'   => 'GET',
					'cancel_url' 	 => $baseUrl . '/cryptomus/payment',
					//'webhook_url'    => $notify_url,
					
				];
				
				
				
				//dd($payment_method);

                //$json_request = json_encode($request);
               
				$ch = curl_init();
				
				
				$headers = array();
                $headers[] = "Content-Type: application/json";
               
                $headers[] = "RT-UDDOKTAPAY-API-KEY:".$payment_method->secret_key;
                

                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_URL,  $payment_method->stripe_secret );
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

                $result = curl_exec($ch);
                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                }
                curl_close($ch);
				
				//var_dump($result);
				//exit;
                //dd($result);
				
                $response = json_decode($result, true);

                if( isset($response['payment_url']) ){
					
					echo "<script>window.location.href = '".$response['payment_url']."';</script>";
					exit;
					
				}else{
					echo "Error in processing contact administrator ".$result;
					exit;
				}
				
				

                //return view('vendor.laravelperfectmoney.perfectmoney', compact('data'));
            }
			
			
			dd($request->payment_type);
			
			
        } catch (\Exception $e) {
            // Handle the exception

            return redirect()->route('home')
                ->with('success', $e->getMessage());

            return redirect()->back()->with('error', $e->getMessage());
        }


                
        // dd($subCategory_detail);
        // Example of creating an order with basic subcategory info and the first detail's type
        // You'll need to adjust this logic based on what specific info you want from the details


//        $order = new Order();
//        $order->user_id = auth()->user()->id;
//        $order->name = $subCategory_detail->name;
//        $order->description = $subCategory_detail->description;
//        $order->image = $subCategory_detail->image ?? null;
//        $order->price = $subCategory_detail->price ?? null; // Price from SubCategory, adjust if needed
//        $order->currency = 'USD';
//        $order->subcategory_id = $subCategory_detail->id;

        // If you want to store info from the first related SubCategoryDetail, for example
        // if ($subCategory_detail->sub_category_details->isNotEmpty()) {
        //     $firstDetail = $subCategory_detail->sub_category_details->first();
        //     $order->detail_type = $firstDetail->type; // Or any other detail attribute
        // }


//        $order->save();
//        $order_id = $order->id;
        // Check if the record is not found
        if (!$subCategory_detail) {
            abort(404); // 404 Not Found status code
        }

        // Set user_id and token in the session
        session(['user_id' => auth()->user()->id]);
        session(['token' => csrf_token()]);

        // Retrieve payment methods
        $payment_methods = PaymentMethod::all();

		echo "<pre>";
		print_r($request->payment_type);
		exit;

        return view('website.pages.payments.index', compact('subCategory_detail', 'orderData', 'payment_methods'));

    }



    // public function index($id)
    // {
    //     // try {
    //         // Decrypt the ID received from the URL
    //         $decryptedId = decryptstring($id);

    //         // Attempt to find the record with the decrypted ID
    //         $subCategory_detail = SubCategory::findOrFail($decryptedId);

    //         // Check if the record is not found
    //         if (!$subCategory_detail) {
    //             abort(404); // 404 Not Found status code
    //         }
    //         $payment_methods = PaymentMethod::all();

    //         return view('website.pages.payments.index', compact('subCategory_detail', 'payment_methods'));
    //     // } catch (\Exception $e) {
    //     //     // Log the error for debugging purposes
    //     //     Log::error($e);

    //     //     // Redirect to the custom 404

    //         // Set user_id and token in the session
    //         session(['user_id' => auth()->user()->id]);
    //         session(['token' => csrf_token()]);

    //         // Retrieve payment methodserror page
    //     //     return response()->view('errors.404', [], 404);
    //     // }
    // }


    public function payment(Request $request)
    {
        // // Retrieve data from the request
        // $user_id = $request->input('user_id');
        // $name = $request->input('name');
        // $description = $request->input('description');
        // $id = $request->input('id');
        // // Rest of your code to process the payment and save the data to the database

        // // Retrieve POST data sent by Perfect Money
        // $paymentId = $request->input('PAYMENT_ID');
        // $paymentAmount = $request->input('PAYMENT_AMOUNT');
        // $paymentUnits = $request->input('PAYMENT_UNITS');
        // $paymentBatchNum = $request->input('PAYMENT_BATCH_NUM');
        // $payerAccount = $request->input('PAYER_ACCOUNT');
        // $receiverAccount = $request->input('PAYEE_ACCOUNT');

        // // Create a new transaction record in your database
        // $transaction = new Transaction();
        // $transaction->user_id = $user_id; // Access 'user_id' from the form data
        // $transaction->name = $name;
        // $transaction->description = $description;
        // $transaction->payment_method = 'Perfect Money';
        // $transaction->checkout_detail = 'checkout Detail';
        // $transaction->subcategory_id = $id; // Access 'subcategory_id' from the form data
        // $transaction->is_process = 1;
        // $transaction->price = $paymentAmount; // Use the payment amount obtained from the request
        // $transaction->payment_status = 1;
        // $transaction->save();

        // // Create a new order record in your database
        // $order = new Order();
        // $order->name = $name;
        // $order->description = $description;
        // $order->price = $paymentAmount; // Use the payment amount obtained from the request
        // $order->subcategory_id = $id; // Access 'subcategory_id' from the form data
        // $order->currency = 'USD'; // Replace with the appropriate currency logic
        // $order->user_id = $user_id; // Access 'user_id' from the form data
        // $order->payment_method = 'Perfect Money';
        // $order->payment_status = 1;
        // $order->payment_type = 'paid';
        // $order->save();
        return redirect()->route('buy_services.page')->with('success', 'Order has been placed successfully.');

        // return response()->json(['success' => true]); // Send a response back to the client
    }



    // public function payment(Request $request)
    // {

    //     \Log::info('Received Payment Request: ' . json_encode($request->all()));

    //     // Retrieve data from the request
    //     $user_id = $request->input('user_id');
    //     $name = $request->input('name');
    //     $description = $request->input('description');
    //     $id = $request->input('id');

    //     // Rest of your code to process the payment and save the data to the database

    //         // Retrieve POST data sent by Perfect Money
    //     $paymentId = $request->input('PAYMENT_ID');
    //     $paymentAmount = $request->input('PAYMENT_AMOUNT');
    //     $paymentUnits = $request->input('PAYMENT_UNITS');
    //     $paymentBatchNum = $request->input('PAYMENT_BATCH_NUM');
    //     $payerAccount = $request->input('PAYER_ACCOUNT');
    //     $receiverAccount = $request->input('PAYEE_ACCOUNT');

    //     // Create a new transaction record in your database
    //     $transaction = new Transaction();
    //     $transaction->user_id = $user_id; // Access 'user_id' from the form data
    //     $transaction->name = $name;
    //     $transaction->description = $description;
    //     $transaction->payment_method = 'Perfect Money';
    //     $transaction->checkout_detail = 'checkout Detail';
    //     $transaction->subcategory_id = $id; // Access 'subcategory_id' from the form data
    //     $transaction->is_process = 1;
    //     $transaction->price = $paymentAmount; // Use the payment amount obtained from the request
    //     $transaction->payment_status = 1;
    //     $transaction->save();

    //     // Create a new order record in your database
    //     $order = new Order();
    //     $order->name = $name;
    //     $order->description = $description;
    //     $order->price = $paymentAmount; // Use the payment amount obtained from the request
    //     $order->subcategory_id = $id; // Access 'subcategory_id' from the form data
    //     $order->currency = 'USD'; // Replace with the appropriate currency logic
    //     $order->user_id = $user_id; // Acce
    //     $order->save();ss 'user_id' from the form data
    //    //     $order->payment_method = 'Perfect Money';
    //    //     $order->payment_status = 1;
    //    //     $order->payment_type = 'paid';

    //     return response()->json(['success' => true]); // Send a response back to the client
    // }


    public function status(Request $request)
    {
        // dd($request->all());
        // Retrieve POST data sent by Perfect Money
        $paymentId = $request->input('PAYMENT_ID') ?? 2;
        $paymentAmount = $request->input('PAYMENT_AMOUNT') ?? 2;
        $paymentBatchNum = $request->input('PAYMENT_BATCH_NUM') ?? 3;
        $payerAccount = $request->input('PAYER_ACCOUNT') ?? 'er';
        $paymentStatus = $request->input('PAYMENT_STATUS') ?? 1;

        // Update the status of the payment in your database or perform any other required actions
        // For example, you could check if the paymentStatus is "Complete" and mark the payment as paid in your system

        // Return a success response to Perfect Money
        return response('OK');
    }


    public function cancel()
    {
        return redirect()->back()->with('error', 'Payment was cancelled.');
    }


}
