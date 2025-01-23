<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\maresemencontract;

class SemencontractController extends Controller
{
    public function semenContract(Request $request)
    {
        // try {
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");

            // Save to the database
            $semencontract = new maresemencontract();
            $semencontract->owner_name = $request->owner_name;
            $semencontract->trading_name = $request->trading_name;
            $semencontract->postal_address = $request->postal_address;
            $semencontract->suburb = $request->suburb;
            $semencontract->state=$request->state;
            $semencontract->postcode=$request->postcode;  
            $semencontract->phone=$request->phone;
            $semencontract->email=$request->email;
            $semencontract->aqha=$request->aqha; 
            $semencontract->membership_number = $request->membership_number;
            
            $semencontract->mare_name=$request->mare_name;
            $semencontract->sire=$request->sire;
            $semencontract->dam=$request->dam;
            $semencontract->breeding_type=$request->breeding_type;
            $semencontract->breeding_aqha=$request->breeding_aqha;
            $semencontract->semen_options=$request->semen_options;  
            $semencontract->stallion_id=$request->stallionId;

            $semencontract->vet_owner_name=$request->vet_owner_name;
            $semencontract->vet_trading_name=$request->vet_trading_name;
            $semencontract->vet_postal_address=$request->vet_postal_address;
            $semencontract->vet_suburb=$request->vet_suburb;
            $semencontract->vet_state=$request->vet_state;
            $semencontract->vet_postcode=$request->vet_postcode;
            $semencontract->vet_phone=$request->vet_phone;
            $semencontract->save();
   
            toast('Semencontract successfully!','success');
            return back();
            
        // }   catch (\Exception $e) {
        //     echo $e->getMessage();
        //             Alert::error('Error', 'Error create Badge: ' . $e->getMessage());
        //             return redirect()->back();
        // }
    }
}
