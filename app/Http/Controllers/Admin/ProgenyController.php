<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\progenyform;

class ProgenyController extends Controller
{
    public function store(Request $request)
    {
        $progenyform = new progenyform();
        $progenyform->name=$request->name;
        $progenyform->email=$request->email;
        $progenyform->phone=$request->phone;
        $progenyform->message=$request->message;
        $progenyform->save();
        toast('progeny form fill success','success');
        return back();
    }
}
