<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\event;
use App\Models\eventdate;
use App\Models\eventbanner;
use App\Models\link;
use App\Models\eventinformation;
use RealRashid\SweetAlert\Facades\Alert;
use DateTime;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:Event',['only' => ['index','create','store','edit','update','delete']]);
        $this->middleware('permission:Banner Event',['only' => ['banner','bannerStore']]);
        $this->middleware('permission:Event Information',['only' => ['eventInformation','eventInformationStore']]);
      
    }
    public function index()
    {
       $events=event::paginate(10);
       return view('admin.event.index')
       ->with('events',$events);
    }
    public function create()
    {
        return view('admin.event.create');
    }
    public function store(Request $request)
    {   
        try {  
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            if($request->image){   
                $start_date = $request->start_date;
                $date = new DateTime($start_date);
                $year = $date->format('Y');  
                $month = $date->format('m'); 
                $day = $date->format('d');  
                
                $count=eventdate::where('date',$start_date)->count();
              
                $eventdate = new eventdate();
                $eventdate->day = $day;
                $eventdate->month =$month;
                $eventdate->year =$year;
                $eventdate->date =$start_date;
                $eventdate->event_location =$request->event_location;
                $eventdate->event_type =$request->event_type;
                $eventdate->save();  
                
                $image = $request->image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

                $destinationPath = 'stallion/'.$currYr;
                $image->move($destinationPath,$fileName);

                //$id=eventdate::where('date',$start_date)->value('id');
                $event = new event();
                $event->image = $destinationPath.'/'.$fileName;
                $event->event_name = $request->event_name;
                $event->event_description = $request->event_description;
                $event->event_location = $request->event_location;
                $event->start_date = $request->start_date;
                $event->end_date = $request->end_date;
                $event->association_hosting_event = $request->association_hosting_event;
                // $event->event_link = $request->event_link;
                // $event->link_to_program = $request->link_to_program;
                // $event->facebook_link = $request->facebook_link;
             
                $event->link_to_nominate = $request->link_to_nominate;
                $event->mark_event_prestigious = $request->Prestigious; 
                $event->event_type = $request->event_type;   
                // $event->date_id=$id; 
                $event->save();   
                
                
                $linkNames = $request->linkname;
                $links = $request->link;
                
                foreach ($linkNames as $key => $linkName) {
                    $newLink = new link(); // Use a different variable name for the instance
                    $newLink->event_id = $event->id;
                    $newLink->link_name = $linkName;
                    $newLink->link = $links[$key]; // Access the corresponding link from the request
                    $newLink->save();
                }
                
               
               toast('Event create successfully!','success');
               return redirect('admin/event');
            }
                
        }   catch (\Exception $e) {
            
                     Alert::error('Error', 'Error Event create: ' . $e->getMessage());
                     return redirect()->back();
         }
    }
    public function edit($id)
    {
        $event=event::where('id',$id)->first();
        return view('admin.event.edit')
        ->with('event',$event);
    }
    public function update(Request $request)
    {    
        try {  
                $string = str_shuffle("abcdefghijklmnopqrstwxyz");
                $start_date = $request->start_date;
                $date = new DateTime($start_date);
                $year = $date->format('Y');  
                $month = $date->format('m'); 
                $day = $date->format('d');  

             
                $eventdate = eventdate::where('id',$request->id)->first(); 
                $eventdate->day = $day;
                $eventdate->month =$month;
                $eventdate->year =$year;
                $eventdate->date =$start_date;
                $eventdate->event_location =$request->event_location;
                $eventdate->event_type =$request->event_type;
                $eventdate->save();  
                
                if($request->image){
               
                $image = $request->image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();

                $destinationPath = 'event/'.$currYr;
                $image->move($destinationPath,$fileName);
                $event =  Event::where('id',$request->id)->first(); 
                $event->image = $destinationPath.'/'.$fileName;
                $event->save();  
                }
                $event =  Event::where('id',$request->id)->first(); 
                $event->event_name = $request->event_name;
                $event->event_description = $request->event_description;
                $event->event_location = $request->event_location;
                $event->start_date = $request->start_date;
                $event->end_date = $request->end_date;
                $event->association_hosting_event = $request->association_hosting_event;
                $event->event_link = $request->event_link;
                $event->link_to_program = $request->link_to_program;
                $event->facebook_link = $request->facebook_link;
                $event->facebook_link = $request->facebook_link;
                $event->link_to_nominate = $request->link_to_nominate;
                $event->mark_event_prestigious = $request->Prestigious; 
                $event->event_type = $request->event_type;   
                // $event->date_id=$id; 
                $event->save();        
               
               toast('Event create successfully!','success');
               return redirect('admin/event');
            
            
         }   catch (\Exception $e) {
                     Alert::error('Error', 'Error Event create: ' . $e->getMessage());
                     return redirect()->back();
         }
    }
    public function banner()
    {
         $banner=eventbanner::first();
         return view('admin.event.banner')
         ->with('banner',$banner);
    }
    public function bannerStore(Request $request)
    {
        try { 
            $string = str_shuffle("abcdefghijklmnopqrstwxyz");
            $count=eventbanner::count();
            if($count>0)
            {
                if($request->image){ 
                    $image = $request->image;
                    $randStr = substr($string, 0, 5);
                    $currYr = date("Y");
                    $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                    $destinationPath = 'banner/'.$currYr;
                    $image->move($destinationPath,$fileName);
                    $eventbanner = eventbanner::first();
                    $eventbanner->image = $destinationPath.'/'.$fileName;
                    $eventbanner->save();
                } 
                $eventbanner = eventbanner::first();
                $eventbanner->heading = $request->heading; 
                
                $eventbanner->save();
                toast('banner updated  successfully!','success');
                return back(); 
            }
            else
            {
                if($request->image){ 
                $image = $request->image;
                $randStr = substr($string, 0, 5);
                $currYr = date("Y");
                $fileName = time().'_'.$randStr.'.'.$image->getClientOriginalExtension();
                $destinationPath = 'banner/'.$currYr;
                $image->move($destinationPath,$fileName);
    
                $eventbanner = new eventbanner();
                $eventbanner->heading = $request->heading;  
                $eventbanner->image = $destinationPath.'/'.$fileName;
                $eventbanner->save(); 
                toast('banner created  successfully!','success');
                return back(); 
                }
                else
                {
                    Alert::error('Image required');
                    return back();
                }
            }
            }
            catch (\Exception $e){
                echo $e->getMessage();
                Alert::error('Error', 'Error banner create: ' . $e->getMessage());
                return back();
    
            }
    }
    public function eventInformation()
    {
        $information=eventinformation::first();
        return view('admin.event.information')
        ->with('information',$information);
    } 
    public function eventInformationStore(Request $request)
    {
        try { 
            $validatedData = $request->validate([
                'paragraph1' => 'required',
                'paragraph2' => 'required',        
            ]);
            $count=eventinformation::count();
            if($count>0)
            {
                
                $eventinformation = eventinformation::first();
                $eventinformation->paragraph1 = $request->paragraph1; 
                $eventinformation->paragraph2 = $request->paragraph2; 
                $eventinformation->heading1 = $request->heading1;
                $eventinformation->heading2 = $request->heading2;
                $eventinformation->save();
                toast('Event infomation  successfully!','success');
                return back(); 
            }
            else
            {
                $eventinformation = new eventinformation();
                $eventinformation->paragraph1 = $request->paragraph1; 
                $eventinformation->paragraph2 = $request->paragraph2;
                $eventinformation->heading1 = $request->heading1;
                $eventinformation->heading2 = $request->heading2; 
                $eventinformation->save(); 
                toast('Event infomation  successfully!','success');
                return back();                       
            }
            }
            catch (\Exception $e){
                Alert::error('Error', 'Error Event infomation create: ' . $e->getMessage());
                return back();
    
            }
    }
    public function eventSearch(Request $request)
    {
        $query = $request->get('query');  
        $events = event::where('event_name', 'like', '%' . $query . '%')
        ->orWhere('event_type', 'LIKE', "%$query%")
        ->get();
        return view('admin.event.partials.event_table', compact('events'));
    }
    public function delete($id)
    {
        $event = event::find($id);
        $event->delete();

        $eventdate = eventdate::find($id);
        $eventdate->delete();
        toast('Event delete successfully!','success');
        return back(); 
    }
    public function followedEvent()
    {
        $userId = Auth::id();
        $followevents=DB::table('followevents')
        ->where('userId',$userId)
        ->get();
        return view('admin.follow.event')
        ->with('followevents',$followevents);
    }

}
