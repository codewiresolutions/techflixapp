<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChatController extends Controller
{
    //


    public function sendMessage(Request $request)
    {

        $userOrder = Order::find($request->order_id);



        $chat = new Chat();
        $chat->message = $request->message;
        $chat->order_id = $request->order_id;

        if (Auth::user()->user_type == "superadmin" || Auth::user()->user_type == "superadmin") {
            $chat->sender_type = 'staff';
            $chat->receiver_id = $userOrder->user_id;
            $chat->sender_id = auth()->user()->id;
        } elseif (Auth::user()->user_type != "superadmin") {

            $chat->receiver_id = 1;
            $chat->sender_id = $userOrder->user_id;
            $chat->sender_type = 'user';
        }

        $chat->created_at = Carbon::now();
        $chat->save();

        return response()->json(['status' => 'success']);
    }


//     public function getChatHistory()
// {
//   $chatHistory = Chat::orderBy('created_at', 'asc')->get(); // retrieve chat history from the database

//   return response()->json($chatHistory); // return the chat history as a JSON response
// }


    public function getChatHistory(Request $request)
    {
        $order_id = $request->input('order_id');
        $chatHistory = Chat::where('order_id', $order_id)->orderBy('created_at', 'asc')->get();

        return response()->json($chatHistory);
    }

// public function getChatHistory($order_id)
// {
//   $chatHistory = Chat::where('order_id', 1)
//                      ->orderBy('created_at', 'asc')
//                      ->get(); // retrieve chat history for the specified order_id from the database

//   return response()->json($chatHistory); // return the chat history as a JSON response
// }


    public function getNewMessages()
    {
        // Get the new chat messages from the database
        $messages = Chat::where('created_at', '>', Carbon::now()->subSeconds(5))->get();

        // Return the new chat messages as JSON
        return response()->json($messages);
    }


}
