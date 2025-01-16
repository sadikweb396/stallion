<?php

namespace App\Http\Controllers\owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stallion;
use App\Models\vetdetail;
use App\Models\semencontract;
use App\Models\stallionimage;
use App\Models\stallionvideo;
use App\Models\progeny;
use App\Models\plan;
use App\Models\Category;
use App\Models\payment;
use App\Models\pedigree;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use App\Mail\SemenDetailMail;
use App\Mail\photographerMail;
use Illuminate\Support\Facades\Mail;
use Session;
use Stripe;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class StallionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Stallions',['only'=>['index','create','store','edit']]);
        
    }
    public function index()
    {   
        session()->put('tab','stallion');
        $stallions = stallion::with('primaryImage','firststallionvideo','semencontract') 
        ->where('category', 'stallions')
        ->where('user_id',Auth::id())
        ->get();  

        $stallionlists = [];   
        foreach ($stallions as $stallion) {
            $filledFields = 0; 
            $image = null; 
          
            if ($stallion->name) {
                $filledFields=4;
            }
            if ($stallion->performance_history) {
                $filledFields=$filledFields+4;
            }
            if ($stallion->background_story) {
                $filledFields=$filledFields+4;
            }
            if ($stallion->lifetime_story) {
                $filledFields=$filledFields+4;
            }
            
            if ($stallion->registration_details) {
                $filledFields=$filledFields+4;
            }
            if ($stallion->height) {
                $filledFields=$filledFields+4;
            }
            if ($stallion->bred_by) {
                $filledFields=$filledFields+4;
                
            }  
            if ($stallion->owner_story) {
                $filledFields=$filledFields+4;
                
            }
            if ($stallion->first_foal_crop_year){
                $filledFields=$filledFields+4;
                
            }
            if ($stallion->professional_trainer){
                $filledFields=$filledFields+4;
                
            }
            if ($stallion->put_semen_available_from){
                $filledFields=$filledFields+4;
                
            }
            if ($stallion->current_performing_discipline){
                $filledFields=$filledFields+4;
                
            }
            if ($stallion->trainer_history){
                $filledFields=$filledFields+4;
                
            }   
            if ($stallion->imagepercentage) {
                $filledFields=$filledFields+12;
            }
            if ($stallion->pedigree) {
                     $filledFields=$filledFields+12;
            }
            if ($stallion->semencontract) {
                     $filledFields=$filledFields+12;
            }
            if ($stallion->primaryImage){
                if ($stallion->primaryImage->stallion_name) {
                    $image = $stallion->primaryImage->stallion_image; 
                         
                }
            }
            if ($stallion->firststallionvideo) {
                if ($stallion->firststallionvideo->stallion_name) {
                    $filledFields=$filledFields+12;
                    $videoFilled = true; 
                }
            }
                   
            $stallionlists[] = [
                'name' => $stallion->name ?? 'N/A', 
                'filledFields' => $filledFields, 
                'completionPercentage' => ($filledFields / 100) * 100, 
                'image' => $image,   
                'id' => $stallion->id ,
                'slug'=>$stallion->slug,
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

    private function getUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $count = 1;
        while (stallion::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'registration_details' => 'required|unique:stallions',
        ],);
        
        if ($validator->fails()) {
            Alert::error('Register number is unique');
            return redirect()->back();
        }
        $count=stallion::where('user_id',Auth::id())->count();    
        if($count==0){
            $planPrice=plan::where('plan_for','plan for first stallion')->value('plan_price');
            $planfor='plan for first stallion';
        }
        elseif($count==1 || $count==2 || $count==3 || $count==4 || $count == 5)
        {
            $test="test";
            $planPrice=plan::where('plan_for','plan for first stallion')->value('plan_price');
            $planfor='plan for first stallion';
            $planPrice=plan::where('plan_for','plan for second stallion')->value('plan_price') ? plan::where('plan_for','plan for second stallion')->value('plan_price') : $planPrice;
            $planfor='plan for second stallion';
        }
        elseif($count>5)
        {
            $planPrice=plan::where('plan_for','plan for first stallion')->value('plan_price');
            $planfor='plan for first stallion';
            $planPrice=plan::where('plan_for','plan for second stallion')->value('plan_price') ? plan::where('plan_for','plan for second stallion')->value('plan_price') : $planPrice;
            $planfor='plan for second stallion';
            $planPrice=plan::where('plan_for','plan for after five stallion')->value('plan_price')  ? plan::where('plan_for','plan for after five stallion')->value('plan_price') : $planPrice;
            $planfor='plan for after five stallion';
        
        }
       
        $slug = Str::slug($request->name);
        $slug = $this->getUniqueSlug($slug);

        session([
            'name' => $request->name,
            'lifetime_story' => $request->lifetime_story,
            'performance_history' => $request->performance_history,
            'owner_story' => $request->owner_story,
            'registration_details' => $request->registration_details,
            'bred_by' => $request->bred_by,
            'trainer_history' => $request->trainer_history,
            'height' => $request->height,  
            'put_semen_available_from' => $request->put_semen_available_from,
            'current_performing_discipline' => $request->current_performing_discipline,
            'first_foal_crop_year' => $request->first_foal_crop_year,
            'background_story' => $request->background_story,
            'stallion_heading' => $request->stallion_heading,
            'color' => $request->color,
            'planPrice' => $planPrice,
            'photographer'=>$request->photographer,
            'professional_trainer'=>$request->professional_trainer,
            'slug'=>$slug,
            'planfor'=>$planfor,
            'date_of_birth'=>$request->date_of_birth,
        ]);
 
        return view('owner.payment.stallionpayment')
        ->with('planPrice',$planPrice);
    } 
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        try {
                $stallion = new stallion();
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
                $stallion->background_story=session('background_story');
                $stallion->color=session('color');
                $stallion->stallion_heading=session('stallion_heading');
                $stallion->slug=session('slug');
                $stallion->payment_status='pending';
                $stallion->photographer=session('photographer');
                $stallion->date_of_birth=session('date_of_birth');
                $stallion->status=0;
                $stallion->feature_status=0; 
                $stallion->update_status=0; 
                $stallion->status_count=1;
                $stallion->save(); 
                
                $planPrice=session('planPrice');
                $user = Auth::user();
                // Create a new Stripe Customer
                $customer = Stripe\Customer::create([
                    "email" =>  $user ? $user->email : null,
                    "name" =>   $user ? $user->name : null,
                    "source" => $request->stripeToken
                ]);

                // Charge the customer
                $charge = Stripe\Charge::create([
                    "amount" => $planPrice * 100,  
                    "currency" => "usd",
                    "customer" => $customer->id,
                ]);

                $payment = new payment();
                $payment->stripe_payment_id =$charge->id;
                $payment->stallion_id=$stallion->id;
                $payment->user_id = Auth::id();
                $payment->amount =$charge->amount/100;
                $payment->plan =session('planfor');
                $payment->status='successful';
                $payment->save(); 

                stallion::where('id', $stallion->id)->update([
                    'payment_status' => 'paid',
                ]);

                $photographer=session('photographer');
                
                if($photographer==1){
                $data=[
                        'name' => $user->username,
                        'phone' => $user->phone,
                        'email'=>$user->email,
                        'stallionName'=>session('name'),
                        'stallionregistration'=>session('stallionregistration'),
                ];
                $email='sadikalampatna@gmail.com';
                Mail::to($email)->send(new photographerMail($data));
                }
            $request->session()->put('tab','stallion');
            toast('Stallion created  successfully!','success');
            return redirect()->route('owner.stallion', ['id' => $stallion->slug]);

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
        
        $tab = session()->get('tab');
        $id=stallion::select('id')->where('slug',$id)->value('id');
        $stallion=stallion::where('id',$id)->first(); 
        $semencontract=semencontract::where('stallion_id',$id)->first();
        $vetdetail=vetdetail::where('stallion_id',$id)->first();
        $progenys=progeny::where('stallion_id',$id)->get();
        $stallionImages=stallionimage::where('stallion_id',$id)->get();
        $stallionVideos=stallionVideo::where('stallion_id',$id)->get();
        $pedigree=pedigree::where('stallion_id',$id)->first();

        return view('owner.stallion.edit')->with('progenys',$progenys)->with('stallion',$stallion)
        ->with('semencontract',$semencontract)->with('id',$id)->with('stallionImages',$stallionImages)
        ->with('stallionVideos',$stallionVideos)->with('vetdetail',$vetdetail)->with('pedigree',$pedigree)
        ->with('tab',$tab);
    }

    public function update(Request $request)
    {    
        // try {
           
        //     $slug = Str::slug($request->name);
        //     $slug = $this->getUniqueSlug($slug);
        //     $id=$request->stallion_id;   
        //     $stallion = Stallion::find($id);
        //     $stallion->name = $request->name;  
        //     $stallion->slug = $slug; 
        //     $stallion->lifetime_story = $request->lifetimestory;
        //     $stallion->performance_history= $request->performance_history;
        //     $stallion->owner_story=$request->owner_story;
        //     $stallion->lifetime_story=$request->lifetime_Story;
        //     $stallion->height = $request->height;
        //     $stallion->registration_details=$request->registration_details;
        //     $stallion->professional_trainer=$request->professional_trainer;
        //     $stallion->put_semen_available_from=$request->put_semen_available_from;
        //     $stallion->current_performing_discipline=$request->current_performing_discipline;
        //     $stallion->trainer_history=$request->trainer_history;
        //     $stallion->bred_by=$request->bred_by;
        //     $stallion->background_story=$request->background_story;
        //     $stallion->first_foal_crop_year=$request->first_foal_crop_year;
        //     $stallion->color=$request->color;
        //     $stallion->stallion_heading=$request->stallion_heading;
        //     $stallion->date_of_birth=$request->date_of_birth;
        //     $stallion->save();
        //     $id=$stallion->id;
        //     $updateCount=stallion::where('id',$stallion->id)->where('status',1)->count();
        //     if($updateCount==1)
        //     {
        //         stallion::where('id',$stallion->id)->update([
        //             'update_status' =>1,
        //             'latest_update' => Carbon::now(),
        //         ]);
        //     }

        //     toast('Stallion update successfully!','success');
        //     return redirect()->route('owner.stallion',['id' => $stallion->slug]);
        // } catch (\Exception $e) {
        //     Alert::error('Error', 'Error updating stallion: ' . $e->getMessage());
        //     return redirect()->back();
        // }

        try {
            // Validate the request data
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'registration_details' => [
                    'required',
                    'string',
                    Rule::unique('stallions')->ignore($request->stallion_id),
                ],
                // Add validation for other fields as needed
            ]);
        
            if ($validator->fails()) {
                Alert::error('Register number is unique');
                return redirect()->back();
               
            }
        
            // Generate a unique slug
            $slug = Str::slug($request->name);
            $slug = $this->getUniqueSlug($slug);
        
            // Find the Stallion by ID
            $id = $request->stallion_id;
            $stallion = stallion::findOrFail($id);
        
            // Update the Stallion fields
            $stallion->name = $request->name;
            $stallion->slug = $slug;
            $stallion->lifetime_story = $request->lifetime_story;
            $stallion->performance_history = $request->performance_history;
            $stallion->owner_story = $request->owner_story;
            $stallion->height = $request->height;
            $stallion->registration_details = $request->registration_details;
            $stallion->professional_trainer = $request->professional_trainer;
            $stallion->put_semen_available_from = $request->put_semen_available_from;
            $stallion->current_performing_discipline = $request->current_performing_discipline;
            $stallion->trainer_history = $request->trainer_history;
            $stallion->bred_by = $request->bred_by;
            $stallion->background_story = $request->background_story;
            $stallion->first_foal_crop_year = $request->first_foal_crop_year;
            $stallion->color = $request->color;
            $stallion->stallion_heading = $request->stallion_heading;
            $stallion->date_of_birth = $request->date_of_birth;
            $stallion->save();
        
            // Update status if needed
            $updateCount = stallion::where('id', $stallion->id)->where('status', 1)->count();
            if ($updateCount == 1) {
                $stallion->update([
                    'update_status' => 1,
                    'latest_update' => Carbon::now(),
                ]);
            }
        
            // Success notification
            $request->session()->put('tab','stallion');
            toast('Stallion updated successfully!', 'success');
            return redirect()->route('owner.stallion', ['id' => $stallion->slug]);
        
        } catch (\Exception $e) {
            // Error notification
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
                    $semenData->live_cover = $request->live_cover;
                    $semenData->live_cover_lfg = $request->live_cover_lfg;
                    $semenData->live_cover_price = $request->live_cover_price;
                    $semenData->save();   
                    $updateCount=stallion::where('id',$request->stallion_id)->where('status',1)->count();
                    if($updateCount==1)
                    {
                        stallion::where('id',$request->stallion_id)->update([
                            'update_status' =>1,
                            'latest_update' => Carbon::now(),
                        ]);
                    }              
                }else{
                    $semenData = new semencontract();  
                    $semenData->stallion_id = $request->stallion_id; 
                    $semenData->chilled_semen = $request->chilled_semen;
                    $semenData->chilled_semen_lfg = $request->chilled_semen_lfg;
                    $semenData->chilled_semen_price = $request->chilled_semen_price;
                    $semenData->frozen_semen = $request->frozen_semen;
                    $semenData->frozen_semen_lfg = $request->frozen_semen_lfg;
                    $semenData->frozen_semen_price = $request->frozen_semen_price;
                    $semenData->live_cover = $request->live_cover;
                    $semenData->live_cover_lfg = $request->live_cover_lfg;
                    $semenData->live_cover_price = $request->live_cover_price;
                    $semenData->save();
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
                        $updateCount=stallion::where('id',$request->stallion_id)->where('status',1)->count();
                        if($updateCount==1)
                        {
                            stallion::where('id',$request->stallion_id)->update([
                                'update_status' =>1,
                                'latest_update' => Carbon::now(),
                            ]);
                        }
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
                        
                        $stallionCount=vetDetail::where('stallion_id',$vetDetail->stallion_id)->count();
                        if($stallionCount==1)
                        {
                            
                        $statusCount=stallion::where('id',$vetDetail->stallion_id)->value('status_count');
                        stallion::where('id',$vetDetail->stallion_id)->update([
                            'status_count' =>$statusCount+1,
                        ]);
                        }
                }   
                $request->session()->put('tab','Semen Contract');
                toast('semencontract create successfully!','success');
                return redirect()->back();
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
                    $stallionImage->background_image=0;
                    $stallionImage->performance_image=0;
                    $stallionImage->stallionvideo_image=0;
                    $stallionImage->exclusive_data=0;
                    $stallionImage->banner_image=0;
                    $stallionImage->save();
                    
                    $stallionCount=StallionImage::where('stallion_id',$stallionImage->stallion_id)->count();
                    if($stallionCount==5)
                    {
                    $statusCount=stallion::where('id',$stallionImage->stallion_id)->value('status_count');
                    stallion::where('id',$stallionImage->stallion_id)->update([
                        'status_count' =>$statusCount+1,
                        'imagepercentage'=>12,
                    ]);
                    }
                    $updateCount=stallion::where('id',$stallionImage->stallion_id)->where('status',1)->count();
                    if($updateCount==1)
                    {
                        stallion::where('id',$stallionImage->stallion_id)->update([
                            'update_status' =>1,
                            'latest_update' => Carbon::now(),
                        ]);
                    }
                   
                }
                $request->session()->put('tab','image');
                toast('Stallion image create successfully!','success');
                return back();
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

                    $stallionCount=stallionvideo::where('stallion_id',$stallionVideo->stallion_id)->count();
                    if($stallionCount==1)
                    {
                    $statusCount=stallion::where('id',$stallionVideo->stallion_id)->value('status_count');
                    stallion::where('id',$stallionVideo->stallion_id)->update([
                        'status_count' =>$statusCount+1,
                    ]);
                    }
                    
                    $updateCount=stallion::where('id',$stallionVideo->stallion_id)->where('status',1)->count();
                    if($updateCount==1)
                    {
                        stallion::where('id',$stallionVideo->stallion_id)->update([
                            'update_status' =>1,
                            'latest_update' => Carbon::now(),
                        ]);
                    }
                $request->session()->put('tab','video');
                toast('Stallion video create successfully!','success');
                return back();
                }
            }   catch (\Exception $e) {
                        Alert::error('Error', 'Error create Stallion video: ' . $e->getMessage());
                        return redirect()->back();
            }
    }
}    