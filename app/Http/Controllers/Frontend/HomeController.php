<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\stallion;
use App\Models\topside;
use App\Models\plan;
use App\Models\eventdate;
use App\Models\whatwedo;
use App\Models\homebanner;
use App\Models\advertisement;
use Session;
use App\Models\progenyperformance;

class HomeController extends Controller
{
    public function home()
    {
           
            $date = new \DateTime();
            $date->modify('-1 year');
            $date=$date->format('Y-m-d H:i:s');
           
            $categorys=category::all();
            $banner=homebanner::first();
            $categorys=category::all();
            $stallions = stallion::with(['stallionImages' => function ($query){
                $query->orderBy('new_element','DESC');
            }])->where('status',1)->where('created_at','>=',$date)->where('payment_status','paid')->orderBy('id','DESC')->get();

            $advertisements=advertisement::select('image','link','type')->where('page','home')->get();

            $progenyperformance=progenyperformance::first();
            $topside=topside::first();
            $planmember=plan::where('plan_for','member')->first();
            $planOwner=plan::where('plan_for','owner')->first();
        
            $latestUpdates = Stallion::with(['stallionImages' => function ($query) {
                $query->orderBy('new_element','DESC');
            }])->where('status',1)->where('update_status',1)->where('created_at','>=',$date)->where('payment_status','paid')->orderBy('latest_update','DESC')->take(10)->get();
            $eventdates=eventdate::select('year','month','day','date')->orderBy('date','desc')->distinct()->get();
            
            $whatwedo=whatwedo::first();
            return view('frontend.home')
            ->with('categorys',$categorys)->with('topside',$topside) ->with('progenyperformance',$progenyperformance)->with('banner',$banner)
            ->with('stallions',$stallions)->with('latestUpdates',$latestUpdates)->with('planmember',$planmember)->with('planOwner',$planOwner)
            ->with('advertisements',$advertisements)->with('eventdates',$eventdates)->with('whatwedo',$whatwedo);
           
    }

}
  