<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class comingsoonController extends Controller
{
     public function comingSoon()
     {
        return view('frontend.comingsoon');
     }
}
