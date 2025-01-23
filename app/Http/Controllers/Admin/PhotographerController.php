<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\photographer;
use App\Models\photographerbanner;
use RealRashid\SweetAlert\Facades\Alert;
class PhotographerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Photographer', ['only' => ['index','store','edit','update']]);
        $this->middleware('permission:Photographer Banner', ['only' => ['banner','bannerStore']]);
      
    }
    public function index()
    {
        $photographers=photographer::select('photographer_name','location','travel_radius','single_pic_price','multiple_pic_price','id','photographer_image')->get();
        return view('admin.photographer.index')
        ->with('photographers',$photographers);
    }
    public function store(Request $request)
    {
        try { 
        $string = str_shuffle("abcdefghijklmnopqrstwxyz");
        if($request->photoimage){ 

            $photographerimage = $request->photoimage;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$photographerimage->getClientOriginalExtension();

            $destinationPath = 'photographer/'.$currYr;
            $photographerimage->move($destinationPath,$fileName);

            $pdf = $request->pdf;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $pdfName = time().'_'.$randStr.'.'.$pdf->getClientOriginalExtension();

            $destinationpdfPath = 'photographer/'.$currYr;
            $pdf->move($destinationpdfPath,$pdfName);
    
            $photographer = new photographer();
            $photographer->photographer_name= $request->photographername;
            $photographer->photographer_image = $destinationPath.'/'.$fileName;
            $photographer->photographer_pdf = $destinationpdfPath.'/'.$pdfName;
            $photographer->location=$request->location;
            $photographer->travel_radius=$request->travel_radius;
            $photographer->single_pic_price=$request->single_pic_price;
            $photographer->multiple_pic_price=$request->multiple_pic_price;
            $photographer->address=$request->address;
            $photographer->phone=$request->phone;
            $photographer->save();
            toast('Photograph  created  successfully!','success');
            return back();
          }   
        }  
        catch (\Exception $e) {
            Alert::error('Error', 'Error Photograph created: ' . $e->getMessage());
            return back();
        }     
    }
    public function edit($id)
    {
        $photographer = photographer::find($id);
        return view('admin.photographer.edit')
        ->with('photographer',$photographer);      
    }     
    public function update(Request $request)
    {
        try { 
        $id=$request->id;
        $string = str_shuffle("abcdefghijklmnopqrstwxyz");
        $photographer = photographer::find($id);
        if($request->photographerimage){
            $photographerimage = $request->photographerimage;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$photographerimage->getClientOriginalExtension();

            $destinationPath = 'photographer/'.$currYr;
            $photographerimage->move($destinationPath,$fileName);
            $photographer->photographer_image = $destinationPath.'/'.$fileName;
        }
        if($request->pdf){
          
                $pdf = $request->pdf;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $pdfName = time().'_'.$randStr.'.'.$pdf->getClientOriginalExtension();

                $destinationpdfPath = 'photographer/'.$currYr;
                $pdf->move($destinationpdfPath,$pdfName);
                $photographer->photographer_pdf = $destinationpdfPath.'/'.$pdfName;
        }

            $photographer->photographer_name= $request->photographername;
            $photographer->location=$request->location;
            $photographer->travel_radius=$request->travel_radius;
            $photographer->single_pic_price=$request->single_pic_price;
            $photographer->multiple_pic_price=$request->multiple_pic_price;
            $photographer->phone=$request->phone;
            $photographer->save();
            toast('Photograph  update  successfully!','success');
            return redirect('admin/photographer');
        }
            catch (\Exception $e) {
                Alert::error('Error', 'Error Photograph update: ' . $e->getMessage());
                return back();
        }  
    }

    public function banner()
    {
         $banner=photographerbanner::first();
         return view('admin.photographer.banner')
         ->with('banner',$banner);
    }
    public function bannerStore(Request $request)
    { 
        try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $count=photographerbanner::count();
            if($count>0)
            {
                if ($request->hasFile('bannerimage') || $request->hasFile('bannervideo')) {
                    $image = $request->file('bannerimage') ?? $request->file('bannervideo'); 
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                    $destinationPath = 'banner/'.$currYr;
                    $image->move($destinationPath,$fileName);
                    $photographer = photographerbanner::first();
                    $photographer->image = $destinationPath.'/'.$fileName;
                    $photographer->type=$request->media;
                    $photographer->save();
                } 
                $photographer = photographerbanner::first();
                $photographer->heading = $request->heading; 
                $photographer->save();
                toast('banner updated  successfully!','success');
                return back(); 
            }
            else
            {
            if ($request->hasFile('bannerimage') || $request->hasFile('bannervideo')) {
                $image = $request->file('bannerimage') ?? $request->file('bannervideo'); 
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                $destinationPath = 'banner/'.$currYr;
                $image->move($destinationPath,$fileName);
    
                $photographer = new photographerbanner();
                $photographer->heading = $request->heading;  
                $photographer->image = $destinationPath.'/'.$fileName;
                $photographer->type=$request->media;
                $photographer->save(); 
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

}
