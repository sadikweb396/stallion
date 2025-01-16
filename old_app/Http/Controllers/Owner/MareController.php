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

class MareController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Mares',['only'=>['index','create','store','edit']]);
        
    }
    public function index()
    {   
        session()->put('tab','mare');
        $stallions = Stallion::with('primaryImage','firststallionvideo','semencontract') 
        ->where('category','mares')
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
                $filledFields=$filledFields+16;
            }
            if ($stallion->pedigree) {
                     $filledFields=$filledFields+16;
            }
            
            if ($stallion->primaryImage){
                if ($stallion->primaryImage->stallion_name) {
                    $image = $stallion->primaryImage->stallion_image; 
                         
                }
            }
            if ($stallion->firststallionvideo) {
                if ($stallion->firststallionvideo->stallion_name) {
                    $filledFields=$filledFields+16;
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
            return view('owner.mare.index')
            ->with('stallions',$stallions)
            ->with('stallionlists',$stallionlists);
    }

    public function create()
    {
        return view('owner.mare.create');
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
            $planPrice=plan::where('plan_for','plan for first mare')->value('plan_price');
            $planfor='plan for first mare';
        }
        elseif($count==1 || $count==2 || $count==3 || $count==4 || $count == 5)
        {
            $test="test";
            $planPrice=plan::where('plan_for','plan for first mare')->value('plan_price');
            $planfor='plan for first mare';
            $planPrice=plan::where('plan_for','plan for second mare')->value('plan_price') ? plan::where('plan_for','plan for second mare')->value('plan_price') : $planPrice;
            $planfor='plan for second mare';
        }
        elseif($count>5)
        {
            $planPrice=plan::where('plan_for','plan for first mare')->value('plan_price');
            $planfor='plan for first mare';
            $planPrice=plan::where('plan_for','plan for second mare')->value('plan_price') ? plan::where('plan_for','plan for second mare')->value('plan_price') : $planPrice;
            $planfor='plan for second mare';
            $planPrice=plan::where('plan_for','plan for after five mare')->value('plan_price')  ? plan::where('plan_for','plan for after five mare')->value('plan_price') : $planPrice;
            $planfor='plan for after five mare';
        
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
            'planfor'=>$planfor,
            'photographer'=>$request->photographer,
            'professional_trainer'=>$request->professional_trainer,
            'date_of_birth'=>$request->date_of_birth,
            'slug'=>$slug,
        ]);

        return view('owner.payment.marepayment')
        ->with('planPrice',$planPrice);
    } 
 
    public function paymentMare(Request $request)
    {
        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        try {
                $stallion = new Stallion();
                $stallion->category ='mares';
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
                $payment->status='successful';
                $payment->plan =session('planfor');
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
            $request->session()->put('tab','mare');
            toast('mare created  successfully!','success');
            return redirect()->route('owner.mare', ['id' => $stallion->slug]);

        }
        catch (\Stripe\Exception\CardException $e) {
            $errorMessage = $e->getError()->message;
            Alert::error('Error', 'Payment failed:'. $errorMessage);
        
        }  catch (\Exception $e) {
            Alert::error('Error', 'Error Mare created: ' . $e->getMessage());
            return redirect('owner/mare/create');
        }
    }

    public function edit($id)
    {
        $tab = session()->get('tab');
        $id=Stallion::select('id')->where('slug',$id)->value('id');
        
        $stallion=Stallion::where('id',$id)->first(); 
        $progenys=progeny::where('stallion_id',$id)->get();

        $stallionImages=stallionimage::where('stallion_id',$id)->get();

        $stallionVideos=stallionVideo::where('stallion_id',$id)->get();

        $pedigree=pedigree::where('stallion_id',$id)->first();

        return view('owner.mare.edit')->with('progenys',$progenys)->with('stallion',$stallion)
       ->with('id',$id)->with('stallionImages',$stallionImages)->with('stallionVideos',$stallionVideos)->with('pedigree',$pedigree)
       ->with('tab',$tab);

    }
    public function update(Request $request)
    {   
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
           
            $slug = Str::slug($request->name);
            $slug = $this->getUniqueSlug($slug);
            $id=$request->stallion_id;   
            $stallion = Stallion::find($id);
            $stallion->name = $request->name;  
            $stallion->slug = $slug; 
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
            $stallion->color=$request->color;
            $stallion->stallion_heading=$request->stallion_heading;
            $stallion->date_of_birth=$request->date_of_birth;
            $stallion->save();
            $id=$stallion->id;
            $updateCount=stallion::where('id',$stallion->id)->where('status',1)->count();
            if($updateCount==1)
            {
                stallion::where('id',$stallion->id)->update([
                    'update_status' =>1,
                    'latest_update' => Carbon::now(),
                ]);
            }
           
            $request->session()->put('tab','mare');
            toast('mare update successfully!','success');
            return redirect()->route('owner.mare',['id' => $stallion->slug]);
        } catch (\Exception $e) {
            Alert::error('Error', 'Error updating mare: ' . $e->getMessage());
            return redirect()->back();
        }
    } 
    public function mareimagestore(Request $request)
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
                        'status_count' =>$statusCount+2,
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
                toast('Mare image create successfully!','success');
                return back();
            } catch (\Exception $e) {
                Alert::error('Error', 'Error create mare image: ' . $e->getMessage());
                return redirect()->back();
            }
    }

    public function marevideostore(Request $request)
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
            toast('Mare video create successfully!','success');
               return back();
            }
        }   catch (\Exception $e) {
                    Alert::error('Error', 'Error create mare video: ' . $e->getMessage());
                    return redirect()->back();
        }
    }
   
}
