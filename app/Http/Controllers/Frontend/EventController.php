<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\eventdate;
use App\Models\event;
use App\Models\followevent;
use App\Models\eventbanner;
use App\Models\eventinformation;
use App\Models\advertisement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
     public function event(Request $request)
     {
         $query = eventdate::orderBy('date', 'desc');
         $eventdates = $query->select('year','month','day','date')->distinct()->paginate(1);
         $eventcount = $query->select('day')->distinct('day')->count();
  
      //   $eventdates = Eventdate::orderBy('date','desc')->paginate(1);
        if ($request->ajax()) {
         $query = eventdate::orderBy('date','desc');
         $eventdates = $query->select('year','month','day','date')->distinct()->paginate(1);
         return view('frontend.event-list')
        ->with('eventdates',$eventdates);
       }
   
       $eventbanner=eventbanner::first();
       $advertisements=advertisement::select('image','link')->where('page','event')->get();
       $eventinformation=eventinformation::first();
       return view('frontend.event')
       ->with('eventcount',$eventcount)
       ->with('eventbanner',$eventbanner)
       ->with('eventinformation',$eventinformation)
       ->with('advertisements',$advertisements)
       ->with('eventdates',$eventdates);
     }
     public function eventDay($day)
     {
         $eventdates=eventdate::where('day',$day)->paginate(1);
         $eventbanner=eventbanner::first();
         $advertisements=advertisement::select('image','link')->where('page','event')->get();
         $eventinformation=eventinformation::first();
         $eventcount=1;
         return view('frontend.event')
         ->with('eventcount',$eventcount)
         ->with('eventbanner',$eventbanner)
         ->with('eventinformation',$eventinformation)
         ->with('advertisements',$advertisements)
         ->with('eventdates',$eventdates);
     }
     public function searchEvent(Request $request)
     {
         $month = $request->month;
         $year = $request->year;
         $eventLocation = $request->event_location;
         $eventType = $request->event_type;

         if ($request->ajax()) {
            $query = eventdate::orderBy('date', 'desc');
          
            if ($month) {    
               $query->where('month', $month);         
            }

            if ($year){          
               $query->where('year', $year);     
            }

            if ($eventType) {
                  $query->where('event_type', $eventType);
            }
            
            if ($eventLocation) {
               $query->where('event_location', $eventLocation);
            }

            $eventdates = $query->select('year','month','day','date')->distinct()->paginate(1);

            return view('frontend.event-list')
               ->with('month', $month)
               ->with('year', $year)
               ->with('eventLocation',$eventLocation)
               ->with('eventType',$eventType)
               ->with('eventdates', $eventdates);
            }
            $query = eventdate::orderBy('date', 'desc');    
            if ($month) {    
               $query->where('month', $month);         
            }
            if ($year){          
               $query->where('year', $year);     
            }
            if ($eventType) {
                  $query->where('event_type', $eventType);
            }        
            if ($eventLocation) {
               $query->where('event_location', $eventLocation);
            }
            $eventcounts = $query->select('year','month','day','date')->distinct()->get();  
            $eventdates = $query->select('month','day','date','year')->distinct()->paginate(1);
            $eventcount=$eventcounts->count();

            $eventbanner=eventbanner::first();
            $advertisements=advertisement::select('image','link')->where('page','event')->get();
            $eventinformation=eventinformation::first();
         
            return view('frontend.event')
               ->with('month', $month)
               ->with('year', $year)
               ->with('eventLocation',$eventLocation)
               ->with('eventType',$eventType)
               ->with('eventcount',$eventcount)
               ->with('eventdates', $eventdates)
               ->with('eventbanner',$eventbanner)
               ->with('eventinformation',$eventinformation)
               ->with('advertisements',$advertisements);
   }
   public function eventPoup(Request $request)
   {
      $event=event::where('id',$request->eventId)->first();
      return view('frontend.event-poup')
      ->with('event',$event);
   }
   public function follow(Request $request)
   { 
    
      $followevent = new followevent();
      $followevent->userId=Auth::id();
      $followevent->eventId=$request->eventId;
      $followevent->save();

      return response()->json([
         'success' => true,
         'message' => 'You are now following this event!',
         'action' => 'unfollow', 
     ]);
   }
   public function unfollow(Request $request)
   {
      $unfollow = followevent::where('eventId',$request->eventId)->where('userId',Auth::id())
      ->delete();

       return response()->json([
           'success' => true,
           'message' => 'You have unfollowed this event.',
           'action' => '+ Follow',  
       ]);
   }
     
}
 