<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ourteam;
use RealRashid\SweetAlert\Facades\Alert;
class OurteamController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:Our Team', ['only' => ['index','create','store','edit','update','delete']]);
      
    }

    public function index()
    {
        $ourteams=ourteam::all();
        return view('admin.our-team.index')
        ->with('ourteams',$ourteams);
    }
  
    public function create()
        {
            return view('admin.our-team.create');
        }

    public function store(Request $request)
        {
            try { 
                $string = str_shuffle("abcdefghijklmnopqrstwxyz");
                if($request->image){   
                $image = $request->image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                $destinationPath = 'ourteam/'.$currYr;
                $image->move($destinationPath,$fileName);

                $ourteam = new ourteam();
                $ourteam->name = $request->name; 
                $ourteam->description = $request->description; 
                $ourteam->facebook_link = $request->facebook_link; 
                $ourteam->twitter_link = $request->twitter_link; 
                $ourteam->instagram_link = $request->instagram_link; 
                $ourteam->video_link = $request->video_link; 
                $ourteam->image = $destinationPath.'/'.$fileName;
                $ourteam->save(); 
                toast('ourteam created  successfully!','success');
                return redirect('admin/our-team'); 
                }
            }
            catch (\Exception $e){
            Alert::error('Error', 'Error ourteam created: ' . $e->getMessage());
            return back();

            }
        }

    public function edit($id)
    {
        $edit=ourteam::where('id',$id)->first();
        return view('admin.our-team.edit')
        ->with('edit',$edit);
    }

    public function update(Request $request)
    {
        try { 
            $id=$request->id;
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            if($request->image){   
            $image = $request->image;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
            $destinationPath = 'ourteam/'.$currYr;
            $image->move($destinationPath,$fileName);
            $ourteam = ourteam::find($id);
            $ourteam->image = $destinationPath.'/'.$fileName;
            $ourteam->save(); 
            }

            $ourteam = ourteam::find($id);
            $ourteam->name = $request->name; 
            $ourteam->description = $request->description; 
            $ourteam->facebook_link = $request->facebook_link; 
            $ourteam->twitter_link = $request->twitter_link; 
            $ourteam->instagram_link = $request->instagram_link; 
            $ourteam->video_link = $request->video_link; 
            $ourteam->save(); 
            toast('ourteam updated  successfully!','success');
            return redirect('admin/our-team'); 
            }
      
        catch (\Exception $e){
        Alert::error('Error', 'Error ourteam updated: ' . $e->getMessage());
        return back();

        }
    }

    public function delete($id)
    {
        $ourteam = ourteam::find($id);
        $ourteam->delete();
        toast('Our team Delete  successfully!','success');
        return back();
    }

    public function ourteamSearch(Request $request)
    {
        $query = $request->get('query');  
        $ourteams = ourteam::where('name', 'like', '%' . $query . '%')
        ->get();
        return view('admin.our-team.partials.ourteam_table', compact('ourteams'));
    }
}
