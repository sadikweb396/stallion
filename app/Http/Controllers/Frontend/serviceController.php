<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\plan;
use App\Models\planservice;
use App\Models\servicebanner;
use DB;

class serviceController extends Controller
{
    public function service()
    {
         $service= service::get();
         $servicebanner= servicebanner::first();
         return view('frontend.service')
         ->with('servicebanner',$servicebanner)
         ->with('service',$service);
    }
    public function singleService($id)
    {
       
        $planservice=plan::where('plan_for','service')->first();
        $planservicedetails=DB::table('planservices')->first();
        $service= service::where('slug',$id)->first();

        return view('frontend.single-service')
        ->with('service',$service)
        ->with('planservicedetails',$planservicedetails)
        ->with('planservice',$planservice);
    }

}
 