<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stallion;
use App\Models\category;
use App\Models\stallionpagedetails;

class StallionController extends Controller
{
    public function index()
    {
    //     $request_uri = $_SERVER['REQUEST_URI']; 
    //     $path = parse_url($request_uri, PHP_URL_PATH);
    //     $category = explode('/', trim($path, '/'));
       
    //     $categoryName= $category[1];

    //     $category_id=Category::where('categoryname',$categoryName)->select('id')->first();

    //     $stallions=stallion::where('category_id',$category_id->id)->get();

    //     if($categoryName == 'Stallions' ||  $categoryName == 'stallions'||  $categoryName == 'stallion' ||  $categoryName == 'Stallions')
    //     {
    //         return view('admin.stallion.index')
    //         ->with('stallions',$stallions);
    //     }
    //    elseif($categoryName == 'Mares' ||  $categoryName == 'mares'||  $categoryName == 'Mare' ||  $categoryName == 'mare')
    //    {
    //        return view('admin.mare.index')
    //        ->with('stallions',$stallions);
    //    }

    $stallions=stallion::where('category','stallions')->get();
    return view('admin.stallion.index')
     ->with('stallions',$stallions);
       
    }

    public function approve($id)
    {
        $staus=Stallion::where('id', $id)->update(['status' => 1]);

        return back();
    }

    public function decline($id)
    {
        $staus=Stallion::where('id', $id)->update(['status' => 0]);

        return back();
    }

    public function active($id)
    {
        $staus=Stallion::where('id', $id)->update(['feature_status' => 1]);

        return back();
    }

    public function inactive($id)
    {
        $staus=Stallion::where('id', $id)->update(['feature_status' => 0]);

        return back();
    }

    public function stallionDetails()
    {
        $stalliondetails = stallionpagedetails::where('id',1)->first(); 
        return view('admin.stallion.stallion-details')
        ->with('stalliondetails',$stalliondetails);
    }

    public function stallionDetailsStore(Request $request){

    $string = str_shuffle("abcdefghijklmnopqrstwxyz");
    $count=stallionpagedetails::where('id',1)->count();
    if($count>0){
        if($request->banner_image){ 
            $bannerimage = $request->banner_image;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileNamebanner = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
            $destinationPathbanner = 'stalliondetails/'.$currYr;
            $bannerimage->move($destinationPathbanner,$fileNamebanner);
            $stalliondetails = stallionpagedetails::where('id',1)->first();
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
            $stalliondetails = stallionpagedetails::where('id',1)->first();
            $stalliondetails->image = $destinationPath.'/'.$fileName;
            $stalliondetails->save();
        }
            $stalliondetails = stallionpagedetails::where('id',1)->first();
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

            $stalliondetails = new stallionpagedetails();
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
