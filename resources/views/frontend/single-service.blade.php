
@extends('layouts.frontend.app')
@section('content')
   <!-- banner section -->
   <section
      class="hero_banner_m d-flex align-items-center stallions-banner"
      style="background-image: url(@if($service){{url( $service->bannerimage) }} @endif);" >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero_banner_i">
              <div class="banner_heading-m text-center mb20">
                <h1>{{$service->service_name}}</h1>
              </div>
              <div class="para_banner text-center">
                <p>{{$service->banner_heading}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section end-->
    <!-- Services Description start -->
    <section class="who_are_m pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="who_inner_e d-flex gap20">
              <div class="who_info d-flex justify-content-center">
                <div class="who_sub_heading">
                  <h5>Services Description</h5>
                </div>
                <div class="who_heading mb20">
                  <h2>{{$service->title}}</h2>
                </div>
                <div class="who_para">
                  <p>{{$service->description}}</p>       
                </div>
              </div>
              <div class="who_img">
                <img
                  src="{{url($service->serviceimage)}}"
                  alt="who_img"
                  class="img-contain"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end -->
    <!-- Services Plans start -->
    <section id="plans_pricing" class="">
      <div class="heading_sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              @if($planservicedetails)
              <div class="pricing_info">
                <div class="Pricing_sub_heading text-center">
                  <h5>{{$planservicedetails->text}}</h5>
                </div>
                <div class="pricing_heading text-center mb20">
                  <h3> {{$planservicedetails->title}}</h3>
                </div>
                <div class="pricing_para text-center">
                  <p>
                  {!!$planservicedetails->description!!}
                  </p>
                </div>
              </div>
              @endif

            </div>
          </div>
        </div>
      </div>
      @if($planservice)
      <div class="pricing_sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="pricing_main_m d-flex gap20 justify-content-center">
                <div class="pricing_items">
                  <div class="pricing_plan_n text-center">
                    <h5>@if($planservice){{$planservice->plan_name}}@endif</h5>
                  </div>
                  <div class="pricing_p text-center">
                    <p>@if($planservice)${{$planservice->plan_price}}@endif</p>
                    <div class="pricing_plan_e">
                        @if($planservice)<p>{{$planservice->plan_duration}}</p>@endif
                    </div>
                  </div>
                  <div class="pricing_listing">
                    <div class="pricing_in text-center">
                      <p>
                      @if($planservice){!!$planservice->plan_details!!}@endif
                      </p>
                    </div>
                    <ul class="list-none mb20">
                      @php $plandetails=DB::table('plandetails')->where('plan_id',$planservice->id)->get(); @endphp
                      @foreach($plandetails as $plandetail)
                      <li>
                        <span class="check_listing"
                          ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                          >
                            <path
                              d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                            /></svg></span
                        >
                        {{$plandetail->plandetails}}
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  <div class="pricing_bttn text-center">
                    <a href="#" class="btn_i">Get Started</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endif
    </section>

    <!-- end -->
    <!-- about stallions -->
    <section class="about_stallions pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="about_stallion_m">
              <div class="about_stallion_heading text-center mb20">
                <h2></h2>
              </div>
              <div class="about_stallions_para text-center mb20">
                <p>
                  {{$service->heading1}}
                </p>
              </div>
              <div class="about_stallions_para text-center mb20">
                <p>
                {{$service->paragraph1}}
                </p>
              
              </div>
              <div class="privacy_btn text-center">
                <a href="#" class="privacy_btn btn btn_i black_btn"
                  >Get Started</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end-- -->
    <!-- more info start -->
    <section class="progeny_main_m" id="">
      <div class="container-fluid no-padding hidden">
        <div class="row">
          <div class="col-lg-12">
            <div class="pogeny_info_inner_e d-flex">
              <div class="pogeny_info_inner d-flex justify-content-center">
                <div class="pogeny_sub_heading">
                  <h5>More Information</h5>
                </div>
                <div class="pogeny_heading mb20">
                  <h2> {{$service->heading2}}</h2>
                </div>
                <div class="progeny_para">
                  <p>
                  {{$service->paragraph2}}
                  </p>
                 
                </div>
              </div>
              <div class="progeny_img">
               
                <img
                  src="{{url($service->image)}}"
                  alt="who_img"
                  class="img-contain"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- end-- -->
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