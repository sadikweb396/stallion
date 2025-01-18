<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gettouch;
use App\Models\gettouchimage;

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

    public function gettouchImage()
    {
        $gettouch=gettouchimage::first();
        return view('admin.gettouch.gettouch-image')
        ->with('gettouch',$gettouch);
    }

    public function gettouchImageStore(Request $request)
    {
        
        $string = str_shuffle("abcdefghijklmnopqrstwxyz");
        $count = gettouchimage::where('id', 1)->count();
        $gettouchimage = gettouchimage::where('id', 1)->first();   
        if (!$gettouchimage) {
               $gettouchimage = new gettouchimage();
        }
        if ($request->image) {
            $image = $request->image;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
            $destinationPath = 'gettouch/'.$currYr;
            $image->move($destinationPath, $fileName);
            
            $gettouchimage->image = $destinationPath.'/'.$fileName;
            $gettouchimage->save();
        }

        if ($request->logo) {
            $logo = $request->logo;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileNamelogo = time().'_'.$randStr.'.'.$logo->getClientOriginalExtension();
            $destinationPathlogo = 'gettouch/'.$currYr;
            $logo->move($destinationPathlogo, $fileNamelogo);
            
            $gettouchimage->logo = $destinationPathlogo.'/'.$fileNamelogo;
            $gettouchimage->save();
        }
        
        toast('Get in touch update successfully','success');
        return back();
       
    }
}
