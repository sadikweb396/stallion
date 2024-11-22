<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stallion;
use App\Models\vetdetail;
use App\Models\semencontract;
use App\Models\StallionImage;
use App\Models\Stallionvideo;
use App\Models\progeny;
use App\Models\Category;
use App\Models\payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use App\Mail\SemenDetailMail;
use Illuminate\Support\Facades\Mail;
use Session;
use Stripe;
class StallionController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('permission:create stallion', ['only' => ['create','store']]);
        
    // }

    public function index()
    {  
        
    $stallions = Stallion::with('firstImage','firststallionvideo') // Eager load video to optimize
    ->where('category', 'stallions')
    ->where('user_id', Auth::id())
    ->get();
    
    $stallionlists = [];
    
    foreach ($stallions as $stallion) {
        $filledFields = 1; 
        $image = null; 
        $videoFilled = false; 
        if ($stallion->name) {
            $filledFields++;
        }
    
        if ($stallion->performance_history) {
            $filledFields++;
        }
    
        if ($stallion->background_story) {
            $filledFields++;
        }
    
        if ($stallion->height) {
            $filledFields++;
        }

        if ($stallion->bred_by) {
            $filledFields++;
        }

        if ($stallion->owner_story) {
            $filledFields++;
        }

        if ($stallion->first_foal_crop_year) {
            $filledFields++;
        }

        if ($stallion->firstImage) {
            if ($stallion->firstImage->stallion_name) {
                $filledFields++;
                $image = $stallion->firstImage->stallion_image; // Store image
            }
        }
        if ($stallion->firststallionvideo) {
            if ($stallion->firststallionvideo->stallion_name) {
                $filledFields++;
                $videoFilled = true; 
            }
        }
    
        $stallionlists[] = [
            'name' => $stallion->name ?? 'N/A', // Default to 'N/A' if name is not set
            'filledFields' => $filledFields,
            'totalFields' => 20, // Total fields are 10 as per your logic
            'completionPercentage' => ($filledFields / 20) * 100, // Calculate completion percentage
            'image' => $image, // Image or null
            'videoFilled' => $videoFilled, // Track if video is filled
            'id' => $stallion->id ,
        ];
    }
    
   
        
        return view('owner.stallion.index')
        ->with('stallions',$stallions)
        ->with('stallionlists',$stallionlists);
    }

    public function create()
    {
        return view('owner.stallion.create');
    }

    public function stores()
    {
        try {
            $stallion = new Stallion();
            $stallion->category ='stallions';
            $stallion->name = $request->name;
            $stallion->user_id = Auth::id();
            $stallion->lifetime_story = $request->lifetimestory;
            $stallion->performance_history= $request->performance_history;
            $stallion->owner_story=$request->owner_story;
            $stallion->lifetime_story=$request->lifetime_Story;
            $stallion->height = $request->height;
            $stallion->registration_details=$request->registration_details;
            $stallion->professional_trainer=$request->professional_trainer;
            $stallion->put_semen_available_from=$request->put_semen_available_from;
            $stallion->current_performing_discipline=$request->current_performing_discipline;
            $stallion->trainer_history=$request->trainer_history;
            $stallion->bred_by=$request->bred_by;
            $stallion->first_foal_crop_year=$request->first_foal_crop_year;
            $stallion->status=0;
            $stallion->save();
            $id=$stallion->id;
            toast('Stallion created  successfully!','success');
            return redirect()->route('owner.stallion', ['id' => $id]);
        } catch (\Exception $e) {
            Alert::error('Error', 'Error updating stallion: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        session([
            'name' => $request->name,
            'lifetime_story' => $request->lifetime_story,
            'performance_history' => $request->performance_history,
            'owner_story' => $request->owner_story,
            'registration_details' => $request->registration_details,
            'bred_by' => $request->bred_by,
            'trainer_history' => $request->trainer_history,
            'height' => $request->height,  // Ensure all required fields are captured
            'put_semen_available_from' => $request->put_semen_available_from,
            'current_performing_discipline' => $request->current_performing_discipline,
            'first_foal_crop_year' => $request->first_foal_crop_year
        ]);
        return view('stripe.index');
    } 

    public function stripePost(Request $request)
    {
    Stripe\Stripe::setApiKey(config('services.stripe.secret'));
     try {
            $stallion = new Stallion();
            $stallion->category ='stallions';
            $stallion->name=session('name');
            $stallion->user_id = Auth::id();
            $stallion->performance_history = session('performance_history');
            $stallion->owner_story = session('owner_story');
            $stallion->lifetime_story = session('lifetime_story');
            $stallion->height = session('height');
            $stallion->registration_details = session('registration_details');
            $stallion->trainer_history = session('trainer_history');
            $stallion->bred_by = session('bred_by');
            $stallion->professional_trainer = session('professional_trainer');
            $stallion->put_semen_available_from = session('put_semen_available_from');
            $stallion->current_performing_discipline = session('current_performing_discipline');
            $stallion->first_foal_crop_year = session('first_foal_crop_year');
            $stallion->status=0;
            $stallion->save(); 
            $user = Auth::user();
            // Create a new Stripe Customer
            $customer = Stripe\Customer::create([
                "email" =>  $user ? $user->email : null,
                "name" =>   $user ? $user->name : null,
                "source" => $request->stripeToken
            ]);

            // Charge the customer
            $charge = Stripe\Charge::create([
                "amount" => 100 * 100,  
                "currency" => "usd",
                "customer" => $customer->id,
            ]);

            $payment = new payment();
            $payment->stripe_payment_id =$charge->id;
            $payment->stallion_id=$stallion->id;
            $payment->user_id = Auth::id();
            $payment->amount =$charge->amount/100;
            $payment->status='successful';
            $payment->save(); 

        toast('Stallion created  successfully!','success');
        return redirect()->route('owner.stallion', ['id' => $stallion->id]);

    }
    catch (\Stripe\Exception\CardException $e) {
        $errorMessage = $e->getError()->message;
        Alert::error('Error', 'Payment failed:'. $errorMessage);
      
     }  catch (\Exception $e) {
        Alert::error('Error', 'Error Stallion created: ' . $e->getMessage());
        return redirect('owner/stallion/create');
    } 

   
}

    public function edit($id)
    {
        $stallion=Stallion::where('id',$id)->first(); 
        $semencontract=semencontract::where('stallion_id',$id)->first();
        $vetdetail=vetdetail::where('stallion_id',$stallion->id)->first();
        $progenys=progeny::where('stallion_id',$stallion->id)->get();
        $stallionImages=stallionimage::where('stallion_id',$id)->get();
        $stallionVideos=stallionVideo::where('stallion_id',$id)->get();
        return view('owner.stallion.edit')->with('progenys',$progenys)->with('stallion',$stallion)
        ->with('semencontract',$semencontract)->with('id',$id)->with('stallionImages',$stallionImages)
        ->with('stallionVideos',$stallionVideos)->with('vetdetail',$vetdetail);
    }
    public function update(Request $request)
    {    
        try {
            $id=$request->stallion_id;   
            $stallion = Stallion::find($id);
            $stallion->name = $request->name;  
            $stallion->lifetime_story = $request->lifetimestory;
            $stallion->performance_history= $request->performance_history;
            $stallion->owner_story=$request->owner_story;
            $stallion->lifetime_story=$request->lifetime_Story;
            $stallion->height = $request->height;
            $stallion->registration_details=$request->registration_details;
            $stallion->professional_trainer=$request->professional_trainer;
            $stallion->put_semen_available_from=$request->put_semen_available_from;
            $stallion->current_performing_discipline=$request->current_performing_discipline;
            $stallion->trainer_history=$request->trainer_history;
            $stallion->bred_by=$request->bred_by;
            $stallion->background_story=$request->background_story;
            $stallion->first_foal_crop_year=$request->first_foal_crop_year;
            $stallion->latest_update=Carbon::now();
            $stallion->save();
            $id=$stallion->id;
            toast('Stallion update successfully!','success');
            return redirect()->route('owner.stallion',['id' => $id]);
        } catch (\Exception $e) {
            Alert::error('Error', 'Error updating stallion: ' . $e->getMessage());
            return redirect()->back();
        }
    } 
   
    public function semencontractstore(Request $request)
    {
        try {
                $count=semencontract::where('stallion_id',$request->stallion_id)->count();
                if($count>0){
                    $semenData = semencontract::where('stallion_id',$request->stallion_id)->first(); 
                    $semenData->chilled_semen = $request->chilled_semen;
                    $semenData->chilled_semen_lfg = $request->chilled_semen_lfg;
                    $semenData->chilled_semen_price = $request->chilled_semen_price;
                    $semenData->frozen_semen = $request->frozen_semen;
                    $semenData->frozen_semen_lfg = $request->frozen_semen_lfg;
                    $semenData->frozen_semen_price = $request->frozen_semen_price;
                    $semenData->save();   
                    stallion::where('id',$semenData->stallion_id)->update([
                        'latest_update' => Carbon::now(),
                    ]);

                   
                }else{
                    $semenData = new semencontract();  
                    $semenData->stallion_id = $request->stallion_id; 
                    $semenData->chilled_semen = $request->chilled_semen;
                    $semenData->chilled_semen_lfg = $request->chilled_semen_lfg;
                    $semenData->chilled_semen_price = $request->chilled_semen_price;
                    $semenData->frozen_semen = $request->frozen_semen;
                    $semenData->frozen_semen_lfg = $request->frozen_semen_lfg;
                    $semenData->frozen_semen_price = $request->frozen_semen_price;
                    $semenData->save();
                    stallion::where('id',$semenData->stallion_id)->update([
                        'latest_update' => Carbon::now(),
                    ]);

                }

                $count=vetdetail::where('stallion_id',$request->stallion_id)->count();
                if($count>0){
                        $vetDetail = vetdetail::where('stallion_id',$request->stallion_id)->first();
                        $vetDetail->stallion_id = $request->stallion_id; 
                        $vetDetail->name_of_clinic = $request->name_of_clinic;
                        $vetDetail->address = $request->address;
                        $vetDetail->vet_name = $request->vet_name;
                        $vetDetail->phone = $request->phone;
                        $vetDetail->email = $request->email;
                        $vetDetail->clinic_number = $request->clinic_number;
                        $vetDetail->save();
                        stallion::where('id',$vetDetail->stallion_id)->update([
                            'latest_update' => Carbon::now(),
                        ]);
                }else{
                        $vetDetail = new vetdetail();
                        $vetDetail->stallion_id = $request->stallion_id; 
                        $vetDetail->name_of_clinic = $request->name_of_clinic;
                        $vetDetail->address = $request->address;
                        $vetDetail->vet_name = $request->vet_name;
                        $vetDetail->phone = $request->phone;
                        $vetDetail->email = $request->email;
                        $vetDetail->clinic_number = $request->clinic_number;
                        $vetDetail->save(); 
                        stallion::where('id',$vetDetail->stallion_id)->update([
                            'latest_update' => Carbon::now(),
                        ]); 

                        $data = [
                            'email'=>$request->email,
                        ];
                        $to = 'sadikalamwmi@gmail11.com';
                        $cc='sadikalamwmi@gmail.com';
                        Mail::to($to)->cc($cc) ->send(new SemenDetailMail($data));
                }
                toast('semencontract create successfully!','success');
                return redirect()->route('owner.stallion',['id' =>$request->stallion_id]);
            } catch (\Exception $e) {
                Alert::error('Error', 'Error create semencontract: ' . $e->getMessage());
                return redirect()->back();
            }
    }

    

    public function stallionimagestore(Request $request)
    {
        try {
                $string = str_shuffle("abcdefghijklmnopqrstwxyz");
                if($request->stallion_image){
                    
                    $image = $request->stallion_image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

                    $destinationPath = 'stallion/'.$currYr;
                    $image->move($destinationPath,$fileName);
            
                    // Save to the database
                    $stallionImage = new StallionImage();
                    $stallionImage->stallion_id = $request->stallion_id;
                    $stallionImage->stallion_name = $request->stallion_name;
                    $stallionImage->stallion_location = $request->stallion_location;
                    $stallionImage->stallion_image = $destinationPath.'/'.$fileName;
                    $stallionImage->date=$request->calender;
                    $stallionImage->new_element=0;
                    $stallionImage->save();
                    
                    $result = stallion::where('id',$stallionImage->stallion_id)->update([
                        'latest_update' => Carbon::now(),
                    ]);

                    return redirect()->route('owner.stallion',['id' =>$request->stallion_id]);
                }
                toast('Stallion image create successfully!','success');
                return redirect()->route('owner.stallion',['id' =>$request->stallion_id]);
            } catch (\Exception $e) {
                Alert::error('Error', 'Error create Stallion image: ' . $e->getMessage());
                return redirect()->back();
            }
    }
    public function stallionvideostore(Request $request)
    {
        try {
                $string = str_shuffle("abcdefghijklmnopqrstwxyz");
                if($request->stallion_video){
                    
                    $image = $request->stallion_video;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

                    $destinationPath = 'stallion/'.$currYr;
                    $image->move($destinationPath,$fileName);
            
                    // Save to the database
                    $stallionVideo = new stallionvideo();
                    $stallionVideo->stallion_id = $request->stallion_id;
                    $stallionVideo->stallion_name = $request->stallion_name;
                    $stallionVideo->stallion_location = $request->stallion_location;
                    $stallionVideo->stallion_video = $destinationPath.'/'.$fileName;
                    $stallionVideo->date=$request->calender;
                    $stallionVideo->save();

                    stallion::where('id',$stallionVideo->stallion_id)->update([
                        'latest_update' => Carbon::now(),
                    ]);
                    
                toast('Stallion video create successfully!','success');
                        return redirect()->route('owner.stallion',['id' =>$request->stallion_id]);
                }
            }   catch (\Exception $e) {
                        Alert::error('Error', 'Error create Stallion video: ' . $e->getMessage());
                        return redirect()->back();
            }
    }

    public function progenyEdit($id)
    {
        $progeny=progeny::where('id',$id)->first();
        return view('owner.stallion.progny-edit')
        ->with('progeny',$progeny);
    }

    public function progenyUpdate(Request $request)
    {
        try {
            $id=$request->progeny_id;
            $stallionId=progeny::where('id',$id)->first();
            $stallion=$stallionId->stallion_id;
            $stallionCat=category::where('id',$stallionId->id)->first();
            $progeny = progeny::find($id); 
            $progeny->progeny_name = $request->progeny_name;
            $progeny->sale=$request->sale;
            $progeny->sold=$request->sold;
            $progeny->date_of_birth=$request->date_of_birth;
            $progeny->gender=$request->gender;
            $progeny->color=$request->color;
            $progeny->registration_number=$request->registration_number;
            $progeny->breeder=$request->breeder;
            $progeny->performace_history=$request->progeny_performace_history;
            $progeny->trainer=$request->trainer;
            $progeny->exceptional_progeny=$request->exceptional_progeny;
            $progeny->save();
            stallion::where('id',$progeny->stallion_id)->update([
                'latest_update' => Carbon::now(),
            ]);
            toast('Progeny updae successfully!','success');
            return redirect()->back();

        }   catch (\Exception $e) {
            Alert::error('Error', 'Error updae Progeny : ' . $e->getMessage());
            return redirect()->back();
        }
        
    }
}    