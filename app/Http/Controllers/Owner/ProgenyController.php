<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\progeny;
use App\Models\progenyimage;
use App\Models\stallion;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
class ProgenyController extends Controller
{
    public function progeny(Request $request)
    {
        try {
                if($request->exceptional_progeny){
                    progeny::where('stallion_id',$request->stallion_id)->update([
                        'exceptional_progeny' =>0,
                ]);
                }
                $progeny = new progeny(); 
                $progeny->stallion_id = $request->stallion_id; 
                $progeny->progeny_name = $request->progeny_name;
                $progeny->sale=$request->sale;
                $progeny->sold=$request->sold;
                $progeny->date_of_birth=$request->date_of_birth;
                $progeny->gender=$request->gender;
                $progeny->color=$request->color;
                $progeny->registration_number=$request->registration_number;
                $progeny->breeder=$request->breeder;
                $progeny->performace_history=$request->progeny_performace_history;
                $progeny->trainer=$request->trainer;
                $progeny->trainer=$request->trainer;
                if($request->exceptional_progeny){
                $progeny->exceptional_progeny=1;
                }
                else{
                $progeny->exceptional_progeny=0;  
                }
                $progeny->save();
                stallion::where('id',$progeny->stallion_id)->update([
                    'latest_update' => Carbon::now(),
                ]);
                toast('Progeny create successfully!','success');
                return redirect()->route('owner.stallion',['id' =>$request->stallion_id]);
            } catch (\Exception $e) {
                Alert::error('Error', 'Error create Progeny: ' . $e->getMessage());
                return redirect()->back();
            }
    }
    public function progenyImage($id)
    {
        $progeny=progeny::where('id',$id)->first();
        $progenyImages=progenyimage::where('progeny_id',$id)->get();
        return view('owner.progeny.index')
        ->with('id',$id)
        ->with('progenyImages',$progenyImages)
        ->with('progeny',$progeny);
    }

    public function progenyImageStore(Request $request)
    {
        try {
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            if($request->stallion_image){
                
                $image = $request->stallion_image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

                $destinationPath = 'stallion/'.$currYr;
                $image->move($destinationPath,$fileName);
        
                // Save to the database
                $progeny = new progenyimage();
                $progeny->progeny_id = $request->stallion_id;
                $progeny->name = $request->stallion_name;
                $progeny->progeny_location = $request->stallion_location;
                $progeny->image = $destinationPath.'/'.$fileName;
                $progeny->date=$request->calender;
                $progeny->progeny_image=0;
                $progeny->save();
                
                $result = stallion::where('id',$progeny->stallion_id)->update([
                    'latest_update' => Carbon::now(),
                ]);

                return redirect()->route('owner.mare',['id' =>$request->stallion_id]);
            }
            toast('Mare image create successfully!','success');
            return redirect()->route('owner.stallion',['id' =>$request->stallion_id]);
        } catch (\Exception $e) {
            Alert::error('Error', 'Error create mare image: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}