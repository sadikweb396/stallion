<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\progenyform;
use App\Models\progenybanner;
use App\Models\progenyinformation;
use App\Models\progeny;

class ProgenyController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Progeny Banner', ['only' => ['banner','bannerStore']]);
        $this->middleware('permission:Progeny Information', ['only' => ['progenyInformation','progenyinformationStore']]);
      
    }

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

    public function banner()
    {
         $banner=progenybanner::first();
         return view('admin.progeny.banner')
         ->with('banner',$banner);
    }
    public function bannerStore(Request $request)
    {
        try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $count=progenybanner::count();
            if($count>0)
            {
                if($request->image){ 
                    $image = $request->image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                    $destinationPath = 'banner/'.$currYr;
                    $image->move($destinationPath,$fileName);
                    $aboutbanner = progenybanner::first();
                    $aboutbanner->image = $destinationPath.'/'.$fileName;
                    $aboutbanner->save();
                } 
                $aboutbanner = progenybanner::first();
                $aboutbanner->heading = $request->heading; 
                $aboutbanner->text = $request->text; 
                $aboutbanner->save();
                toast('banner updated  successfully!','success');
                return back(); 
            }
            else
            {
                if($request->image){ 
                $image = $request->image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                $destinationPath = 'banner/'.$currYr;
                $image->move($destinationPath,$fileName);
    
                $aboutbanner = new progenybanner();
                $aboutbanner->heading = $request->heading;  
                $aboutbanner->text = $request->text; 
                $aboutbanner->image = $destinationPath.'/'.$fileName;
                $aboutbanner->save(); 
                toast('banner created  successfully!','success');
                return back(); 
                }
                else
                {
                    Alert::error('Image required');
                    return back();
                }
            }
            }
            catch (\Exception $e){
                echo $e->getMessage();
                Alert::error('Error', 'Error banner create: ' . $e->getMessage());
                return back();
    
            }
    }

    public function progenyInformation()
    {
        $information=progenyinformation::first();
        return view('admin.progeny.information')
        ->with('information',$information);
    }
   
    public function progenyinformationStore(Request $request)
    {
        try { 
            $validatedData = $request->validate([
                'paragraph' => 'required',
            
            ]);
            $count=progenyinformation::count();
            if($count>0)
            {
                
                $progenyinformation = progenyinformation::first();
                $progenyinformation->paragraph = $request->paragraph; 
                $progenyinformation->save();
                toast('progeny infomation  successfully!','success');
                return back(); 
            }
            else
            {
                $progenyinformation = new progenyinformation();
                $progenyinformation->paragraph = $request->paragraph; 
                $progenyinformation->save(); 
                toast('progeny infomation  successfully!','success');
                return back();                       
            }
            }
            catch (\Exception $e){
                Alert::error('Error', 'Error progeny infomation create: ' . $e->getMessage());
                return back();
    
            }
    }

    public function progeny()
    {
         $progenys=progeny::paginate(10);
         return view('admin.progeny.index')
         ->with('progenys',$progenys);
    }
}

