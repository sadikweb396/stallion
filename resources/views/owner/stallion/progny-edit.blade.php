@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Edit Progeny Details</h3>
                  </div>
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">
                    <div class="main_tab_content">
                      <div class="main_stallions_d add_new_progeny">
                        <div class="">
                          <div class="title_bar mb20">
                            <p class="text-center">Progeny Details</p>
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
                                          id="Exceptional"@if($progeny->exceptional_progeny=='exceptional Progeny') checked @endif />
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
                                  <label for="trainer">Trainer</label>
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
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection