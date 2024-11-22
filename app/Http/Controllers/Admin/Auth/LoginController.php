<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            
            return redirect()->intended('dashboard');
        }
      
        // Authentication failed
        return redirect()->back()->withInput($request->only('email'))->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }  

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
 