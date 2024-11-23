<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\stallion;
use App\Models\stallionpagedetails;

class StallionController extends Controller
{
    public function stallion()
    {
        $categories = Category::all();
        $featureStatus = Stallion::with(['stallionImages' => function ($query) {
            $query->orderBy('new_element', 'DESC');
        }])->where('category','stallions')->where('status',1)->where('feature_status',1)->orderBy('id', 'ASC')->get();
  
        $stalliondetails = stallionpagedetails::where('id',1)->first(); 

        $stallions = Stallion::with(['stallionImages' => function ($query) {
            $query->orderBy('new_element', 'DESC');
        }])->where('category','stallions')->where('status',1)->orderBy('id', 'ASC')->take(4)->get();
        return view('frontend.stallion', compact('categories', 'stallions','featureStatus','stalliondetails'));
       
    }

    public function stallionlist(Request $request)
    {
        if ($request->ajax()) {
            $offset = $request->input('offset', 0);
            $limit = 1; 
            $stallions = Stallion::with(['stallionImages' => function ($query) {
                $query->orderBy('new_element', 'DESC');
            }])->where('category', 'stallions')->orderBy('id', 'ASC')->skip($offset)->take($limit)->get();
    
            return response()->json($stallions);
        }
    }

    public function signleStallion($id)
    {  
        $id=Stallion::where('name',$id)->value('id');
        $ownerId=stallion::where('id',$id)->value('id');
        $stallion = Stallion::with(['stallionImages','progeny.progenyImages','stallionvideo'])->find($id); 
        $stallionsSingleOwner = Stallion::with(['stallionImages' => function ($query) {
            $query->orderBy('new_element','DESC');
        }])
        ->where('category','stallions')
        ->where('status',1)
        ->where('user_id',$ownerId)
        ->orderBy('id', 'ASC')
        ->get();
        $exceptionProgeny = Stallion::with(['exceptionalProgeny.progenyImages'])->find($id);
        return view('frontend.single-stallion')
        ->with('stallion',$stallion)->with('stallionsSingleOwner',$stallionsSingleOwner)
        ->with('exceptionProgeny',$exceptionProgeny);
    }   
}
 