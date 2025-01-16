@extends('layouts.owner.app')
@section('content')
<style>
  /* Modal Styles */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7);
  }
  .model-open{
    display: block ;
  }
  .modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 20px;
    border-radius: 10px;
    width: 100%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    animation: fadeIn 0.5s ease;
  }
  .close {
    color: #aaa;
    float: right;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.3s ease;
  }
    </style>
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Mare Details</h3>
                  </div>
                 
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">
                    <div class="tab-links d-flex justify-space-between mb20">
                      <button class="tab-link" data-tab="tab-1">
                        <i class="fa-solid fa-heart-circle-plus"></i>Mare
                        Details
                      </button>
                      <button class="tab-link " data-tab="tab-2">
                        <i class="fa-regular fa-image"></i> Images
                      </button>
                      <button class="tab-link" data-tab="tab-3">
                        <i class="fa-solid fa-video"></i> Videos
                      </button>
                     
                      <button class="tab-link" data-tab="tab-5">
                        <i class="fa-solid fa-temperature-empty"></i> Progeny
                      </button>

                      <button class="tab-link" data-tab="tab-6">
                        <i class="fa-solid fa-temperature-empty"></i> Pedigree
                      </button>
                    </div>
                    <div class="tab-content " id="tab-1">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20">
                            <p class="text-center">Mare Details</p>
                          </div>
                          <div class="stallions_d_form mb50">
                            <form action="{{route('owner.mare.update')}}"method="post">
                                @csrf
                              <input type="hidden"name="stallion_id"value="{{$id}}">
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name"> Name </label>
                                  <input type="text" id="name"value="{{$stallion->name}}"name="name" />
                                 
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Performance History
                                  </label>
                                  <textarea name="performance_history" id="performance_history">{{$stallion->performance_history}}</textarea>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Owner’s Name
                                  </label>
                                  <input
                                    type="text"
                                    id="owner-text"
                                    name="owner-text"value="{{ Auth::user()->username }}"
                                    readonly/>
                                  </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Owner’s Story
                                  </label>
                                  <textarea name="owner_story" id="owner_story">{{$stallion->owner_story}}</textarea>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Lifetime Story
                                  </label>
                                  <textarea name="lifetime_Story" id="lifetime_Story">{{$stallion->lifetime_story}}</textarea>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Professional Trainer
                                  </label>
                                  <textarea name="professional_trainer" id="personal_trainer">{{$stallion->professional_trainer}}</textarea>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                   Background Story 
                                  </label>
                                  <textarea name="background_story"id="background_story">{{$stallion->background_story}}</textarea>
                                </div>
                                <div class="form-group">
                                  <label for="Performance"> Bred By </label>
                                  <input type="text"id="Bred-By"value="{{$stallion->bred_by}}"name="bred_by"/>
                                 
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Registration Number
                                  </label>
                                  <input
                                    type="text"
                                    id="Registration-Details"
                                    name="registration_details"value="{{$stallion->registration_details}}"
                                  />
                                 
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Put semen available from
                                  </label>
                                  <input
                                    type="date"
                                    id="semen-available-from"
                                    name="put_semen_available_from"value="{{$stallion->put_semen_available_from}}"
                                  />
                                  </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Current performing discipline
                                  </label>
                                  <input
                                    type="text"
                                    id="performing-discipline"
                                    name="current_performing_discipline"value="{{$stallion->current_performing_discipline}}"
                                  />
                                  
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Trainer History
                                  </label>
                                  
                                  <textarea name="trainer_history" id="trainer_history">{{$stallion->trainer_history}}</textarea>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">Height </label>
                                  <input type="text"id="Height"value="{{$stallion->height}}"name="height"/>
                                 
                                </div>

                                <div class="form-group">
                                  <label for="Performance">
                                   color
                                  </label>
                                  <input type="text" name="color"value="{{$stallion->color}}">
                                </div>

                                <div class="form-group">
                                  <label for="Performance">
                                  Date of Birth
                                  </label>
                                  <input type="date" name="date_of_birth"value="{{$stallion->date_of_birth}}" required>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                  Badges Heading
                                  </label>
                                  <input type="text" name="stallion_heading"value="{{$stallion->stallion_heading}}">
                                </div>

                                <div class="form-group">
                                  <label for="Performance">
                                    First foal crop year
                                  </label>
                                  <input
                                    type="text"
                                    id="First-foal-crop-year"
                                    name="first_foal_crop_year"value="{{$stallion->first_foal_crop_year}}"
                                  />  
                                </div>


                                <div class="form-group">
                                  <label for="Performance">
                                    Please Select one Option
                                  </label>
                                  <select id="photographer" name="photographer">
                                    <option value="" disabled selected>
                                      Please choose below one
                                    </option>
                                    <option id=1 value="1">
                                      Provide Photographer for me
                                    </option>
                                    <option id="2"
                                      value="2"
                                    >
                                      Would like to select my own Photographer
                                    </option>
                                    <option id="3"
                                      value="3"
                                    >
                                      Would like my own Personal Photographer-
                                      Please contact me regarding photography
                                      Guidlines
                                    </option>
                                    <option id="4"
                                      value="4"
                                    >
                                      Would like my own Personal Photographer-
                                      Please contact me regarding photography
                                      Guidlines
                                    </option>
                                    <option id="5"
                                      value="5"
                                    >
                                      Already have recent photography to supply,
                                      Still need photography to be done. Contact
                                      me
                                    </option>
                                  </select>
                              
                                </div>
                              </div>
                              <div class="photographerappend"id="photographerappend">
                                @if($stallion->photographer==2 || $stallion->photographer==3 || $stallion->photographer==4 || $stallion->photographer==5)
                                @php $baseurl=url('/') @endphp
                                <span><a href="{{ $baseurl . '/photographers' }}">Photographer Link</a></span>
                                <span><a href=""><i class="fas fa-file-pdf"></i><a></span>
                                @endif
                              </div>
                              <div class="update_btn text-right mb50">
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
                              @foreach($stallionImages as $stallionImage)
                              <article class="stallion_items text-center">
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                  style="
                                    background-image: url('{{ asset($stallionImage->stallion_image) }}');
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
                                  <p class="stallions_name">{{$stallionImage->stallion_name}}</p>
                                  <p class="stallion-location">{{$stallionImage->stallion_location}}</p>
                                  <p class="stallion_date">{{$stallionImage->date}}</p>
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
                                    <form action="{{route('owner.mare-image')}}"method="post"class="mb20"enctype="multipart/form-data">
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
                                        Save
                                      </button>
                                    </form>
                                    
                                    <div
                                      class="d-flex justify-space-between mb50 gap10"
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
                    <div class="tab-content" id="tab-3">
                      <div class="main_tab_content">
                        <div class="main_stallions_i">
                          <div class="our_stallions add_video_i">
                            <div
                              class="stallions_list_m d-flex gap20 flexwrap mb50"
                            >
                              <article
                                class="stallion_items stallions_add_new text-center"
                              >
                                <div class="stallion_title mb20">
                                  <p>Add New Videos</p>
                                </div>
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center cursor-pointer add_video_b"
                                >
                                  <p>+</p>
                                </div>
                              </article>

                              @foreach($stallionVideos as $stallionvideo)
                              <article class="stallion_items text-center">
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                  style="background-image: url('{{ asset($stallionvideo->stallion_video) }}');">
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
                                  <p class="stallions_name">{{$stallionvideo->stallion_name}}</p>
                                  <p class="stallion-location">{{$stallionvideo->stallion_location}}</p>
                                  <p class="stallion_date">{{$stallionvideo->date}}</p>
                                </div>
                              </article>
                              @endforeach
                            </div>   
                          </div>
                          <div class="add-new-video-p d-none">
                            <div class="main-img">
                              <div
                                class="main_stallions_d add_new_progeny"
                                style="display: block"
                              >
                                <div class="">
                                  <div class="title_bar mb20">
                                    <p class="text-center">Add Video</p>
                                    <p
                                      class="back_to_btn add_video_b cursor-pointer"
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
                                    <form action="{{route('owner.mare-video')}}"method="post"class="mb20"enctype="multipart/form-data">
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
                                              type="file"
                                              name="stallion_video"
                                              onchange="readURL(this);"
                                              accept="video/*"
                                              multiple="true"
                                              multiple
                                              class="cursor-pointer"
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
                                            name="stallion_name"
                                          />
                                        </div>
                                        <div class="form-group">
                                          <label for="Location">
                                            Location
                                          </label>
                                          <input
                                            type="text"
                                            id="Location"
                                            name="stallion_location"
                                          />
                                        </div>
                                        <div class="form-group">
                                          <label for="Date"> Date </label>
                                          <input
                                            type="date"
                                            id="calender"
                                            name="calender"
                                          />
                                        </div>
                                      </div>
                                      <button type="submit"class="btn btn_i black_btn">
                                        Save
                                      </button>
                                    </form>
                                  
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="add-new-img-p">
                            <div class="main-img">
                              <!-- image upload area for popup-->
                            </div>
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
                              @foreach($progenys as $progeny)
                              <article class="stallion_items text-center">
                                <div class="label_edit_m d-flex justify-space-between mb20">
                                  <div class="stallions_label">
                                  @if($progeny->sale=='sale')
                                    <div class="stallion_label_inner">
                                      <label> For Sale </label>
                                    </div>
                                  @endif
                                  @if($progeny->sold=='sold')
                                     <div class="stallion_label_inner sold_tag">
                                        <label> Sold :$4555 </label>
                                      </div>
                                  @endif
                                  </div>
                                  <div class="edit-button">
                                  <a href="{{url('owner/mare/progeny',$progeny->id)}}">
                                    <button class="btn">
                                      <svg class="svg-inline--fa fa-pencil" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pencil" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1 0 32c0 8.8 7.2 16 16 16l32 0zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path></svg><!-- <i class="fa-solid fa-pencil"></i> Font Awesome fontawesome.com -->
                                    </button>
</a>
                                  </div>
                                </div>
                                @php $progenyImage=DB::table('progenyimages')->where('progeny_id',$progeny->id)->first(); @endphp
                                <div class="add_stallion_bar d-flex align-items-center justify-content-center background-img"  style="background-image:@if($progenyImage) url('{{ asset($progenyImage->image) }}'); @endif">
                                  <span class="percent_box">
                                    <svg>
                                      <circle cx="105" cy="105" r="100"></circle>
                                      <circle cx="105" cy="105" r="100" style="--percent: 90"></circle>
                                    </svg>
                                  </span>
                                </div>
                                <div class="stallion_title mtb20">
                                  <p class="stallions_name">{{$progeny->progeny_name}}</p>
                                </div>
                                <div class="exceptional_progeny showed text-center">
                                @if($progeny->exceptional_progeny==1)
                                  <img
                                    src="{{ asset('assets/frontend/image/star.png')}}"
                                    alt="exceptional_progeny"
                                    class="img-contain"
                                  />
                                  @endif
                                </div>
                              </article>
                              @endforeach
                             
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
                                <input type="hidden"name="stallion_id"id="stallion_id"value="{{$id}}">
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
                                          <p
                                            >Is this Exceptional Progeny?</p
                                          >
                                          <input
                                            type="checkbox"
                                            id="checkbox"
                                            name="exceptional_progeny"value="1"
                                          />
                                        </label>  
                                        <div id="model"></div>
                                        
                                      </div>
                                      <div class="checkbox-group_i mb20 d-flex align-items-center gap10">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name"> Name </label>
                                    <input type="text" id="name" name="progeny_name" required />
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="date-of-birth">
                                      Date of Birth
                                    </label>
                                    <input
                                      type="date"
                                      id="date-of-birth"
                                      name="date_of_birth"required/>
                                  </div>
                                  <div class="form-group">
                                    <label for="gender"> Gender </label>
                                    <select name="gender" required>
                                       <option value="male">Male</option>
                                       <option value="female">Female</option>
                                    </select>
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="color"> Color </label>
                                    <input
                                      type="text"
                                      id="color"
                                      name="color"required
                                    />
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="registeration-number">
                                      Registration number
                                    </label>
                                    <input
                                      type="text"
                                      id="registeration-number"
                                      name="registration_number"required
                                    />
                                   
                                  </div>
                                  <div class="form-group">
                                    <label for="breeder"> Breeder </label>
                                    <input
                                      type="text"
                                      id="breeder"
                                      name="breeder"required
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
                                Save
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

                    <div class="tab-content" id="tab-6">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20">
                            <p class="text-center">Pedigree Details</p>
                          </div>
                          <form action="{{route('owner.pedigree-mare')}}"method="post">
                          @csrf
                          <input type="hidden"name="stallion_id"value="{{$stallion->id}}">
                          <div class="main_tab_m pedigreechart_main">
                            <div class="tabs_list_m">
                              <div
                                id="pedigreechart"
                                class="tab_content active"
                              >
                                 <div class="pedigree_chart_m">
                                  <div class="chart_tree">
                                    <ul class="list-none">
                                      <li class="d-flex align-items-center">
                                        <div class="pedigreeForm">
                                        
                                          <input
                                            type="text"
                                            class="input input1"
                                            placeholder="Registration"value="@if($pedigree){{$pedigree->stallionregistration}}@endif"name="stallionregistration"required
                                          />
                                          <input
                                            type="text"
                                            class="input input2"
                                            placeholder="Name"
                                            style="display:none"name="stallionname"value="@if($pedigree){{$pedigree->stallionregistration}}@endif"required
                                          />    
                                          <input
                                            type="text"
                                            class="input input2"
                                            placeholder="Link"
                                            style="display:none"name="stallionlink"value="@if($pedigree){{$pedigree->stallionlink}}@endif"required
                                          />
                                        </div>
                                        <div class="first_bix"></div>
                                        <ul class="list-none">
                                          <li class="d-flex align-items-center">
                                            <div class="pedigreeForm blue-node">
                                              <input
                                                type="text"
                                                class="input input1"value="@if($pedigree){{$pedigree->sireregistration1}}@endif"
                                                placeholder="Registration"name="sireregistration1"required
                                              />
                                              <input
                                                type="text"
                                                class="input input2"value="@if($pedigree){{$pedigree->sirename1}}@endif"
                                                placeholder="Name"
                                                style="display: none"name="sirename1"required
                                              />
                                              <input
                                                type="text"
                                                class="input input2"
                                                placeholder="Link"
                                                style="display:none"name="sirelink1"value="@if($pedigree){{$pedigree->sirelink1}}@endif"required
                                              /> 
                                            </div>
                                           
                                            <div class="first_bix"></div>
                                            <ul class="list-none">
                                              <li
                                                class="d-flex align-items-center"
                                              >
                                                <div
                                                  class="pedigreeForm blue-node"
                                                >
                                                  <input
                                                    type="text"
                                                    class="input input1"value="@if($pedigree){{$pedigree->sireregistration2}}@endif"
                                                    placeholder="Registration"name="sireregistration2"required
                                                  />
                                                  <input
                                                    type="text"
                                                    class="input input2"value="@if($pedigree){{$pedigree->sirename2}}@endif"
                                                    placeholder="Name"
                                                    style="display: none"name="sirename2"required
                                                  />
                                                  <input
                                                    type="text"
                                                    class="input input2"value="@if($pedigree){{$pedigree->sirelink2}}@endif"
                                                    placeholder="Link"
                                                    style="display: none"name="sirelink2"required
                                                  />
                                                </div>
                                                <!-- <a
                                                  href="javascript:void(0)"
                                                  class="blue-node"
                                                  >Q-97216 One Time Design
                                                </a> -->
                                                <div class="first_bix"></div>
                                                <ul class="list-none">
                                                  <li
                                                    class="d-flex align-items-center"
                                                  >
                                                    <div
                                                      class="pedigreeForm blue-node"
                                                    >
                                                      <input
                                                        type="text"
                                                        class="input input1"value="@if($pedigree){{$pedigree->sireregistration3}}@endif"
                                                        placeholder="Registration"
                                                        name="sireregistration3"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->sirename3}}@endif"
                                                        placeholder="Name"
                                                        style="display: none"
                                                        name="sirename3"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->sirelink3}}@endif"
                                                        placeholder="Link"
                                                        style="display: none"
                                                        name="sirelink3"required
                                                      />
                                                    </div>
                                                  </li>
                                                  <li
                                                    class="d-flex align-items-center"
                                                  >
                                                    <div
                                                      class="pedigreeForm pink-node"
                                                    >
                                                      <input
                                                        type="text"
                                                        class="input input1"value="@if($pedigree){{$pedigree->damregistration7}}@endif"
                                                        placeholder="Registration"name="damregistration7"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->damname7}}@endif"
                                                        placeholder="Name"
                                                        style="display: none"
                                                        name="damname7"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->damlink7}}@endif"
                                                        placeholder="Link"
                                                        style="display: none"
                                                        name="damlink7"required
                                                      />
                                                    </div>
                                                  </li>
                                                </ul>
                                              </li>
                                              <li
                                                class="d-flex align-items-center"
                                              >
                                                <div
                                                  class="pedigreeForm pink-node"
                                                >
                                                  <input
                                                    type="text"
                                                    class="input input1"value="@if($pedigree){{$pedigree->damregistration6}}@endif"
                                                    placeholder="Registration"name="damregistration6"required
                                                  />
                                                  <input
                                                    type="text"
                                                    class="input input2"value="@if($pedigree){{$pedigree->damname6}}@endif"
                                                    placeholder="Name"
                                                    style="display: none"name="damname6"required
                                                  />
                                                  <input
                                                    type="text"
                                                    class="input input2"value="@if($pedigree){{$pedigree->damlink6}}@endif"
                                                    placeholder="Link"
                                                    style="display: none"name="damlink6"required
                                                  />
                                                </div>
                                                <div class="first_bix"></div>
                                                <ul class="list-none">
                                                  <li
                                                    class="d-flex align-items-center"
                                                  >
                                                    <div
                                                      class="pedigreeForm blue-node"
                                                    >
                                                      <input
                                                        type="text"
                                                        class="input input1"value="@if($pedigree){{$pedigree->sireregistration4}}@endif"
                                                        placeholder="Registration"name="sireregistration4"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->sirename4}}@endif"
                                                        placeholder="Name"
                                                        style="display: none"name="sirename4"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->sirelink4}}@endif"
                                                        placeholder="Link"
                                                        style="display: none"name="sirelink4"required
                                                      />
                                                    </div>
                                                  </li>
                                                  <li
                                                    class="d-flex align-items-center"
                                                  >
                                                    <div
                                                      class="pedigreeForm pink-node"
                                                    >
                                                      <input
                                                        type="text"
                                                        class="input input1"value="@if($pedigree){{$pedigree->damregistration5}}@endif"
                                                        placeholder="Registration"name="damregistration5"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->damname5}}@endif"
                                                        placeholder="Name"
                                                        style="display: none"name="damname5"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->damlink5}}@endif"
                                                        placeholder="Link"
                                                        style="display: none"name="damlink5"required
                                                      />
                                                    </div>
                                                  </li>
                                                </ul>
                                              </li>
                                            </ul>
                                          </li>
                                          <li class="d-flex align-items-center">
                                            <div class="pedigreeForm pink-node">
                                              <input
                                                type="text"
                                                class="input input1"value="@if($pedigree){{$pedigree->damregistration1}}@endif"
                                                placeholder="Registration"name="damregistration1"required
                                              />
                                              <input
                                                type="text"
                                                class="input input2"value="@if($pedigree){{$pedigree->damname1}}@endif"
                                                placeholder="Name"
                                                style="display: none"name="damname1"required
                                              />
                                              <input type="text"
                                                      class="input input2"value="@if($pedigree){{$pedigree->damlink1}}@endif"
                                                        placeholder="Link"
                                                        style="display: none"name="damlink1"required
                                              />
                                            </div>
                                            <div class="first_bix"></div>
                                            <div class="first_bix"></div>
                                            <ul class="list-none">
                                              <li
                                                class="d-flex align-items-center"
                                              >
                                                <div
                                                  class="pedigreeForm blue-node"
                                                >
                                                  <input
                                                    type="text"
                                                    class="input input1"value="@if($pedigree){{$pedigree->sireregistration6}}@endif"
                                                    placeholder="Registration"name="sireregistration6"required
                                                  />
                                                  <input
                                                    type="text"
                                                    class="input input2"value="@if($pedigree){{$pedigree->sirename6}}@endif"
                                                    placeholder="Name"
                                                    style="display: none"name="sirename6"required
                                                  />
                                                  <input type="text"
                                                      class="input input2"value="@if($pedigree){{$pedigree->sirelink6}}@endif"
                                                        placeholder="Link"
                                                        style="display: none"name="sirelink6"required
                                                  />
                                                </div>
                                                <div class="first_bix"></div>
                                                <ul class="list-none">
                                                  <li
                                                    class="d-flex align-items-center"
                                                  >
                                                    <div
                                                      class="pedigreeForm blue-node"
                                                    >
                                                      <input
                                                        type="text"
                                                        class="input input1"value="@if($pedigree){{$pedigree->sireregistration5}}@endif"
                                                        placeholder="Registration"name="sireregistration5"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->sirename5}}@endif"
                                                        placeholder="Name"
                                                        style="display: none"name="sirename5"required
                                                      />
                                                      <input type="text"
                                                      class="input input2"value="@if($pedigree){{$pedigree->sirelink5}}@endif"
                                                        placeholder="Link"
                                                        style="display: none"name="sirelink5"required
                                                      />
                                                    </div>
                                                  </li>
                                                  <li
                                                    class="d-flex align-items-center"
                                                  >
                                                    <div
                                                      class="pedigreeForm pink-node"
                                                    >
                                                      <input
                                                        type="text"
                                                        class="input input1"value="@if($pedigree){{$pedigree->damregistration4}}@endif"
                                                        placeholder="Registration"name="damregistration4"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->damname4}}@endif"
                                                        placeholder="Name"name="damname4"required
                                                        style="display: none"
                                                      />
                                                      <input type="text"
                                                      class="input input2"value="@if($pedigree){{$pedigree->damlink4}}@endif"
                                                        placeholder="Link"
                                                        style="display: none"name="damlink4"required
                                                      />
                                                    </div>
                                                  </li>
                                                </ul>
                                              </li>
                                              <li
                                                class="d-flex align-items-center"
                                              >
                                                <div
                                                  class="pedigreeForm pink-node"
                                                >
                                                  <input
                                                    type="text"
                                                    class="input input1"value="@if($pedigree){{$pedigree->damregistration2}}@endif"
                                                    placeholder="Registration"
                                                    name="damregistration2"required
                                                  />
                                                  <input
                                                    type="text"
                                                    class="input input2"value="@if($pedigree){{$pedigree->damname2}}@endif"
                                                    placeholder="Name"
                                                    style="display: none"
                                                    name="damname2"required
                                                  />
                                                  <input
                                                    type="text"
                                                    class="input input2"value="@if($pedigree){{$pedigree->damlink2}}@endif"
                                                    placeholder="Link"
                                                    style="display: none"
                                                    name="damlink2"required
                                                  />
                                                </div>
                                                <div class="first_bix"></div>
                                                <ul class="list-none">
                                                  <li
                                                    class="d-flex align-items-center"
                                                  >
                                                    <div
                                                      class="pedigreeForm blue-node"
                                                    >
                                                      <input
                                                        type="text"
                                                        class="input input1"value="@if($pedigree){{$pedigree->sireregistration7}}@endif"
                                                        placeholder="Registration"
                                                        name="sireregistration7"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->sirename7}}@endif"
                                                        placeholder="Name"
                                                        style="display: none"
                                                        name="sirename7"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->sirelink7}}@endif"
                                                        placeholder="Link"
                                                        style="display: none"
                                                        name="sirelink7"required
                                                      />
                                                    </div>
                                                  </li>
                                                  <li
                                                    class="d-flex align-items-center"
                                                  >
                                                    <div
                                                      class="pedigreeForm pink-node"
                                                    >
                                                      <input
                                                        type="text"
                                                        class="input input1"value="@if($pedigree){{$pedigree->damregistration3}}@endif"
                                                        placeholder="Registration"
                                                        name="damregistration3"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->damname3}}@endif"
                                                        placeholder="Name"
                                                        style="display: none"
                                                        name="damname3"required
                                                      />
                                                      <input
                                                        type="text"
                                                        class="input input2"value="@if($pedigree){{$pedigree->damlink3}}@endif"
                                                        placeholder="Link"
                                                        style="display: none"
                                                        name="damlink3"required
                                                      />
                                                    </div>
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
                            </div>
                          </div>
                          <div class="update_btn  mb50">
                               <button type="submit"class="btn btn_i black_btn">save</button>
                          </div>
                          </form>
                          
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
   ClassicEditor
    .create(document.querySelector('#performance_history'))
    .catch(error => {
        console.error(error);
    });

  ClassicEditor
    .create(document.querySelector('#owner_story'))
    .catch(error => {
          console.error(error);
  });

  ClassicEditor
    .create(document.querySelector('#lifetime_Story'))
    .catch(error => {
          console.error(error);
  });


  ClassicEditor
    .create(document.querySelector('#personal_trainer'))
    .catch(error => {
          console.error(error);
  });

  ClassicEditor
    .create(document.querySelector('#background_story'))
    .catch(error => {
          console.error(error);
  });

  ClassicEditor
      .create(document.querySelector('#trainer_history'))
      .catch(error => {
                console.error(error);
  });

  
  $(document).ready(function() {
    // Fetch the current checkbox status from the database
    $('#checkbox').on('change', function() {
     
      $('#model').empty();
        var isChecked = $(this).prop('checked'); // Returns boolean (true or false)
      
        if (isChecked) { // No need to compare with 'true' as isChecked is already a boolean
          var stallionId = $('#stallion_id').val(); 
           
            $.ajax({
                url: '{{ route("owner.checkbox-update") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    checked: isChecked,
                    stallionId: stallionId,
                },
                success: function(response) {
                 
                    if (response.success) {
                     
                        $('#checkbox').prop('checked', false); // Uncheck the checkbox
                        $('#model').append(`
  <div id="editDetailsModal" class="editDetailsModal modal-open">
    <div class="modal-content">
      <span class="close">&times;</span>
     <p>Another progeny is already exceptional. Do you want to be this progeny exceptional?</p><div class="confirm"><p id="confirm">Confirm</p
 
    </div>
  </div>
`);


                    } 
                }
            });
        }
    });
});
$(document).ready(function() {
    $("body").on("click", "#confirm", function() {
      $('#checkbox').prop('checked', true);
      $('#model').empty();
    });
    $("body").on("click", "#cancel", function() {
      $('#checkbox').prop('checked', false);
      $('#model').empty();
    });
    });

  $(document).ready(function() {
  $('#checkbox').on('change', function() {
  });
  });

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

if(tab=='mare'){
showTab("tab-1");
}
else if(tab=='image')
{
showTab("tab-2");
}
else if(tab=='video')
{
showTab("tab-3"); 
}
else if(tab=='Semen Contract')
{
showTab("tab-4"); 
}
else if(tab=='progeny')
{
showTab("tab-5"); 
}
else if(tab=='pedigree')
{
showTab("tab-6"); 
}
</script>
@endpush
@endsection                   