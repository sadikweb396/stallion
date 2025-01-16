<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\badge;
use RealRashid\SweetAlert\Facades\Alert;

class BadgeController extends Controller
{
    public function index()
    {
        $badges=badge::all();
        return view('admin.badge.index')
        ->with('badges',$badges);
    }
    public function create()
    {
        return view('admin.badge.create');
    }
    public function store(Request $request)
    {
        try {
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");

            // Save to the database
            $Badge = new badge();
            $Badge->type = $request->type;
            $Badge->text = $request->text;
            $Badge->color=$request->color;
            $Badge->save();
   
            toast('Badge create successfully!','success');
            return redirect('admin/badge');
            
        }   catch (\Exception $e) {
                    Alert::error('Error', 'Error create Badge: ' . $e->getMessage());
                    return redirect()->back();
        }
    }
    public function edit($id)
    {
        $badgetype=badge::where('id',$id)->first();
        $badges=['NEW TO EMINENT','LATEST UPDATED','STALLION LIST','MARE LIST'];
        return view('admin.badge.edit')
        ->with('badgetype',$badgetype)
        ->with('badges',$badges);
    }
    public function update(Request $request)
    {
        try {
            $id=$request->id;
            $Badge = badge::find($id); 
            $Badge->type = $request->type;
            $Badge->text = $request->text;
            $Badge->color=$request->color;
            $Badge->save();
            toast('Badge update successfully!','success');
            return redirect('admin/badge');

        }   catch (\Exception $e) {
            Alert::error('Error', 'Error update Badge : ' . $e->getMessage());
            return redirect()->back();
        }
    }
    public function delete($id)
    {
        $badge = badge::findOrFail($id);
        $badge->delete();
        toast('Badge Delete Successfully');
        return redirect()->back();
    }
}
