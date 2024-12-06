<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gettouch;

class GettouchController extends Controller
{
    public function store(Request $request)
    {
        $gettouch = new Gettouch();
        $gettouch->name=$request->fname;
        $gettouch->email=$request->email;
        $gettouch->phone=$request->phone;
        $gettouch->message=$request->message;
        $gettouch->save();
        toast('Get in touch created successfully','success');
        return back();
    }

    public function gettouch()
    {
        $gettouchs=Gettouch::paginate(10);
        return view('admin.gettouch.index')
        ->with('gettouchs',$gettouchs);
    }
}
