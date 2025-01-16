<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\maresemencontract;

class SemencontractController extends Controller
{
    public function semenContract(Request $request)
    {
        try {
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");

            // Save to the database
            $semencontract = new maresemencontract();
            $semencontract->owner_name = $request->owner_name;
            $semencontract->postal_address = $request->postal_address;
            $semencontract->state=$request->state;
            $semencontract->phone=$request->phone;
            $semencontract->email=$request->email;
            $semencontract->postcode=$request->postcode;
            $semencontract->mare_name=$request->mare_name;
            $semencontract->sire=$request->sire;
            $semencontract->dam=$request->dam;
            $semencontract->semen_options=$request->semen_options;
            $semencontract->aqha=$request->aqha;
            $semencontract->stallion_id=$request->stallionId;

            $semencontract->save();
   
            toast('Semencontract successfully!','success');
            return back();
            
        }   catch (\Exception $e) {
            echo $e->getMessage();
                    Alert::error('Error', 'Error create Badge: ' . $e->getMessage());
                    return redirect()->back();
        }
    }
}
