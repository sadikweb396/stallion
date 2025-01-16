<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\plan;
use App\Models\stallion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe;
use Carbon\Carbon;
use DB;
class subscriptionController extends Controller
{
    public function subscription()
    {
       
        $userId=Auth::id();
        $user = Auth::user();
        if($user->hasRole('Owner')) {
            $subscriptions = Payment::where('user_id', $userId)
            ->orderBy('id', 'ASC')
            ->get()
            ->groupBy('stallion_id')
            ->map(function ($group) {
                return $group->last();
            })
            ->values();

            return view('admin.subscription.owner-subscription')
           ->with('subscriptions',$subscriptions);
        }
        else
        {
            $subscriptions=payment::where('user_id',$userId)->orderby('id','desc')->where('stallion_id','Null')->first();
            return view('admin.subscription.index')
            ->with('subscriptions',$subscriptions);
        }
  
    }
    public function singleSubscription($id)
    {
        $subscriptions=payment::where('id',$id)->first();
        return view('admin.subscription.view-subscription')
        ->with('subscriptions',$subscriptions);
    }
    public function renewSubscription($id)
    {
        $subscriptions=payment::where('id',$id)->first();     
        $plan=plan::where('plan_for',$subscriptions->plan)->first();
        $planPrice=$plan->plan_price;

        session()->put('planprice',$planPrice);
        session()->put('paymentId',$id);

        return view('admin.subscription.renew-subscription')
        ->with('plan',$plan);

    }
    public function subscriptionPayment()
    {     
        $planPrice = Session::get('planprice');
        return view('admin.subscription.payment')
        ->with('planPrice',$planPrice);
    }

    public function subscriptionPaymentStore(Request $request)
    {
        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        $paymentId = Session::get('paymentId');
        
        $plan=DB::table('payments')->where('id',$paymentId)->first();

        if($plan->plan=='member')
        {
        $planPrice=Session::get('planprice');
       
        $user = Auth::user();
    
        $customer = Stripe\Customer::create([
            "email" =>  $user ? $user->email : null,
            "name" =>   $user ? $user->name : null,
            "source" => $request->stripeToken
        ]);

        $charge = Stripe\Charge::create([
            "amount" => $planPrice * 100,  
            "currency" => "usd",
            "customer" => $customer->id,
        ]);

        $payment = new payment();
        $payment->stripe_payment_id =$charge->id;
        $payment->stallion_id='Null';
        $payment->user_id = Auth::id();
        $payment->amount =$charge->amount/100;
        $payment->plan =$plan->plan;
        $payment->status='successful';
        $payment->save(); 
    }
    else
    {
        $planPrice=Session::get('planprice');
        $user = Auth::user();
        $customer = Stripe\Customer::create([
            "email" =>  $user ? $user->email : null,
            "name" =>   $user ? $user->name : null,
            "source" => $request->stripeToken
        ]);
        $charge = Stripe\Charge::create([
            "amount" => $planPrice * 100,  
            "currency" => "usd",
            "customer" => $customer->id,
        ]);

        $payment = new payment();
        $payment->stripe_payment_id =$charge->id;
        $payment->stallion_id=$plan->stallion_id;
        $payment->user_id = Auth::id();
        $payment->amount =$charge->amount/100;
        $payment->plan =$plan->plan;
        $payment->status='successful';
        $payment->save(); 

        stallion::where('id', $plan->stallion_id)->update([
            'created_at' => \Carbon\Carbon::now(),
        ]);
      }
    }
}
 