<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\OrdercreationEmail;
use App\Models\EmailSetting;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visitor_users = User::where('role_id', NULL)->orderBy('id', 'DESC')->get();
        $admin_users = User::where('role_id',1)->get();

    
        return view('admin.pages.users.index',compact('visitor_users','admin_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
                'regex:/^\w+[-\.\w]*@(?!(?:outlook|myemail|yahoo)\.com$)\w+[-\.\w]*?\.\w{2,4}$/'
            ],
            'status' => 'required',
            'password' => 'required|min:6',

            // 'password' => [
            //     'required',
            //     'min:6',
            //     'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'
            // ],
        ]);
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->status = $request->get('status');
        $password = $request->get('password'); // get the value of password field
        $user->password = Hash::make($password); // encrypt the password
        $user->role_id = 1;
        $user->is_admin = 1;
        $user->user_type = 'superadmin';
        $user->email_verified_at = now();
        if ($user->save()) {
            Session::flash('success', 'Admin User Created successfully.');
        } else {
            Session::flash('error', 'There was an error in saving the User data.');
        }
        return redirect()->route('admin.users.index');
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
    try {
        // Decrypt the ID received from the URL
        $decryptedId = decryptstring($id);

        // Attempt to find the user using decrypted ID
        $user = User::findOrFail($decryptedId);

        // Return the view with the retrieved data
        return view('admin.pages.users.edit', compact('user'));
    } catch (ModelNotFoundException $e) {
        // Handle the case when the user is not found
        abort(404); // 404 Not Found status code
    } catch (\Exception $e) {
        // Log the error for debugging purposes
        Log::error($e);

        // Redirect to the custom 404 error page or handle the error as per your requirements
        return response()->view('errors.404', [], 404);
    }
}


    // public function edit(string $id)
    // {
    //     $user = User::find(decryptstring($id));
    //     return view('admin.pages.users.edit',compact('user'));

    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'status' => 'required'


        ]);
        $user = User::find(decryptstring($id));
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->status = $request->get('status');
        if ($user->save()) {
            Session::flash('success', 'Admin User Updated successfully.');
        } else {
            Session::flash('error', 'There was an error in saving the User data.');
        }
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User Data Has been Deleted Successfully.');

    }
}
