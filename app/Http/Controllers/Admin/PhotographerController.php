<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\photographer;

class PhotographerController extends Controller
{
    public function index()
        {
            $photographers=photographer::all();
            return view('admin.photographer.index')
            ->with('photographers',$photographers);
        }
    public function create()
        {
            return view('admin.photographer.create');
        }

    public function store(Request $request)
        {
            // $validatedData = $request->validate([
            //     'photographername' => 'required',
            //     'photographerimage'=>'required',
            //     'travel_radius'=>'required',
            //     'single_pic_price'=>'required',
            //     'multiple_pic_price'=>'required',
            //     'address'=>'required',
            //     'location'=>'required' 
            // ]);

        $string = str_shuffle("abcdefghijklmnopqrstwxyz");
        if($request->photoimage){

            $photographerimage = $request->photoimage;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$photographerimage->getClientOriginalExtension();

            $destinationPath = 'photographer/'.$currYr;
            $photographerimage->move($destinationPath,$fileName);
    
            // Save to the database
            $photographer = new photographer();
            $photographer->photographer_name= $request->photographername;
            $photographer->photographer_image = $destinationPath.'/'.$fileName;
            $photographer->location=$request->location;
            $photographer->travel_radius=$request->travel_radius;
            $photographer->single_pic_price=$request->single_pic_price;
            $photographer->multiple_pic_price=$request->multiple_pic_price;
            $photographer->address=$request->address;
            $photographer->save();

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
        // $validatedData = $request->validate([
        //     'photographername' => 'required',
        //     'photographerimage'=>'required',
        //     'travel_radius'=>'required',
        //     'single_pic_price'=>'required',
        //     'multiple_pic_price'=>'required',
        //     'address'=>'required',
        //     'location'=>'required' 
        // ]);

        $string = str_shuffle("abcdefghijklmnopqrstwxyz");
        $photographer = photographer::find($id);
        if($request->photoimage){
            $photographerimage = $request->photographerimage;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

            $destinationPath = 'category/'.$currYr;
            $photographerimage->move($destinationPath,$fileName);
            $photographer->photographerimage = $destinationPath.'/'.$fileName;
        }
            // Save to the database
        
            $photographer->photographername= $request->photographername;
            $photographer->location=$request->location;
            $photographer->travel_radius=$request->travel_raduis;
            $photographer->single_pic_price=$request->single_pic_price;
            $photographer->multiple_pic_price=$request->multiple_pic_price;
            $photographer->save();
    }
}
