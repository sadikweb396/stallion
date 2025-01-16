<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
     public function profile()
     {
       $userId = auth()->id();
        $profile=User::where('id',$userId)->first();
        return view('admin.profile.index')
        ->with('profile',$profile);
     }
     public function editProfile($id)
     {
         $editProfile=User::select('first_name','last_name','phone','email','password','id','address')->where('id',$id)->first();
         
         return view('admin.profile.edit')
         ->with('editProfile',$editProfile);
     }
     public function updateProfile(Request $request)
     {
      try {  
         $string = str_shuffle("abcdefghijklmnopqrstwxyz");
         if($request->image){   
            $image = $request->image;
            $randStr = substr($string, 0, 5);
            $currYr = date("Y");
            $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

            $destinationPath = 'profile/'.$currYr;
            $image->move($destinationPath,$fileName);
            $profile =  User::where('id',$request->id)->first(); 
            $profile->image = $destinationPath.'/'.$fileName;
            $profile->save(); 
            }
            $profile=User::where('id',$request->id)->first(); 
            $profile->username= $request->first_name . ' ' . $request->last_name;
            $profile->first_name=$request->first_name;
            $profile->last_name=$request->last_name;
            $profile->phone = $request->phone;
            $profile->address = $request->address;
            $profile->save(); 
            toast('User profile update successfully!','success');
            return redirect('user/profile');
         
      }catch (\Exception $e){
         Alert::error('Error', 'Error Event create: ' . $e->getMessage());
         return redirect()->back();
      }
    }
}
   