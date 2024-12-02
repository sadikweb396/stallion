@extends('layouts.frontend.app')
@section('content')
<style>
  .progeny_para ul li {
    list-style: inside;
    color: var(--white);
    font-family: Montserrat, sans-serif;
    font-size: 18px;
    line-height: 28px;
    font-weight: 200;
    margin-bottom: 10px;
}
.pogeny_heading p{
  font-size: 32px;
  line-height: 42px;

} 
</style>
<section
      class="hero_banner_m d-flex align-items-center"
      style="background-image: url('{{ asset('assets/frontend/image/banner-image.png') }}');"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero_banner_i">
              <div class="banner_logo_m text-center">
                <img
                  src="{{ url('assets/frontend/image/banner-logo.png')}}"
                  alt="banner logo"
                  class="img-contain"
                />
              </div>
              <div class="banner_heading-m text-center">
                <h1>Ensuring Quality Performance Horse Genetics</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom_button_m">
        <a href="#catslider" class="bttn_i bttn_arrow" aria-label="button down">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path
              d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"
            />
          </svg>
        </a>
      </div>
    </section>
    <!-- banner section end-->
    <!-- Category Slider start -->
    <section id="categorySlider" class="pdb100 categorySlider">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div
              id="catslider"
              class="catslider_listing catslider owl-carousel owl-theme"
            >
              @foreach($categorys as $category)
              <div class="item">
                <a href="javascript:void(0)">
                  <div
                    class="catimg d-flex align-items-end justify-content-center"
                    style="
                      background-image: url({{$category->catimage}});
                    "
                  >
                    <div class="cattitle">
                      <p>{{$category->categoryname}}</p>
                    </div>
                  </div>
                </a>
              </div>
              @endforeach
              
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Category end -->
    <!-- Mares section start -->
    <section class="progeny_main_m" id="">
      <div class="container-fluid no-padding hidden">
        <div class="row">
          <div class="col-lg-12">
            <div class="pogeny_info_inner_e d-flex">
              <div class="pogeny_info_inner d-flex justify-content-center">
                <div class="pogeny_sub_heading">
                  <h5>Performance and Progeny</h5>
                </div>
                <div class="pogeny_heading mb20">
                  <h2>
                    {!!$progenyperformance->heading!!}
                  </h2>
                </div>
                <div class="progeny_para">
                
                   <p>
                   {!!$progenyperformance->paragraph!!}
                  </p>
                  <!--
                  <p>
                    Join us today at Eminent Equine to promote your elite mare
                    for the world to witness the proof of their distinguished
                    reputations through performance, progeny and genetics.
                  </p> -->
                </div>
                <!-- <div class="progeny_list mb20">
                  <ul class="">
                    <li>Australia’s Leading Genetics.</li>
                    <li>100% Performers.</li>
                    <li>Producing The Proof in Performing Progeny.</li>
                  </ul>
                </div> -->

                <div class="progeny_bttn">
                  <a href="javascript:void(0)" class="btn_i">View Mares</a>
                </div>
              </div>
              <div class="progeny_img">
                <img
                  src="{{ asset('assets/frontend/image/Rectangle 12.png')}}"
                  alt="progeny_img"
                  class="img-cover"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Mares section end -->
    <!-- Stallions section start -->
    <section class="progeny_main_m Stallions_section">
      <div class="container-fluid no-padding hidden">
        <div class="row">
          <div class="col-lg-12">
            <div class="pogeny_info_inner_e d-flex">
              <div class="progeny_img">
                <img
                  src="{{ asset('assets/frontend/image/hourse.png')}}"
                  alt="progeny_img"
                  class="img-cover"
                />
              </div>
              <div class="pogeny_info_inner d-flex justify-content-center">
                <div class="pogeny_sub_heading">
                  <h5>The Topside</h5>
                </div>
                <div class="pogeny_heading mb20">
                  <h2>
                    {!!$topside->heading!!}
                  </h2>
                </div>
                <div class="progeny_para">
                  <p>
                    Want to inspect every detail about the Stallion you’re
                    breeding to ? Have questions about the sire of your future
                    progeny? Eminent Equine can provide the answers for all your
                    inquiries.
                  </p>
                </div>
                <div class="progeny_list mb20">
                  <ul class="list-none">
                    <li>Helping Australians Breed the best</li>
                    <li>Improving Future Genetics</li>
                    <li>
                      Providing everything you need to know about the ‘Top Side’
                    </li>
                  </ul>
                </div>
                <div class="progeny_bttn">
                  <a href="javascript:void(0)" class="btn_i">View Stallions</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Mares section end -->
    
    <!-- Listing Slider start -->
    <section
      id="categorySlider_services_m"
      class="categorySlider slider_services_m slider_lastest_up pdb200"
      style="background-image: url(./assets/image/Rectangle\ 43.png)"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="listing_heading text-center mb50 pdbottom50">
            <h2>NEW TO EMINENT  
              </h2>
            </div>
            <div
              id="categorySlider_services"
              class="catslider owl-carousel owl-theme"
            >
                   @foreach($stallions as $stallion)
                    @php
                    $stallionImage = $stallion->stallionImages->firstWhere('new_element', 1) ?? 
                        $stallion->stallionImages->first();
                    @endphp
                    @if($stallionImage)
                    <div class="item">
                      <a href="javascript:void(0)">
                        <div
                          class="catimg d-flex align-items-end justify-content-center"
                          style="background-image: url({{ $stallionImage->stallion_image }});">
                          <div class="cattitle">
                            <p>{{$stallion->name}}</p>
                          </div>
                          <div class="maque_badges"style="background-color:{{$stallion->color}};">
                            <marquee behavior="smooth" direction="left">
                            {{ ucfirst($stallion->stallion_heading) }}  Profiles
                            </marquee>
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

    
    <!-- Listing Slider end -->
    <!-- Latest Updated animal slider start -->
    <section
      id="categorySlider_services_m"
      class="categorySlider slider_services_m slider_lastest_up pdb200"
      style="background-image: url('{{ asset('assets/frontend/image/Rectangle 43.png') }}');"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="listing_heading text-center mb50 pdbottom50">
              <h2>LATEST UPDATED ANIMALS</h2>
            </div>
            <div
              id="categorySlider_services"
              class="catslider owl-carousel owl-theme"
            >
                @foreach($latestUpdates as $latestUpdate)
                  @php
                  $stallionImage = $latestUpdate->stallionImages->firstWhere('new_element', 1) ?? 
                  $latestUpdate->stallionImages->first();
                  @endphp
                  @if($stallionImage)
                    <div class="item">
                      <a href="javascript:void(0)">
                        <div
                          class="catimg d-flex align-items-end justify-content-center"
                          style="background-image: url({{ $stallionImage->stallion_image }});">
                          <div class="cattitle">
                            <p>{{$latestUpdate->name}}</p>
                          </div>
                          <div class="maque_badges">
                            <marquee behavior="smooth" direction="left">
                            {{ ucfirst($latestUpdate->category) }}  Profiles
                            </marquee>
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
    <!-- Latest Updated animal slider slider end -->
    <!-- calender slider start -->
    <section id="celender_slider_m" class="pdb50">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="calender_sub_head text-center">
              <h5>Every detail, every event, one place</h5>
            </div>
            <div class="calender_heading text-center mb20">
              <h3>Events calendar</h3>
            </div>
            <div class="calender_silder_m">
              <div id="Calender_slider" class="owl-carousel owl-theme">
                <div class="item">
                  <a href="#1" class="item_popup_opn" data-target="popup1">
                    <div
                      class="calender_box d-flex align-items-center justify-content-center"
                    >
                      <div class="calender_year">
                        <p>2024</p>
                      </div>
                      <div class="calender_date_m">
                        <div class="calender_month">July</div>
                        <div class="calender_date">20</div>
                      </div>
                    </div>
                  </a>
                  <div class="item_popup d-none" id="popup1">
                    <div class="main_item_pop">
                      <div class="heading_pop">
                        <h3>Lorem ipsum dolor sit amet</h3>
                      </div>
                      <div class="para_pop">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit. Aliquam dignissim leo in tortor lobortis
                          laoreet. Sed vel lorem velit. Donec congue mauris.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <a
                    href="javascript:void(0)"
                    class="item_popup_opn"
                    data-target="popup2"
                  >
                    <div
                      class="calender_box d-flex align-items-center justify-content-center"
                    >
                      <div class="calender_year">
                        <p>2024</p>
                      </div>
                      <div class="calender_date_m">
                        <div class="calender_month">July</div>
                        <div class="calender_date">22</div>
                      </div>
                    </div>
                  </a>
                  <div class="item_popup d-none" id="popup2">
                    <div class="main_item_pop">
                      <div class="heading_pop">
                        <h3>Lorem ipsum dolor sit amet</h3>
                      </div>
                      <div class="para_pop">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit. Aliquam dignissim leo in tortor lobortis
                          laoreet. Sed vel lorem velit. Donec congue mauris.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <a
                    href="javascript:void(0)"
                    class="item_popup_opn"
                    data-target="popup3"
                  >
                    <div
                      class="calender_box d-flex align-items-center justify-content-center"
                    >
                      <div class="calender_year">
                        <p>2024</p>
                      </div>
                      <div class="calender_date_m">
                        <div class="calender_month">July</div>
                        <div class="calender_date">25</div>
                      </div>
                    </div>
                  </a>
                  <div class="item_popup d-none" id="popup3">
                    <div class="main_item_pop">
                      <div class="heading_pop">
                        <h3>Lorem ipsum dolor sit amet</h3>
                      </div>
                      <div class="para_pop">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit. Aliquam dignissim leo in tortor lobortis
                          laoreet. Sed vel lorem velit. Donec congue mauris.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <a
                    href="javascript:void(0)"
                    class="item_popup_opn"
                    data-target="popup4"
                  >
                    <div
                      class="calender_box d-flex align-items-center justify-content-center"
                    >
                      <div class="calender_year">
                        <p>2024</p>
                      </div>
                      <div class="calender_date_m">
                        <div class="calender_month">July</div>
                        <div class="calender_date">27</div>
                      </div>
                    </div>
                  </a>
                  <div class="item_popup d-none" id="popup4">
                    <div class="main_item_pop">
                      <div class="heading_pop">
                        <h3>Lorem ipsum dolor sit amet</h3>
                      </div>
                      <div class="para_pop">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit. Aliquam dignissim leo in tortor lobortis
                          laoreet. Sed vel lorem velit. Donec congue mauris.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <a
                    href="javascript:void(0)"
                    class="item_popup_opn"
                    data-target="popup5"
                  >
                    <div
                      class="calender_box d-flex align-items-center justify-content-center"
                    >
                      <div class="calender_year">
                        <p>2024</p>
                      </div>
                      <div class="calender_date_m">
                        <div class="calender_month">July</div>
                        <div class="calender_date">29</div>
                      </div>
                    </div>
                  </a>
                  <div class="item_popup d-none" id="popup5">
                    <div class="main_item_pop">
                      <div class="heading_pop">
                        <h3>Lorem ipsum dolor sit amet</h3>
                      </div>
                      <div class="para_pop">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit. Aliquam dignissim leo in tortor lobortis
                          laoreet. Sed vel lorem velit. Donec congue mauris.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <a
                    href="javascript:void(0)"
                    class="item_popup_opn"
                    data-target="popup6"
                  >
                    <div
                      class="calender_box d-flex align-items-center justify-content-center"
                    >
                      <div class="calender_year">
                        <p>2024</p>
                      </div>
                      <div class="calender_date_m">
                        <div class="calender_month">July</div>
                        <div class="calender_date">31</div>
                      </div>
                    </div>
                  </a>
                  <div class="item_popup d-none" id="popup6">
                    <div class="main_item_pop">
                      <div class="heading_pop">
                        <h3>Lorem ipsum dolor sit amet</h3>
                      </div>
                      <div class="para_pop">
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipiscing
                          elit. Aliquam dignissim leo in tortor lobortis
                          laoreet. Sed vel lorem velit. Donec congue mauris.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="calender_slider_btn text-center">
              <a href="javascript:void(0)" class="calender_btn btn_i"
                >View Events</a
              >
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- celender slider end -->
    <!-- pricing plan start -->
    <section id="plans_pricing" class="">
      <div class="heading_sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="pricing_info">
                <div class="Pricing_sub_heading text-center">
                  <h5>Demystifying the unknown</h5>
                </div>
                <div class="pricing_heading text-center mb20">
                  <h3>Eminent Exclusive membership</h3>
                </div>
                <div class="pricing_para text-center">
                  <p>
                    Most people only see the success and the winning moments of
                    a horse’s career, which is a fraction of the process
                    involved to create an elite performance horse. Eminent
                    exclusive memberships offer you to view the beautiful
                    process behind the scenes in the world of these athletes.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pricing_sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="pricing_main_m d-flex gap20">
                <div class="pricing_items">
                  <div class="pricing_plan_n text-center">
                    <h5>@if($planmember){{$planmember->plan_name}}@endif</h5>
                  </div>
                  <div class="pricing_p text-center">
                    <p>@if($planmember)${{$planmember->plan_price}}@endif</p>
                    <div class="pricing_plan_e">
                      <p> @if($planmember){{$planmember->plan_duration}}@endif</p>
                    </div>
                  </div>
                  <div class="pricing_listing">
                  @if($planmember){!!$planmember->plan_details!!}@endif
                  </div>
                  <div class="pricing_bttn text-center">
                    <a href="#" class="btn_i">Get Started</a>
                  </div>
                </div>
                <div class="pricing_items gold_pricing">
                  <div class="pricing_plan_n">
                    <h5>Gold</h5>
                  </div>
                  <div class="comming_soom text-center">
                    <p>COMING <br />SOON</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- pricing plan end -->
    <!-- owner pricing plan start -->
    <section id="plans_pricing" class="">
      <div class="heading_sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="pricing_info">
                <div class="Pricing_sub_heading text-center">
                  <h5>Plans</h5>
                </div>
                <div class="pricing_heading text-center mb20">
                  <h3>Become a Owner</h3>
                </div>
                <div class="pricing_para text-center">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Praesent rutrum nunc sit amet <br />iaculis euismod.
                    Pellentesque vestibulum viverra sapien eget mattis. Nulla
                    lobortis.
                  </p>
                  <p>
                    <b>
                      Nullam laoreet condimentum purus sit amet suscipit. Ut eu
                      neque tincidunt.
                    </b>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="pricing_sec">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="pricing_main_m d-flex gap20 justify-content-center">
                <div class="pricing_items">
                  <div class="pricing_plan_n text-center">
                    <h5>{{$planOwner->plan_name}}</h5>
                  </div>
                  <div class="pricing_p text-center">
                    <p>${{$planOwner->plan_price}}</p>
                    <div class="pricing_plan_e">
                      <p>/annually</p>
                    </div>
                  </div>
                  <div class="pricing_listing">
                    {!!$planOwner->plan_details!!}
                  </div>
                  <div class="pricing_bttn text-center">
                    <a href="{{url('owner/register')}}" class="btn_i">Get Started</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Owner pricing plan end -->
    <!-- section for advertisements start-->
    <section
      class="advertisement_sec background-img pdb100"
      style="background-image: url('{{ asset('assets/frontend/image/Group 28.png') }}');"
    ></section>
    <!-- section for advertisements end-->

    <!-- who are section start -->
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
                    EMINENT EQUINE <br />
                    AUSTRALIA
                  </h2>
                </div>
                <div class="who_para">
                  <p>
                    EMINENT EQUINE AUSTRALIA is a multi-dynamic online platform
                    designed to provide numerous services to the Performance
                    Horse Industry within Australia.  These services include the
                    promotion and exhibition of Australia’s highly distinguished
                    Performance horse Mares and Stallions who have proven their
                    value and famed reputations through competitive performance
                    within their industries including Cutting, Campdrafting,
                    Challenge and Reining Cow-Horse events. 
                  </p>
                    
                  <p>
                    The team behind Eminent Equine strongly believe the elite
                    Australian performance and producing mares and stallions are
                    an element within the industry that deserve a stage for
                    promotion and appreciation. Designed specifically for mare
                    and stallion owners, the Eminent Equine platform strives to
                    represent Australia’s most influential, connecting the
                    owners, the horses and the public on a level like never
                    before.
                  </p>
                </div>

                <div class="who_bttn">
                  <a href="javascript:void(0)" class="btn_i">About Us</a>
                </div>
              </div>
              <div class="who_img">
                <img
                  src="{{ asset('assets/frontend/image/NB-0171 1.png') }}"
                  alt="who_img"
                  class="img-contain"
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- who are section end -->
    <!-- service slider start -->
   
    <!-- services slider end -->
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
@endsection