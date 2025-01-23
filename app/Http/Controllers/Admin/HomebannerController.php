<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\homebanner;
use RealRashid\SweetAlert\Facades\Alert;
class HomebannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Home Banner',['only' => ['index','store']]);
      
    }
    public function index()
    {
        $homebanner=homebanner::select('bannerimage','image','text','type')->first();
        return view('admin.home.banner')
        ->with('homebanner',$homebanner);
    } 
    public function store(Request $request)
    {
       
        try { 
        $string = str_shuffle("abcdefghijklmnopqrstwxyz");
        $count=homebanner::count();
        if($count>0)
        {
            if ($request->hasFile('bannerimage') || $request->hasFile('bannervideo')) {
                $bannerimage = $request->file('bannerimage') ?? $request->file('bannervideo');
                // $bannerimage = $request->bannerimage;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileNamebanner = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
                $destinationPathbanner = 'banner/'.$currYr;
                $bannerimage->move($destinationPathbanner,$fileNamebanner);
                $homebanner = homebanner::where('id',1)->first();
                $homebanner->bannerimage = $destinationPathbanner.'/'.$fileNamebanner;
                $homebanner->type = $request->media;
                $homebanner->save();
            }
          
            if($request->image){ 
                $image = $request->image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                $destinationPath = 'banner/'.$currYr;
                $image->move($destinationPath,$fileName);
                $homebanner = homebanner::where('id',1)->first();
                $homebanner->image = $destinationPath.'/'.$fileName;
                $homebanner->save();
            } 
            $homebanner = homebanner::where('id',1)->first();
            $homebanner->text=$request->text;
            $homebanner->save();
            toast('homebanner updated  successfully!','success');
            return back(); 
        }
        else
        {
            $validated = $request->validate([
                'bannerimage' => 'required',
                'image' => 'required',
            ]);
            $homebanner = new homebanner();
            if ($request->hasFile('bannerimage') || $request->hasFile('bannervideo')) {
            $bannerimage = $request->file('bannerimage') ?? $request->file('bannervideo');
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileNamebanner = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
            $destinationPathbanner = 'stalliondetails/'.$currYr;
            $bannerimage->move($destinationPathbanner,$fileNamebanner);
            $homebanner->bannerimage = $destinationPathbanner.'/'.$fileName;
            $homebanner->type = $request->media;
            
            $image = $request->image;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
            $destinationPath = 'stalliondetails/'.$currYr;
            $image->move($destinationPath,$fileName);
            
            $homebanner->text = $request->text; 
            $homebanner->image = $destinationPath.'/'.$fileName;
            $homebanner->save(); 
            toast('homebanner created  successfully!','success');
            return back(); 
            }
        }
        }
        catch (\Exception $e){
            Alert::error('Error', 'Error homebanner create: ' . $e->getMessage());
            return back();

        }
    }
}
