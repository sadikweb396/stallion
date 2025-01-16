<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\follow;
use Illuminate\Support\Facades\Auth;
use App\Models\category;
use App\Models\stallion;
use App\Models\stallionimage;
use App\Models\stallionvideo;
use App\Models\stallionpagedetails;
use App\Models\pedigree;


class FollowController extends Controller
{
    public function follow(Request $request)
    {
        $category=stallion::select('category')->where('id',$request->stallionId)->first();
        $follow = new follow();
        $follow->user_id= Auth::id();
        $follow->stallion_id=$request->stallionId;
        $follow->status=1;
        $follow->category=$category->category;
        $follow->save(); 
        return response()->json([
            'success' => true,
            'message' => 'You are now following this event!',
            'action' => 'unfollow', 
        ]);
        
    }

    public function unfollow(Request $request)
    {
         // Find the follow relationship
    $unfollow = follow::where('stallion_id', $request->stallionId)
    ->where('user_id', Auth::id())
    ->first();
        if ($unfollow) {
     
        $unfollow->delete();
        }
        return response()->json([
            'success' => true,
            'message' => 'You have unfollowed this event.',
            'action' => '+ Follow',  
        ]);
        }
}
