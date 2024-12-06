<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\photographer;

class PhotographerController extends Controller
{
    public function index()
    {
         $photographers=photographer::select('location','photographer_name','address','travel_radius','single_pic_price','multiple_pic_price')->get();
         return view('frontend.photographer')
         ->with('photographers',$photographers);
    }
}
