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
        $homebanner=homebanner::select('bannerimage','image','text')->first();
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
            if($request->bannerimage){ 
                $bannerimage = $request->bannerimage;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileNamebanner = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
                $destinationPathbanner = 'banner/'.$currYr;
                $bannerimage->move($destinationPathbanner,$fileNamebanner);
                $homebanner = homebanner::where('id',1)->first();
                $homebanner->bannerimage = $destinationPathbanner.'/'.$fileNamebanner;
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

            $bannerimage = $request->bannerimage;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileNamebanner = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
            $destinationPathbanner = 'stalliondetails/'.$currYr;
            $bannerimage->move($destinationPathbanner,$fileNamebanner);

            $image = $request->image;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
            $destinationPath = 'stalliondetails/'.$currYr;
            $image->move($destinationPath,$fileName);

            $homebanner = new homebanner();
            $homebanner->text = $request->text; 
            $homebanner->bannerimage = $destinationPathbanner.'/'.$fileName;
            $homebanner->image = $destinationPath.'/'.$fileName;
            $homebanner->save(); 
            toast('homebanner created  successfully!','success');
            return back(); 
        }
        }
        catch (\Exception $e){
            Alert::error('Error', 'Error homebanner create: ' . $e->getMessage());
            return back();

        }
    }
}
