<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\follow;
use Illuminate\Support\Facades\Auth;
class FollowController extends Controller
{
    public function followstallion()
    {
        $follows = follow::where('user_id',Auth::id())
        ->where('category','stallions') 
        ->with(['stallion', 'stallion.stallionimages']) 
        ->get();

         return view('owner.follow.stallion')
         ->with('follows',$follows);   
    }

    public function followmare()
    {
        $follows = Follow::where('user_id',Auth::id())
        ->where('category','mares') 
        ->with(['stallion', 'stallion.stallionimages']) 
        ->get();

        return view('owner.follow.mare')
        ->with('follows',$follows);
    }
}
