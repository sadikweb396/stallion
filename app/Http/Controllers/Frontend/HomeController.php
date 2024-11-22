<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\stallion;
use App\Models\topside;
use App\Models\progenyperformance;

class HomeController extends Controller
{
    public function home()
        {
            $categorys=category::all();
           
            $stallions = Stallion::with(['stallionImages' => function ($query){
                $query->orderBy('new_element','DESC');
            }])->where('status',1)->orderBy('id','ASC')->get();

            $progenyperformance=progenyperformance::first();
            $topside=topside::first();

        
            $latestUpdates = Stallion::with(['stallionImages' => function ($query) {
                $query->orderBy('new_element', 'DESC');
            }])->where('status',1)->orderBy('latest_update','DESC')->get();

            return view('frontend.home')
            ->with('categorys',$categorys)->with('topside',$topside) ->with('progenyperformance',$progenyperformance)
            ->with('stallions',$stallions)->with('latestUpdates',$latestUpdates);
        }
}
  