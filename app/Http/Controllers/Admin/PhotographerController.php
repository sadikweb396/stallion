<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\photographer;
use RealRashid\SweetAlert\Facades\Alert;
class PhotographerController extends Controller
{
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
    
            $photographer = new photographer();
            $photographer->photographer_name= $request->photographername;
            $photographer->photographer_image = $destinationPath.'/'.$fileName;
            $photographer->location=$request->location;
            $photographer->travel_radius=$request->travel_radius;
            $photographer->single_pic_price=$request->single_pic_price;
            $photographer->multiple_pic_price=$request->multiple_pic_price;
            $photographer->address=$request->address;
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

            $destinationPath = 'category/'.$currYr;
            $photographerimage->move($destinationPath,$fileName);
            $photographer->photographer_image = $destinationPath.'/'.$fileName;
        }
            $photographer->photographer_name= $request->photographername;
            $photographer->location=$request->location;
            $photographer->travel_radius=$request->travel_radius;
            $photographer->single_pic_price=$request->single_pic_price;
            $photographer->multiple_pic_price=$request->multiple_pic_price;
            $photographer->save();
            toast('Photograph  update  successfully!','success');
            return redirect('admin/photographer');
        }
            catch (\Exception $e) {
                Alert::error('Error', 'Error Photograph update: ' . $e->getMessage());
                return back();
        }  
    }
}
