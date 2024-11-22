<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
class CategoryController extends Controller
{
    public function index()
    {
        $categorys=category::get();
        return view('admin.category.index')
        ->with('categorys',$categorys);
    }
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'categoryname' => 'required',
            'catimage'=>'required'
            
        ]);
        $string = str_shuffle("abcdefghijklmnopqrstwxyz");
        if($request->catimage){
            $image = $request->catimage;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

            $destinationPath = 'category/'.$currYr;
            $image->move($destinationPath,$fileName);
    
            // Save to the database
            $category = new category();
            $category->categoryname= $request->categoryname;
            $category->catimage = $destinationPath.'/'.$fileName;
            $category->save();

            return redirect('admin/category');
        }

    }

    public function edit($id)
    {
        $category=category::where('id',$id)->first();
        return view('admin.category.edit')
        ->with('category',$category);

    }

    public function update(Request $request)
    {
        
        $id=$request->categoryId;
        $string = str_shuffle("abcdefghijklmnopqrstwxyz");
        if($request->catimage){
            $image = $request->catimage;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

            $destinationPath = 'category/'.$currYr;
            $image->move($destinationPath,$fileName);
    
            // Save to the database
            $category = category::find($id);
            $category->categoryname= $request->categoryname;
            $category->catimage = $destinationPath.'/'.$fileName;
            $category->save();

        }
        else
        {
            $category = category::find($id);
            $category->categoryname= $request->categoryname;
            $category->save();
        }
        return redirect('admin/category');
    }
}
