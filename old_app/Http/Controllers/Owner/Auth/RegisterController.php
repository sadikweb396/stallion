<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\OwnerRegisterMail;
use Illuminate\Support\Facades\Mail;
use Session;
use App\Models\plan;
use App\Models\payment;
use RealRashid\SweetAlert\Facades\Alert;
use Stripe;
 
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

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
            'password' => 'required|string|min:8|max:20',
            'phone' => ['required', 'regex:/^\(?\d{3}\)?[\s\-]?\d{3}[\s\-]?\d{4}$/'],
            
        ]);
        $planPrice=plan::where('plan_for','owner')->value('plan_price');  
        Session::put('roles', $request->role);
        session([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => $request->password,
            'planPrice' => $planPrice,
        ]);
        return view('owner.payment.registerpayment')->with('planPrice',$planPrice);
       
    }

    public function paymentregister(Request  $request)
    {
        
        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        try {
        $planPrice=session('planPrice');

         // Create a new Stripe Customer
         $customer = Stripe\Customer::create([
            "email" =>  session('email'),
            "name" =>   session('first_name'),
            "source" => $request->stripeToken
        ]);

        // Charge the customer
        $charge = Stripe\Charge::create([
            "amount" => $planPrice * 100,  
            "currency" => "usd",
            "customer" => $customer->id,
        ]);

        $roles=Session::get('roles');
       
        $user = User::create([
                        'username' => session('first_name') . ' ' . session('last_name'),
                        'first_name' =>session('first_name'),
                        'last_name' => session('last_name'),
                        'email' => session('email'),
                        'phone'=>session('phone'),
                        'password' => Hash::make(session('password')),
                    ]);

        $user->syncRoles($roles);
      
        Auth::guard('web')->login($user);
        $baseUrl = url('/');

        $data = [
            'baseurl'=>$baseUrl,
            'name' => session('first_name'),
            'password' => session('password'),
            'email'=>session('email'),
        ];

        Mail::to(session('email'))->send(new OwnerRegisterMail($data));

        $payment = new payment();
        $payment->stripe_payment_id =$charge->id;
        $payment->user_id = Auth::id();
        $payment->amount =$charge->amount/100;
        $payment->status='successful';
        $payment->plan='owner';
        $payment->save(); 

        return redirect()->route('profile');
      }
      catch (\Stripe\Exception\CardException $e) {
        $errorMessage = $e->getError()->message;
        Alert::error('Error', 'Payment failed:'. $errorMessage);
      
     }  catch (\Exception $e) {
       
        Alert::error('Error', 'Error Registation created: ' . $e->getMessage());
      //  return redirect('owner/register');
    } 
    }
}


  
