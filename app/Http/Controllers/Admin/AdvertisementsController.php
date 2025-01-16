<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\advertisement;
use RealRashid\SweetAlert\Facades\Alert;
class AdvertisementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Advertisement',['only' => ['index','create','store','edit','update','delete']]);
      
    }
    public function index()
    {
        $advertisements=advertisement::all();
        return view('admin.advertisement.index')
        ->with('advertisements',$advertisements);
    }
    public function create()
    {
        return view('admin.advertisement.create');
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
                    $destinationPathbanner = 'Advertisement/'.$currYr;
                    $image->move($destinationPathbanner,$fileName);
                  
                    $Advertisement = new advertisement();
                    $Advertisement->link = $request->link; 
                    $Advertisement->page = $request->page;
                    $Advertisement->image = $destinationPathbanner.'/'.$fileName;
                    $Advertisement->save(); 
                    toast('Advertisement create  successfully!','success');
                    return redirect('admin/advertisement');

                }
        }
         catch (\Exception $e){
            Alert::error('Error', 'Error Advertisement details create: ' . $e->getMessage());
            return back();

        }
    }
    public function edit($id)
    {
        $edit=advertisement::find($id);
        return view('admin.advertisement.edit')
        ->with('edit',$edit);
    }
    public function update(Request $request)
    {
        try { 
           $id=$request->id;
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
                 
                if($request->image){ 
                    $Advertisement =  advertisement::find($id);
                    $image = $request->image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                    $destinationPathbanner = 'Advertisement/'.$currYr;
                    $image->move($destinationPathbanner,$fileName);
                    $Advertisement->image = $destinationPathbanner.'/'.$fileName;
                    $Advertisement->save(); 
                }
                    $Advertisement =  advertisement::find($id);
                    $Advertisement->link = $request->link;
                    $Advertisement->page = $request->page;
                  
                    $Advertisement->save(); 
                    toast('Advertisement update  successfully!','success');
                    return redirect('admin/advertisement');

                
        }
         catch (\Exception $e){
            Alert::error('Error', 'Error Advertisement details create: ' . $e->getMessage());
            return back();

        }
    }
    public function delete($id)
    {
     $advertisement=advertisement::find($id);
     $advertisement->delete();
     toast('Advertisement Deleted  successfully!','success');
     return back();
    }
}
