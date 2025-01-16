<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\stallion;
use App\Models\maredetails;
use App\Models\stallionimage;
use App\Models\stallionvideo;
use App\Models\stallionpagedetails;
use App\Models\pedigree;
use App\Models\advertisement;

class MareController extends Controller
{
    public function mare(Request $request)
    {
        $date = new \DateTime();
        $date->modify('-1 year');
        $date=$date->format('Y-m-d H:i:s');

        $categories = Category::all();
        $featureStatus = Stallion::with(['stallionImages' => function ($query) {
            $query->orderBy('new_element', 'DESC');
        }])->where('category','mares')->where('status',1)->where('created_at','>=',$date)->where('payment_status','paid')->orderBy('id','DESC')->get();
  
        $stalliondetails = maredetails::where('id',1)->first(); 

         // Check if it's an AJAX request
        if ($request->ajax()) {
            // Fetch users with pagination
            $stallions = Stallion::with(['stallionImages' => function ($query) {
                $query->orderBy('new_element', 'DESC');
            }])->where('category','mares')->where('status',1)->where('created_at','>=',$date)->where('payment_status','paid')->orderBy('id', 'ASC')->paginate(1);
            return view('frontend.marelist', compact('categories', 'stallions','featureStatus','stalliondetails'));
        }

        $stallions = Stallion::with(['stallionImages' => function ($query) {
            $query->orderBy('new_element', 'DESC');
        }])->where('category','mares')->where('status',1)->where('created_at','>=',$date)->where('payment_status','paid')->orderBy('id', 'ASC')->paginate(1);

        $advertisements=advertisement::select('image','link')->where('page','Mare')->get();
        return view('frontend.mare', compact('categories', 'stallions','featureStatus','stalliondetails','advertisements'));
      
    }

    public function signleMare($slug)
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
        return view('frontend.single-mare')
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
            return redirect()->route('single-mare', ['slug' => $slug]);
        }

        else
        {              
            $links = [];
            $columns = [
                'stallionregistration' =>'stallionlink',
                'sireregistration1' => 'sirelink1',
                'sireregistration2' => 'sirelink2',
                'sireregistration3' => 'sirelink3',
                'sireregistration4' => 'sirelink4',
                'sireregistration5' => 'sirelink5',
                'sireregistration6' => 'sirelink6',
                'sireregistration7' => 'sirelink7',
                'damregistration1' => 'damlink1',
                'damregistration2' => 'damlink2',
                'damregistration3' => 'damlink3',
                'damregistration4' => 'damlink4',
                'damregistration5' => 'damname5',
                'damregistration6' => 'damlink6',
                'damregistration7' => 'damlink7',
            ];
            foreach ($columns as $registration => $linkColumn) {
               
                $link = pedigree::select($linkColumn)
                            ->where($registration, $slug)
                            ->first();     
                if ($link) {
                    $links[$linkColumn] = $link->$linkColumn;
                }            
               
            }       
            $link = implode(' ', $links);          
            return redirect()->to($link);
        }
    }
    }
}
