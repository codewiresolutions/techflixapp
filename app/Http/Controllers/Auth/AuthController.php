<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash as FacadesHash;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('website.pages.login');
    }


    public function admin_login()
    {
        // Session::flush();
        // Auth::logout();
        return view('website.pages.admin_login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('website.pages.signup');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

     public function adminpostLogin(Request $request)
     {
         $request->validate([
             'email' => 'required',
             'password' => 'required',
         ]);

         $credentials = $request->only('email', 'password');
         $result = Auth::attempt($credentials);
         if ($result) {
              if (Auth::user()->user_type  == "superadmin") {
            return redirect()->route('dashboard.index')->with('success','You are Successfully loggedin');
        } else {
         return redirect()->back()->with('error','You are not authorized for this action');
        }
         } else {

               return redirect()->back()->with('error','Oppes! You have entered invalid credentials');

        //  return redirect("website.pages.admin_login")->with('success','Oppes! You have entered invalid credentials');

         }

     }


    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $result = Auth::attempt($credentials);
        $productId = $request['productId'];
        if ($result && !empty($productId)) {
            return redirect()->route('service.page',$productId);
        } else {
            return redirect()->route('dashboard.index')->with('success','You are Successfully loggedin');
        }

        return redirect("login")->with('success','Oppes! You have entered invalid credentials');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function userRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("login")->with('success','Great! You are Successfully Registered');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->with('success','Opps! You do not have access');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => FacadesHash::make($data['password'])
      ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
