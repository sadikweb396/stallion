<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\logo;

class LogoController extends Controller
{
    public function index()
    {
        $logo=logo::first();
        return view('admin.logo.index')
        ->with('logo',$logo);

    }
    public function store(Request $request)
    {
        $string = str_shuffle("abcdefghijklmnopqrstwxyz");
        $count=logo::count();
        if($count==1)
        {
            if($request->image){   
                $image = $request->image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
    
                $destinationPath = 'stallion/'.$currYr;
                $image->move($destinationPath,$fileName);
                $logo = logo::first();
                $logo->logo = $destinationPath.'/'.$fileName;
                $logo->save();
                return back();
             }
        }
        else
        {
           if($request->image){   
            $image = $request->image;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

            $destinationPath = 'stallion/'.$currYr;
            $image->move($destinationPath,$fileName);
            $logo = new logo();
            $logo->logo = $destinationPath.'/'.$fileName;
            $logo->save();
            return back();
           }  
        }
    }
}
