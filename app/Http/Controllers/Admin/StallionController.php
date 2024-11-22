<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stallion;
use App\Models\category;

class StallionController extends Controller
{
    public function index()
    {
    //     $request_uri = $_SERVER['REQUEST_URI']; 
    //     $path = parse_url($request_uri, PHP_URL_PATH);
    //     $category = explode('/', trim($path, '/'));
       
    //     $categoryName= $category[1];

    //     $category_id=Category::where('categoryname',$categoryName)->select('id')->first();

    //     $stallions=stallion::where('category_id',$category_id->id)->get();

    //     if($categoryName == 'Stallions' ||  $categoryName == 'stallions'||  $categoryName == 'stallion' ||  $categoryName == 'Stallions')
    //     {
    //         return view('admin.stallion.index')
    //         ->with('stallions',$stallions);
    //     }
    //    elseif($categoryName == 'Mares' ||  $categoryName == 'mares'||  $categoryName == 'Mare' ||  $categoryName == 'mare')
    //    {
    //        return view('admin.mare.index')
    //        ->with('stallions',$stallions);
    //    }

    $stallions=stallion::where('category','stallions')->get();
    return view('admin.stallion.index')
     ->with('stallions',$stallions);
       
    }

    public function approve($id)
    {
        $staus=Stallion::where('id', $id)->update(['status' => 1]);

        return back();
    }

    public function decline($id)
    {
        $staus=Stallion::where('id', $id)->update(['status' => 0]);

        return back();
    }
}
