<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\photographer;
use App\Models\advertisement;
use App\Models\photographerbanner;

class PhotographerController extends Controller
{
    public function index()
    {
         $advertisements=advertisement::where('page','Photographer')->get();
         $photographerbanner=photographerbanner::first();
         $photographers=photographer::select('location','photographer_name','address','travel_radius','single_pic_price','multiple_pic_price')->get();
         return view('frontend.photographer')
         ->with('advertisements',$advertisements)
         ->with('photographerbanner',$photographerbanner)
         ->with('photographers',$photographers);
    }
}
