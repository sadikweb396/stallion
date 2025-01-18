@extends('layouts.frontend.app')
@section('content')
    <!-- banner section -->
    <section
    class="hero_banner_m d-flex align-items-center"
    style="background-image: url(@if($photographerbanner){{$photographerbanner->image }} @endif);" >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero_banner_i">
              <div class="banner_heading-m text-center mb20">
              <h1>@if($photographerbanner){{$photographerbanner->heading}}@endif</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section end-->
    <!-- photographer listing -->
    <section class="grapher_m pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="grapher_inner">
              <div class="filers_grapher">
                <form action="#">
                  <h3>Filter by:</h3>
                  <div class="form-group">
                    <label for="Location-type"> </label>
                    <select id="Location-type" name="Location-type">
                      <option value="none">Location</option>
                      <option value="usa">Usa</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="breeding-type"></label>
                    <select id="breeding-type" name="breeding-type">
                      <option value="none">Price Range</option>
                      <option value="10">10</option>
                    </select>
                  </div>
                  <button class="btn btn_i black_btn">Search</button>
                </form>
              </div>
              <div class="grapher_listing">
                <table>
                  <thead>
                    <tr>
                      <th>Location</th>
                      <th>Photographer Name</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Travel Radius</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($photographers as $photographer)
                    <tr>
                      <td>{{$photographer->location}}</td>
                      <td>{{$photographer->photographer_name}}</td>
                      <td>{{$photographer->address}}</td>
                      <td>{{$photographer->phone}}</td>
                      <td>{{$photographer->travel_radius}}</td>
                      <td>For One: {{$photographer->single_pic_price}}$<br />For Multi: {{$photographer->multiple_pic_price}}$
                      <a href="{{ asset($photographer->photographer_pdf) }}" target="_blank">Pdf</a>
                    </td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

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