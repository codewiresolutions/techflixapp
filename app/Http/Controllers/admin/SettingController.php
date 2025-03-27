<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\PaymentMethod;
use App\Models\PaymentMethodList;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;



class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::orderByDisplayOrder()->get();
        $payment_method_lists = PaymentMethodList::all();

        return view('admin.pages.settings.index',compact('payment_method_lists','paymentMethods'));
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

        // dd($request->all());
        $userId = Auth::id();
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            // 'phone_number' => 'required',
        ]);

        $user_acount = User::find(auth()->user()->id);
        $user_acount->first_name = $request->get('first_name');
        $user_acount->last_name = $request->get('last_name');
        $user_acount->email = $request->get('email');
        // dd($user_acount);

        if ($user_acount->update()) {
            Session::flash('success', 'Account has been saved successfully.');
        } else {
            Session::flash('error', 'There was an error in saving the Account data.');
        }


        // $user_detail = UserDetail::firstOrNew($user_acount->id);
        // $user_detail->phone_number = $request->get('phone_number');
        // $user_detail->description = $request->get('description');
        // $user_detail->user_id = $userId;
        // $user_detail->update();

        return redirect()->route('admin.settings.index');
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

    public function updatePassword(Request $request)
{
    // Validate the input
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|confirmed',
    ]);

    // Check if the old password matches
    if (!Hash::check($request->old_password, auth()->user()->password)) {
        return back()->with("error", "Old Password Doesn't match!");
    }

    // Update the new password
    User::whereId(auth()->user()->id)->update([
        'password' => Hash::make($request->new_password)
    ]);

    // Flash a success message and redirect
    Session::flash('success', 'Password has been changed successfully.');
    return redirect()->route('admin.settings.index');
}

}
