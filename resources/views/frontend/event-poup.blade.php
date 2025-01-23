<div class="close_btn_p">
    <i class="fa-solid fa-xmark"></i>
</div>

@if(!empty($event))
    <div class="event-card">
        <div class="event_f_i">
        @if(!empty($event->image))
            <img src="{{ url($event->image) }}" alt="Event Image" class="img-cover" />
        @endif
        </div>
        <div class="event_details">
            <div class="follow_btn">
                @auth
                    @php $count = DB::table('followevents')->where('eventId', $event->id)->where('userId', auth()->user()->id)->count(); @endphp
                    @if($count == 1)
                        <a class="unfollow-button btn btn_i black_btn" data="{{ $event->id }}" href="javascript:void(0)"> Unfollow </a>
                    @else
                        <a class="follow-button btn btn_i black_btn" data="{{ $event->id }}" href="javascript:void(0)">+ Follow </a>
                    @endif
                @else
                    <a class="follow-button btn btn_i black_btn" id="featured_stallions" data="{{ $event->id }}" href="javascript:void(0)">+ Follow </a>
                @endauth
            </div>
            <div class="event_badge">
                <span class="icon">
                    @if($event->mark_event_prestigious)
                        <img src="{{ url('/assets/frontend/image/Rectangle 137.png') }}" alt="unique" class="img-contain" />
                    @endif
                </span>
                @if($event->mark_event_prestigious)
                    <span>
                        <a href="#" class="btn btn_i black_btn">Prestigious Event</a>
                    </span>
                @endif
            </div>
            <h2 class="mb20">{{ $event->event_name }}</h2>
            <div class="events_inf mb20">
                @if(!empty($event->association_hosting_event))
                <p>
                    <span><strong>Association Hosting Event:</strong></span>
                    <span>{{ $event->association_hosting_event }}</span>
                </p>
                @endif
                @if(!empty($event->address))
                <p>
                    <span><strong>Event Address:</strong></span>
                    <span>{{ $event->address }}</span>
                </p>
                @endif
                @if(!empty($event->start_date))
                <p>
                    <span><strong>Start Date:</strong></span>
                    <span>{{ $event->start_date }}</span>
                </p>
                @endif
                @if(!empty($event->end_date))
                <p>
                    <span><strong>End Date:</strong></span>
                    <span>{{ $event->end_date }}</span>
                </p>
                @endif
                @if(!empty($event->nomination_date))
                <p>
                    <span><strong>Nomination Date:</strong></span>
                    <span>{{ $event->nomination_date }}</span>
                </p>
                @endif
                @if(!empty($event->contact))
                <p>
                    <span><strong>Contact:</strong></span>
                    <span>{{ $event->contact }}</span>
                </p>
                @endif
                @if(!empty($event->phone))
                <p>
                    <span><strong>Phone:</strong></span> 
                    <span>{{ $event->phone }}</span>
                </p>
                @endif
                @if(!empty($event->email))
                <p>
                    <span><strong>Email:</strong></span>
                    <span>{{ $event->email }}</span>
                </p>
                @endif
                @if(!empty($event->zone))
                <p>
                    <span><strong>Zone:</strong></span>
                    <span>{{ $event->zone }}</span>
                </p>
                @endif
                @if(!empty($event->state))
                <p>
                    <span><strong>State:</strong></span>
                    <span>{{ $event->state }}</span>
                </p>
                @endif
            
            </div>
          
            @php $links = DB::table('links')->where('event_id', $event->id)->get(); @endphp
            <div class="events_btn">
            @if(!empty($event->websitelink))
              <a href="{{ url($event->websitelink) }}" class="btn btn_i black_btn link-program">Website Link</a>
            @endif
                @foreach($links as $link)
                    @if(!empty($link->event_link))
                        <a href="{{ url($link->event_link) }}" class="btn btn_i black_btn link-program">{{ $link->event_name }}</a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endif
