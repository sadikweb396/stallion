<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stallion;
use App\Models\category;
use App\Models\stallionpagedetails;
use App\Models\stallionimage;
use RealRashid\SweetAlert\Facades\Alert;
class StallionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Stallion Banner', ['only' => ['stallionList','stallionListStore']]);
        $this->middleware('permission:All Stallions', ['only' => ['index']]);
      
    }
    public function index()
    {
    $stallions=stallion::where('category','stallions')->paginate(10);
    return view('admin.stallion.index')
     ->with('stallions',$stallions);
    }
    public function approve($id)
    {
        $staus=Stallion::where('id', $id)->update(['status' => 1]);
        toast('Approve successfully','success');
    
    }
    public function decline($id)
    {
        $staus=Stallion::where('id', $id)->update(['status' => 0]);
        toast('Decline successfully','success');
       
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
    public function stallionList()
    {
        $stalliondetails = stallionpagedetails::where('id',1)->first(); 
        return view('admin.stallion.stallion-list')
        ->with('stalliondetails',$stalliondetails);
    }
    public function stallionListStore(Request $request)
    {
        try { 
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
        
                    $stalliondetails = stallionpagedetails::where('id',1)->first();
                    $stalliondetails->heading1 = $request->heading_first; 
                    $stalliondetails->heading2 = $request->heading_second;
                    $stalliondetails->paragraph1 = $request->first_paragraph;
                    $stalliondetails->paragraph2 = $request->second_paragraph;
                    $stalliondetails->banner_heading = $request->banner_heading;
                    $stalliondetails->banner_pargaraph = $request->banner_text;
                    $stalliondetails->save();
                    toast('stallion details update  successfully!','success');
                    return back();      
                
            }else{
                if($request->banner_image){ 
                    $bannerimage = $request->banner_image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileNamebanner = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
                    $destinationPathbanner = 'stalliondetails/'.$currYr;
                    $bannerimage->move($destinationPathbanner,$fileNamebanner);

                    $stalliondetails = new stallionpagedetails();
                    $stalliondetails->heading1 = $request->heading_first; 
                    $stalliondetails->heading2 = $request->heading_second;
                    $stalliondetails->paragraph1 = $request->first_paragraph;
                    $stalliondetails->paragraph2 = $request->second_paragraph;
                    $stalliondetails->banner_heading = $request->banner_heading;
                    $stalliondetails->banner_pargaraph = $request->banner_text;
                    $stalliondetails->banner_image = $destinationPathbanner.'/'.$fileName;
                    $stalliondetails->save(); 
                    toast('stallion details create  successfully!','success');
                    return back(); 
                }       
            }
        }
         catch (\Exception $e){
            Alert::error('Error', 'Error stallion details create: ' . $e->getMessage());
            return back();
        }
  }
  public function stallionSearch(Request $request)
  {
      $query = $request->get('query');  
      $stallions = Stallion::where('name', 'like', '%' . $query . '%')->where('category','stallions')
      ->get();
      
      return view('admin.stallion.partials.stallion_table', compact('stallions'));
  }
  public function stallionView($id)
  {
         $stallion=Stallion::where('id',$id)->first();
         $stalliondata='';
         return view('admin.stallion.view')
         ->with('stalliondata',$stalliondata)
         ->with('stallion',$stallion);
  }
  public function popupdata(Request $request)
  {
     $stalliondata=stallionimage::where('id',$request->id)->first();
     
     return view('admin.stallion.popup', compact('stalliondata'));
  }

  public function setImage(Request $request)
  {
       
       if($request->setimage=='banner_image')
       {
            $stallionId=stallionimage::where('id',$request->id)->value('stallion_id');
            stallionimage::where('stallion_id',$stallionId)->update(['banner_image' =>0]);

            stallionimage::where('id',$request->id)->update(['background_image' =>0,'new_element'=>0,'performance_image' =>0,'exclusive_data'=>0]);

            stallionimage::where('id',$request->id)->update(['banner_image' =>1]);

            return back();

       }
       elseif($request->setimage=='background_image')
       {
            $stallionId=stallionimage::where('id',$request->id)->value('stallion_id');
            stallionimage::where('stallion_id',$stallionId)->update(['background_image'=>0]);

            stallionimage::where('id',$request->id)->update(['banner_image'=>0,'new_element'=>0,'performance_image'=>0,'exclusive_data'=>0]);

            stallionimage::where('id',$request->id)->update(['background_image'=>1]);

            return back();
       }
       elseif($request->setimage=='performance_image')
       {
            $stallionId=stallionimage::where('id',$request->id)->value('stallion_id');

            stallionimage::where('stallion_id',$stallionId)->update(['performance_image' =>0]);

            stallionimage::where('id',$request->id)->update(['background_image' =>0,'new_element'=>0,'banner_image' =>0,'exclusive_data'=>0]);

            stallionimage::where('id',$request->id)->update(['performance_image' =>1]);

            return back();
       }
       elseif($request->setimage=='new_element')
       {
            $stallionId=stallionimage::where('id',$request->id)->value('stallion_id');

            stallionimage::where('stallion_id',$stallionId)->update(['new_element'=>0]);

            stallionimage::where('id',$request->id)->update(['background_image' =>0,'performance_image'=>0,'banner_image' =>0,'exclusive_data'=>0]);

            stallionimage::where('id',$request->id)->update(['new_element'=>1]);

            return back();
       }
  }
} 
