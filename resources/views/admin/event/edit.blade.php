@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
  <div class="our_stallions stallions_details">
    <div class="add_new_stallions">
      <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
        <div class="stallions_title">
          <h3>Event Calendar Page</h3>
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
                  <form action="{{route('admin.event.update')}}" method="post" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$event->id}}">
                    <div class="form_main">
                      <div class="form-group">
                        <label for="name">Event Name</label>
                        <input type="text" name="event_name" value="{{$event->event_name}}">
                      </div>
                      <div class="form-group">
                        <label for="Performance">Event Description</label>
                        <textarea name="event_description">{{$event->event_description}}</textarea>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="Performance">Event Type</label>
                            <input type="text"value="{{$event->event_type}}"name="event_type"/>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="Performance">Zone</label>
                            <input type="text"value="{{$event->zone}}"name="zone"/>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="Performance">State</label>
                          <input type="text"value="{{$event->state}}"name="state"/>
                        </div>
                       </div>
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="Performance">Website Link </label>
                          <input type="text"value="{{$event->websitelink}}"name="websitelink"/>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="Performance">Phone</label>
                              <input type="number"value="{{$event->phone}}"name="phone"/>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="Performance">Email</label>
                              <input type="email"value="{{$event->email}}"name="email"/>
                            </div>
                          </div>
                        
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="Performance">Start Date</label>
                              <input type="date"value="{{$event->start_date}}"name="start_date"/>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="Performance">End Date</label>
                              <input type="date"value="{{$event->end_date}}"name="end_date"/>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="Performance">Nomination Date</label>
                              <input type="date"value="{{$event->nomination_date}}"name="nomination_date"/>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="Performance">Contact</label>
                              <input type="text"value="{{$event->contact}}"name="contact"/>
                            </div>
                          </div>
                         
                        </div>
                        <div class="form-group">
                          <label for="Performance">Address</label>
                          <input type="text"value="{{$event->address}}"name="address"required/>
                        </div>
                      <div class="form-group">
                        <label for="Performance">Association Hosting Event</label>
                        <input type="text" name="association_hosting_event" value="{{$event->association_hosting_event}}">
                      </div>
                      <div class="form-group">
                        <label for="Performance">Image</label>
                        <input type="file" name="image">
                      </div>
                      <div class="row">
                        <div class="col-md-1">
                          <div class="form-group">
                            <input type="checkbox" name="Prestigious" value="Prestigious" @if($event->mark_event_prestigious) checked @endif>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Mark This Event as Prestigious</label>
                          </div>
                        </div>
                      </div> 
                        <div class="form-group">
                          <div id="dynamicInputContainer">
                            <div class="input-group">
                              <label for="name">Link</label>
                              @php
                              $links = DB::table('links')->where('event_id', $event->id)->get();
                              $linkmpty = DB::table('links')->where('event_id', $event->id)->first();
                              @endphp
                              @if(empty($linkmpty))
                              <input type="text" class="plan" name="linkname[]" placeholder="enter link name" style="width:95%;margin-top:10px;">
                              <button type="button" class="add-input">Add</button>
                              <input type="text" class="plan" name="link[]" placeholder="enter link" style="width:95%;margin-top:10px;">
                              @endif
                              @foreach($links as $key=>$link)
                              @if($key==0)
                              <input type="text" class="plan" name="linkname[]" value="{{$link->event_name}}" placeholder="enter link name" style="width:95%;margin-top:10px;">
                              <button type="button" class="add-input">Add</button>
                              <input type="text" class="plan" name="link[]" value="{{$link->event_link}}" placeholder="enter link" style="width:95%;margin-top:10px;">
                              @else
                              <input type="text" class="plan-{{$key}}" name="linkname[]" value="{{$link->event_name}}" placeholder="enter link name" style="width:95%;margin-top:10px;">
                              <input type="text" class="plan-{{$key}}" name="link[]" value="{{$link->event_link}}" placeholder="enter link" style="width:95%;margin-top:10px;">
                              <button type="button" class="remove-input-{{$key}}"><i class="fa-solid fa-xmark"></i></button>
                              @endif
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                   
                    <div class="update_btn text-right mb50">
                      <button type="submit" class="btn btn_i black_btn">Save</button>
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
@push('scripts')
<script>
  $(document).ready(function () {
    $('#dynamicInputContainer').on('click', '.add-input', function () {
      const newInputGroup = `
        <div class="input-group">
          <input type="text" class="plan" name="linkname[]" placeholder="enter link name" style="width:95%;margin-top:10px;">
          <input type="text" class="plan" name="link[]" placeholder="enter link" style="width:95%;margin-top:10px;">
          <button type="button" class="remove-input"><i class="fa-solid fa-xmark"></i></button>
        </div>`;
      $('#dynamicInputContainer').append(newInputGroup);
    });

    @foreach($links as $key=>$link)
    $(document).on('click', '.remove-input-{{$key}}', function () {
      $('.plan-{{$key}}').remove();
      $('.remove-input-{{$key}}').remove();
    });
    @endforeach

    $('#dynamicInputContainer').on('click', '.remove-input', function () {
      $(this).closest('.input-group').remove();
    });
  });
</script>
@endpush
@endsection