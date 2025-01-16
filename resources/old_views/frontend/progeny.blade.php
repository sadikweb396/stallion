
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
                <h1>@if($banner){{$banner->heading}}@endif</h1>
              </div>
              <div class="para_banner text-center">
                <p>@if($banner){{$banner->text}}@endif</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section end-->
    <section class="progeny_list_m pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="main_tab_m">
              <div class="progeny_list_title mb50">
                <h3 class="text-center">Progenies</h3>
              </div>
              <div
                class="main_stallions_listings d-flex align-items-center gap20"
              >
                @foreach($progenys as $progeny)
                @php
                  $progenyImage = $progeny->progenyImages->firstWhere('progeny_image', 1) ?? 
                          $progeny->progenyImages->first();
                @endphp
                <article
                  class="stallion-box d-flex align-items-end justify-content-center"
                  style="background-image: url(@if($progenyImage){{ $progenyImage->image }} @endif);" >
                
                  <div class="stallion-items">
                    <div
                      class="catimg d-flex align-items-end justify-content-center"
                    >
                      <div class="cattitle">
                        <h4>{{$progeny->progeny_name}}</h4>
                        <div class="stallion_info">
                          <div class="progeny_list mb20">
                            <ul class="list-none">
                              <li>Age :{{$progeny->date_of_birth}}</li>
                              <li>Colour :{{$progeny->color}}</li>
                              <li>Register : {{$progeny->registration_number}}</li>
                              <li>Gender : {{$progeny->gender}}</li>
                            </ul>
                          </div>
                          <div class="sire_dam_btn">
                           
                            @if($progeny->stallionslug)
                            <a href="{{ url('single-stallion',$progeny->stallionslug) }}" class="btn_i btn">View Sire </a>
                            @endif
                            @if($progeny->mareslug)
                            <a href="{{ url('single-mare',$progeny->mareslug) }}" class="btn_i btn">View Dam </a>
                            @endif
                          </div>
                          <div class="interest_btn">
                            <a
                              href="javascript:void(0);"
                              class="btn_i btn brown_btn"
                            >
                              Interested In Purchasing
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="stallion_label_inner">
                    <label> For Sale </label>
                  </div>
                </article>
               @endforeach
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end-- -->
        <!-- call to owner popup -->
        <div class="call_owner_pop d-none">
        <div class="intersted_purchase">
          <div class="pop_box">
            <div class="close-btn">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                <path
                  d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"
                />
              </svg>
            </div>
            <div class="pop-title">
              <h4 class="text-center">
                <span class="icon-phone">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                      d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"
                    />
                  </svg>
                </span>
                <span class="text_underline"
                  ><a href="javascript:void(0);">Call the Owner</a>
                </span>
                <br />
                or <br />
                Fill Out the Form to Purchase <br />
                the Progeny Name
              </h4>
              <form action="{{route('progeny-form')}}"method="post">
                @csrf
                <div class="main_groups d-flex gap20">
                  <div class="group_fields">
                    <label for="fname"
                      ><span class="visually-hidden">First name:</span></label
                    >
                    <input
                      type="text"
                      id="fname"
                      name="name"
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
                      placeholder="Enter Your Message"required
                    ></textarea>
                  </div>
                </div>
                <div class="main_groups">
                  <input
                    type="submit"
                    value="Submit"
                    class="submit_bttn btn_i black_btn btn"
                  />
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- end -->
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

    <!-- policy start -->
    <section class="about_stallions pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="about_stallion_m">
              <div class="about_stallion_heading text-center mb20">
                <h2>Policies And Procedure</h2>
              </div>
             
              </div>
              <div class="about_stallions_para text-center mb20">
                @if($progenyinformation) {!!$progenyinformation->paragraph!!} @endif
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
    <!-- policy end -->
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