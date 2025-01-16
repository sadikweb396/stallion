@extends('layouts.owner.app')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Progeny Details</h3>
                  </div>
                  
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">
                    <div class="tab-links d-flex justify-space-between mb20">
                      <button class="tab-link" data-tab="tab-1">
                        <i class="fa-solid fa-heart-circle-plus"></i>Progeny
                        Details
                      </button>
                      <button class="tab-link" data-tab="tab-2">
                        <i class="fa-regular fa-image"></i> Images
                      </button>
                      <button class="tab-link" data-tab="tab-3">
                        <i class="fa-solid fa-video"></i> Videos
                      </button>
                
                    </div>
                    <div class="tab-content " id="tab-1">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20">
                            <p class="text-center">Progeny Details Details</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form action="{{route('owner.progeny-update')}}"method="post">
                                @csrf
                              <input type="hidden"name="progeny_id"value="{{$progeny->id}}">
                              <input type="hidden"name="">
                              <div class="form_main">
                                <div class="form-group">
                                  <div
                                    class="checkbox-group d-flex align-items-center gap20 flexwrap"
                                  >
                                    <div
                                      class="checkbox-group_i mb20 d-flex align-items-center gap10"
                                    >
                                      <label
                                        class="d-flex align-items-center justify-space-between"
                                      >
                                        <span>For Sale</span>
                                        <input type="checkbox"value="sale"name="sale"@if($progeny->sale=='sale') checked @endif />
                                      </label>
                                    </div>
                                    <div
                                      class="checkbox-group_i mb20 d-flex align-items-center gap10"
                                    >
                                      <label
                                        class="d-flex align-items-center justify-space-between"
                                      >
                                        <span>Marked as sold</span>
                                        <input type="checkbox"value="sold" name="sold"@if($progeny->sold=='sold') checked @endif />
                                      </label>
                                    </div>
                                    <div
                                      class="checkbox-group_i mb20 d-flex align-items-center gap10"
                                    >
                                      <label
                                        class="d-flex align-items-center justify-space-between"
                                      >
                                        <span
                                          >Is this Exceptional Progeny?</span
                                        >
                                        <input
                                          type="checkbox"value="exceptional Progeny" name="exceptional_progeny"
                                          id="Exceptional"@if($progeny->exceptional_progeny==1) checked @endif />
                                      </label>
                                    </div>
                                    <div class="checkbox-group_i mb20 d-flex align-items-center gap10">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="name"> Name </label>
                                  <input type="text" id="name" name="progeny_name"value="{{$progeny->progeny_name}}" />
                                </div>
                                <div class="form-group">
                                  <label for="date-of-birth">
                                    Date of Birth
                                  </label>
                                  <input
                                    type="date"
                                    id="date-of-birth"
                                    name="date_of_birth"value="{{$progeny->date_of_birth}}"
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="gender"> Gender </label>
                                    <select name="gender">
                                        
                                       <option value="male">Male</option>
                                       <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label for="color"> Color </label>
                                  <input type="text" id="color"value="{{$progeny->color}}"name="color" />
                                </div>
                                <div class="form-group">
                                  <label for="registeration-number">
                                    Registration number
                                  </label>
                                  <input
                                    type="text"
                                    id="registeration-number"
                                    name="registration_number"value="{{$progeny->registration_number}}"
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="breeder"> Breeder </label>
                                  <input
                                    type="text"
                                    id="breeder"
                                    name="breeder"value="{{$progeny->breeder}}"
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="trainer"> Trainer </label>
                                  <input
                                    type="text"
                                    id="trainer"
                                    name="trainer"value="{{$progeny->trainer}}"
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Performance History
                                  </label>
                                  <textarea
                                    id="w3review"
                                    name="progeny_performace_history"
                                    rows="4"
                                    cols="10"name="performace_history"
                                    placeholder="Enter Your Message"
                                    data-dashlane-rid="da36f0f4e5e99bfe"
                                    data-dashlane-classification="other"
                                  >{{$progeny->performace_history}}</textarea>
                                </div>
                                
                              </div>
                              <div class="update_btn d-flex justify-space-between mb50 gap10">
                              <button type="submit"class="btn btn_i black_btn">Update</button>
                            </div>
                            </form>
                          </div>  
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-2">
                      <div class="main_tab_content">
                        <div class="main_stallions_i">
                          <div class="our_stallions add_imgs_i">
                            <div
                              class="stallions_list_m d-flex gap20 flexwrap mb50"
                            >
                              <article
                                class="stallion_items stallions_add_new text-center"
                              >
                                <div class="stallion_title mb20">
                                  <p>Add New</p>
                                </div>
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center cursor-pointer add_imgs_b"
                                >
                                  <p>+</p>
                                </div>
                              </article>
                              @foreach($progenyImages as $progenyImage)
                              <article class="stallion_items text-center">
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                  style="
                                    background-image: url('{{ asset($progenyImage->image) }}');
                                  "
                                >
                                  <span class="percent_box">
                                    <svg>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                      ></circle>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                        style="--percent: 90"
                                      ></circle>
                                    </svg>
                                  </span>
                                </div>
                                <div class="stallion_title mtb20">
                                  <p class="stallions_name">{{$progenyImage->name}}</p>
                                  <p class="stallion-location">{{$progenyImage->stallion_location}}</p>
                                  <p class="stallion_date">{{$progenyImage->date}}</p>
                                </div>
                              </article>
                              @endforeach
                            </div>  
                          </div>
                          <div class="add-new-img-p d-none">
                            <div class="main-img">
                              <div
                                class="main_stallions_d add_new_progeny"
                                style="display: block"
                              >
                                <div class="">
                                  <div class="title_bar mb20">
                                    <p class="text-center">Add Images</p>
                                    <p
                                      class="back_to_btn add_imgs_b cursor-pointer"
                                    >
                                      <svg
                                        class="svg-inline--fa fa-arrow-left"
                                        aria-hidden="true"
                                        focusable="false"
                                        data-prefix="fas"
                                        data-icon="arrow-left"
                                        role="img"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512"
                                        data-fa-i2svg=""
                                      >
                                        <path
                                          fill="currentColor"
                                          d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"
                                        ></path>
                                      </svg>
                                    </p>
                                  </div>
                                  <div class="stallions_d_form mb50">
                                    <form action="{{route('owner.progeny-image')}}"method="post"class="mb20"enctype="multipart/form-data">
                                      @csrf
                                    <input type="hidden"name="stallion_id"value="{{$id}}">
                                      <div class="form_main">
                                        <div class="form-group">
                                          <div
                                            class="multi-upload cursor-pointer"
                                          >
                                            <label for="files"
                                              >Select multiple files:
                                            </label>
                                            <input
                                              id="files"
                                              type="file"
                                              name="stallion_image"
                                              onchange="readURL(this);"
                                              accept="image/*"
                                              multiple="true"
                                              multiple
                                              class="cursor-pointer"required
                                            />
                                            <button
                                              type="button"
                                              id="clear"
                                              class="cursor-pointer"
                                            >
                                              Clear
                                            </button>
                                            <output id="result" />
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="name"
                                            >Stallion Name
                                          </label>
                                          <input
                                            type="text"
                                            id="name"
                                            name="stallion_name"required
                                          />
                                        </div>
                                        <div class="form-group">
                                          <label for="Location">
                                            Location
                                          </label>
                                          <input
                                            type="text"
                                            id="Location"
                                            name="stallion_location"required
                                          />
                                        </div>
                                        <div class="form-group">
                                          <label for="Date"> Date </label>
                                          <input
                                            type="date"
                                            id="calender"
                                            name="calender"required
                                          />
                                        </div>
                                      </div>
                                      <button type="submit"class="btn btn_i black_btn">
                                        Update
                                      </button>
                                    </form>
                                    
                                    <div
                                      class="d-flex justify-space-between mb50 gap10"
                                    >
                                      <!-- <button
                                        class="btn btn_i black_btn Back_btn"
                                        onclick="activateTab()"
                                      >
                                        Back
                                      </button> -->
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> 
                    
                    <div class="tab-content" id="tab-3">
                      <div class="main_tab_content">
                        <div class="main_stallions_i">
                          <div class="our_stallions add_imgs_i">
                            <div
                              class="stallions_list_m d-flex gap20 flexwrap mb50"
                            >
                              <article
                                class="stallion_items stallions_add_new text-center"
                              >
                                <div class="stallion_title mb20">
                                  <p>Add New</p>
                                </div>
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center cursor-pointer add_imgs_b"
                                >
                                  <p>+</p>
                                </div>
                              </article>
                              @foreach($progenyVideos as $progenyVideo)
                              <article class="stallion_items text-center">
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                  style="
                                    background-image: url('{{ asset($progenyVideo->progeny_video) }}');
                                  "
                                >
                                  <span class="percent_box">
                                    <svg>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                      ></circle>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                        style="--percent: 90"
                                      ></circle>
                                    </svg>
                                  </span>
                                </div>
                                <div class="stallion_title mtb20">
                                  <p class="stallions_name">{{$progenyVideo->name}}</p>
                                  <p class="stallion-location">{{$progenyVideo->stallion_location}}</p>
                                  <p class="stallion_date">{{$progenyVideo->date}}</p>
                                </div>
                              </article>
                              @endforeach
                            </div>  
                          </div>
                          <div class="add-new-img-p d-none">
                            <div class="main-img">
                              <div
                                class="main_stallions_d add_new_progeny"
                                style="display: block"
                              >
                                <div class="">
                                  <div class="title_bar mb20">
                                    <p class="text-center">Add Video</p>
                                    <p
                                      class="back_to_btn add_imgs_b cursor-pointer"
                                    >
                                      <svg
                                        class="svg-inline--fa fa-arrow-left"
                                        aria-hidden="true"
                                        focusable="false"
                                        data-prefix="fas"
                                        data-icon="arrow-left"
                                        role="img"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 448 512"
                                        data-fa-i2svg=""
                                      >
                                        <path
                                          fill="currentColor"
                                          d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"
                                        ></path>
                                      </svg>
                                    </p>
                                  </div>
                                  <div class="stallions_d_form mb50">
                                    <form action="{{route('owner.progeny-video')}}"method="post"class="mb20"enctype="multipart/form-data">
                                      @csrf
                                    <input type="hidden"name="stallion_id"value="{{$id}}">
                                      <div class="form_main">
                                        <div class="form-group">
                                          <div
                                            class="multi-upload cursor-pointer"
                                          >
                                            <label for="files"
                                              >Select  files:
                                            </label>
                                            <input
                                              id="files"
                                              type="file"
                                              name="stallion_image"
                                              onchange="readURL(this);"
                                              accept="image/*"
                                              multiple="true"
                                              multiple
                                              class="cursor-pointer"required
                                            />
                                            <button
                                              type="button"
                                              id="clear"
                                              class="cursor-pointer"
                                            >
                                              Clear
                                            </button>
                                            <output id="result" />
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="name"
                                            >Stallion Name
                                          </label>
                                          <input
                                            type="text"
                                            id="name"
                                            name="stallion_name"required
                                          />
                                        </div>
                                        <div class="form-group">
                                          <label for="Location">
                                            Location
                                          </label>
                                          <input
                                            type="text"
                                            id="Location"
                                            name="stallion_location"required
                                          />
                                        </div>
                                        <div class="form-group">
                                          <label for="Date"> Date </label>
                                          <input
                                            type="date"
                                            id="calender"
                                            name="calender"required
                                          />
                                        </div>
                                      </div>
                                      <button type="submit"class="btn btn_i black_btn">
                                        Update
                                      </button>
                                    </form>
                                    
                                    <div
                                      class="d-flex justify-space-between mb50 gap10"
                                    >
                                      <!-- <button
                                        class="btn btn_i black_btn Back_btn"
                                        onclick="activateTab()"
                                      >
                                        Back
                                      </button> -->
                                      
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>     
                  
                    <div class="tab-content" id="tab-4">
                      <div class="main_tab_content">
                        <div class="main_stallions_d main_stallions_semen">
                          <div class="title_bar mb20">
                            <p class="text-center">Semen Contract</p>
                          </div>
                          <div class="stallions_d_form mb50">            
                          </div>       
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-5">
                      <div class="main_tab_content">
                        <div class="main_stallions_p">
                          <div class="our_stallions">
                            <div
                              class="stallions_list_m d-flex gap20 flexwrap mb50"
                            >
                              <article
                                class="stallion_items stallions_add_new text-center"
                              >
                                <div class="stallion_title mb20">
                                  <p>Progeny Name</p>
                                </div>
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center cursor-pointer add_progeny_data"
                                >
                                  <p>+</p>
                                </div> 
                              </article>
                            </div>                       
                          </div>
                          <div class="add-new-img-p">
                            <div class="main-img">
                              <!-- image upload area for popup-->
                            </div>
                          </div>
                        </div>
                        <div class="main_stallions_d">
                          <div class="add_new_progeny d-none">
                            <div class="title_bar mb20">
                              <p class="text-center">Progeny Details</p>
                            </div>
                            <div class="stallions_d_form mb50">
                            <form action="{{route('owner.progeny.create')}}"method="post">
                                @csrf
                             
                                <div class="form_main">
                                  <div class="form-group">
                                    <div
                                      class="checkbox-group d-flex align-items-center gap20 flexwrap"
                                    >
                                      <div
                                        class="checkbox-group_i mb20 d-flex align-items-center gap10"
                                      >
                                        <label
                                          class="d-flex align-items-center justify-space-between"
                                        >
                                          <span>For Sale</span>
                                          <input
                                            type="checkbox"
                                            id="for-sale"
                                            name="sale"value="sale"
                                          />
                                        </label>
                                        
                                      </div>
                                      <div
                                        class="checkbox-group_i mb20 d-flex align-items-center gap10"
                                      >
                                        <label
                                          class="d-flex align-items-center justify-space-between"
                                        >
                                          <span>Marked as sold</span>
                                          <input
                                            type="checkbox"
                                            id="for-sold"
                                            name="sold"value="sold"
                                          />
                                        </label>
                                       
                                      </div>           
                                      <div
                                        class="checkbox-group_i mb20 d-flex align-items-center gap10"
                                      >
                                        <label
                                          class="d-flex align-items-center justify-space-between"
                                        >
                                          <span
                                            >Is this Exceptional Progeny?</span
                                          >
                                          <input
                                            type="checkbox"
                                            id="Exceptional"
                                            name="exceptional_progeny"value="exceptional Progeny"
                                          />
                                        </label>
                                        
                                      </div>
                                      <div
                                        class="checkbox-group_i mb20 d-flex align-items-center gap10"
                                      >
                                        
                                       
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name"> Name </label>
                                    <input type="text" id="name" name="progeny_name" />
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="date-of-birth">
                                      Date of Birth
                                    </label>
                                    <input
                                      type="date"
                                      id="date-of-birth"
                                      name="date_of_birth"
                                      
                                    />
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="gender"> Gender </label>
                                    <select name="gender">
                                       <option value="male">Male</option>
                                       <option value="female">Female</option>
                                    </select>
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="color"> Color </label>
                                    <input
                                      type="text"
                                      id="color"
                                      name="color"
                                    />
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="registeration-number">
                                      Registration number
                                    </label>
                                    <input
                                      type="text"
                                      id="registeration-number"
                                      name="registration_number"
                                    />
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="breeder"> Breeder </label>
                                    <input
                                      type="text"
                                      id="breeder"
                                      name="breeder"
                                    />
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="trainer"> Trainer </label>
                                    <input
                                      type="text"
                                      id="trainer"
                                      name="trainer"
                                    />
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="Performance">
                                      Performance History
                                    </label>
                                    <input
                                      type="text"
                                      id="Performance"
                                      name="progeny_performace_history"
                                    />
                                    
                                  </div>
                                </div>
                                
                              <button class="btn btn_i black_btn">
                                Update
                              </button>
                              </form>
                            </div>
                            <div
                              class="update_btn d-flex justify-space-between mb50"
                            >
                             
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@push('scripts')
<script>
  function showTab(tabId) {
    $(".tab-content").removeClass("active");
    $("#" + tabId).addClass("active");
    $(".tab-link").removeClass("active");
    $(".tab-link[data-tab='" + tabId + "']").addClass("active");
  }

  $(".tab-link").on("click", function () {
    const tabId = $(this).data("tab");
    showTab(tabId);
  });

  $(".btn_update").on("click", function () {
    const nextTab = $(".tab-link.active").next(".tab-link").data("tab");
    if (nextTab) showTab(nextTab);
  });

  $(".Back_btn").on("click", function () {
    const prevTab = $(".tab-link.active").prev(".tab-link").data("tab");
    if (prevTab) showTab(prevTab);
  });
 
var tab =<?php echo json_encode($tab); ?>;

if(tab=='progeny'|| tab=='stallion' || tab=='image' || tab=='video' || tab=='pedigree' || tab=='mare'){
showTab("tab-1");
}
else if(tab=='progeny-image')
{
showTab("tab-2");
}
else if(tab=='progeny-video')
{
showTab("tab-3"); 
}
</script>
@endpush
@endsection          