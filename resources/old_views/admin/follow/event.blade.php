@extends('layouts.owner.app')
@section('content')
<style>
.popup_event_s {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #00000083;
    z-index: 9999;
    justify-content: center;
    flex-direction: column;
    padding: 20px;
}
</style>
<div class="dash_body_inner">
    <div class="our_stallions stallions_details">
        <div class="main_fllowed d-flex align-items-center gap20 flexwrap mb20">
                @foreach ($followevents as $followevent)    
                   @php $event=DB::table('events')->where('id',$followevent->eventId)->first(); @endphp   
                    <article class="Fllowed_list background-img d-flex align-items-center justify-content-center" 
                             style="background-image: url(@if($event){{ url($event->image) }} @else {{ asset('images/default-image.jpg') }} @endif);">
                        <a href="javascript:void(0)">
                            <div class="list_info_m text-center">
                                <h3 class="mb20">{{ $event->event_name }}</h3>
                                <p class="mb20">
                                    <span>Status:</span>
                                    <span class="dynamic_data"></span>
                                </p>
                                <p class="mb20">
                                    <span>Event Type: {{$event->event_type}}</span>
                                    <span class="dynamic_data"></span>
                                </p>
                                <div class="list_link">
                                    <a href="javascript:void(0)" class="btn btn_i events_list_f">View Event</a>
                                </div>
                            </div>
                            <div class="category_badegs">
                                <p>
                                    <a href="javascript:void(0)">Events</a>
                                </p>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
</div>
<div class="popup_event_s d-none"id="eventpoup">
<div class="close_btn_p">
                  <i class="fa-solid fa-xmark"></i>
</div>
<div class="event-card">
    <div class="event_f_i">
        <img src=""alt="Event Image" class="img-cover"/>
    </div>
    <div class="event_details">
        <div class="follow_btn">
      
        </div>
        <div class="event_badge">
          <span class="icon">
           
              <img src="http://127.0.0.1:8000/assets/frontend/image/Rectangle 137.png"alt="unique"class="img-contain"/>
          
          </span>
          <span>
              <a href="#" class="btn btn_i black_btn">
                Prestigious Event
              </a>
          </span>
        </div>
        <h2 class="mb20"></h2>
        <div class="events_inf mb20">
          <p>
            <span><strong>Association Hosting Event:</strong></span>
            <span></span>
          </p>
                      <p>
                        <span><strong>Event Location:</strong></span>
                        <span></span>
                      </p>
                      <p>
                        <span><strong>Start Date:</strong> </span>
                        <span></span>
                      </p>
                      <p>
                        <span> <strong>End Date:</strong> </span>
                        <span></span>
                      </p>
                    </div>

                    <div class="events_btn">
                      <a href="" class="btn btn_i black_btn link-program"
                        >Link To Program </a
                      >
                      <a href="" class="btn btn_i black_btn visit-facebook"
                        >Visit Facebook</a
                      >
                    </div>
                  </div>
</div>
</div>
@push('scripts')
<script>
    $(document).on("click", ".events_list_f", function () {
     $(".popup_event_s").addClass("d-flex");
    });
</script>
@endpush
@endsection           