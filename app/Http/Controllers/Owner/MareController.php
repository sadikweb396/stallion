<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stallion;
use App\Models\vetdetail;
use App\Models\semencontract;
use App\Models\StallionImage;
use App\Models\Stallionvideo;
use App\Models\progeny;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MareController extends Controller
{
    public function index()
    {
        // $request_uri = $_SERVER['REQUEST_URI'];  
        // $path = parse_url($request_uri, PHP_URL_PATH);
        // $category = explode('/', trim($path, '/'));
       
        // $categoryName= $category[1];
        // session()->put('category', $category[1]); 
        
        // $category=category::where('categoryname',$category[1])->select('id')->first();

        $stallions=stallion::where('category','mares')->where('user_id',Auth::id())->get();
        return view('owner.mare.index')
        ->with('stallions',$stallions);
       
    }

    public function create()
    {
        return view('owner.mare.create');
    }

    public function mareDetails(Request $request)
    {
            try {
                $stallion = new Stallion();
                $stallion->category ='mares';
                $stallion->name = $request->name;
                $stallion->user_id = Auth::id();
                $stallion->lifetime_story = $request->lifetimestory;
                $stallion->performance_history= $request->performance_history;
                $stallion->owner_story=$request->owner_story;
                $stallion->lifetime_story=$request->lifetime_Story;
                $stallion->height = $request->height;
                $stallion->registration_details=$request->registration_details;
                $stallion->professional_trainer=$request->professional_trainer;
                $stallion->put_semen_available_from=$request->put_semen_available_from;
                $stallion->current_performing_discipline=$request->current_performing_discipline;
                $stallion->trainer_history=$request->trainer_history;
                $stallion->bred_by=$request->bred_by;
                $stallion->first_foal_crop_year=$request->first_foal_crop_year;
                $stallion->status=0;
                $stallion->save();
                $id=$stallion->id;
                toast('Mare created  successfully!','success');
                return redirect()->route('owner.mare', ['id' => $id]);
            } catch (\Exception $e) {
                Alert::error('Error', 'Error updating Mare: ' . $e->getMessage());
                return redirect()->back();
            }
    } 

    public function edit($id)
    {
        $stallion=Stallion::where('id',$id)->first(); 
        $semencontract=semencontract::where('stallion_id',$id)->first();
        $vetdetail=vetdetail::where('stallion_id',$stallion->id)->first();
        $progenys=progeny::where('stallion_id',$stallion->id)->get();
        $stallionImages=stallionimage::where('stallion_id',$id)->get();
        $stallionVideos=stallionVideo::where('stallion_id',$id)->get();
        return view('owner.mare.edit')->with('progenys',$progenys)->with('stallion',$stallion)
        ->with('semencontract',$semencontract)->with('id',$id)->with('stallionImages',$stallionImages)
        ->with('stallionVideos',$stallionVideos)->with('vetdetail',$vetdetail);
    }
    public function update(Request $request)
    {
            try {
                $id=$request->stallion_id;   
                $stallion = Stallion::find($id);
                $stallion->name = $request->name;  
                $stallion->lifetime_story = $request->lifetimestory;
                $stallion->performance_history= $request->performance_history;
                $stallion->owner_story=$request->owner_story;
                $stallion->lifetime_story=$request->lifetime_Story;
                $stallion->height = $request->height;
                $stallion->registration_details=$request->registration_details;
                $stallion->professional_trainer=$request->professional_trainer;
                $stallion->put_semen_available_from=$request->put_semen_available_from;
                $stallion->current_performing_discipline=$request->current_performing_discipline;
                $stallion->trainer_history=$request->trainer_history;
                $stallion->bred_by=$request->bred_by;
                $stallion->first_foal_crop_year=$request->first_foal_crop_year;
                $stallion->latest_update=Carbon::now();
                $stallion->save();
                $id=$stallion->id;
                toast('Mare update successfully!','success');
                return redirect()->route('owner.mare',['id' => $id]);
            } catch (\Exception $e) {
                Alert::error('Error', 'Error updating Mare: ' . $e->getMessage());
                return redirect()->back();
            }
    } 

    public function mareimagestore(Request $request)
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
                $stallionImage = new StallionImage();
                $stallionImage->stallion_id = $request->stallion_id;
                $stallionImage->stallion_name = $request->stallion_name;
                $stallionImage->stallion_location = $request->stallion_location;
                $stallionImage->stallion_image = $destinationPath.'/'.$fileName;
                $stallionImage->date=$request->calender;
                $stallionImage->new_element=0;
                $stallionImage->save();
                
                $result = stallion::where('id',$stallionImage->stallion_id)->update([
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

    public function marevideostore(Request $request)
    {
        try {
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            if($request->stallion_video){
                
                $image = $request->stallion_video;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

                $destinationPath = 'stallion/'.$currYr;
                $image->move($destinationPath,$fileName);
        
                // Save to the database
                $stallionVideo = new stallionvideo();
                $stallionVideo->stallion_id = $request->stallion_id;
                $stallionVideo->stallion_name = $request->stallion_name;
                $stallionVideo->stallion_location = $request->stallion_location;
                $stallionVideo->stallion_video = $destinationPath.'/'.$fileName;
                $stallionVideo->date=$request->calender;
                $stallionVideo->save();

                stallion::where('id',$stallionVideo->stallion_id)->update([
                    'latest_update' => Carbon::now(),
                ]);
                
            toast('Mare video create successfully!','success');
                    return redirect()->route('owner.mare',['id' =>$request->stallion_id]);
            }
        }   catch (\Exception $e) {
                    Alert::error('Error', 'Error create Mare video: ' . $e->getMessage());
                    return redirect()->back();
        }
    }

     public function progenyUpdate(Request $request)
    {
        try {
            $id=$request->progeny_id;
            $stallionId=progeny::where('id',$id)->first();
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
            $progeny->exceptional_progeny=$request->exceptional_progeny;
            $progeny->save();
            stallion::where('id',$progeny->stallion_id)->update([
                'latest_update' => Carbon::now(),
            ]);
            toast('Progeny updae successfully!','success');
            return redirect()->back();

        }   catch (\Exception $e) {
            Alert::error('Error', 'Error updae Progeny : ' . $e->getMessage());
            return redirect()->back();
        }
        
    }
}
