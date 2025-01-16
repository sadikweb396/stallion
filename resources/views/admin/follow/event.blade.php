@extends('layouts.owner.app')
@section('content')

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
                            <div class="maque_badegs">
                                <marquee behavior="" direction="left"><a href="javascript:void(0)">Events</a></marquee>
                            </div>
                        </a>
                    </article>
                @endforeach
            </div>
        </div>
</div>

<div class="popup_event_s d-none" id="eventpoup">

  <div class="popup_event_s d-none d-flex">
                <div class="close_btn_p">
                  <i class="fa-solid fa-xmark"></i>
                </div>
                <div class="event-card">
                  <div class="event_f_i">
                    <img src="http://127.0.0.1:8000/stallion/2025/1736494101_lkqoz.png" alt="Event Image" class="img-cover">
                  </div>
                  <div class="event_details">
                    <div class="follow_btn">
                      <a class="follow-button btn btn_i black_btn" href="#">+ Follow</a>
                    </div>
                    <div class="event_badge">
                      <span class="icon">
                        <img src="http://127.0.0.1:8000/assets/frontend/image/Rectangle 137.png" alt="unique" class="img-contain">
                      </span>
                      <span>
                        <a href="#" class="btn btn_i black_btn">
                          Prestigious Event
                        </a>
                      </span>
                    </div>

                    <h2 class="mb20">Barkly Gold Rush Campdraft</h2>
                    <div class="events_inf mb20">
                      <p>
                        <span>
                          <strong>Association Hosting Event:</strong>
                        </span>
                        <span>ACA (Australian Campdraft Association)</span>
                      </p>
                      <p>
                        <span><strong>Event Location:</strong></span>
                        <span> Northern Territory Western Australia Zone </span>
                      </p>
                      <p>
                        <span><strong>Start Date:</strong> </span>
                        <span>10-03-3024</span>
                      </p>
                      <p>
                        <span> <strong>End Date:</strong> </span>
                        <span>10-06-3024</span>
                      </p>
                    </div>
                    <div class="events_btn">
                      <a href="#" class="btn btn_i black_btn link-program">Link To Program</a>
                      <a href="#" class="btn btn_i black_btn visit-facebook">Visit Facebook</a>
                    </div>
                  </div>
                </div>
  </div>
@push('scripts')
<script>
  $(document).on("click", ".events_list_f", function () {
    $(".popup_event_s").removeClass("d-none").addClass("d-flex");
  });

  $(document).on("click", ".close_btn_p", function () {
    $(".popup_event_s").removeClass("d-flex").addClass("d-none");
  });
</script>
@endpush
@endsection        