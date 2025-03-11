<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(): View
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request): RedirectResponse
    {

//        dd($request->order_date);
//
//        $jsonString = $orderData[0]; // Extracting the JSON string from the array

// Convert JSON string to array
        $orderDetail = json_decode($request->order_date[0], true);


        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $data = Stripe\Charge::create([
            "amount" => $request->amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => $request->stripeToken,
        ]);

        $status = $data->status;

        if ($status == 'succeeded') {
            $desData = Session::get('des_data');
            $payment = new Payment();
            $payment->order_id = $orderDetail['subcategory_id'];
            $payment->user_id = $orderDetail['user_id'];
            $payment->reference_number = $request->stripeToken;
            $payment->is_processed = 1;
            $payment->payment_method = 'stripe';
            $payment->amount = $orderDetail['price'];
            $payment->checkout_amount = $orderDetail['price'];
            $payment->old_balance = 0;
            $payment->payment_details = $orderDetail['description'];
            $payment->payment_post_status = $desData;
            $payment->status = $data->status;
            $payment->save();


            $order = new Order();
            $order->user_id = $orderDetail['user_id'];
            $order->name = $orderDetail['user_id'];
            $order->description = $desData;
            $order->image = $orderDetail['image'];
            $order->price = $orderDetail['price'];  // Price from SubCategory, adjust if needed
            $order->currency = 'USD';
            $order->subcategory_id = $orderDetail['subcategory_id'];
            $order->payment_status = 1;
            $order->payment_method = 'stripe';
            $order->save();

            $payment->order_id = $order->id;
            $payment->save();
        }
//        Session::forget('des_data');
        // If you want to store info from the first related SubCategoryDetail, for example
        // if ($subCategory_detail->sub_category_details->isNotEmpty()) {
        //     $firstDetail = $subCategory_detail->sub_category_details->first();
        //     $order->detail_type = $firstDetail->type; // Or any other detail attribute
        // }


        return back()
            ->with('success', 'Payment successful!');
    }
}
