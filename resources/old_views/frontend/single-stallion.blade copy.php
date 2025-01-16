
@extends('layouts.frontend.app')
@section('content')
<style>
  .main_stallion_list > div {
    flex: 0 40%;
}
</style>
<section
      class="hero_banner_m d-flex align-items-center stallions-banner"
      style="background-image: url(@if($bannerImage){{url( $bannerImage->stallion_image) }} @endif);" >
  
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero_banner_i">
              <div class="banner_heading-m text-center mb20">
              <h1>  {{$stallion->name}}  </h1>
              </div>
              <div class="para_banner text-center mb50">
                <!-- <p>Breeding quality performance.</p> -->
              </div>
              <div class="semen_performence text-center">
                <a
                  href="javascript:void(0)"
                  class="btn_i"
                  aria-label="View Semen "
                  >View Semen Contract</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section end-->
    <!-- stallion info list -->
    <section class="sire_dam_m stallion-info_m">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="sire-info">
              <div class="sire_head text-center">
                <h4>Sire</h4>
                <p>{{$pedigree->sirename1}} - {{$pedigree->sireregistration1}}</p>
              </div>
              <div class="sire_details d-flex justify-space-around">
                <div>
                  <p>{{$stallion->registration_details}}</p>
                </div>
                <div>
                  <p>{{ $stallion->created_at->format('d/m/Y') }}</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="sire-info">
              <div class="sire_head text-center">
                <h4>Dam</h4>
                <p>{{$pedigree->damname1}} - {{$pedigree->damregistration1}}</p>
              </div>
              <div class="sire_details d-flex justify-space-around">
                <div>
                  <p>{{$stallion->height}} HH</p>
                </div>
                <div>
                  <p>{{$stallion->color}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- stallion info list end -->
    <!-- Category Slider start -->
    <section
      id="categorySlider"
      class="categorySlider categorySlider_design1 stallion-category"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div id="catslider" class="catslider owl-carousel owl-theme">
              @foreach($stallion->stallionImages as $stallionImage)
              <div class="item">
                <a href="javascript:void(0)">
                <div class="catimg d-flex align-items-end justify-content-center" style="background-image: url('{{url( $stallionImage->stallion_image) }}');" role="img" aria-label="{{ $stallionImage->stallion_name }}">
                    <div class="cattitle">
                      <p>{{$stallionImage->stallion_name}}</p>
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
    <!-- Perfomance history section start -->
    <section class="progeny_main_m Stallions_section single_stallions_m">
      <div class="container-fluid no-padding hidden">
        <div class="row">
          <div class="col-lg-12">
            <div class="pogeny_info_inner_e d-flex">
              <div class="pogeny_info_inner d-flex justify-content-center">
                <div class="pogeny_sub_heading">
                  <h5>Performance and Progeny</h5>
                </div>
                <div class="pogeny_heading mb20">
                  <h2>Perfomance History</h2>
                </div>
                <div class="progeny_para"></div>
                <div class="progeny_list mb20">
                  <ul class="list-none"> 
                  {!!$stallion->performance_history!!}
                  </ul>
                </div>
              </div>
                <div class="progeny_img">
                @if($performaceImage)
                <img
                  src="{{url($performaceImage->stallion_image)}}"
                  alt="progeny_img"
                  class="img-cover"
                />
                @endif
                <div class="video_icon_pop">
                  <a
                    href="javascript:void(0)"
                    aria-label="play button"
                    class="play__btn"
                  >
                    <img
                      src="{{ asset('assets/frontend/image/play-icon.png')}}"
                      class="img-contain"
                    />
                  </a>
                </div>
              </div>   
              <div
                class="video__pop d-none align-items-center justify-content-center"
              >
                <div class="video_sc">
                  <div class="clos-btn cursor-pointer">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 384 512"
                    >
                      <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"
                      ></path>
                    </svg>
                  </div>
                  <iframe
                    width="560"
                    height="315"
                    src="https://www.youtube.com/embed/0_auMA2y5QI?si=pGP87COV1nZsH4fs"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen
                  ></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Mares section end -->
    <!-- Stallions section start -->
    <section class="progeny_main_m Stallions_section single_stallions_m">
      <div class="container-fluid no-padding hidden">
        <div class="row">
          <div class="col-lg-12">
            <div class="pogeny_info_inner_e d-flex">
              <div class="progeny_img">
                @if($backgroundImage)       
                <img
                  src="{{url($backgroundImage->stallion_image)}}"
                  alt="progeny_img"
                  class="img-cover"
                />
                @endif
              </div>
              <div class="pogeny_info_inner d-flex justify-content-center">
                <div class="pogeny_sub_heading">
                  <h5>The Topside</h5>
                </div>
                <div class="pogeny_heading mb20">
                  <h2>BACKGROUND STORY</h2>
                </div>

                <div class="progeny_para">
                  {!!$stallion->background_story!!}
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="view_contract_btn text-center">
        <a href="javascript:void(0)" class="btn_i" aria-label="view contract"
          >View Semen Contract</a
        >
      </div>
    </section>
    <!-- Mares section end -->
    <!-- Category Slider start -->
    <section
      id="categorySlider"
      class="categorySlider stallion-category categorySlider_design_txt_hover"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div
              id="catslider_gallery"
              class="catslider owl-carousel owl-theme"
            >
              @foreach($stallion->stallionImages as $stallionImage)
           
              <div class="item">
                <a href="javascript:void(0)">
                  <div
                    class="catimg d-flex align-items-end justify-content-center"
                    style="
                      background-image: url('{{url( $stallionImage->stallion_image) }}');
                    "
                  >
                    <div class="cattitle">
                      <p>{{$stallionImage->stallion_name}}</p>
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

    <section class="progeny_main_m Stallions_section single_stallions_m">
      <div class="container no-padding hidden">
        <div class="row">
          <div class="col-lg-12">
            <div class="pogeny_info_inner_e d-flex">
              <div class="progeny_img">
              @foreach ($exceptionProgeny->exceptionalProgeny as $key=>$progeny) 
              @php
                  $stallionImage = $progeny->progenyImages->firstWhere('progeny_image', 1) ?? 
                          $progeny->progenyImages->first();
                @endphp
                @if ($stallionImage)
                <img src="{{ url($stallionImage->image) }}" alt="progeny_img" class="img-cover" />
                @endif
                
              @endforeach
              </div>
              @foreach ($exceptionProgeny->exceptionalProgeny as $key=>$progeny) 
              <div class="pogeny_info_inner d-flex justify-content-center">
                <div class="pogeny_heading mb20">
                  <h2>An exceptional progeny</h2>
                </div>
                <div class="progeny_para">
                  <p>
                   {{$progeny->performace_history}}
                  </p>
                </div>

                <div class="progeny_list mb20">
                  <ul class="list-none">
                    <li>Date of Birth : {{ \Carbon\Carbon::parse($progeny->birth_date)->format('d/m/Y') }}</li>
                    <li>Sex : {{$progeny->gender}}</li>
                    <li>Colour : {{$progeny->color}}</li>
                    <li>Register : {{$progeny->registration_number}}</li>
                   
                  </ul>
                </div>

              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Category end -->
    <!--tab section start  -->
  
    <section class="main_tab_m pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="tab_heading_i mb20 text-center">
              <h3>Eminent Equine - Stallion’s Name</h3>
            </div>
            <div class="tabs_list_m">
              <div class="nav_tabs d-flex justify-space-between">
                <div
                  class="nav_tab text-center active"
                  data-target="progenysalesperformance"
                >
                  Progeny Sales, Performance
                </div>
                <div class="nav_tab text-center" data-target="pedigreechart">
                  Pedigree Chart
                </div>
                <div class="nav_tab text-center" data-target="exclusivedata">
                  Exclusive Data
                </div>
              </div>

                   
              <div id="progenysalesperformance" class="tab_content active">
                <div class="main_stallion_list d-flex gap20 mb50">
                  <div class="stallion_img">
                    <img
                      src="./assets/image/hourse.png"
                      alt="stallion image"
                      class="img-cover"
                    />
                    <div class="stallion_label_inner">
                      <label> For Sale </label>
                    </div>
                  </div>
                  <div class="stallion_list_info">
                    <div class="stallion_list_heading mb20">
                      <h3>Name of the Progeny</h3>
                    </div>
                    <div class="stallion_list_para mb20">
                      <p>
                        Want to inspect every detail about the Stallion you’re
                        breeding to ? Have questions about the sire of your
                        future progeny? Eminent Equine can provide the answers
                        for all your inquiries.
                      </p>
                    </div>
                    <div class="progeny_list mb20">
                      <ul class="list-none">
                        <li>
                          <span class="check_listing"
                            ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                              ></path></svg></span
                          >Status : Active
                        </li>
                        <li>
                          <span class="check_listing"
                            ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                              ></path></svg></span
                          >Colour : Black
                        </li>
                        <li>
                          <span class="check_listing"
                            ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                              ></path></svg></span
                          >Register : HBR
                        </li>
                        <li>
                          <span class="check_listing"
                            ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                              ></path></svg></span
                          >DNA Profile : StoredSNP (71176 SNPs)
                        </li>
                      </ul>
                    </div>
                    <div class="stallion_btn">
                      <a
                        href="javascript:void(0)"
                        aria-label="View Progeny"
                        class="btn_i Interested_popup"
                      >
                        Interested In Purchasing
                      </a>
                    </div>
                  </div>
                </div>
                <div class="main_stallion_list d-flex gap20 mb50">
                  <div class="stallion_img">
                    <img
                      src="./assets/image/hourse.png"
                      alt="stallion image"
                      class="img-cover"
                    />
                  </div>
                  <div class="stallion_list_info">
                    <div class="stallion_list_heading mb20">
                      <h3>Name of the Progeny</h3>
                    </div>
                    <div class="stallion_list_para mb20">
                      <p>
                        Want to inspect every detail about the Stallion you’re
                        breeding to ? Have questions about the sire of your
                        future progeny? Eminent Equine can provide the answers
                        for all your inquiries.
                      </p>
                    </div>
                    <div class="progeny_list mb20">
                      <ul class="list-none">
                        <li>
                          <span class="check_listing"
                            ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                              ></path></svg></span
                          >Status : Active
                        </li>
                        <li>
                          <span class="check_listing"
                            ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                              ></path></svg></span
                          >Colour : Black
                        </li>
                        <li>
                          <span class="check_listing"
                            ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                              ></path></svg></span
                          >Register : HBR
                        </li>
                        <li>
                          <span class="check_listing"
                            ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                              ></path></svg></span
                          >DNA Profile : StoredSNP (71176 SNPs)
                        </li>
                      </ul>
                    </div>
                    <div class="stallion_btn">
                      <a
                        href="javascript:void(0)"
                        aria-label="View Progeny"
                        class="btn_i"
                      >
                        View Progeny
                      </a>
                    </div>
                  </div>
                </div>
                <div
                  class="main_stallions_listings d-flex align-items-center gap20"
                >
                  <article
                    class="stallion-box d-flex align-items-end justify-content-center"
                    style="
                      background-image: url(./assets/image/left-profile.png);
                    "
                  >
                    <div class="stallion-items">
                      <div
                        class="catimg d-flex align-items-end justify-content-center"
                      >
                        <div class="cattitle">
                          <h4>My Left Profile</h4>
                          <div class="stallion_info">
                            <div class="progeny_list mb20">
                              <ul class="list-none">
                                <li>Status : Active</li>
                                <li>Colour : Black</li>
                                <li>Register : HBR</li>
                                <li>DNA Profile : StoredSNP (71176 SNPs)</li>
                              </ul>
                            </div>
                            <div class="interest_btn">
                              <a href="javascript:void(0);" class="btn_i btn">
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
                  <article
                    class="stallion-box d-flex align-items-end justify-content-center"
                    style="
                      background-image: url(./assets/image/left-profile.png);
                    "
                  >
                    <div class="stallion-items">
                      <div
                        class="catimg d-flex align-items-end justify-content-center"
                      >
                        <div class="cattitle">
                          <h4>My Left Profile</h4>
                          <div class="stallion_info">
                            <div class="progeny_list mb20">
                              <ul class="list-none">
                                <li>Status : Active</li>
                                <li>Colour : Black</li>
                                <li>Register : HBR</li>
                                <li>DNA Profile : StoredSNP (71176 SNPs)</li>
                              </ul>
                            </div>
                            <div class="interest_btn">
                              <a href="javascript:void(0);" class="btn_i btn">
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
                  <article
                    class="stallion-box d-flex align-items-end justify-content-center"
                    style="
                      background-image: url(./assets/image/left-profile.png);
                    "
                  >
                    <div class="stallion-items">
                      <div
                        class="catimg d-flex align-items-end justify-content-center"
                      >
                        <div class="cattitle">
                          <h4>My Left Profile</h4>
                          <div class="stallion_info">
                            <div class="progeny_list mb20">
                              <ul class="list-none">
                                <li>Status : Active</li>
                                <li>Colour : Black</li>
                                <li>Register : HBR</li>
                                <li>DNA Profile : StoredSNP (71176 SNPs)</li>
                              </ul>
                            </div>
                            <div class="interest_btn">
                              <a
                                href="javascript:void(0);"
                                class="btn_i btn Interested_popup"
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
                  <article
                    class="stallion-box d-flex align-items-end justify-content-center"
                    style="
                      background-image: url(./assets/image/left-profile.png);
                    "
                  >
                    <div class="stallion-items">
                      <div
                        class="catimg d-flex align-items-end justify-content-center"
                      >
                        <div class="cattitle">
                          <h4>My Left Profile</h4>
                          <div class="stallion_info">
                            <div class="progeny_list mb20">
                              <ul class="list-none">
                                <li>Status : Active</li>
                                <li>Colour : Black</li>
                                <li>Register : HBR</li>
                                <li>DNA Profile : StoredSNP (71176 SNPs)</li>
                              </ul>
                            </div>
                            <div class="interest_btn">
                              <a href="javascript:void(0);" class="btn_i btn">
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
                </div>
              </div>

              <div id="progenysalesperformance" class="tab_content active">

              


              @foreach ($stallion->progeny as $key=>$progeny) 
              @if(++$key<=2)
                <div class="main_stallion_list d-flex gap20 mb50">
                @php
                  $stallionImage = $progeny->progenyImages->firstWhere('progeny_image', 1) ?? 
                          $progeny->progenyImages->first();
                @endphp
                @if($stallionImage)
               
                  <div class="stallion_img">
                    <img
                      src="{{ url($stallionImage->image) }}"
                      alt="stallion image"
                      class="img-cover"
                    />
                    @if($progeny->sale=='sale')
                    <div class="stallion_label_inner">
                       <label> For Sale </label>
                    </div>
                    @endif
                  </div>
                  @endif
 
                  <div class="stallion_list_info">
                    <div class="stallion_list_heading mb20">
                      <h3>{{ $progeny->progeny_name }}</h3>
                    </div>
                    <div class="stallion_list_para mb20">
                      <p>
                       {{$progeny->performace_history}}
                      </p>
                    </div>
                    <div class="progeny_list mb20">
                      <ul class="list-none">
                        <li>
                          <span class="check_listing"
                            ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                              ></path></svg></span
                          >sex : {{$progeny->gender}}
                        </li>
                        <li>
                          <span class="check_listing"
                            ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                              ></path></svg></span
                          >Colour : {{$progeny->color}}
                        </li>
                        <li>
                          <span class="check_listing"
                            ><svg
                              xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 448 512"
                            >
                              <path
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z"
                              ></path></svg></span
                          >Register : {{$progeny->registration_number}}
                        </li>
                       
                      </ul>
                    </div>
                    <div class="stallion_btn">
                      @if($progeny->sale=='sale')
                      <a
                        href="javascript:void(0)"
                        aria-label="View Progeny"
                        class="btn_i"
                      >
                        Interested In Purchasing
                      </a>
                      @else
                      <a
                        href="javascript:void(0)"
                        aria-label="View Progeny"
                        class="btn_i"
                      >
                        View Progeny
                      </a>
                      @endif
                    </div>
                  </div>
                </div>
                @endif
                @endforeach
                <div class="main_stallions_listings d-flex align-items-center gap20">
                @foreach ($stallion->progeny as $key=>$progeny) 
                @if(++$key>2)
                @php
                  $stallionImage = $progeny->progenyImages->firstWhere('progeny_image', 1) ?? 
                          $progeny->progenyImages->first();
                @endphp
                @if($stallionImage)
                  <article
                    class="stallion-box d-flex align-items-end justify-content-center"
                    style="
                      background-image: url('{{url($stallionImage->image) }}');
                    "
                  
                  >
                    <div class="stallion-items">
                      <div
                        class="catimg d-flex align-items-end justify-content-center"
                      >
                        <div class="cattitle">
                          <h4>{{$progeny->progeny_name}}</h4>
                          <div class="stallion_info">
                            <div class="progeny_list mb20">
                              <ul class="list-none">
                                <li>Status : Active</li>
                                <li>Colour : {{$progeny->color}}</li>
                                <li>Register : {{$progeny->registration_number}}</li>
                                <li>DNA Profile : StoredSNP (71176 SNPs)</li>
                              </ul>
                            </div>
                            <div class="interest_btn">
                              @if($progeny->sale=='sale')
                              <a href="javascript:void(0);" class="btn_i btn">
                                Interested In Purchasing
                              </a>
                              @else
                              <a href="javascript:void(0);" class="btn_i btn">
                                View progeny
                              </a>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @if($progeny->sale=='sale')
                    <div class="stallion_label_inner">
                      <label> For Sale </label>
                    </div>
                    @endif
                  </article>
                  @endif
                  @endif
                  @endforeach
                 
                </div>
              </div>
              <div id="pedigreechart" class="tab_content">
                <div class="pedigree_chart_m">
                  <div class="chart_tree">
                    <ul class="list-none">
                      <li class="d-flex align-items-center">
                        <a href="javascript:void(0)" class="black-node"
                          >{{$pedigree->stallionname}} (Q97216)
                        </a>
                        <div class="first_bix"></div>

                        <ul class="list-none">
                          <li class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="blue-node"
                              >Q-97216 One Time Design 4
                            </a>
                            <div class="first_bix"></div>
                            <ul class="list-none">
                              <li class="d-flex align-items-center">
                                <a href="javascript:void(0)" class="blue-node"
                                  >Q-97216 One Time Design
                                </a>
                                <div class="first_bix"></div>
                                <ul class="list-none">
                                  <li class="d-flex align-items-center">
                                    <a
                                      href="javascript:void(0)"
                                      class="blue-node"
                                      >Q-97216 One Time Design
                                    </a>
                                  </li>
                                  <li class="d-flex align-items-center">
                                    <a
                                      href="javascript:void(0)"
                                      class="pink-node"
                                      >Q-97216 One Time Design
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="d-flex align-items-center">
                                <a href="javascript:void(0)" class="pink-node"
                                  >Q-97216 One Time Design</a
                                >
                                <div class="first_bix"></div>
                                <ul class="list-none">
                                  <li class="d-flex align-items-center">
                                    <a
                                      href="javascript:void(0)"
                                      class="blue-node"
                                      >Q-97216 One Time Design</a
                                    >
                                  </li>
                                  <li class="d-flex align-items-center">
                                    <a
                                      href="javascript:void(0)"
                                      class="pink-node"
                                      >Q-97216 One Time Design
                                    </a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                          <li class="d-flex align-items-center">
                            <a href="javascript:void(0)" class="pink-node"
                              >Q-97216 One Time Design</a
                            >
                            <div class="first_bix"></div>
                            <div class="first_bix"></div>
                            <ul class="list-none">
                              <li class="d-flex align-items-center">
                                <a href="javascript:void(0)" class="blue-node"
                                  >Q-97216 One Time Design</a
                                >
                                <div class="first_bix"></div>
                                <ul class="list-none">
                                  <li class="d-flex align-items-center">
                                    <a
                                      href="javascript:void(0)"
                                      class="blue-node"
                                      >Q-97216 One Time Design</a
                                    >
                                  </li>
                                  <li class="d-flex align-items-center">
                                    <a
                                      href="javascript:void(0)"
                                      class="pink-node"
                                      >Q-97216 One Time Design</a
                                    >
                                  </li>
                                </ul>
                              </li>
                              <li class="d-flex align-items-center">
                                <a href="javascript:void(0)" class="pink-node"
                                  >Q-97216 One Time Design</a
                                >
                                <div class="first_bix"></div>
                                <ul class="list-none">
                                  <li class="d-flex align-items-center">
                                    <a
                                      href="javascript:void(0)"
                                      class="blue-node"
                                      >Q-97216 One Time Design</a
                                    >
                                  </li>
                                  <li class="d-flex align-items-center">
                                    <a
                                      href="javascript:void(0)"
                                      class="pink-node"
                                      >Q-97216 One Time Design</a
                                    >
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div id="exclusivedata" class="tab_content">
                <div class="gallery_masory_m d-flex">
                  <div class="grid-wrapper_i"> 
                    @foreach($stallionimages as $stallionimage)
                    <!-- Image Items -->
                    <div class="gallery_img">
                      <img
                        src="{{url($stallionimage->stallion_image) }}"
                        alt="Image 1"
                        class="img-cover"
                        onclick="openPreview(this)"
                      />
                    </div>
                   @endforeach

                   @foreach($stallionvideoS as $stallionvideo)
                    <!-- Image Items -->
                     <div class="gallery_img">
                      <video
                        src="{{url($stallionvideo->stallion_video) }}"
                        class="video-cover img-cover"
                        onclick="openPreview(this)"
                      ></video>
                    </div>
                   @endforeach
                    
                  </div>

                  <!-- Preview Section -->
                  <div class="previewContainer">
                    <div id="previewContent">
                      <img
                        src="./assets/image/Rectangle 21.png"
                        alt="Default Preview"
                        class="img-cover"
                      />
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="view_contract_btn text-center">
              <a
                href="javascript:void(0)"
                aria-label="View Contract"
                class="btn_i"
              >
                View Semen Contract
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- tab section end -->
    <!-- Stallions section start -->
   
    <!-- Mares section end -->
    <!-- Stallion with us start -->
    <section
      class="with_us_main pdb100"
      style="background-image: url('./assets/image/Rectangle\ 43.png')"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="with_us_inner text-center">
              <div class="with_us_heading mb20">
                <h2>Stallions Video</h2>
              </div>
              <div class="video_icon_m d-flex justify-content-center mb20">
                <div class="video_icon_i mb20 cursor-pointer">
                  <img
                    src="./assets/image/video-icon.png"
                    alt="video icon"
                    class="img-contain"
                  />
                </div>
                <div
                  class="video__pop d-none align-items-center justify-content-center"
                >
                  <div class="video_sc">
                    <div class="clos-btn cursor-pointer">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 384 512"
                      >
                        <path
                          d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"
                        ></path>
                      </svg>
                    </div>
                    <iframe
                      width="560"
                      height="315"
                      src="https://www.youtube.com/embed/0_auMA2y5QI?si=pGP87COV1nZsH4fs"
                      title="YouTube video player"
                      frameborder="0"
                      allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                      referrerpolicy="strict-origin-when-cross-origin"
                      allowfullscreen
                    ></iframe>
                  </div>
                </div>
              </div>
              <div class="with_us_btn">
                <a
                  href="javascript:void(0)"
                  class="btn_i"
                  aria-label="with Us listing"
                  >View All Staliions</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Stallion with us end -->
    <!-- Category Slider start -->
    <section id="categorySlider" class="categorySlider stallion-category">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="stallions_heading text-center">
              <h2>MOre Animals by the SAME OWNER</h2>
            </div>
            <div
              id="catslider_gallery"
              class="catslider owl-carousel owl-theme"
            >
            @foreach($stallionsSingleOwner as $stallionSingleOwner)
            @php
                            $stallionImage = $stallionSingleOwner->stallionImages->first();
            @endphp
            @if($stallionImage)
              <div class="item">
                <a href="javascript:void(0)">
                  <div
                    class="catimg d-flex align-items-end justify-content-center"
                    style="
                      background-image: url('{{url( $stallionImage->stallion_image) }}');
                    "
                  >
                    <div class="cattitle">
                      <p>{{$stallionSingleOwner->name}}</p>
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
    <!-- semen contract start -->
    <section class="semen_contract_f pdb50">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="semen_contract_i">
              <div class="semen_contract_head text-center mb50">
                <h3>2024 Semen contract</h3>
              </div>
              <div class="form-container">
                <form>
                  <div class="checkbox-group mb20">
                    <label class="filed_label mb20"
                      >Please Tick One the Following</label
                    >
                    <label><input type="checkbox" /> Chilled Semen $1650</label>
                    <label><input type="checkbox" /> Frozen Semen $1650</label>
                    <label
                      ><input type="checkbox" /> Exclusive Open Mare
                      Offer</label
                    >
                  </div>
                  <div class="owner_detail mb20">
                    <h3 class="mb20">Mare Owner Details</h3>
                    <div class="row">
                      <div class="form-group">
                        <label for="owner-name">Mare Owner Name:</label>
                        <input type="text" id="owner-name" name="owner-name" />
                      </div>

                      <div class="form-group">
                        <label for="trading-name">Trading Name:</label>
                        <input
                          type="text"
                          id="trading-name"
                          name="trading-name"
                        />
                      </div>

                      <div class="form-group">
                        <label for="postal-address">Postal Address:</label>
                        <input
                          type="text"
                          id="postal-address"
                          name="postal-address"
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <label for="suburb">Suburb:</label>
                        <input type="text" id="suburb" name="suburb" />
                      </div>
                      <div class="form-group">
                        <label for="state">State:</label>
                        <input type="text" id="state" name="state" />
                      </div>
                      <div class="form-group">
                        <label for="postcode">Post Code:</label>
                        <input type="text" id="postcode" name="postcode" />
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone" />
                      </div>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" />
                      </div>
                      <div class="form-group">
                        <label for="registration">AQHA:</label>
                        <select id="registration" name="registration">
                          <option value="aqha">AQHA</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <label for="membership-number"
                          >Membership Number:</label
                        >
                        <input
                          type="number"
                          id="membership-number"
                          name="membership-number"
                        />
                      </div>
                    </div>
                  </div>

                  <div class="mare_details_m">
                    <h3 class="mb20">Mare Details</h3>
                    <div class="row">
                      <div class="form-group">
                        <label for="mare-name">Mare Name:</label>
                        <input type="text" id="mare-name" name="mare-name" />
                      </div>

                      <div class="form-group">
                        <label for="sire">Sire:</label>
                        <input type="text" id="sire" name="sire" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <label for="dam">Dam:</label>
                        <input type="text" id="dam" name="dam" />
                      </div>

                      <div class="form-group">
                        <label for="breeding-type">Breeding Type:</label>
                        <select id="breeding-type" name="breeding-type">
                          <option value="ai">Artificial Insemination</option>
                          <!-- Add more options as needed -->
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <label for="certificate-required"
                          >Breeding certificate Required:</label
                        >
                        <select
                          id="certificate-required"
                          name="certificate-required"
                        >
                          <option value="aqha">AQHA</option>
                          <!-- Add more options as needed -->
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="breeding_center">
                    <h3 class="mb20">Mare Breeding Centre - Vet Details</h3>
                    <div class="row">
                      <div class="form-group">
                        <label for="vet-owner-name">Mare Owner Name:</label>
                        <input
                          type="text"
                          id="vet-owner-name"
                          name="vet-owner-name"
                        />
                      </div>

                      <div class="form-group">
                        <label for="vet-trading-name">Trading Name:</label>
                        <input
                          type="text"
                          id="vet-trading-name"
                          name="vet-trading-name"
                        />
                      </div>

                      <div class="form-group">
                        <label for="vet-postal-address">Postal Address:</label>
                        <input
                          type="text"
                          id="vet-postal-address"
                          name="vet-postal-address"
                        />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <label for="vet-suburb">Suburb:</label>
                        <input type="text" id="vet-suburb" name="vet-suburb" />
                      </div>
                      <div class="form-group">
                        <label for="vet-state">State:</label>
                        <input type="text" id="vet-state" name="vet-state" />
                      </div>
                      <div class="form-group">
                        <label for="vet-postcode">Post Code:</label>
                        <input
                          type="text"
                          id="vet-postcode"
                          name="vet-postcode"
                        />
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group">
                        <label for="vet-phone">Phone:</label>
                        <input type="tel" id="vet-phone" name="vet-phone" />
                      </div>
                      <div class="form-group">
                        <label for="vet-email">Email:</label>
                        <input type="email" id="vet-email" name="vet-email" />
                      </div>
                    </div>
                  </div>
                  <button class="btn_i" type="submit">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- semen contract end -->
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