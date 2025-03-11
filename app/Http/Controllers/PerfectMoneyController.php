<?php

namespace App\Http\Controllers;

use App\Mail\OrdercreationEmail;
use App\Models\EmailSetting;
use App\Models\Order;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Package\Perfectmoney\Facades\Perfectmoney;

class PerfectMoneyController extends Controller
{
    public function index()
    {

        return view('vendor.laravelperfectmoney.perfectmoney');


    }

    public function status(Request $request)
    {

        // dd($request->all());
        // Retrieve POST data sent by Perfect Money
        $paymentId = $request->input('PAYMENT_ID');
        $paymentAmount = $request->input('PAYMENT_AMOUNT');
        $paymentBatchNum = $request->input('PAYMENT_BATCH_NUM');
        $payerAccount = $request->input('PAYER_ACCOUNT');
        $paymentStatus = $request->input('PAYMENT_STATUS');

        // Update the status of the payment in your database or perform any other required actions
        // For example, you could check if the paymentStatus is "Complete" and mark the payment as paid in your system

        // Return a success response to Perfect Money
        return response('OK');
    }

    public function payment(Request $request)
    {
        try {
        $payment = Payment::where('id', $request['PAYMENT_ID'])->first();
        $subCategory_detail = SubCategory::where('id', $payment->product_id)->first();


        if ($subCategory_detail) {
            $orderData = [
                'name' => $subCategory_detail->name,
                'description' => $request['SUGGESTED_MEMO'],
                'image' => $subCategory_detail->image ?? null,
                'price' => $subCategory_detail['PAYMENT_AMOUNT'] ?? null,
                'currency' => 'USD',
                'subcategory_id' => $subCategory_detail->id,
            ];
        }


        $order = new Order();
        $order->user_id = $payment->user_id;
        $order->name = $orderData['name'];
        $order->description = $request['SUGGESTED_MEMO'];
        $order->image = $orderData['image'];
        $order->price = $orderData['price'];  // Price from SubCategory, adjust if needed
        $order->currency = 'USD';
        $order->status = 'Pending';
        $order->subcategory_id = $orderData['subcategory_id'];

        $order->payment_status = 0;
        $payment->is_processed = 1;
        $order->payment_method = 'Perfect Money';
        $order->save();

        $payment_method = PaymentMethod::where('name', 'PerfectMoney')->where('status', 1)->first();
        $passphrase=strtoupper(md5(stripslashes(urldecode($payment_method->pm_passphrase))));


        $hash=$_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
            $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
            $_POST['PAYMENT_BATCH_NUM'].':'.
            $_POST['PAYER_ACCOUNT'].':'.$passphrase.':'.
            $_POST['TIMESTAMPGMT'];

         $hash2=strtoupper(md5($hash));

        //$payment_details = $query_check->fetch(PDO::FETCH_OBJ);
        if($hash2==$_POST['V2_HASH'])
        {
            $order->status = 1;
            $order->save();

            $payment->payment_post_status = json_encode($request->all());;
            $payment->status = 'success';
            $payment->order_id = $order->id;
            $payment->reference_number = $_POST['PAYMENT_BATCH_NUM'];
            $payment->save();

            if($_POST['PAYMENT_AMOUNT'] < $orderData['price'])
            {
                $payment->status = 'fraud';
                $payment->save();
            }

            $user = User::find($payment->user_id);
            if($user)
            {
                if($user)
                {
                    $fromEmail = EmailSetting::first();
                    Mail::to($user->email)
                        ->send(new OrdercreationEmail($order, 'techflix.com', $fromEmail->mail_from_address));
                }
            }

            return redirect()->route('success');
//            return redirect()->route('home')
//                ->with('success', 'Payment successful completed.');
        }

        else{

            $payment->payment_post_status = json_encode($request->all());;
            $payment->status = 'pending';
            $payment->order_id = $order->id;
            $payment->save();
            return redirect()->route('home')
                ->with('success', 'Payment cancelled due to not verified');
        }


        } catch (\Exception $e) {
            // Handle the exception
            return redirect()->route('home')
                ->with('success', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }


//        dd($request->all());
//
//      input('PAYMENT_BATCH_NUM');
        // $payerAccount = $request->input('PAYER_ACCOUNT');
        // $receiverAccount = $request->input('PAYEE_ACCOUNT');

        // // Create a new transaction record in your database
        // $transaction = new Transaction();
        // // Retrieve data from the request
//        $user_id = $request->input('user_id');
//        $name = $request->input('name');
//        $description = $request->input('description');
//        $id = $request->input('id');
        // Rest of your code to process the payment and save the data to the database

        // // Retrieve POST data sent by Perfect Money
        // $paymentId = $request->input('PAYMENT_ID');
        // $paymentAmount = $request->input('PAYMENT_AMOUNT');
        // $paymentUnits = $request->input('PAYMENT_UNITS');
        // $paymentBatchNum = $request->
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

    public function cancel()
    {
		return redirect()->route('home')
                ->with('success', 'Payment cancelled due to not verified');
				
		//return redirect()->route('buy_services.page')->with('error', 'Payment was cancelled.');

        //return redirect()->back()->with('error', 'Payment was cancelled.');
    }
}
