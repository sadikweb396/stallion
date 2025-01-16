<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\progenybanner;
use App\Models\progenyinformation;
use App\Models\logo;
use App\Models\advertisement;
use App\Models\progeny;

class ProgenyController extends Controller
{
    public function progeny()
    {
        $banner=progenybanner::first();
        $logo=logo::first();
        $advertisements=advertisement::select('image','link')->where('page','Progeny')->get();
        $progenyinformation=progenyinformation::first();
        $progenys=progeny::select('gender','registration_number','date_of_birth','color','progeny_name','stallion_id','stallionslug','mareslug','id')->where('sale','sale')
        ->groupBy('registration_number')->get();
        $logo=logo::first();
        return view('frontend.progeny')
        ->with('banner',$banner)->with('progenyinformation',$progenyinformation)
        ->with('logo',$logo)->with('advertisements',$advertisements)->with('progenys',$progenys);
    }
}
