<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contactusbanner;
use App\Models\contactdetails;
use RealRashid\SweetAlert\Facades\Alert;
class ContactusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Contact Banner', ['only' => ['banner','bannerStore']]);
        $this->middleware('permission:Contact Details', ['only' => ['details','detailsStore']]);
        
    }
    public function banner()
    {
         $banner=contactusbanner::first();
         return view('admin.contact-us.banner')
         ->with('banner',$banner);
    }
    public function bannerStore(Request $request)
    {
        try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $count=contactusbanner::count();
            if($count>0)
            {
                if($request->image){ 
                    $image = $request->image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                    $destinationPath = 'banner/'.$currYr;
                    $image->move($destinationPath,$fileName);
                    $contactusbanner = contactusbanner::first();
                    $contactusbanner->image = $destinationPath.'/'.$fileName;
                    $contactusbanner->save();
                } 
                $contactusbanner = contactusbanner::first();
                $contactusbanner->heading = $request->heading; 
                $contactusbanner->save();
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
    
                $contactusbanner = new contactusbanner();
                $contactusbanner->heading = $request->heading; 
                $contactusbanner->image = $destinationPath.'/'.$fileName;
                $contactusbanner->save(); 
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

    public function details()
    {
        $contactdetail=contactdetails::first();
         return view('admin.contact-us.details')
         ->with('contactdetail',$contactdetail);
    }

    public function detailsStore(Request $request)
    {
        try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $count=contactdetails::count();
            if($count>0)
            {
                $contactdetails = contactdetails::first();
                $contactdetails->address = $request->address; 
                $contactdetails->email = $request->email; 
                $contactdetails->phone = $request->phone; 
                $contactdetails->save();
                toast('contact details updated  successfully!','success');
                return back(); 
            }
            else
            { 
                $contactdetails = new contactdetails();
                $contactdetails->address = $request->address; 
                $contactdetails->email = $request->email; 
                $contactdetails->phone = $request->phone; 
                $contactdetails->save(); 
                toast('contact details created  successfully!','success');
                return back();            
            }
            }
            catch (\Exception $e){
                echo $e->getMessage();
                Alert::error('Error', 'Error banner create: ' . $e->getMessage());
                return back();
            }
    }
}
