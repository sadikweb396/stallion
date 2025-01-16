
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
                <p>@if($pedigree){{$pedigree->sirename1}} - {{$pedigree->sireregistration1}}@endif</p>
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
                <p>@if($pedigree){{$pedigree->damname1}} - {{$pedigree->damregistration1}}@endif</p>
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
              @if($performanceHistoryVideo) 
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
                    src="{{url($performanceHistoryVideo->stallion_video)}}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen
                  ></iframe>

                </div>
               
              </div>
              @endif
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
                        class="btn_i Interested_popup"
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
                    " >
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
                              <a href="javascript:void(0);" class="btn_i btn Interested_popup">
                                Interested In Purchasing
                              </a>
                              @else
                              <a href="javascript:void(0);" class="btn_i btn Interested_popup">
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
                      <a href="@if($pedigree) {{url('single-mare/'.$pedigree->stallionregistration)}} @endif" class="black-node"target="_blank">@if($pedigree) {{$pedigree->stallionregistration}} {{$pedigree->stallionname}}   @endif  @if($pedigree) {{$pedigree->stallionname}} @endif
                      </a>
                        <div class="first_bix"></div>

                        <ul class="list-none">
                          <li class="d-flex align-items-center">
                            <a href="@if($pedigree) {{url('single-stallion/'.$pedigree->sireregistration1)}} @endif" class="blue-node"target="_blank"
                              >@if($pedigree) {{$pedigree->sireregistration1}} @endif  @if($pedigree) {{$pedigree->sirename1}} @endif
                            </a>
                            <div class="first_bix"></div>
                            <ul class="list-none">
                              <li class="d-flex align-items-center">
                                 <a href="@if($pedigree) {{url('single-stallion/'.$pedigree->sireregistration2)}} @endif" class="blue-node"target="_blank"
                                  >@if($pedigree) {{$pedigree->sireregistration2}} @endif  @if($pedigree) {{$pedigree->sirename2}} @endif
                                </a>
                                <div class="first_bix"></div>
                                <ul class="list-none">
                                  <li class="d-flex align-items-center">
                                     <a href="@if($pedigree) {{url('single-stallion/'.$pedigree->sireregistration3)}} @endif" target="_blank"
                                      class="blue-node" target="_blank"
                                      >@if($pedigree) {{$pedigree->sireregistration3}} @endif  @if($pedigree) {{$pedigree->sirename3}} @endif
                                    </a>
                                  </li>
                                  <li class="d-flex align-items-center">
                                     <a href="@if($pedigree) {{url('single-mare/'.$pedigree->damregistration7)}} @endif" target="_blank"
                                      class="pink-node" target="_blank"
                                      >@if($pedigree) {{$pedigree->damregistration7}} @endif  @if($pedigree) {{$pedigree->damname7}} @endif
                                    </a>
                                  </li>
                                </ul>
                              </li>
                              <li class="d-flex align-items-center">
                                <a href="@if($pedigree) {{url('single-mare/'.$pedigree->damregistration6)}} @endif" target="_blank"
                                      class="pink-node" target="_blank"
                                  > @if($pedigree) {{$pedigree->damregistration6}} @endif  @if($pedigree) {{$pedigree->damname6}} @endif</a
                                >
                                <div class="first_bix"></div>
                                <ul class="list-none">
                                  <li class="d-flex align-items-center">
                                    <a href="@if($pedigree) {{url('single-stallion/'.$pedigree->sireregistration4)}} @endif" target="_blank"
                                      class="blue-node" target="_blank"
                                      >@if($pedigree) {{$pedigree->sireregistration4}} @endif  @if($pedigree) {{$pedigree->sirename4}} @endif</a
                                    >
                                  </li>
                                  <li class="d-flex align-items-center">
                                     <a href="@if($pedigree) {{url('single-mare/'.$pedigree->damregistration5)}} @endif" target="_blank"
                                      class="pink-node" target="_blank"
                                      > @if($pedigree) {{$pedigree->damregistration5}} @endif  @if($pedigree) {{$pedigree->damname5}} @endif
                                    </a>
                                  </li>
                                </ul>
                              </li>
                            </ul>
                          </li>
                          <li class="d-flex align-items-center">
                              <a href="@if($pedigree) {{url('single-mare/'.$pedigree->damregistration1)}} @endif" target="_blank"
                                      class="pink-node" target="_blank"
                              >@if($pedigree) {{$pedigree->damregistration1}} @endif  @if($pedigree) {{$pedigree->damname1}} @endif</a
                            >
                            <div class="first_bix"></div>
                            <div class="first_bix"></div>
                            <ul class="list-none">
                              <li class="d-flex align-items-center">
                                 <a href="@if($pedigree) {{url('single-stallion/'.$pedigree->sireregistration6)}} @endif" target="_blank"
                                      class="blue-node" target="_blank"
                                  >@if($pedigree) {{$pedigree->sireregistration6}} @endif  @if($pedigree) {{$pedigree->sirename6}} @endif</a
                                >
                                <div class="first_bix"></div>
                                <ul class="list-none">
                                  <li class="d-flex align-items-center">
                                   <a href="@if($pedigree) {{url('single-stallion/'.$pedigree->sireregistration5)}} @endif"target="_blank"
                                      class="blue-node" target="_blank"
                                      >@if($pedigree) {{$pedigree->sireregistration5}} @endif  @if($pedigree) {{$pedigree->sirename5}} @endif</a
                                    >
                                  </li>
                                  <li class="d-flex align-items-center">
                                    <a href="@if($pedigree) {{url('single-mare/'.$pedigree->damregistration4)}} @endif"target="_blank"
                                      class="pink-node" target="_blank"
                                      > @if($pedigree) {{$pedigree->damregistration4}} @endif  @if($pedigree) {{$pedigree->damname4}} @endif</a
                                    >
                                  </li>
                                </ul>
                              </li>
                              <li class="d-flex align-items-center">
                                 <a href="@if($pedigree) {{url('single-mare/'.$pedigree->damregistration2)}} @endif" arget="_blank"
                                      class="pink-node" target="_blank"
                                  > @if($pedigree) {{$pedigree->damregistration2}} @endif  @if($pedigree) {{$pedigree->damname2}} @endif</a
                                >
                                <div class="first_bix"></div>
                                <ul class="list-none">
                                  <li class="d-flex align-items-center">
                                   <a href="@if($pedigree) {{url('single-stallion/'.$pedigree->sireregistration7)}} @endif" target="_blank"
                                      class="blue-node" target="_blank"
                                      > @if($pedigree) {{$pedigree->sireregistration7}} @endif  @if($pedigree) {{$pedigree->sirename7}} @endif</a
                                    >
                                  </li>
                                  <li class="d-flex align-items-center">
                                    <a href="@if($pedigree) {{url('single-mare/'.$pedigree->damregistration3)}} @endif" target="_blank"
                                      class="pink-node" target="_blank"
                                      >@if($pedigree) {{$pedigree->damregistration3}} @endif  @if($pedigree) {{$pedigree->damname3}} @endif</a
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
                      @if($previewImage)
                      <img
                        src="{{url($previewImage->stallion_image)}}"
                        alt="Default Preview"
                        class="img-cover"
                      />
                      @endif
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
    </section>
    <!-- section for advertisements start-->
    <section
      id="categorySlider"
      class="advertisement_sec background-img categorySlider"
    >
    @php $advertisements=DB::table('advertisements')->where('page','Single Mare')->get(); @endphp
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
    @endsection