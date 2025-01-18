<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\servicedetail;
use App\Models\servicebanner;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
class serviceController extends Controller
{
    public function index()
    {
        $services=service::paginate(10);
        return view('admin.service.index')
        ->with('services',$services);
    }
    public function create()
    {
        return view('admin.service.create');
    }
    private function getUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;
        while (service::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        return $slug;
    }
    public function store(Request $request)
    {
        // try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
                $service = new service();
                if($request->image){ 
                    $image = $request->image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                    $destinationPathbanner = 'Service/'.$currYr;
                    $image->move($destinationPathbanner,$fileName);
                    $service->image = $destinationPathbanner.'/'.$fileName;
                }
                if($request->serviceimage){ 
                    $serviceimage = $request->serviceimage;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$serviceimage->getClientOriginalExtension();
                    $destinationPathbanner = 'Service/'.$currYr;
                    $serviceimage->move($destinationPathbanner,$fileName);
                    $service->serviceimage = $destinationPathbanner.'/'.$fileName;
                }
                if($request->icon){ 
                    $icon = $request->icon;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileNameicon = time().'_'.$randStr.'.'.$icon->getClientOriginalExtension();
                    $destinationPathlogo = 'Service/'.$currYr;
                    $icon->move($destinationPathlogo,$fileNameicon);
                    $service->icon = $destinationPathlogo.'/'.$fileNameicon;
                }
                if($request->bannerimage){ 
                    $bannerimage = $request->bannerimage;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileNameicon = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
                    $destinationPathlogo = 'Service/'.$currYr;
                    $bannerimage->move($destinationPathlogo,$fileNameicon);
                    $service->bannerimage = $destinationPathlogo.'/'.$fileNameicon;
                }
                    $slug = Str::slug($request->service_name);
                    $slug = $this->getUniqueSlug($slug);
                    $service->service_name = $request->service_name; 
                    $service->title = $request->title;
                    $service->slug =  $slug ;
                    $service->description = $request->description;
                    $service->banner_heading = $request->banner_heading; 
                    $service->heading1 = $request->heading1;
                    $service->paragraph1 = $request->paragraph1; 
                    $service->heading2 = $request->heading2;
                    $service->paragraph2 = $request->paragraph2;
        
                    $service->save(); 
                    toast('Service create  successfully!','success');
                    return redirect('admin/service');

                
        // }
        //  catch (\Exception $e){
        //     Alert::error('Error', 'Error Advertisement details create: ' . $e->getMessage());
        //     return back();

        // }
    }

    public function edit($id)
    {
        $edit=service::where('id',$id)->first();
        return view('admin.service.edit')
        ->with('edit',$edit);
    }

    public function update(Request $request, $id)
    {
        try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
                $service = service::find($id);
                if($request->image){ 
                    $image = $request->image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                    $destinationPathbanner = 'Service/'.$currYr;
                    $image->move($destinationPathbanner,$fileName);
                    $service->image = $destinationPathbanner.'/'.$fileName;
                }
                if($request->icon){ 
                    $icon = $request->icon;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileNameicon = time().'_'.$randStr.'.'.$icon->getClientOriginalExtension();
                    $destinationPathlogo = 'Service/'.$currYr;
                    $icon->move($destinationPathlogo,$fileNameicon);
                    $service->icon = $destinationPathlogo.'/'.$fileNameicon;
                }
                if($request->bannerimage){ 
                    $bannerimage = $request->bannerimage;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileNameicon = time().'_'.$randStr.'.'.$bannerimage->getClientOriginalExtension();
                    $destinationPathlogo = 'Service/'.$currYr;
                    $bannerimage->move($destinationPathlogo,$fileNameicon);
                    $service->bannerimage = $destinationPathlogo.'/'.$fileNameicon;
                }
                    $slug = Str::slug($request->service_name);
                    $service->service_name = $request->service_name; 
                    $service->title = $request->title;
                    $service->slug =  $slug ;
                    $service->description = $request->description; 
                    $service->banner_heading = $request->banner_heading; 
                    $service->heading1 = $request->heading1;
                    $service->paragraph1 = $request->paragraph1; 
                    $service->heading2 = $request->heading2;
                    $service->paragraph2 = $request->paragraph2;         
                    $service->save(); 
                    toast('Service create  successfully!','success');
                    return redirect('admin/service');

                
        }
         catch (\Exception $e){
            Alert::error('Error', 'Error Advertisement details create: ' . $e->getMessage());
            return back();

        }
    }

    public function delete($id)
    {
          
    }

    public function moreInformation()
    {
        $servicedetails=DB::table('servicedetails')->get();
        return view('admin.service.more-information.index')
        ->with('servicedetails',$servicedetails);
    }

    public function moreInformationCreate()
    {
        return view('admin.service.more-information.create');
    }  

    public function serviceMoreInformationStore(Request $request)
    {
        try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
                $service = new servicedetail();
                if($request->image){ 
                    $image = $request->image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                    $destinationPathbanner = 'Service/'.$currYr;
                    $image->move($destinationPathbanner,$fileName);
                    $service->image = $destinationPathbanner.'/'.$fileName;
                }
                
                    $service->banner_heading = $request->banner_heading; 
                    $service->heading1 = $request->heading1;
                    $service->paragraph1 = $request->paragraph1; 
                    $service->heading2 = $request->heading2;
                    $service->paragraph2 = $request->paragraph2;
                    $service->serviceid=$request->serviceid;             
                    $service->save(); 
                    toast('Service create  successfully!','success');
                    return redirect('admin/service/more-information');
        }
         catch (\Exception $e){
            Alert::error('Error', 'Error Advertisement details create: ' . $e->getMessage());
            return back();

        }
    }

    public function serviceBanner()
    {
        $banner=DB::table('servicebanners')->first();
        return view('admin.service.banner')
        ->with('banner',$banner);
    }

    public function serviceBannerStore(Request $request)
    { 
        try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $count=servicebanner::count();
            if($count>0)
            {
                if($request->image){ 
                    $image = $request->image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                    $destinationPath = 'banner/'.$currYr;
                    $image->move($destinationPath,$fileName);
                    $aboutbanner = servicebanner::first();
                    $aboutbanner->image = $destinationPath.'/'.$fileName;
                    $aboutbanner->save();
                } 
                $aboutbanner = servicebanner::first();
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
    
                $aboutbanner = new servicebanner();
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

   
}
