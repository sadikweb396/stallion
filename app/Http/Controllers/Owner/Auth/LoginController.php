<?php

namespace App\Http\Controllers\Owner\Auth;

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
        return view('owner.auth.login'); // create a separate view for admin login
    }

    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            
            return redirect()->intended('user/profile');
        }
        
        return redirect()->route('home')->with('error','Invalid email or password');
    } 

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
