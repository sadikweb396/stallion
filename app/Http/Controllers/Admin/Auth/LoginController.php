<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {   
        return view('admin.auth.login'); // create a separate view for admin login
    }

    public function login(Request $request)
    {
        // $count=DB::table('users')->where('email',$request->email)->where('status',1)->count();
        // if($count==1){
        $credentials = $request->only('email','password');

        if (Auth::guard('web')->attempt($credentials)) {
            
            return redirect()->intended('user/profile');
        } 
        // Authentication failed
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
        // }
        // else
        // {
        //     return back()->withErrors([
        //         'email' => 'The provided credentials do not match our records.',
        //     ]);
        // }

    }  

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
 