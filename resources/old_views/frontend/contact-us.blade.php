
@extends('layouts.frontend.app')
@section('content')
   <!-- banner section -->
   <section
      class="hero_banner_m d-flex align-items-center stallions-banner"
      style="background-image: url(@if($banner){{ $banner->image }} @endif);" >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero_banner_i">
              <div class="banner_heading-m text-center mb20">
                <h1>@if($banner){{ $banner->heading }} @endif</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section end-->
    <!-- contact Listing -->
    <section class="our_services_main pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="our_services_i">
              <div
                class="our_servuce_box_m d-flex align-items-center gap20 flexwrap mb50"
              >
                <div class="main_box">
                  <div class="advertisements_main">
                    <div class="adv_inner_content text-center">
                      <div class="service_icon mb20">
                        <i class="fa-regular fa-gem"></i>
                      </div>
                      <div class="heading_text">
                        <h4>Address</h4>
                      </div>
                      <div class="para_text mb20">
                        <p>
                         @if($contactdetails){{$contactdetails->address}}@endif
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="main_box">
                  <div class="advertisements_main">
                    <div class="adv_inner_content text-center">
                      <div class="service_icon mb20">
                        <i class="fa-regular fa-gem"></i>
                      </div>
                      <div class="heading_text">
                        <h4>Email</h4>
                      </div>
                      <div class="para_text mb20">
                        <p>
                          @if($contactdetails){{$contactdetails->email}}@endif
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="main_box">
                  <div class="advertisements_main">
                    <div class="adv_inner_content text-center">
                      <div class="service_icon mb20">
                        <i class="fa-regular fa-gem"></i>
                      </div>
                      <div class="heading_text">
                        <h4>Phone</h4>
                      </div>
                      <div class="para_text mb20">
                        <p>
                          @if($contactdetails){{$contactdetails->phone}}@endif
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end -->

    <!-- map start -->
    <section id="contact_m">
      <div class="container-fluid no-padding hidden">
        <div class="row">
          <div class="col-lg-12">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54872.06042455613!2d76.72951403889479!3d30.732347721831964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh!5e0!3m2!1sen!2sin!4v1733808575401!5m2!1sen!2sin"
              width="100%"
              height="400px"
              style="border: 0; margin-bottom: -10px"
              allowfullscreen=""
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
      </div>
    </section>

    <!-- map end -->

    <!-- Get in touch start -->
    <section id="get_touch_m">
      <div class="container-fluid no-padding hidden">
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
    <!-- get in touch end -->
@endsection