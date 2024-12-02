<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\stallion;
use App\Models\stallionimage;
use App\Models\stallionvideo;
use App\Models\stallionpagedetails;
use App\Models\pedigree;


class FollowController extends Controller
{
    public function follow($stallionId)
    {
        $category=stallion::select('category')->where('id',$stallionId)->first();
        $follow = new Follow();
        $follow->user_id= Auth::id();
        $follow->stallion_id=$stallionId;
        $follow->status=1;
        $follow->category=$category->category;
        $follow->save(); 
        return back();
        
    }

    public function unfollow($stallionId)
    {
         // Find the follow relationship
    $unfollow = Follow::where('stallion_id', $stallionId)
    ->where('user_id', Auth::id())
    ->first();
        if ($unfollow) {
     
        $unfollow->delete();
        }
        return back(); 
        }
}
