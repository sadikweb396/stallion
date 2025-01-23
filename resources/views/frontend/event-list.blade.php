<style>
    .hidden 
    {
        display:none;
    }
    .featured_star_blank {
    font-size: 30px;
    font-weight: 400;
    cursor: pointer;
    color:black;
    position: absolute;
    bottom: 18px;
    right: 20px;
}

.pagination nav > div:first-child {
    display: flex;
    justify-content: space-evenly;
}
.pagination nav > div:first-child span, .pagination nav > div:first-child a {
    background-color: var(--white);
    color: black;
    padding: 8px 15px;
    border-radius: 5px;
    font-size: 17px;
    line-height: 20px;
    font-family: var(--font-poppins);
}
.follow-fetured{
  font-size: 30px;
  color: var(--white);
}
</style>
<section id="celender_slider_m" class="pdb100 calendar_event_m">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="calender_sub_head text-center">
              <h5>Every detail, every event, one place</h5>
            </div>
            <div class="calender_heading text-center mb20">
              <h3>Events calendar</h3>
            </div>
            <div class="calender_silder_m calender_events_m">
              <div id="Calender_events" class="calender_events_m">            
                @foreach($eventdates as $key=>$eventdate)
                @if ($key % 2 == 0)
                <div class="item_calender">
                  <div
                    class="calender_box d-flex align-items-center justify-content-center"
                  >
                    <div class="events_listing">
                    @if(Request::path()=='event/seach')
                    @php
                    $eventsQuery = DB::table('events')->where('start_date', $eventdate->date);

                    if ($zone) {
                      
                        $eventsQuery->where('zone', $zone);
                    }

                    if ($eventType) {
                        $eventsQuery->where('event_type', $eventType);
                    }

                    if ($state) {
                        $eventsQuery->where('state', $state);
                    }

                    $events = $eventsQuery->get();
                    @endphp
                    @else
                    @php
                    $events = DB::table('events')->where('start_date', $eventdate->date)->get();
                    @endphp
                    @endif
                      @foreach($events as $event)
                      <article
                        class="events_list_f d-flex align-items-center gap10 mb20"data-id="{{$event->id}}"
                      >
                        <div class="featured_img">
                        <img
                            src="{{url($event->image)}}"
                            alt="event list"
                            class="img-cover"
                          />
                          @auth
                          @php $count=DB::table('followevents')->where('eventId',$event->id)->where('userId',auth()->user()->id)->count(); @endphp
                          @if($count==1)
                          <div class="follow-fetured"id="follow-fetured{{$event->id}}">
                           ★
                          </div>
                          @else
                          <div class="follow-fetured"id="follow-fetured{{$event->id}}">
                             ☆
                          </div>
                          @endif
                          @else
                          <div class="follow-fetured">
                             ☆
                          </div>
                          @endauth
                        </div>
                        <div class="event_text">
                          <div class="event_title">
                            <h4>{{$event->event_name}} </h4>
                          </div>
                          <div class="event_p">
                            <p>
                              <span class="category_p"> {{$event->association_hosting_event}} </span>
                              <span class="icons_map">
                                <i class="fa-solid fa-location-dot"></i>
                              </span>
                              <span>
                                {{$event->address}}
                              </span>
                            </p>
                          </div>
                        </div>
                        <div class="unique">
                          @if($event->mark_event_prestigious)
                          <img
                            src="http://127.0.0.1:8000/assets/frontend/image/Rectangle 137.png"
                            alt="unique"
                            class="img-contain"
                          />
                          @endif
                        </div>
                      </article>
                      @endforeach                
                    </div>
                    <div class="calender_date_m">
                      <div class="calender_month">
                        @php
                          $monthNumber = $eventdate->month;
                        $monthName = \Carbon\Carbon::create()->month($eventdate->month)->format('F');@endphp  
                        {{$monthName}}
                      </div>
                      <div class="calender_date">{{$eventdate->day}}</div>
                    </div>
                    <div class="calender_year">
                      <p>{{$eventdate->year}}</p>
                    </div>
                  </div>
                </div>
                @else
                <div class="item_calender">
                  <div
                    class="calender_box d-flex align-items-center justify-content-center"
                  >
                    <div class="events_listing">
                    @if(Request::path()=='event/seach')
                    @php
                    $eventsQuery = DB::table('events')->where('start_date', $eventdate->date);

                    if ($zone) {
                        $eventsQuery->where('zone', $zone);
                    }

                    if ($eventType) {
                        $eventsQuery->where('event_type', $eventType);
                    }

                    if ($state) {
                        $eventsQuery->where('state', $state);
                    }

                    $events = $eventsQuery->get();
                    @endphp
                    @else
                    @php
                    $events = DB::table('events')->where('start_date', $eventdate->date)->get();
                    @endphp
                    @endif
                    @foreach($events as $key=>$event)
                      <article
                        class="events_list_f d-flex align-items-center gap10 mb20"data-id="{{$event->id}}"
                      >
                        <div class="featured_img">
                          <img
                            src="{{url($event->image)}}"
                            alt="event list"
                            class="img-cover"
                          />
                          <div class="follow-fetured"id="follow-fetured{{$event->id}}">
                            ☆
                          </div>
                        </div>
                        <div class="event_text">
                          <div class="event_title">
                             <h4>{{$event->event_name}}{{$event->id}}</h4>
                          </div>
                          <div class="event_p">
                            <p>
                            <span class="category_p"> {{$event->association_hosting_event}} </span>
                              <span class="icons_map">
                                <i class="fa-solid fa-location-dot"></i>
                              </span>
                              <span>
                              {{$event->address}}
                              </span>
                            </p>
                          </div>
                        </div>
                        <div class="unique">
                        @if($event->mark_event_prestigious)
                          <img
                            src="http://127.0.0.1:8000/assets/frontend/image/Rectangle 137.png"
                            alt="unique"
                            class="img-contain"
                          />
                        @endif
                        </div>
                      </article>
                      @endforeach
                    </div>
                    <div class="calender_date_m">
                      <div class="calender_month">
                        @php
                          $monthNumber = $eventdate->month;
                        $monthName = \Carbon\Carbon::create()->month($eventdate->month)->format('F');@endphp  
                        {{$monthName}}
                      </div>
                      <div class="calender_date">{{$eventdate->day}}</div>
                    </div>
                    <div class="calender_year">
                      <p>{{$eventdate->year}}</p>
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
              </div>
              <div class="popup_event_s d-none"id="eventpoup">
              @include('frontend.event-poup')
              </div>
            </div>
            <div class="calender_slider_btn text-center">
              <!-- <a href="javascript:void(0)" class="calender_btn btn_i"
                >View Events</a
              > -->
              <div class="pagination">
        
                @if($eventdates)
                    {{ $eventdates->links() }}  
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 


