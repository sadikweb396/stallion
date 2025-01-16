@extends('layouts.frontend.app')
@section('content')
    <!-- banner section -->
    <section
      class="hero_banner_m d-flex align-items-center stallions-banner"
      style="background-image: url(@if($stalliondetails){{ $stalliondetails->banner_image }} @endif);" >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero_banner_i">
              <div class="banner_heading-m text-center mb20">
                <h1>@if($stalliondetails){{$stalliondetails->banner_heading}}@endif</h1>
              </div>
              <div class="para_banner text-center">
                <p>
                @if($stalliondetails){{$stalliondetails->banner_pargaraph}}@endif
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section end-->
    <!-- Category Slider start -->
    <section
      id="categorySlider"
      class="pdb100 categorySlider stallion-category"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="stallions_heading text-center">
              <h2>New EMINENT</h2>
            </div>
            <div id="catslider" class="catslider owl-carousel owl-theme">
                   @foreach($featureStatus as $stallion)
                    @php
                    $stallionImage = $stallion->stallionImages->firstWhere('new_element', 1) ?? 
                        $stallion->stallionImages->first();
                    @endphp
                    @if($stallionImage)
              <div class="item">
                <a href="{{ url('single-stallion', $stallion->slug) }}">
                  <div
                    class="catimg d-flex align-items-end justify-content-center"
                    style="background-image: url({{ $stallionImage->stallion_image }});">
                    <div class="cattitle">
                      <p>{{ $stallion->name }}</p>
                    </div>
                  </div>
                </a>
              </div>
              @endif
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Category end -->
    <!-- simple info section start -->
    <section class="about_stallions pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="about_stallion_m">
              <div class="about_stallion_heading text-center mb20">
                <h2>@if($stalliondetails){{$stalliondetails->heading1}}@endif</h2>
              </div>
              <div class="about_stallions_para text-center mb20">
                <p>
                @if($stalliondetails){!!$stalliondetails->paragraph1!!}@endif
                </p>
              </div>
              <div class="about_stallions_btn text-center">
                <a href="{{ $baseUrl = url('/') . '#plans_pricing'; }}" class="btn_i about_stallion_btn"
                  >Get Started</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <div id="user-list">
  @include('frontend.stallionlist')
  </div>
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
   
    <!-- simple info section start -->
    <section class="about_stallions pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="about_stallion_m">
              <div class="about_stallion_heading text-center mb20">
              <h2>@if($stalliondetails){{$stalliondetails->heading1}}@endif</h2>
              </div>
              <div class="about_stallions_para text-center mb20">
                <p>
                @if($stalliondetails){!!$stalliondetails->paragraph2!!}@endif
                </p>
              </div>
              <div class="about_stallions_btn text-center">
                <a href="{{ $baseUrl = url('/') . '#plans_pricing'; }}" class="btn_i about_stallion_btn"
                  >Get Started
                  </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- info section end -->

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
              <form action="{{route('gettouch-store')}}"method="post">
                  @csrf
                  <div class="main_groups d-flex gap20">
                    <div class="group_fields">
                      <label for="fname"
                        ><span class="visually-hidden">First name:</span></label
                      >
                      <input
                        type="text"
                        id="fname"
                        name="fname"
                        placeholder="Your Name"required
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
                        placeholder="Your Phone"required
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
                        placeholder="Your Email"required
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
                        name="message"
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
    @push('scripts')  
     <script>
      $(document).ready(function() {
            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1]; 
                fetchUsers(page);
            });
            function fetchUsers(page) {
              
                $.ajax({
                    url: '/stallions?page=' + page,
                    type: 'GET',
                    success: function(data) {
                   
                        $('#user-list').html(data); 
                    }
                });
            }
        });
        $("body").on('click','.follow-button',function(){
        var stallionId =  $(this).attr('data'); 
        var button = $(this);
        var action = button.text().trim().toLowerCase();    
        $.ajax({
            url: '/stallions-follow',
            type:'Get',
            data:{
              stallionId:stallionId,
            },
            success: function(response) {
            if (response.success) {
            button.text('★'); 
            button.toggleClass('follow-button unfollow-button');  
            }
          }
        });
      })

      $("body").on('click','.unfollow-button',function(){
        var stallionId =  $(this).attr('data'); 
        var button = $(this);
        var action = button.text().trim().toLowerCase();    
        $.ajax({
            url: '/stallions-unfollow',
            type:'Get',
            data:{
              stallionId:stallionId,
            },
            success: function(response) {
            if (response.success) {
            button.text('☆'); 
            button.toggleClass('follow-button unfollow-button');  
            }
          }
        });
      })
    </script>
@endpush
@endsection