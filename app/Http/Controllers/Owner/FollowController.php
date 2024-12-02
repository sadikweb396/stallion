<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;


class FollowController extends Controller
{
    public function followstallion()
    {
        $follows = Follow::where('user_id', 1) // or any other condition
        ->with(['stallion', 'stallion.stallionimages']) // Eager loading stallion and stallion images
        ->get();

         return view('owner.follow.stallion')
         ->with('follows',$follows);   
    }
}
