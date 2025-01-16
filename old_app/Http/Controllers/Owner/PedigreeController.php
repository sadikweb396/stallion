<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pedigree;
use App\Models\stallion;
use RealRashid\SweetAlert\Facades\Alert;

class PedigreeController extends Controller
{
    public function pedigreeStallion(Request $request)
    {
       
        try {
        $count=pedigree::where('stallion_id',$request->stallion_id)->count();
        if($count>0){
           
            $pedigree = pedigree::where('stallion_id',$request->stallion_id)->first();
            $pedigree->stallionname = $request->stallionname; 
            $pedigree->stallionregistration = $request->stallionregistration; 
            $pedigree->stallion_id = $request->stallion_id; 
            $pedigree->sirename1 = $request->sirename1;
            $pedigree->stallionlink=$request->stallionlink;
            $pedigree->sirelink1=$request->sirelink1;
            $pedigree->sireregistration1 = $request->sireregistration1;
            $pedigree->sirename2=$request->sirename2;
            $pedigree->sirelink2=$request->sirelink2;
            $pedigree->sireregistration2 = $request->sireregistration2;
            $pedigree->sirename3=$request->sirename3;
            $pedigree->sirelink3=$request->sirelink3;
            $pedigree->sireregistration3 = $request->sireregistration3;
            $pedigree->sirename4=$request->sirename4;
            $pedigree->sirelink4=$request->sirelink4;
            $pedigree->sireregistration4 = $request->sireregistration4;
            $pedigree->sirename5=$request->sirename5;
            $pedigree->sirelink5=$request->sirelink5;
            $pedigree->sireregistration5 = $request->sireregistration5;
            $pedigree->sirename6=$request->sirename6;
            $pedigree->sirelink6=$request->sirelink6;
            $pedigree->sireregistration6 = $request->sireregistration6;
            $pedigree->sirename7=$request->sirename7;
            $pedigree->sirelink7=$request->sirelink7;
            $pedigree->sireregistration7 = $request->sireregistration7;
            $pedigree->damname1=$request->damname1;
            $pedigree->damlink1=$request->damlink1;
            $pedigree->damregistration1=$request->damregistration1;
            $pedigree->damname2=$request->damname2;
            $pedigree->damlink2=$request->damlink2;
            $pedigree->damregistration2=$request->damregistration2;
            $pedigree->damname3=$request->damname3;
            $pedigree->damlink3=$request->damlink3;
            $pedigree->damregistration3=$request->damregistration3;
            $pedigree->damname4=$request->damname4;
            $pedigree->damlink4=$request->damlink4;
            $pedigree->damregistration4=$request->damregistration4;
            $pedigree->damname5=$request->damname5;
            $pedigree->damlink5=$request->damlink5;
            $pedigree->damregistration5=$request->damregistration5;
            $pedigree->damname6=$request->damname6;
            $pedigree->damlink6=$request->damlink6;
            $pedigree->damregistration6=$request->damregistration6;
            $pedigree->damname7=$request->damname7;
            $pedigree->damlink7=$request->damlink7;
            $pedigree->damregistration7=$request->damregistration7;
            $pedigree->save();

            $request->session()->put('tab','pedigree');
            toast('Predigree Update successfully!','success');
             return redirect()->back();
        }
        else{
        $pedigree = new pedigree(); 
        $pedigree->stallionname = $request->stallionname; 
        $pedigree->stallionregistration = $request->stallionregistration; 
        $pedigree->stallion_id = $request->stallion_id; 
        $pedigree->sirename1 = $request->sirename1;
        $pedigree->stallionlink=$request->stallionlink;
        $pedigree->sirelink1=$request->sirelink1;
        $pedigree->sireregistration1 = $request->sireregistration1;
        $pedigree->sirename2=$request->sirename2;
        $pedigree->sirelink2=$request->sirelink2;
        $pedigree->sireregistration2 = $request->sireregistration2;
        $pedigree->sirename3=$request->sirename3;
        $pedigree->sirelink3=$request->sirelink3;
        $pedigree->sireregistration3 = $request->sireregistration3;
        $pedigree->sirename4=$request->sirename4;
        $pedigree->sirelink4=$request->sirelink4;
        $pedigree->sireregistration4 = $request->sireregistration4;
        $pedigree->sirename5=$request->sirename5;
        $pedigree->sirelink5=$request->sirelink5;
        $pedigree->sireregistration5 = $request->sireregistration5;
        $pedigree->sirename6=$request->sirename6;
        $pedigree->sirelink6=$request->sirelink6;
        $pedigree->sireregistration6 = $request->sireregistration6;
        $pedigree->sirename7=$request->sirename7;
        $pedigree->sirelink7=$request->sirelink7;
        $pedigree->sireregistration7 = $request->sireregistration7;
        $pedigree->damname1=$request->damname1;
        $pedigree->damlink1=$request->damlink1;
        $pedigree->damregistration1=$request->damregistration1;
        $pedigree->damname2=$request->damname2;
        $pedigree->damlink2=$request->damlink2;
        $pedigree->damregistration2=$request->damregistration2;
        $pedigree->damname3=$request->damname3;
        $pedigree->damlink3=$request->damlink3;
        $pedigree->damregistration3=$request->damregistration3;
        $pedigree->damname4=$request->damname4;
        $pedigree->damlink4=$request->damlink4;
        $pedigree->damregistration4=$request->damregistration4;
        $pedigree->damname5=$request->damname5;
        $pedigree->damlink5=$request->damlink5;
        $pedigree->damregistration5=$request->damregistration5;
        $pedigree->damname6=$request->damname6;
        $pedigree->damlink6=$request->damlink6;
        $pedigree->damregistration6=$request->damregistration6;
        $pedigree->damname7=$request->damname7;
        $pedigree->damlink7=$request->damlink7;
        $pedigree->damregistration7=$request->damregistration7;
        $pedigree->save();

        $stallionCount=pedigree::where('stallion_id',$pedigree->stallion_id)->count();
        if($stallionCount==1)
        {
        $statusCount=stallion::where('id',$pedigree->stallion_id)->value('status_count');
        stallion::where('id',$pedigree->stallion_id)->update([
            'status_count' =>$statusCount+1,
        ]);
        }

        toast('Predigree create successfully!','success');
        return redirect()->back();
        }
    } catch (\Exception $e) {
      Alert::error('Error', 'Error create Predigree: ' . $e->getMessage());
      return redirect()->back();
         
    }
    }

    public function pedigreeMare(Request $request)
    {
        try {
        $count=pedigree::where('stallion_id',$request->stallion_id)->count();
        if($count>0){
           
            $pedigree = pedigree::where('stallion_id',$request->stallion_id)->first();
            $pedigree->stallionname = $request->stallionname; 
            $pedigree->stallionregistration = $request->stallionregistration; 
            $pedigree->stallion_id = $request->stallion_id; 
            $pedigree->sirename1 = $request->sirename1;
            $pedigree->stallionlink=$request->stallionlink;
            $pedigree->sirelink1=$request->sirelink1;
            $pedigree->sireregistration1 = $request->sireregistration1;
            $pedigree->sirename2=$request->sirename2;
            $pedigree->sirelink2=$request->sirelink2;
            $pedigree->sireregistration2 = $request->sireregistration2;
            $pedigree->sirename3=$request->sirename3;
            $pedigree->sirelink3=$request->sirelink3;
            $pedigree->sireregistration3 = $request->sireregistration3;
            $pedigree->sirename4=$request->sirename4;
            $pedigree->sirelink4=$request->sirelink4;
            $pedigree->sireregistration4 = $request->sireregistration4;
            $pedigree->sirename5=$request->sirename5;
            $pedigree->sirelink5=$request->sirelink5;
            $pedigree->sireregistration5 = $request->sireregistration5;
            $pedigree->sirename6=$request->sirename6;
            $pedigree->sirelink6=$request->sirelink6;
            $pedigree->sireregistration6 = $request->sireregistration6;
            $pedigree->sirename7=$request->sirename7;
            $pedigree->sirelink7=$request->sirelink7;
            $pedigree->sireregistration7 = $request->sireregistration7;
            $pedigree->damname1=$request->damname1;
            $pedigree->damlink1=$request->damlink1;
            $pedigree->damregistration1=$request->damregistration1;
            $pedigree->damname2=$request->damname2;
            $pedigree->damlink2=$request->damlink2;
            $pedigree->damregistration2=$request->damregistration2;
            $pedigree->damname3=$request->damname3;
            $pedigree->damlink3=$request->damlink3;
            $pedigree->damregistration3=$request->damregistration3;
            $pedigree->damname4=$request->damname4;
            $pedigree->damlink4=$request->damlink4;
            $pedigree->damregistration4=$request->damregistration4;
            $pedigree->damname5=$request->damname5;
            $pedigree->damlink5=$request->damlink5;
            $pedigree->damregistration5=$request->damregistration5;
            $pedigree->damname6=$request->damname6;
            $pedigree->damlink6=$request->damlink6;
            $pedigree->damregistration6=$request->damregistration6;
            $pedigree->damname7=$request->damname7;
            $pedigree->damlink7=$request->damlink7;
            $pedigree->damregistration7=$request->damregistration7;
            $pedigree->save();
          
            toast('Predigree Update successfully!','success');
            return redirect()->back();
        }
        else{
        $pedigree = new pedigree(); 
        $pedigree->stallionname = $request->stallionname; 
        $pedigree->stallionregistration = $request->stallionregistration; 
        $pedigree->stallion_id = $request->stallion_id; 
        $pedigree->sirename1 = $request->sirename1;
        $pedigree->stallionlink=$request->stallionlink;
        $pedigree->sirelink1=$request->sirelink1;
        $pedigree->sireregistration1 = $request->sireregistration1;
        $pedigree->sirename2=$request->sirename2;
        $pedigree->sirelink2=$request->sirelink2;
        $pedigree->sireregistration2 = $request->sireregistration2;
        $pedigree->sirename3=$request->sirename3;
        $pedigree->sirelink3=$request->sirelink3;
        $pedigree->sireregistration3 = $request->sireregistration3;
        $pedigree->sirename4=$request->sirename4;
        $pedigree->sirelink4=$request->sirelink4;
        $pedigree->sireregistration4 = $request->sireregistration4;
        $pedigree->sirename5=$request->sirename5;
        $pedigree->sirelink5=$request->sirelink5;
        $pedigree->sireregistration5 = $request->sireregistration5;
        $pedigree->sirename6=$request->sirename6;
        $pedigree->sirelink6=$request->sirelink6;
        $pedigree->sireregistration6 = $request->sireregistration6;
        $pedigree->sirename7=$request->sirename7;
        $pedigree->sirelink7=$request->sirelink7;
        $pedigree->sireregistration7 = $request->sireregistration7;
        $pedigree->damname1=$request->damname1;
        $pedigree->damlink1=$request->damlink1;
        $pedigree->damregistration1=$request->damregistration1;
        $pedigree->damname2=$request->damname2;
        $pedigree->damlink2=$request->damlink2;
        $pedigree->damregistration2=$request->damregistration2;
        $pedigree->damname3=$request->damname3;
        $pedigree->damlink3=$request->damlink3;
        $pedigree->damregistration3=$request->damregistration3;
        $pedigree->damname4=$request->damname4;
        $pedigree->damlink4=$request->damlink4;
        $pedigree->damregistration4=$request->damregistration4;
        $pedigree->damname5=$request->damname5;
        $pedigree->damlink5=$request->damlink5;
        $pedigree->damregistration5=$request->damregistration5;
        $pedigree->damname6=$request->damname6;
        $pedigree->damlink6=$request->damlink6;
        $pedigree->damregistration6=$request->damregistration6;
        $pedigree->damname7=$request->damname7;
        $pedigree->damlink7=$request->damlink7;
        $pedigree->damregistration7=$request->damregistration7;
        $pedigree->save();

        $stallionCount=pedigree::where('stallion_id',$pedigree->stallion_id)->count();
        if($stallionCount==1)
        {
        $statusCount=stallion::where('id',$pedigree->stallion_id)->value('status_count');
        stallion::where('id',$pedigree->stallion_id)->update([
            'status_count' =>$statusCount+1,
        ]);
        }

        toast('Predigree create successfully!','success');
        return redirect()->back();
        }
    } catch (\Exception $e) {
      Alert::error('Error', 'Error create Predigree: ' . $e->getMessage());
      return redirect()->back();
         
    }
    }

   
}
