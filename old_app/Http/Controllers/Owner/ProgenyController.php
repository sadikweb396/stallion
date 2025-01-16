<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\progeny;
use App\Models\progenyimage;
use App\Models\progenyvideo;
use App\Models\stallion;
use App\Models\category;
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
                $stallionCat=stallion::select('category','slug')->where('id',$request->stallion_id)->first();
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
                if($stallionCat->category=='mares'){
                $progeny->mareslug=$stallionCat->slug;
                }
                if($stallionCat->category=='stallions'){
                $progeny->stallionslug=$stallionCat->slug;
                }
                $progeny->exceptional_progeny=0;
                if($request->exceptional_progeny){
                $progeny->exceptional_progeny=1;
                }
                else{
                $progeny->exceptional_progeny=0;  
                }
                $progeny->save();
                $updateCount=stallion::where('id',$progeny->stallion_id)->where('status',1)->count();
                if($updateCount==1)
                {
                    stallion::where('id',$progeny->stallion_id)->update([
                        'update_status' =>1,
                        'latest_update' => Carbon::now(),
                    ]);
                }
             
                stallion::where('id',$progeny->stallion_id)->update([
                    'latest_update' => Carbon::now(),
                ]);
                session()->put('tab','progeny');
                toast('Progeny create successfully!','success');
                return redirect()->back();
            } catch (\Exception $e) {
                Alert::error('Error', 'Error create Progeny: ' . $e->getMessage());
                return redirect()->back();
            }
    }
    public function progenyImage($id)
    {
        $tab = session()->get('tab');
        $progeny=progeny::where('id',$id)->first();
        $progenyImages=progenyimage::where('progeny_id',$id)->get();
        $progenyVideos=progenyvideo::where('progeny_id',$id)->get();
        return view('owner.progeny.index')
        ->with('id',$id)
        ->with('tab',$tab)
        ->with('progenyImages',$progenyImages)
        ->with('progenyVideos',$progenyVideos)
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
                
                // $result = stallion::where('id',$progeny->stallion_id)->update([
                //     'latest_update' => Carbon::now(),
                // ]);
                $stallionId=progeny::where('id',$request->stallion_id)->value('stallion_id');
                $stallionName=stallion::where('id',$stallionId)->value('category');
              
                session()->put('tab','progeny-image');
                toast('Progeny Image create successfully!','success');
                return back();
            }
           
        } catch (\Exception $e) {
            Alert::error('Error', 'Error create mare image: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function progenyEdit($id)
    {
        $progeny=progeny::where('id',$id)->first();
        return view('owner.stallion.progny-edit')
        ->with('progeny',$progeny);
    }
    public function progenyUpdate(Request $request)
    {
        try {
            $id=$request->progeny_id;
            $stallionId=progeny::where('id',$id)->first();
            if($request->exceptional_progeny){
                progeny::where('stallion_id',$stallionId->stallion_id)->update([
                    'exceptional_progeny' =>0,
            ]);
            }
            $stallion=$stallionId->stallion_id;
            $stallionCat=category::where('id',$stallionId->id)->first();
            $progeny = progeny::find($id); 
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
            $progeny->exceptional_progeny=1;
            $progeny->save();
            $updateCount=stallion::where('id',$progeny->stallion_id)->where('status',1)->count();
            if($updateCount==1)
            {
                stallion::where('id',$progeny->stallion_id)->update([
                    'update_status' =>1,
                    'latest_update' => Carbon::now(),
                ]);
            }
            session()->put('tab','progeny-image');
            toast('Progeny updae successfully!','success');
            return redirect()->back();

        }   catch (\Exception $e) {
            Alert::error('Error', 'Error updae Progeny : ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function progenyVideoStore(Request $request)
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
                $progeny = new progenyvideo();
                $progeny->progeny_id = $request->stallion_id;
                $progeny->name = $request->stallion_name;
                $progeny->progeny_location = $request->stallion_location;
                $progeny->progeny_video = $destinationPath.'/'.$fileName;
                $progeny->date=$request->calender;
                $progeny->progeny_set_video=0;
                $progeny->save();
                
                $stallionId=progeny::where('id',$request->stallion_id)->value('stallion_id');
                $stallionName=stallion::where('id',$stallionId)->value('category');
              
                session()->put('tab','progeny-video');
                toast('Progeny Video create successfully!','success');
                return back();
            }
           
        } catch (\Exception $e) {
            Alert::error('Error', 'Error create mare image: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function check(Request $request)
    {
        $count=progeny::where('stallion_id',$request->stallionId)->where('exceptional_progeny',1)->count();

        if($count==1){
            return response()->json(['success' => true]);
        }
        else
        {
            return response()->json(['success' => false]);
        }
    }
}
