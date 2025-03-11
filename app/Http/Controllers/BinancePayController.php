<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class BinancePayController extends Controller
{
    public function paymentSuccess()
    {

        $body = @file_get_contents('php://input');
        $event_json = json_decode($body , true);

        $headers = getallheaders();


        $_POST = $event_json;


        $bizStatus 	= (isset($_POST['bizStatus'])  ? ($_POST['bizStatus']) : '' );
        if( $bizStatus != 'PAY_SUCCESS' ){
            return redirect()->back()->with('error', 'Payment was cancelled.');
        }





        /*
    RESPONSE:

        [bizType] => PAY
        [data] => {"merchantTradeNo":"1213","productType":"01","productName":"USD 5 Balance","transactTime":1690050610652,"tradeType":"APP","totalFee":5.00000000,"currency":"USDT","commission":0}
        [bizIdStr] => 240968564935467008
        [bizId] => 240968564935467008
        [bizStatus] => PAY_CLOSED


        */


        $received_data 	= (isset($_POST['data'])  ? ($_POST['data']) : 0 );

        $received_response = json_decode($received_data, true);

        $last_order_id 	= (isset($received_response['merchantTradeNo'])  ? ($received_response['merchantTradeNo']) : 0 );

        $last_order_id = preg_replace("/[^a-zA-Z0-9]+/", "", $last_order_id);

        $ordId 	= $transaction_id	= (isset($_POST['bizIdStr'])  ? ($_POST['bizIdStr']) : 0 );
        $transaction_id = preg_replace("/[^a-zA-Z0-9]+/", "", $transaction_id);

        $order = Order::where('id',$last_order_id)->first();
        $payment = Payment::where('id',$order->order_id)->first();

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

            "merchantTradeNo" => $payment_id,

        );


        $json_request = json_encode($request);
        $payload = $timestamp."\n".$nonce."\n".$json_request."\n";
        $signature = strtoupper(hash_hmac('SHA512',$payload,$binance_pay_secret));

        $final_url = 'https://bpay.binanceapi.com/binancepay/openapi/v2/order/query';


        $curl = new Curl();

        $curl->setHeader('Content-Type', 'application/json');
        $curl->setHeader('BinancePay-Timestamp', $timestamp);
        $curl->setHeader('BinancePay-Nonce', $nonce);
        $curl->setHeader('BinancePay-Certificate-SN', $binance_pay_key);
        $curl->setHeader('BinancePay-Signature', $signature);


        $curl->setTimeout(40);




        $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
        $curl->setOpt(CURLOPT_SSL_VERIFYHOST, false);
        $curl->post( $final_url , json_encode($request) );

        if ($curl->error) {
            //echo 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage . "\n";
            $rawResponse = 'Error: ' . $curl->errorCode . ': ' . $curl->errorMessage." Raw Response: ".$curl->rawResponse;
        } else {
            $rawResponse = $curl->rawResponse;
        }



        $presponse = json_decode($rawResponse, true );


        //echo "<pre>";
        //print_r($presponse);
        //exit;

        $checker_response = check_ipn_request_is_valid( $_POST , $payment->payment_details, $binance_pay_key , $presponse);
        if( $checker_response === 'V2'  ){
            //echo "  xxcvxcvcxv ";
            //exit;

            $presponse = ( isset($presponse['data']) ? $presponse['data'] : array() );


            $paid_amount 		= ( isset( $presponse['orderAmount'] ) ? floatval($presponse['orderAmount'])  : '' );

            $payerInformation 	= ( isset( $presponse['openUserId'] ) ? $presponse['openUserId']  : '' );
            $payment_currency 	= ( isset( $presponse['currency'] ) ? $presponse['currency']  : '' );
            $payment_type 		= ( isset( $presponse['paymentInfo']['payMethod']) ? $presponse['paymentInfo']['payMethod']  : '' );



            if($paid_amount < $payment->amount){

                return redirect()->back()->with('error', 'Payment was cancelled.');
                //fraud case, paid less

                // do not credit funds / nor create order
                exit;

            }else{

                $order->payment_status = 1;
                $order->payment_method = 'Binance Pay';
                $order->status = 'Completed';
                $order->save();



                $payment->status = 'success';
                $payment->order_id = $order->id;
                $payment->is_processed = 1;
                $payment->payment_post_status = json_encode($presponse);
                $payment->reference_number = $binance_pay_key ?? '627672868';
                $payment->save();

            }

        }else{

            return redirect()->back()->with('error', 'Payment was cancelled.');
            //non authenticated, invalid response, do not create order, and redirect to cancellation page.
            exit;
        }



    }

    function check_ipn_request_is_valid( $response , $payment_details, $secrete, $presponse ){


        $output = array('status'=>0,'message'=>'invalid');


        $payment_status 	= (isset($presponse['data']['status'])  ? ($presponse['data']['status']) : '' );
        if ( $payment_status != 'PAID' ) {
            return  'invalid status code';
        }

        //exit;


        $output = 'V2';
        return $output;
    }
}
