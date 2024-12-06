<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\stallion;
use App\Models\stallionimage;
use App\Models\stallionvideo;
use App\Models\stallionpagedetails;
use App\Models\pedigree;

class StallionController extends Controller
{
    public function stallion(Request $request)
    {
        $categories = Category::all();
        $featureStatus = Stallion::with(['stallionImages' => function ($query) {
            $query->orderBy('new_element', 'DESC');
        }])->where('category','stallions')->where('status',1)->where('feature_status',1)->orderBy('id', 'ASC')->get();
  
        $stalliondetails = stallionpagedetails::where('id',1)->first(); 

         // Check if it's an AJAX request
        if ($request->ajax()) {
            // Fetch users with pagination
            $stallions = Stallion::with(['stallionImages' => function ($query) {
                $query->orderBy('new_element', 'DESC');
            }])->where('category','stallions')->where('status',1)->orderBy('id', 'ASC')->paginate(1);
            return view('frontend.stallionlist', compact('categories', 'stallions','featureStatus','stalliondetails'));
        }

        $stallions = Stallion::with(['stallionImages' => function ($query) {
            $query->orderBy('new_element', 'DESC');
        }])->where('category','stallions')->where('status',1)->orderBy('id', 'ASC')->paginate(1);

        
        return view('frontend.stallion', compact('categories', 'stallions','featureStatus','stalliondetails'));
       
    }
    public function singleStallion($slug)
    {  
        $count=Stallion::where('slug',$slug)->count();
       
        if($count==1){
    
        $id=Stallion::where('slug',$slug)->value('id');
        $ownerId=stallion::where('id',$id)->value('user_id');
        $stallion = Stallion::with(['stallionImages','progeny.progenyImages','stallionvideo','progeny'])->find($id);

        $stallionsSingleOwner = Stallion::with(['stallionImages' => function ($query){
            $query->orderBy('new_element','DESC');
        }])
        ->where('category','stallions')
        ->where('status',1)
        ->where('user_id',$ownerId)
        ->orderBy('id', 'ASC')
        ->get();



        $performaceImage=stallionimage::select('stallion_image')->where('performance_image',1)->where('stallion_id',$id)->first();
        
        $backgroundImage=stallionimage::select('stallion_image')->where('background_image',1)->where('stallion_id',$id)->first();

        $bannerImage=stallionimage::select('stallion_image')->where('banner_image',1)->where('stallion_id',$id)->first();

        $stallionvideoImage=stallionimage::select('stallion_image')->where('stallionvideo_image',1)->where('stallion_id',$id)->first();
        

        $exceptionProgeny = Stallion::with(['exceptionalProgeny.progenyImages'])->find($id);  

        $stallionimages=stallionimage::select('stallion_image')->where('stallion_id',$id)->where('exclusive_data',1)->get();
        $stallionvideoS=stallionvideo::select('stallion_video')->where('stallion_id',$id)->where('exclusive_data',1)->get();

        $performanceHistoryVideo=stallionvideo::select('stallion_video')->where('performance_history_video',1)->where('stallion_id',$id)->first();

        $backgroundVideo=stallionvideo::select('stallion_video')->where('background_video',1)->where('stallion_id',$id)->first();
        
        $pedigree=pedigree::where('stallion_id',$id)->first();

        $previewImage=stallionimage::select('stallion_image')->where('stallion_id',$id)->where('exclusive_data',1)->first();
        return view('frontend.single-stallion')
        ->with('stallion',$stallion)->with('stallionsSingleOwner',$stallionsSingleOwner)
        ->with('exceptionProgeny',$exceptionProgeny)->with('pedigree',$pedigree)
        ->with('stallionvideoS',$stallionvideoS)
        ->with('performaceImage',$performaceImage)
        ->with('backgroundImage',$backgroundImage)
        ->with('bannerImage',$bannerImage)
        ->with('stallionvideoImage',$stallionvideoImage)
        ->with('backgroundVideo',$backgroundVideo)
        ->with('performanceHistoryVideo',$performanceHistoryVideo)
        ->with('previewImage',$previewImage)
        ->with('stallionimages',$stallionimages);

    }
    else
    {
        $count=Stallion::where('registration_details',$slug)->count();
        
        if($count==1)
        {
           
            $slug=Stallion::where('registration_details',$slug)->value('slug');
           
            
            return redirect()->route('single-stallion', ['slug' => $slug]);
        }

        else
        {
            return redirect()->to('https://example.com');
        }
    }
    }   
}
 