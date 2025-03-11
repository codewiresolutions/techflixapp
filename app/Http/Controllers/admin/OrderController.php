<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\OrderCompletedEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        if (Auth::check() && Auth::user()->user_type  == "superadmin") {

            $active_orders = Order::with('user')->where('status','Active')->get();
            $complete_orders = Order::with('user')->where('status','Completed')->get();
            $pending_orders = Order::with('user')->where('status','Pending')->get();
            $canceled_orders = Order::with('user')->where('status','Canceled')->get();
            $statuses = ['Canceled', 'Active', 'Completed', 'Pending'];
            $all_orders = Order::with('user')->whereIn('status', $statuses)->get();


          return view('admin.pages.orders.index',compact('active_orders','complete_orders','pending_orders','canceled_orders','all_orders'));

        } else {

            $active_orders = Order::with('user')->where('status','Active')->where('user_id',auth()->user()->id)->get();
            $complete_orders = Order::with('user')->where('status','Completed')->where('user_id',auth()->user()->id)->get();
            $pending_orders = Order::with('user')->where('status','Pending')->where('user_id',auth()->user()->id)->get();
            $canceled_orders = Order::with('user')->where('status','Canceled')->where('user_id',auth()->user()->id)->get();
            $statuses = ['Completed'];
            $all_orders = Order::whereIn('status', $statuses)->where('user_id',auth()->user()->id)->get();

          return view('admin.pages.orders.index',compact('active_orders','complete_orders','pending_orders','canceled_orders','all_orders'));

        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $subCategory  = $request->get('subcategory_id');
        // $sub_category = new Order();
        // $sub_category->name = $request->get('name');
        // $sub_category->description = $request->get('description');
        // $sub_category->price = $request->get('price');
        // $sub_category->subcategory_id = $request->get('subcategory_id');
        // $sub_category->currency = 'USD';
        // $sub_category->user_id = auth()->user()->id;
        // $sub_category->payment_method = $request->get('payment_method');
        // $sub_category->image = $this->uploadImage($request->file('image'));
        // if ($sub_category->save()) {
        //     Session::flash('success', 'Order has been placed successfully.');
        // } else {
        //     Session::flash('error', 'There was an error in saving the Order data.');
        // }

        // return redirect()->route('confirm_and_pay.page', [
        //     'encryptedSubId' => encryptstring($sub_category->id),
        //     'encryptedOrderId' => encryptstring($sub_category->subcategory_id),
        // ]);
    }


        public function storeOrderDetails(Request $request)
        {
            dd($request->all());
            // Validate and store order details
            $validated = $request->validate([
                // Validation rules
            ]);

            $order = Order::create($validated);

            return response()->json(['success' => true, 'message' => 'Order stored successfully.']);
        }






    public function uploadImage($file)
    {
        $fileName = $file->getClientOriginalName();
        $explodeImage = explode('.', $fileName);
        $fileName = $explodeImage[0];
        $extension = end($explodeImage);
        $fileName = time() . "-" . $fileName . "." . $extension;
        $folderName = "assets/uploads/orders";
        $file->move($folderName, $fileName);
        return $folderName . '/' . $fileName;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order_deatil = Order::find($id);
        return view('admin.pages.orders.show',compact('order_deatil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function reOrder(string $id)
    {
        dd("ok");
        // $sub_category = new Order();
        // $sub_category->name = $request->get('name');
        // $sub_category->description = $request->get('description');
        // $sub_category->price = $request->get('price');
        // $sub_category->subcategory_id = $request->get('subcategory_id');
        // $sub_category->currency = 'USD';
        // $sub_category->image = $this->uploadImage($request->file('image'));
        // if ($sub_category->save()) {
        //     Session::flash('success', 'Order has been placed successfully.');
        // } else {
        //     Session::flash('error', 'There was an error in saving the Order data.');
        // }

        // return redirect()->route('confirm_and_pay.page',encryptstring($subCategory));
    }


    public function orderSearch(Request $request, $id)
    {
        $status = $request->input('status');
        $orders = Order::where('status', $status)->get();
        return response()->json($orders);
    }



    public function orders_charts()
    {
        $orders = Order::all(); // Retrieve all orders from the database
        $data = $orders->map(function ($order) {
            return [
                'timestamp' => $order->created_at->format('Y-m-d H:i:s'),
                'value' => $order->price,
            ];
        }); // Format the data in the expected format
        return response()->json($data);
    }



    public function updateOrderStatus(Request $request)
    {
        $orderId = $request->input('order_id');
        $newStatus = $request->input('new_status');

        $order = Order::with('users')->find($orderId);

        if ($order) {
            $order->status = $newStatus;
            $order->save();

            if ($newStatus === 'Completed') {

             // Fetch SMTP settings from the database
        $smtpSettings = DB::table('email_settings')->first();

        // Check if SMTP settings are available
        if ($smtpSettings) {
            // Set the mail configuration from the database
            config([
                'mail.mailers.smtp.host' => $smtpSettings->mail_host,
                'mail.mailers.smtp.port' => $smtpSettings->mail_port,
                'mail.mailers.smtp.username' => $smtpSettings->mail_username,
                'mail.mailers.smtp.password' => $smtpSettings->mail_password,
            ]);

            try {
                // Send email with OrderCompletedEmail template
                Mail::to('info@tecflix.com')
                    ->send(new OrderCompletedEmail($order, $smtpSettings->mail_from_name, $smtpSettings->mail_from_address));

                // Revert the mail configuration to default values to avoid affecting other parts of your application
                config([
                    'mail.mailers.smtp.host' => config('mail.mailers.smtp.host'),
                    'mail.mailers.smtp.port' => config('mail.mailers.smtp.port'),
                    'mail.mailers.smtp.username' => config('mail.mailers.smtp.username'),
                    'mail.mailers.smtp.password' => config('mail.mailers.smtp.password'),
                ]);

                // Update the order status in the database
                $order->status = $newStatus;
                $order->save();

                return response()->json(['success' => true]);
            } catch (\Exception $e) {
                // Handle email sending failure
                return response()->json(['success' => false, 'message' => 'Email sending failed.']);
            }
        } else {
            // Handle the case where email settings are not available
            return response()->json(['success' => false, 'message' => 'SMTP settings not found.']);
        }
            }

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Order not found.']);
    }


}
