<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\whatwedo;
use App\Models\brainthinker;
use App\Models\aboutusbanner;
use RealRashid\SweetAlert\Facades\Alert;
class AboutusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:What We Do', ['only' => ['whatweDo','whatwedoStore']]);
        $this->middleware('permission:Brainrain Thinker', ['only' => ['ourBrainrainThinker','ourbrainrainthinkerStore','create','edit','update','delete']]);
        $this->middleware('permission:About Us Banner', ['only' => ['banner','bannerStore']]);
    }

    public function whatweDo()
    {
        $whatwedo=whatwedo::first();
        return view('admin.about-us.what-we-do')
        ->with('whatwedo',$whatwedo);
    }
   
    public function whatwedoStore(Request $request)
    {
        try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $count=whatwedo::count();
            if($count>0)
            {
                if($request->image){ 
                    $image = $request->image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                    $destinationPath = 'whatwedo/'.$currYr;
                    $image->move($destinationPath,$fileName);
                    $whatwedo = whatwedo::first();
                    $whatwedo->image = $destinationPath.'/'.$fileName;
                    $whatwedo->save();
                } 
                $whatwedo = whatwedo::first();
                $whatwedo->heading = $request->heading; 
                $whatwedo->paragraph = $request->paragraph; 
                $whatwedo->save();
                toast('whatwedo updated  successfully!','success');
                return back(); 
            }
            else
            {
                if($request->image){ 
                $image = $request->image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                $destinationPath = 'whatwedo/'.$currYr;
                $image->move($destinationPath,$fileName);
    
                $whatwedo = new whatwedo();
                $whatwedo->heading = $request->heading; 
                $whatwedo->paragraph = $request->paragraph; 
                $whatwedo->image = $destinationPath.'/'.$fileName;
                $whatwedo->save(); 
                toast('whatwedo created  successfully!','success');
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
                Alert::error('Error', 'Error whatwedo create: ' . $e->getMessage());
                return back();
    
            }
    }
    public function ourBrainrainThinker()
    {
        $ourBrainThinkers=brainthinker::all();
        return view('admin.about-us.brain-thinker.index')
        ->with('ourBrainThinkers',$ourBrainThinkers);
    }  
    public function create()
    {
        return view('admin.about-us.brain-thinker.create');
    }
    public function ourbrainrainthinkerStore(Request $request)
    {
        try { 
        if($request->image){ 
        $string = str_shuffle("abcdefghijklmnopqrstwxyz");
        $image = $request->image;
        $randStr = substr($string, 0, 5);
        $currYr = date("Y");
        $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
        $destinationPath = 'brainthinker/'.$currYr;
        $image->move($destinationPath,$fileName);
    
        $brainthinker = new brainthinker();
        $brainthinker->heading = $request->heading; 
        $brainthinker->paragraph = $request->paragraph; 
        $brainthinker->image = $destinationPath.'/'.$fileName;
        $brainthinker->facebook_link=$request->facebook_link;
        $brainthinker->twitter_link=$request->twitter_link;
        $brainthinker->video_link=$request->video_link;
        $brainthinker->instagram_link=$request->instagram_link;   
        $brainthinker->save(); 
        toast('brainthinker created  successfully!','success');
        return redirect('admin/our-brain-and-thinker'); 
        }
        }
        catch (\Exception $e){
            Alert::error('Error', 'Error whatwedo create: ' . $e->getMessage());
            return back();

        }
    }

    public function edit($id)
    {
        $brainthinker=brainthinker::find($id);
        return view('admin.about-us.brain-thinker.edit')
        ->with('brainthinker',$brainthinker);
    }

    public function update(Request $request)
    {
        try { 
            $id=$request->id;
            if($request->image){ 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $image = $request->image;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
            $destinationPath = 'brainthinker/'.$currYr;
            $brainthinker =brainthinker::find($id);
            $image->move($destinationPath,$fileName);
            $brainthinker->image = $destinationPath.'/'.$fileName;
            $brainthinker->save(); 
            }

            $brainthinker =brainthinker::find($id);
            $brainthinker->heading = $request->heading; 
            $brainthinker->paragraph = $request->paragraph;     
            $brainthinker->facebook_link=$request->facebook_link;
            $brainthinker->twitter_link=$request->twitter_link;
            $brainthinker->video_link=$request->video_link;
            $brainthinker->instagram_link=$request->instagram_link;   
            $brainthinker->save(); 

            toast('brainthinker update  successfully!','success');
            return redirect('admin/our-brain-and-thinker'); 
            }
            
            catch (\Exception $e){
                Alert::error('Error', 'Error brainthinker update: ' . $e->getMessage());
                return back();
    
            }
    }

    public function delete($id)
    {
        $brainthinker = brainthinker::find($id);
        $brainthinker->delete();
        toast('Brain Thinker Delete  successfully!','success');
        return back();
    }
 
    public function ourBrainerandThinkerSearch(Request $request)
    {
        $query = $request->get('query');  
        $ourBrainThinkers = brainthinker::where('heading', 'like', '%' . $query . '%')
        ->get();
        return view('admin.about-us.brain-thinker.partials.brain_table', compact('ourBrainThinkers'));
    }

    public function banner()
    {
         $banner=aboutusbanner::first();
         return view('admin.about-us.banner')
         ->with('banner',$banner);
    }
    public function bannerStore(Request $request)
    {
        try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $count=aboutusbanner::count();
            if($count>0)
            {
                if ($request->hasFile('bannerimage') || $request->hasFile('bannervideo')) {
                    $image = $request->file('bannerimage') ?? $request->file('bannervideo'); 
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                    $destinationPath = 'banner/'.$currYr;
                    $image->move($destinationPath,$fileName);
                    $aboutbanner = aboutusbanner::first();
                    $aboutbanner->image = $destinationPath.'/'.$fileName;
                    $aboutbanner->type=$request->media;
                    $aboutbanner->save();
                } 
                $aboutbanner = aboutusbanner::first();
                $aboutbanner->heading = $request->heading; 
                $aboutbanner->text = $request->text; 
                $aboutbanner->save();
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
    
                $aboutbanner = new aboutusbanner();
                $aboutbanner->heading = $request->heading;  
                $aboutbanner->text = $request->text; 
                $aboutbanner->image = $destinationPath.'/'.$fileName;
                $aboutbanner->type=$request->media;
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

}  
