<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stallion;
use App\Models\maredetails;

class MareController extends Controller
{
    public function index()
    {
        $mares=stallion::where('category','mares')->get();
        return view('admin.mare.index')
        ->with('mares',$mares);
    }
    public function mareDetails()
    {
        $maredetails = maredetails::where('id',1)->first(); 
        return view('admin.mare.mare-details')
        ->with('maredetails',$maredetails);
    }
    public function mareDetailsStore(Request $request){

        $string = str_shuffle("abcdefghijklmnopqrstwxyz");
        $count=maredetails::where('id',1)->count();
        if($count>0){
            if($request->banner_image){ 
                $bannerimage = $request->banner_image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileNamebanner = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
                $destinationPathbanner = 'stalliondetails/'.$currYr;
                $bannerimage->move($destinationPathbanner,$fileNamebanner);
                $stalliondetails = maredetails::where('id',1)->first();
                $stalliondetails->banner_image = $destinationPathbanner.'/'.$fileNamebanner;
                $stalliondetails->save();
            }
            if($request->image){ 
                $image = $request->image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
                $destinationPath = 'stalliondetails/'.$currYr;
                $image->move($destinationPath,$fileName);
                $stalliondetails = maredetails::where('id',1)->first();
                $stalliondetails->image = $destinationPath.'/'.$fileName;
                $stalliondetails->save();
            }
                $stalliondetails = maredetails::where('id',1)->first();
                $stalliondetails->heading1 = $request->heading_first; 
                $stalliondetails->heading2 = $request->heading_second;
                $stalliondetails->paragraph1 = $request->first_paragraph;
                $stalliondetails->paragraph2 = $request->second_paragraph;
                $stalliondetails->banner_heading = $request->banner_heading;
                $stalliondetails->banner_pargaraph = $request->banner_text;
                $stalliondetails->save();
                return back();      
              
        }else{
                $bannerimage = $request->banner_image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileNamebanner = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
                $destinationPathbanner = 'stalliondetails/'.$currYr;
                $bannerimage->move($destinationPathbanner,$fileNamebanner);
    
                $image = $request->image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
                $destinationPath = 'stalliondetails/'.$currYr;
                $image->move($destinationPath,$fileName);
    
                $stalliondetails = new maredetails();
                $stalliondetails->heading1 = $request->heading_first; 
                $stalliondetails->heading2 = $request->heading_second;
                $stalliondetails->paragraph1 = $request->first_paragraph;
                $stalliondetails->paragraph2 = $request->second_paragraph;
                $stalliondetails->banner_heading = $request->banner_heading;
                $stalliondetails->banner_pargaraph = $request->banner_text;
                $stalliondetails->banner_image = $destinationPathbanner.'/'.$fileName;
                $stalliondetails->image = $destinationPath.'/'.$fileName;
                $stalliondetails->save(); 
                
               return back();        
        }
      }
}
