<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contactusbanner;
use App\Models\contactdetails;

class ContactController extends Controller
{
    public function contactUs()
    {
        $banner=contactusbanner::first();
        $contactdetails=contactdetails::first();
        return view('frontend.contact-us')
        ->With('banner',$banner)
        ->with('contactdetails',$contactdetails);
    }
    
    
    
}
