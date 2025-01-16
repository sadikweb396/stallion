

<div class="close_btn_p">
                  <i class="fa-solid fa-xmark"></i>
</div>
<div class="event-card">
    <div class="event_f_i">
        <img src="{{url($event->image)}}"alt="Event Image" class="img-cover"/>
    </div>
    <div class="event_details">
        <div class="follow_btn">
        @auth
           @php $count=DB::table('followevents')->where('eventId',$event->id)->where('userId',auth()->user()->id)->count(); @endphp
           @if($count==1)
            <a class="unfollow-button btn btn_i black_btn"data="{{$event->id}}" href="javascript:void(0)"> Unfollow </a>
           @else
           <a class="follow-button btn btn_i black_btn"data="{{$event->id}}" href="javascript:void(0)">+ Follow </a>
           @endif
        @else
        <a class="follow-button btn btn_i black_btn"id="featured_stallions"data="{{$event->id}}" href="javascript:void(0)">+ Follow </a>
        @endauth
        </div>
        <div class="event_badge">
          <span class="icon">
            @if($event->mark_event_prestigious)
              <img src="http://127.0.0.1:8000/assets/frontend/image/Rectangle 137.png"alt="unique"class="img-contain"/>
            @endif
          </span>
          @if($event->mark_event_prestigious)
          <span>
              <a href="#" class="btn btn_i black_btn">
                Prestigious Event
              </a>
          </span>
          @endif
        </div>
        <h2 class="mb20">{{$event->event_name}}</h2>
        <div class="events_inf mb20">
          <p>
            <span><strong>Association Hosting Event:</strong></span>
            <span>{{$event->association_hosting_event}}</span>
          </p>
                      <p>
                        <span><strong>Event Location:</strong></span>
                        <span>{{$event->event_location}}</span>
                      </p>
                      <p>
                        <span><strong>Start Date:</strong> </span>
                        <span>{{$event->start_date}}</span>
                      </p>
                      <p>
                        <span> <strong>End Date:</strong> </span>
                        <span>{{$event->end_date}}</span>
                      </p>
                    </div>
                    @php $links=DB::table('links')->where('event_id',$event->id)->get(); @endphp
                    <div class="events_btn">
                       @foreach($links as $link)
                      <a href="{{url($link->link)}}" class="btn btn_i black_btn link-program"
                        >{{$link->link_name}}</a
                      >
                      @endforeach
                      
                    </div>
                  </div>
</div>
