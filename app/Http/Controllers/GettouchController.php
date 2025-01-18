<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gettouch;

class GettouchController extends Controller
{
    public function gettouch()
    {
        $gettouch=Gettouch::first();
        return view('admin.gettouch-image')
        ->with('gettouch',$gettouch);
    }
}
