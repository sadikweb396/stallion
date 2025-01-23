<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stallion;
use App\Models\maredetails;

class MareController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Mare Banner', ['only' => ['mareList','mareListStore']]);
        $this->middleware('permission:All Mares', ['only' => ['index']]);
      
    }

    public function index()
    {
        $mares=stallion::where('category','mares')->paginate(10);
        return view('admin.mare.index')
        ->with('mares',$mares);
    }
    public function mareList()
    {
        $maredetails = maredetails::where('id',1)->first(); 
        return view('admin.mare.mare-list')
        ->with('maredetails',$maredetails);
    }
    public function mareListStore(Request $request)
    {
        try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $count=maredetails::where('id',1)->count();
            if($count>0){
                // if($request->banner_image){ 
                //     $bannerimage = $request->banner_image;
                if($request->hasFile('bannerimage') || $request->hasFile('bannervideo')) {
                    $bannerimage = $request->file('bannerimage') ?? $request->file('bannervideo');
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileNamebanner = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
                    $destinationPathbanner = 'stalliondetails/'.$currYr;
                    $bannerimage->move($destinationPathbanner,$fileNamebanner);
                    $stalliondetails = maredetails::where('id',1)->first();
                    $stalliondetails->banner_image = $destinationPathbanner.'/'.$fileNamebanner;
                    $stalliondetails->type = $request->media;
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
                    toast('mare details create  successfully!','success');
                    return back();      
                
            }else{
                if($request->hasFile('bannerimage') || $request->hasFile('bannervideo')) {
                    $bannerimage = $request->file('bannerimage') ?? $request->file('bannervideo');
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileNamebanner = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
                    $destinationPathbanner = 'stalliondetails/'.$currYr;
                    $bannerimage->move($destinationPathbanner,$fileNamebanner);
        
                    $stalliondetails = new maredetails();
                    $stalliondetails->heading1 = $request->heading_first; 
                    $stalliondetails->heading2 = $request->heading_second;
                    $stalliondetails->paragraph1 = $request->first_paragraph;
                    $stalliondetails->paragraph2 = $request->second_paragraph;
                    $stalliondetails->banner_heading = $request->banner_heading;
                    $stalliondetails->banner_pargaraph = $request->banner_text;
                    $stalliondetails->banner_image = $destinationPathbanner.'/'.$fileName;
                    $stalliondetails->image = $destinationPath.'/'.$fileName;
                    $stalliondetails->type = $request->media;
                    $stalliondetails->save(); 
                    toast('mare details create  successfully!','success');
                    return back();    
                }
                Alert::error('Error', 'Banner image required');
                return back();    
            }
            }catch (\Exception $e){
            Alert::error('Error', 'Error mare details create: ' . $e->getMessage());
            return back();
        }
    }
    public function mareSearch(Request $request)
    {
        $query = $request->get('query');  
        $mares = Stallion::where('name', 'like', '%' . $query . '%')->where('category','mares')
        ->get();
        return view('admin.mare.partials.mare_table', compact('mares'));
    }
}
