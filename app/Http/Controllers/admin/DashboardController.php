<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{

    protected $notifications = [];

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            view()->composer('admin.layouts.partials.header', function ($view) {
                $notifications = Notification::where('read', 0)->get();
                $view->with('notifications', $notifications);
            });

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        if (Auth::check() && Auth::user()->is_admin == 1) {
            // Admin Dashboard Data

            $wl = Order::where('status', 'Pending')->count();
            $total = Order::count();
            if ($wl != 0)
                $pending_percent = $wl / $total * 100;
            else
                $pending_percent = 0;
            $wl = Order::where('status', 'Completed')->count();
            $total = Order::count();
            if ($wl != 0)
                $complete_percent = $wl / $total * 100;
            else
                $complete_percent = 0;
            $wl = Order::where('status', 'Active')->count();
            $total = Order::count();
            if ($wl != 0)
                $active_percent = $wl / $total * 100;
            else
                $active_percent = 0;
            $wl = Order::where('status', 'Canceled')->count();
            $total = Order::count();
            if ($wl != 0)
                $canceled_percent = $wl / $total * 100;
            else
                $canceled_percent = 0;

              $totalOrders=      Order::get();
            $total_orders_amount = $totalOrders->sum('price');
            $orders = Order::orderBy('id', 'DESC')->get()->take(5);
            $notifications = $this->getNotifications()['list'];

            $ordersCount = $totalOrders->count();
            return view('admin.pages.dashboard.index', compact('ordersCount', 'orders', 'total_orders_amount', 'pending_percent', 'complete_percent', 'canceled_percent', 'active_percent', 'notifications'));


        } else {



            $wl = Order::where('status', 'Completed')->orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->count();
            $total = Order::where('user_id', auth()->user()->id)->count();
            if ($wl != 0)
                $pending_percent = $wl / $total * 100;
            else
                $pending_percent = 0;
            $wl = Order::where('status', 'Completed')->where('user_id', auth()->user()->id)->count();
            $total = Order::where('user_id', auth()->user()->id)->count();
            if ($wl != 0)
                $complete_percent = $wl / $total * 100;
            else
                $complete_percent = 0;
            $wl = Order::where('status', 'Active')->where('user_id', auth()->user()->id)->count();
            $total = Order::where('user_id', auth()->user()->id)->count();
            if ($wl != 0)
                $active_percent = $wl / $total * 100;
            else
                $active_percent = 0;
            $wl = Order::where('status', 'Canceled')->where('user_id', auth()->user()->id)->count();
            $total = Order::where('user_id', auth()->user()->id)->count();
            if ($wl != 0)
                $canceled_percent = $wl / $total * 100;
            else
                $canceled_percent = 0;
            $total_orders_amount = Order::where('user_id', auth()->user()->id)->where('status', 'Completed')->get()->sum('price');
            $orders = Order::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->where('status', 'Completed')->get();
            $ordersCount = $orders->count();


            $notifications = $this->getNotifications()['list'];
            return view('admin.pages.dashboard.index', compact('ordersCount', 'orders', 'total_orders_amount', 'pending_percent', 'complete_percent', 'active_percent', 'canceled_percent', 'notifications'));
        }
        return redirect("login")->withSuccess('Opps! You do not have access');


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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order_deatil = Order::with('product')->where('id',decryptstring($id))->first();


        return view('admin.pages.dashboard.show', compact('order_deatil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            // Decrypt the ID received from the URL
            $decryptedId = decryptstring($id);

            // Attempt to find the order using decrypted ID
            $order_deatil = Order::findOrFail($decryptedId);

            // Return the view with the retrieved data
            return view('admin.pages.dashboard.edit', compact('order_deatil'));
        } catch (ModelNotFoundException $e) {
            // Handle the case when the order is not found
            abort(404); // 404 Not Found status code
        } catch (\Exception $e) {
            // Log the error for debugging purposes
            Log::error($e);

            // Redirect to the custom 404 error page or handle the error as per your requirements
            return response()->view('errors.404', [], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = auth()->user()->id;
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);
        $user_acount = User::find($user_id);
        $user_acount->first_name = $request->get('first_name');
        $user_acount->last_name = $request->get('last_name');
        $user_acount->email = $request->get('email');
        $user_acount->phone_number = $request->get('phone_number');
        $user_acount->description = $request->get('description');

        if ($user_acount->save()) {
            Session::flash('success', 'Account has been saved successfully.');
        } else {
            Session::flash('error', 'There was an error in saving the Account data.');
        }
        return redirect()->route('settings.index');
    }


    public function orderUpdate(Request $request, string $id)
    {
        $Order = Order::find(decryptstring($id));
        $Order->status = $request->get('status');
        if ($Order->save()) {
            Session::flash('success', 'Order Updated successfully.');
        } else {
            Session::flash('error', 'There was an error in Updating the Order data.');
        }
        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getNotifications()
    {

        // Admin Dashboard Notifications
        $notifications = Notification::where('read', 0)
            ->where('type', 'Order')->get()->toArray();
        return [
            'count' => count($notifications),
            'list' => $notifications
        ];
    }


    public function updateStatus(Request $request)
    {
        $id = $request->input('id');
        Notification::where('id', $id)->update(['read' => 1]);
        return response()->json(['success' => true]);
    }


}
