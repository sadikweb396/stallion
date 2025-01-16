<?php
if (!function_exists('my_helper')) {
   
    function follow($stallion,$userId) {
       $follow = DB::table('follows')->where('stallion_id',$stallion)->where('user_id',$userId)->where('status',1)->get();
        return $follow;
    }
}


