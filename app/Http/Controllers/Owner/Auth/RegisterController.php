<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\OwnerRegisterMail;
use Illuminate\Support\Facades\Mail;
 
class RegisterController extends Controller
{
    
    public function showRegisterForm()
    {
        $request_uri = $_SERVER['REQUEST_URI'];  // e.g., /owner/stallion

        // Remove any query parameters, if present
        $path = parse_url($request_uri, PHP_URL_PATH);

        // Split the path by slashes
        $role = explode('/', trim($path, '/'));
        $role= $role[0]; 

        return view('owner.auth.register')
        ->with('role',$role);
    }
   
    public function register(Request $request)
    {
       
        $request->validate([
            'email' => 'required|email|max:255|unique:users,email',
            // 'password' => 'required|string|min:8|max:20',
            
        ]);
       
        $roles=$request->role;
        $user = User::create([
                        'username' => $request->first_name,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'email' => $request->email,
                        'phone'=>$request->phone,
                        'password' => Hash::make($request->password),
                    ]);

        $user->syncRoles($roles);

        Auth::guard('web')->login($user);
        $baseUrl = url('/');

        $data = [
            'baseurl'=>$baseUrl,
            'name' => $request->first_name,
            'password' => $request->password,
            'email'=>$request->email,
        ];

        Mail::to($request->email)->send(new OwnerRegisterMail($data));

        return redirect()->route('dashboard');
    }

}


  
