<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\Models\PaymentMethodList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;



class PaymentMethodController extends Controller
{

    public function binancePay()
    {
        $shop_id = 'Gxm9rg428A';
        $api_key = '27978|7FZUz5DqX3pXWdIP7pmpqBsjEM9dHkZAdHaHJ23l';



        $order_id = rand(1000000,1000000000);
        $amount = 10;
        $product_name = 'balance';

        $return_url = 'https://test.com/webhook/binance-pay';

        $amount = number_format((float)$amount, 2, '.', '');;

        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $nonce = '';
        for($i=1; $i <= 32; $i++)
        {
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
            "currency" => "USD",
            "goods" => array(
                "goodsType" => "01",
                "goodsCategory" => "D000",
                "referenceGoodsId" => $order_id,
                "goodsName" => $product_name,
                "goodsDetail" => $product_name
            )
        );


        $json_request = json_encode($request);
        $payload = $timestamp."\n".$nonce."\n".$json_request."\n";
        $binance_pay_key = "k4rr2n541oo1oyj7sdd6zvh54ejprrcrwwjcexjhja4o3s5n5z740cu8whg9cqea";
        $binance_pay_secret = "cibo95cdcaxrscthzvkxqgfstwzracqhekh2dm9vxbihqs1pcfqzyfqxy9ugyidw";
        $signature = strtoupper(hash_hmac('SHA512',$payload,$binance_pay_secret));
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
        if (curl_errno($ch)) { echo 'Error:' . curl_error($ch); }
        curl_close ($ch);

        //var_dump($result);

        $response = json_decode($result,true);

        $data = $response['data']['checkoutUrl'];



    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $payment_method = new PaymentMethod();
        $payment_method->payment_method = $request->get('payment_method');
        $payment_method->name = $request->get('name');
        $payment_method->pm_account_id = $request->get('pm_account_id');
        $payment_method->pm_passphrase = $request->get('pm_passphrase');
        $payment_method->paypal_sandbox_client_id = $request->get('paypal_sandbox_client_id');
        $payment_method->paypal_sandbox_client_secret = $request->get('paypal_sandbox_client_secret');
        $payment_method->secret_key = $request->get('secret_key');
        $payment_method->stripe_secret = $request->get('stripe_secret');
        $payment_method->aamarpay_sandbox = $request->get('aamarpay_sandbox');
        $payment_method->aamarpay_key = $request->get('aamarpay_key');
        $payment_method->aamarpay_store_id = $request->get('aamarpay_store_id');
        $payment_method->status = $request->get('status');
        $payment_method->display_order = $request->get('display_order');
        if ($payment_method->save()) {
            Session::flash('success', 'PaymentMethod Saved successfully.');
        } else {
            Session::flash('error', 'There was an error in saving the PaymentMethod.');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

      /**
     * Show the form for editing the specified resource.
     */




//public function edit($id)
//{
//    try {
//        // Decrypt the ID received from the URL
//
//
//        // Attempt to find the payment method using decrypted ID
//        $payment_method = PaymentMethod::findOrFail($id);
//        return view('admin.pages.settings.edit', compact('payment_method'));
//        // Retr{
//        // Handle the case when the payment method is not found
//        abort(404); // 404 Not Found status code
//    } catch (\Exception $e) {
//        // Log the error for debugging purposes
//        Log::error($e);
//
//        // Redirect to the custom 404 error page or handle the error as per your requirements
//        return response()->view('errors.404', [], 404);
//    }
//}

     public function edit(string $id)
     {
         $payment_method = PaymentMethod::find($id);
         $payment_method_lists = PaymentMethod::all();

         return view('admin.pages.payment-method.edit',compact('payment_method','payment_method_lists'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $payment_method = PaymentMethod::find(decryptstring($id));
        $payment_method->name = $request->get('name');
        $payment_method->pm_account_id = $request->get('pm_account_id');
        $payment_method->pm_passphrase = $request->get('pm_passphrase');
        $payment_method->paypal_sandbox_client_id = $request->get('paypal_sandbox_client_id');
        $payment_method->paypal_sandbox_client_secret = $request->get('paypal_sandbox_client_secret');
        $payment_method->secret_key = $request->get('secret_key');
        $payment_method->stripe_secret = $request->get('stripe_secret');
        $payment_method->aamarpay_sandbox = $request->get('aamarpay_sandbox');
        $payment_method->aamarpay_key = $request->get('aamarpay_key');
        $payment_method->aamarpay_store_id = $request->get('aamarpay_store_id');
        $payment_method->status = $request->get('status');
        $payment_method->display_order = $request->get('display_order');
        if ($payment_method->update()) {
            Session::flash('success', 'PaymentMethod has been updated successfully.');
        } else {
            Session::flash('error', 'There was an error in saving the PaymentMethod.');
        }
        return redirect()->route('admin.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $PaymentMethod = PaymentMethod::find($id);
        $PaymentMethod->delete();
        return redirect()->route('admin.settings.index')->with('success', 'PaymentMethod data has been deleted successfully.');

    }




    public function processPayment(Request $request)
    {
////        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));
//        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//        $session = \Stripe\Checkout\Session::create([
//            'payment_method_types' => ['card'],
//            'line_items' => [
//                [
//                    'price_data' => [
//                        'currency' => 'usd',
//                        'product_data' => [
//                            'name' => 'Product Name',
//                        ],
//                        'unit_amount' => 209,
//                    ],
//                    'quantity' => 1,
//                ],
//            ],
//            'mode' => 'payment',
//            'success_url' => route('payment.success'),
//            'cancel_url' => route('checkout'),
//        ]);
//
//       Log::info($session);
//        return redirect($session->url);
    }

    public function paymentSuccess(Request $request)
    {


        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $response = $stripe->checkout->sessions->retrieve($request->session_id);


        return redirect()->route('stripe.index')
            ->with('success','Payment successful.');
        return view('payment_success');
    }
}
