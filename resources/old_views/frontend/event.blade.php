@extends('layouts.frontend.app')
@section('content')
    <!-- header end -->
    <!-- banner section -->
    <section 
      class="hero_banner_m d-flex align-items-center stallions-banner hero_calender"
      style="background-image: url(@if($eventbanner){{url( $eventbanner->image) }} @endif);" >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero_banner_i">
              <div class="banner_heading-m text-center mb50">
                <h1>@if($eventbanner){{ $eventbanner->heading }} @endif</h1>
              </div>
              <div class="search_filter_m">
                <div class="search_filter_i">
                  <form action="{{route('event.search')}}"method="POST">
                    @csrf
                    <div
                      class="search-bar-wrapper d-flex align-items-center justify-space-between"
                    >
                      <div class="form-group">
                        <select class="dropdown-event-type"name="event_type">
                          <option value="">Select Event Type</option>
                          @php $eventTypes=DB::table('eventdates')->select('event_type')->distinct()->get(); @endphp
                          @foreach($eventTypes as $eventTypes)
                          @if(Request::path()=='event/seach')
                          <option value="{{ $eventTypes->event_type }}" 
                              @if($eventType == $eventTypes->event_type) selected @endif>
                              {{ $eventTypes->event_type }}
                          </option>
                          @else
                          <option value="{{$eventTypes->event_type}}">{{$eventTypes->event_type}}</option>
                          @endif
                          @endforeach      
                        </select>
                      </div>
                      <div class="form-group">
                        <select class="dropdown-location"name="event_location">

                          <option value="">Select Location</option>
                          @php $locations=DB::table('eventdates')->select('event_location')->distinct()->get(); @endphp
                          @foreach($locations as $location)
                          @if(Request::path()=='event/seach')
                          <option value="{{ $location->event_location }}" 
                              @if($eventLocation == $location->event_location) selected @endif>
                              {{ $location->event_location }}
                          </option>
                         @else
                          <option value="{{ $location->event_location }}">
                              {{ $location->event_location }}
                          </option>
                          @endif
                          @endforeach
                         
                        </select>
                      </div>
                      <div class="form-group">
                        <select class="dropdown-month"name="month">
                          <option value="">Select Month</option>
                          <option value="01">January</option>
                          <option value="02">February</option>
                          <option value="03">March</option>
                          <option value="12">December</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <select class="dropdown-year"name="year">
                          <option value="">Select Year</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                          <option value="2024">2024</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <button class="search-button btn btn_i">Search</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section end-->
    <!-- calender slider start -->
    <div id="user-list">
      @include('frontend.event-list')
    </div>
    <!-- calender end -->
    <!-- section for advertisements start-->
    <section
      id="categorySlider"
      class="advertisement_sec background-img categorySlider"
    >
      <div class="container_fluid">
        <div class="row">
          <div class="col-lg-12">
            <div
              id="catslider_Adver"
              class="catslider_listing catslider owl-carousel owl-theme"
            >
            @foreach($advertisements as $advertisement)
              <div class="item">
                <a href="{{url($advertisement->link)}}"target="_blank">
                  <div
                    class="catimg d-flex align-items-end justify-content-center"
                    style="background-image: url({{$advertisement->image }});" >
                  </div>
                </a>
              </div>  
            @endforeach 
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- section for advertisements end-->
    <!-- Policies Start -->
    <section class="about_stallions pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="about_stallion_m">
              <div class="about_stallion_heading text-center mb20">
                <h2>@if($eventinformation){{$eventinformation->heading1}}@endif</h2>
              </div>
              <div class="about_stallions_para text-center mb20">
                <h3 class="mb20">@if($eventinformation){{$eventinformation->heading2}}@endif </h3>
                @if($eventinformation){!!$eventinformation->paragraph1!!}@endif
              </div>
              <div class="about_stallions_para text-center mb20">
                <h3 class="mb20">Progeny Sales</h3>
                @if($eventinformation){!! $eventinformation->paragraph2 !!}@endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end -->

    <!-- Get in touch start -->
    <section id="get_touch_m">
      <div class="container-fluid no-padding ">
        <div class="row">
        <div class="col-lg-6">
            <div
              class="get_touch_bg d-flex justify-content-center"
              style="background-image: url('{{ asset('assets/frontend/image/Rectangle 21.png') }}"
            >
              <div class="get_touch_logo">
                <img
                  src="{{ asset('assets/frontend/image/2__2_-removebg-preview.png') }}"
                  alt="get in touch logo"
                  class="img-contain"
                />
              </div>
            </div>
          </div>
          <div class="col-lg-6 d-flex align-items-center">
            <div class="get_touch_form_m">
              <div class="get_touch_sub">
                <h5>Contact Us</h5>
              </div>
              <div class="get_touch_heading mb20">
                <h3>Get In Touch</h3>
              </div>
              <div class="forms_main">
                <form action="#">
                  <div class="main_groups d-flex gap20">
                    <div class="group_fields">
                      <label for="fname"
                        ><span class="visually-hidden">First name:</span></label
                      >
                      <input
                        type="text"
                        id="fname"
                        name="fname"
                        placeholder="Your Name"
                      />
                    </div>
                    <div class="group_fields">
                      <label for="Yphone"
                        ><span class="visually-hidden">Your Phone</span></label
                      >
                      <input
                        type="phone"
                        id="phone"
                        name="phone"
                        placeholder="Your Phone"
                      />
                    </div>
                  </div>
                  <div class="main_groups">
                    <div class="group_fields">
                      <label for="Youremail"
                        ><span class="visually-hidden">Your Email</span></label
                      >
                      <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Your Email"
                      />
                    </div>
                  </div>

                  <div class="main_groups">
                    <div class="group_fields">
                      <label for="textarea"
                        ><span class="visually-hidden"
                          >Enter Your Message</span
                        ></label
                      >
                      <textarea
                        id="w3review"
                        name="w3review"
                        rows="4"
                        cols="48"
                        placeholder="Enter Your Message"
                      ></textarea>
                    </div>
                  </div>
                  <div class="main_groups">
                    <input
                      type="submit"
                      value="Submit"
                      class="submit_bttn btn_i"
                    />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- get in touch end -->
@push('scripts')
<script>
$(document).ready(function(){
var month=<?php echo session()->get('month'); ?>;
var year=<?php echo session()->get('year'); ?>;
$(document).on('click','.nextpagination', function(e){
    e.preventDefault();
button='next'
var url='events';
    $.ajax({
           url: url,
           type: 'Get',
           data: {      
             month:month,
             year:year, 
             button:'next'     
         },
            success: function(data) {
            $('#user-list').html(data); 
           },
           error: function(xhr, status, error) {
               console.error("Error: " + error); 
           }
       });  
 });
 });
</script>

@if(Request::path()=='event/seach')
<script>
$(document).ready(function() {
var csrfToken = $('meta[name="csrf-token"]').attr('content');
var year = <?php echo json_encode($year); ?>;
var month = <?php echo json_encode($month); ?>;
var eventLocation = <?php echo json_encode($eventLocation); ?>;
var eventLocation = <?php echo json_encode($eventLocation); ?>;
var eventType=<?php echo json_encode($eventType); ?>;
var eventcount=<?php echo json_encode($eventcount); ?>;
var eventcount=eventcount+1;
$(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    var page = $(this).attr('href').split('page=')[1]; 
    if(page==eventcount)
    {
      var page=<?php echo json_encode($eventcount); ?>;
    }
    fetchUsers(page);
});
function fetchUsers(page) {
    $.ajax({
        url: '/event/seach/?page=' + page, 
        type: 'POST',
        data: {
            _token: csrfToken, 
            year: year,         
            month: month,  
            event_location: eventLocation,
            event_type: eventType    
        },
        success: function(data) {
            $('#user-list').html(data); 
        },
        error: function(xhr, status, error) {
            console.error("Error: " + error); 
        }
    });
}
});

$("body").on('click','.follow-button', function() {
  var eventId =  $(this).attr('data'); 
  var followId='follow-fetured'+eventId;
  var button = $(this);
  var action = button.text().trim().toLowerCase();
  var baseUrl = window.location.origin;
  var url = baseUrl + '/follow'; 
  $.ajax({
      url: url,
      type:'Get',
      data:{
        eventId:eventId,
      },
      success: function(response) {
      if (response.success) {
      button.text(response.action.charAt(0).toUpperCase() + response.action.slice(1)); 
      document.querySelector('#' + followId).textContent = '★';
      button.toggleClass('follow-button unfollow-button');  
      button.next('.message').text(response.message);  
      }
    }
  });

})

$("body").on('click','.unfollow-button',function(){
  var eventId =  $(this).attr('data'); 
  var followId='follow-fetured'+eventId;
  var button = $(this);
  var action = button.text().trim().toLowerCase();
  var baseUrl = window.location.origin;
  var url = baseUrl + '/unfollow'; 
  $.ajax({
      url: url,
      type:'Get',
      data:{
        eventId:eventId,
      },
      success: function(response) {
      if (response.success) {
      button.text(response.action.charAt(0).toUpperCase() + response.action.slice(1)); 
      document.querySelector('#' + followId).textContent = '☆';
      button.toggleClass('follow-button unfollow-button');  
      button.next('.message').text(response.message);  
      }
    }
  });
})

   
  //   $(document).ready(function() {
    
  //   $('.pagination .relative.inline-flex.items-center.px-4.py-2.text-sm.font-medium.text-gray-500.bg-white.border.border-gray-300.cursor-default.leading-5.rounded-md.dark\\:text-gray-600.dark\\:bg-gray-800.dark\\:border-gray-600').text('Go Back');

   
  //   $('.pagination a.relative.inline-flex.items-center.px-4.py-2.ml-3.text-sm.font-medium.text-gray-700.bg-white.border.border-gray-300.leading-5.rounded-md.hover\\:text-gray-500').text('Proceed');
  //  });

 
  </script>
@else
<script>
$(document).ready(function(){
var eventcount=<?php echo json_encode($eventcount); ?>;
var eventcount=eventcount+1;
$(document).on('click','.pagination a', function(e) {
      e.preventDefault();
      var page = $(this).attr('href').split('page=')[1]; 
      
      // if(page==eventcount)
      // {
      //   var page=eventcount;
       
      // }
      fetchUsers(page);
  });

  function fetchUsers(page) {
      $.ajax({
          url: '/events/?page=' + page,
          type: 'Get',
         
          success: function(data) {
              $('#user-list').html(data); 
          },
          error: function(xhr, status, error) {
              console.error("Error: " + error); 
          }
      });
  }
});
$("body").on('click', '[data-id]', function() {
var eventId =  $(this).data('id');
$.ajax({
          url: '/event-poup',
          type: 'Get',
          data: {
            eventId: eventId,     
        },      
          success: function(data) {
              $('#eventpoup').html(data); 
          },
          error: function(xhr, status, error) {
              console.error("Error: " + error); 
          }
      });
});
$("body").on('click','.follow-button', function() {
  var eventId =  $(this).attr('data'); 
  var followId='follow-fetured'+eventId;
  var button = $(this);
  var action = button.text().trim().toLowerCase();
  var url = action === '+ follow' ? 'follow' : 'unfollow';
  $.ajax({
      url: url,
      type:'Get',
      data:{
        eventId:eventId,
      },
      success: function(response) {
      if (response.success) {
      button.text(response.action.charAt(0).toUpperCase() + response.action.slice(1)); 
      document.querySelector('#' + followId).textContent = '★';
      button.toggleClass('follow-button unfollow-button');  
      button.next('.message').text(response.message);  
      }
    }
  });

})

$("body").on('click','.unfollow-button',function(){
  var eventId =  $(this).attr('data'); 
  var followId='follow-fetured'+eventId;
  var button = $(this);
  var action = button.text().trim().toLowerCase();
  var url = action === '+ follow' ? 'follow' : 'unfollow';
  $.ajax({
      url: url,
      type:'Get',
      data:{
        eventId:eventId,
      },
      success: function(response) {
      if (response.success) {
      button.text(response.action.charAt(0).toUpperCase() + response.action.slice(1)); 
      document.querySelector('#' + followId).textContent = '☆';
      button.toggleClass('follow-button unfollow-button');  
      button.next('.message').text(response.message);  
      }
    }
  });
})
</script>
@endif
@endpush
@endsection