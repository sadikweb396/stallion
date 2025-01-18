
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
                <p>
                 @if($banner){!!$banner->text!!}@endif
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section end-->
    <!-- what we do start -->
    <section class="who_are_m pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="who_inner_e d-flex gap20">
              <div class="who_info d-flex justify-content-center">
                <div class="who_sub_heading">
                  <h5>What we do</h5>
                </div>
                <div class="who_heading mb20">
                  <h2>
                    @if($whatwedo){{$whatwedo->heading}}@endif
                  </h2>
                </div>
                <div class="who_para">
                 
                  @if($whatwedo){!!$whatwedo->paragraph!!}@endif
                 
                </div>
              </div>
              <div class="who_img">
                <img
                  src="{{url($whatwedo->image)}}"
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
    <!-- Simone Information -->
     @foreach($brainthinkers as $key=>$brainthinker)
     @if(++$key%2==0)
     <section class="progeny_main_m" id="">
      <div class="container-fluid no-padding hidden">
        <div class="row">
          <div class="col-lg-12">
            <div class="pogeny_info_inner_e d-flex">
              <div class="pogeny_info_inner d-flex justify-content-center">
                <div class="pogeny_sub_heading">
                  <h5>The Thinker</h5>
                </div>
                <div class="pogeny_heading mb20">
                <h2> {{$brainthinker->heading}}</h2>
                </div>
                <div class="progeny_para">
                  <p>
                    {!!$brainthinker->paragraph!!}
                  </p>
                </div>

                <div class="socials_icon">
                  <p class="mb20">Get to Know Simone</p>
                  <div class="footer_socials">
                    <ul
                      class="social_media_list list-none d-flex align-items-center"
                    >
                      <li>
                        <a href="{{$brainthinker->facebook_link}}"target="_blank"
                          ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 320 512"
                          >
                            <path
                              d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"
                            ></path>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="{{$brainthinker->twitter_link}}"target="_blank"
                          ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                          >
                            <path
                              d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z"
                            ></path>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="{{$brainthinker->instagram_link}}"target="_blank"
                          ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                          >
                            <path
                              d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                            ></path>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="{{$brainthinker->video_link}}"target="_blank"
                          ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"
                          >
                            <path
                              d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"
                            ></path>
                          </svg>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="progeny_img">
              <img
                  src="{{url($brainthinker->image)}}"
                  alt="progeny_img"
                  class="img-cover"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    @else
    <!-- end-- -->
    <!-- brooke start -->
    <section class="progeny_main_m Stallions_section">
      <div class="container-fluid no-padding hidden">
        <div class="row">
          <div class="col-lg-12">
            <div class="pogeny_info_inner_e d-flex">
              <div class="progeny_img">
                <img
                  src="{{url($brainthinker->image)}}"
                  alt="progeny_img"
                  class="img-cover"
                />
              </div>
              <div class="pogeny_info_inner d-flex justify-content-center">
                <div class="pogeny_sub_heading">      
                  <h5>Our Brain</h5>          
                </div>
                <div class="pogeny_heading mb20">
                  <h2>{{$brainthinker->heading}}</h2>
                </div>
                <div class="progeny_para">
                  <p>
                    {!!$brainthinker->paragraph!!}
                  </p>
                </div>
                <div class="socials_icon">
                  <p class="mb20">Get to Know Simone</p>
                  <div class="footer_socials">
                    <ul
                      class="social_media_list list-none d-flex align-items-center"
                    >
                      <li>
                        <a href="{{$brainthinker->facebook_link}}"target="_blank"><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 320 512"
                          >
                            <path
                              d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"
                            ></path>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="{{$brainthinker->twitter_link}}"target="_blank"
                          ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                          >
                            <path
                              d="M459.4 151.7c.3 4.5 .3 9.1 .3 13.6 0 138.7-105.6 298.6-298.6 298.6-59.5 0-114.7-17.2-161.1-47.1 8.4 1 16.6 1.3 25.3 1.3 49.1 0 94.2-16.6 130.3-44.8-46.1-1-84.8-31.2-98.1-72.8 6.5 1 13 1.6 19.8 1.6 9.4 0 18.8-1.3 27.6-3.6-48.1-9.7-84.1-52-84.1-103v-1.3c14 7.8 30.2 12.7 47.4 13.3-28.3-18.8-46.8-51-46.8-87.4 0-19.5 5.2-37.4 14.3-53 51.7 63.7 129.3 105.3 216.4 109.8-1.6-7.8-2.6-15.9-2.6-24 0-57.8 46.8-104.9 104.9-104.9 30.2 0 57.5 12.7 76.7 33.1 23.7-4.5 46.5-13.3 66.6-25.3-7.8 24.4-24.4 44.8-46.1 57.8 21.1-2.3 41.6-8.1 60.4-16.2-14.3 20.8-32.2 39.3-52.6 54.3z"
                            ></path>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="{{$brainthinker->instagram_link}}"target="_blank"
                          ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                          >
                            <path
                              d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"
                            ></path>
                          </svg>
                        </a>
                      </li>
                      <li>
                        <a href="{{$brainthinker->video_link}}"target="_blank"
                          ><svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512"
                          >
                            <path
                              d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z"
                            ></path>
                          </svg>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>  
    @endif
    @endforeach
    <!-- end-- -->
    <section id="categorySlidertwo" class="pdb100 categorySlider">
      <div class="container">
        <style>
          .container{
            max-width:1500px;
          }
          </style>
        <div class="row">
          <div class="col-lg-12">
            <div class="team-title mb50 text-center">
              <h3>OUR TEAM MEMBERS</h3>
            </div>
            <div
              id="catslider_two"
              class="catslider_listing catslider owl-carousel owl-theme"
            >
              @foreach($ourteams as $ourteam)
              <div class="item">
                <a href="javascript:void(0)">
                  <div
                    class="catimg d-flex align-items-center justify-content-center"
                    style="background-image: url(@if($ourteam){{ $ourteam->image }} @endif);" >
                    <div class="slider_info">
                      <!-- Title -->
                      <div class="cattitle mb20">
                          <p>{{$ourteam->name}}</p>
                      </div>
                      <!-- Description -->
                      <div class="cat_p">
                          <p>{{$ourteam->description}}</p>
                      </div>
                      <!-- Logos -->
                      <div class="social-icons">
                        @if($ourteam->facebook_link)
                          <a href="{{ $ourteam->facebook_link }}" target="_blank" class="social-link">
                            <i class="fab fa-facebook"></i>
                          </a>
                        @endif  
                        @if($ourteam->twitter_link)
                          <a href="{{ $ourteam->twitter_link }}" target="_blank" class="social-link">
                            <i class="fab fa-twitter"></i>
                          </a>
                        @endif
                        @if($ourteam->instagram_link)
                          <a href="{{ $ourteam->linkedin_link }}" target="_blank" class="social-link">
                            <i class="fab fa-instagram"></i>
                          </a>
                        @endif
                        @if($ourteam->video_link)
                          <a href="{{ $ourteam->video_link }}" target="_blank" class="social-link">
                            <i class="fab fa-youtube"></i>
                          </a>
                        @endif
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Category end -->

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