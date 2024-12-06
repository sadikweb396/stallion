@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Stallion Details</h3>
                  </div>
                  <div class="stallions_search">
                    <form action="#">
                      <input
                        type="search"
                        placeholder="Enter Your Stallion Name"
                      />
                    </form>
                  </div>
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">
                    <div class="tab-links d-flex justify-space-between mb20">
                      <button class="tab-link" data-tab="tab-1">
                        <i class="fa-solid fa-heart-circle-plus"></i>Stallion
                        Details
                      </button>
                      <button class="tab-link active" data-tab="tab-2">
                        <i class="fa-regular fa-image"></i> Images
                      </button>
                      <button class="tab-link" data-tab="tab-3">
                        <i class="fa-solid fa-video"></i> Videos
                      </button>
                      <button class="tab-link" data-tab="tab-4">
                        <i class="fa-solid fa-file-contract"></i> Semen Contract
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
                            <p class="text-center">Stallion Details</p>
                          </div>
                          <div class="stallions_d_form mb50">
                            <form action="{{route('owner.stallion.update')}}"method="post">
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
                                    <form action="{{route('owner.stallion-image')}}"method="post"class="mb20"enctype="multipart/form-data">
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
                                    <form action="{{route('owner.stallion-video')}}"method="post"class="mb20"enctype="multipart/form-data">
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
                    <div class="tab-content" id="tab-4">
                      <div class="main_tab_content">
                        <div class="main_stallions_d main_stallions_semen">
                          <div class="title_bar mb20">
                            <p class="text-center">Semen Contract</p>
                          </div>
                          <div class="stallions_d_form mb50">
                            <form action="{{route('owner.semen-contract')}}"method="post">
                                @csrf
                              <input type="hidden"name="stallion_id"value="{{$id}}">
                              <div class="form_main">
                                <div class="form-group">
                                  <div class="checkbox-group d-flex gap20 justify-space-between">
                                    <div class="checkbox-group_i mb20">
                                      <label>
                                      <input type="checkbox" id="toggleCheckbox" name="chilled_semen" value="Chilled Semen"@if($semencontract)@if($semencontract->chilled_semen == 'Chilled Semen') checked @endif @endif/>
                                        Chilled Semen
                                      </label>
                                    </div>

                                    <div class="inner_field field_show_1">
                                      <div class="form-group">
                                        <label>
                                          <input type="checkbox"name="chilled_semen_lfg"value="Chilled LFG" @if($semencontract)@if($semencontract->chilled_semen_lfg == 'Chilled LFG') checked @endif @endif/>LFG(Tick If You gave live foal guarantee)
                                        </label>
                                      </div>
                                    </div>
                                    <div class="inner_field field_show_1">
                                      <div class="form-group d-flex align-items-center justify-content-end gap10">
                                        <label for="name">
                                          Price You want to offer
                                        </label>
                                        <input type="text"
                                          id="Price-You-want-to-offer"
                                          name="chilled_semen_price"value=" @if($semencontract) {{$semencontract->chilled_semen_price}} @endif"/>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div
                                    class="checkbox-group d-flex gap20 justify-space-between"
                                  >
                                    <div class="checkbox-group_i mb20">
                                      <label
                                        ><input
                                          type="checkbox"
                                          id="toggleCheckbox2"name="frozen_semen"value="Frozen Semen" @if($semencontract)@if($semencontract->frozen_semen == 'Frozen Semen') checked @endif @endif
                                        />
                                        Frozen
                                      </label>
                                    </div>

                                    <div class="inner_field field_show_2">
                                      <div class="form-group">
                                        <label
                                          ><input type="checkbox"name="frozen_semen_lfg"value="Frozen LFG" @if($semencontract)@if($semencontract->frozen_semen_lfg == 'Frozen LFG') checked @endif @endif/> LFG(Tick If
                                          You gave live foal guarantee)</label
                                        >
                                      </div>
                                    </div>
                                    <div class="inner_field field_show_2">
                                      <div
                                        class="form-group d-flex align-items-center justify-content-end gap10"
                                      >
                                        <label for="name">
                                          Price You want to offer
                                        </label>
                                        <input
                                          type="text"
                                          id="Price-You-want-to-offer"
                                          name="frozen_semen_price"value=" @if($semencontract) {{$semencontract->frozen_semen_price}} @endif"
                                        />
                                       
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="title_bar title_bar_t mb20">
                                  <p class="text-center">Vet Details</p>
                                </div>

                                <div class="form-group">
                                  <label for="name-breeding">
                                    Name of the Breeding center/Vet Clininc
                                  </label>
                                  <input
                                    type="text"
                                    id="name-breeding"
                                    name="name_of_clinic"value="@if(isset($vetdetail)) {{$vetdetail->name_of_clinic}}  @endif"
                                  required/>
                                </div>
                                <div class="form-group">
                                  <label for="address"> Address </label>
                                  <input
                                    type="text"
                                    id="address"
                                    name="address"value="@if(isset($vetdetail)) {{$vetdetail->address}} @endif"
                                    required/>
                                 
                                </div>
                                <div class="form-group">
                                  <label for="vet_name"> Vet Name </label>
                                  <input
                                    type="text"
                                    id="vet-name"
                                    name="vet_name"value="@if(isset($vetdetail)) {{$vetdetail->vet_name}} @endif"
                                    required/>
                                 
                                </div>
                                <div class="form-group">
                                  <label for="phone"> Phone </label>
                                  <input type="text" id="email" value="@if(isset($vetdetail)) {{$vetdetail->phone}} @endif"name="phone" required/>
                                  
                                </div>
                                <div class="form-group">
                                  <label for="email"> Email </label>
                                  <input type="email" id="email" value="@if(isset($vetdetail)) {{$vetdetail->email}} @endif"name="email" required/>
                                 
                                </div>
                                <div class="form-group">
                                  <label for="clinic-number"
                                    >Clinic Number</label
                                  >
                                  <input type="text"id="clinic-number"
                                    name="clinic_number"value="@if(isset($vetdetail)) {{$vetdetail->clinic_number}} @endif"
                                    required/>
                                 
                                </div>
                              </div>
                              <div class="update_btn text-right mb50 d-flex justify-space-between">
                           
                            <button type="submit"class="btn btn_i black_btn">Save</button>
                          </div>
                          </form>
                            
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
                                <div
                                  class="label_edit_m d-flex justify-space-between mb20"
                                >
                                  <div class="stallions_label">
                                    @if($progeny->sale=='sale')
                                    <div class="stallion_label_inner">
                                      <label>For Sale </label>
                                    </div>
                                    @else
                                    @if($progeny->sold=='sold')
                                    <div class="stallions_label">
                                      <div class="stallion_label_inner sold_tag">
                                        <label> Sold :$4555 </label>
                                      </div>
                                    </div>
                                    @endif
                                    @endif
                                  </div>
                                  <div class="edit-button">
                                    <a href="{{url('owner/progeny',$progeny->id)}}">
                                    <button class="btn">
                                      <div class="add_progeny_data">
                                      <i class="fa-solid fa-pencil"></i>
                                      </div>
                                    </button>
                                    <a>
                                  </div>
                                </div> 
                                @php $progenyImage=DB::table('progenyimages')->where('progeny_id',$progeny->id)->first(); @endphp
                               
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                  style="background-image:@if($progenyImage) url('{{ asset($progenyImage->image) }}'); @endif">
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
                                  <p class="stallions_name">{{$progeny->progeny_name}}</p>
                                </div>
                                <div
                                  class="exceptional_progeny showed text-center"
                                >
                                @if($progeny->exceptional_progeny=='exceptional Progeny')
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
                                <input type="hidden"name="stallion_id"value="{{$id}}">
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
                                            name="exceptional_progeny"value="1"
                                          />
                                        </label>  
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
                          <form action="{{route('owner.pedigree-stallion')}}"method="post">
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
@endsection          