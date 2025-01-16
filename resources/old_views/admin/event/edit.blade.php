@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Event Calender Page</h3>
                  </div>             
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">             
                    <div class="tab-content active" id="tab-1">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20">
                            <p class="text-center">Event Page</p>
                          </div>
                          <div class="stallions_d_form mb50">
                            <form action="{{route('admin.event.update')}}"method="post"id="myForm"enctype="multipart/form-data">
                                @csrf
                              <input type="hidden"name="id"value="{{$event->id}}">
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Event Name </label>
                                  <input type="text"name="event_name"value="{{$event->event_name}}">
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                   Event Description
                                  </label>
                                  <textarea name="event_description">{{$event->event_description}}</textarea>    
                                </div>

                                <div class="form-group">
                                  <label for="Performance">
                                   Event Type
                                  </label>
                                  <input type="text"name="event_type"value="{{$event->event_type}}">
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Event Location
                                  </label>
                                  <input type="text"name="event_location"value="{{$event->event_location}}"
                                  />
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                  <label for="Performance">
                                    Start Date
                                  </label>
                                  <input
                                    type="date"
                                    name="start_date"value="{{$event->start_date}}"
                                  />
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                  <label for="Performance">
                                    End Date
                                  </label>
                                  <input
                                    type="date"
                                    name="end_date"value="{{$event->end_date}}"
                                  />
                                </div>
                               </div>
                               </div>               
                                <div class="form-group">
                                  <label for="Performance">Association hosting event</label>
                                  <input
                                    type="text"
                                    name="association_hosting_event"value="{{$event->association_hosting_event}}"
                                  />
                                </div>                                               
                                <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                  <label for="Performance">
                                    Event Link
                                  </label>
                                  <input
                                    type="text"
                                    name="event_link"value="{{$event->event_link}}"
                                  />
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                  <label for="Performance">
                                    Link To Program
                                  </label>
                                  <input
                                    type="text"
                                    name="link_to_program"value="{{$event->link_to_program}}"
                                  />
                                </div>
                               </div>
                               </div>   
                               <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                  <label for="Performance">
                                    Facebook Link
                                  </label>
                                  <input
                                    type="text"
                                    name="facebook_link"value="{{$event->facebook_link}}"
                                  />
                                </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group">
                                  <label for="Performance">
                                    Link To Nominate
                                  </label>
                                  <input
                                    type="text"
                                    name="link_to_nominate"value="{{$event->link_to_nominate}}"
                                  />
                                </div>
                               </div>
                               </div>   
                               <div class="row">
                                <div class="col-md-1">
                                <div class="form-group">
                                <input type="checkbox"name="Prestigious"value="Prestigious"@if($event->mark_event_prestigious) checked @endif
                                />
                                </div>
                                </div>
                                <div class="col-md-4">
                                <div class="form-group">  
                                <label>
                                       Mark This event as Prestigious               
                                </label>
                                </div>
                                </div>
                               </div> 
                              </div>
                              <div class="photographerappend"id="photographerappend">
                              </div>
                               <div class="form-group">
                                 <label for="Performance">Image</label>
                                 <input type="file"name="image"/>
                                </div>
                              <div class="update_btn text-right mb50">
                               <button type="submit"class="btn btn_i black_btn">save</button>
                              </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div> 
            <!-- The Modal -->
@endsection          