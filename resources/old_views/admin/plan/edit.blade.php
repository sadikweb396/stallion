@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Plan</h3>
                  </div>
                  <div class="stallions_search">      
                  </div>
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">  
                    <div class="">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20">
                            <p class="text-center">Plan</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form method="post" action="{{ route('admin.plan.update', $plan->id) }}" enctype="multipart/form-data">
                            @csrf
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Plan Name </label>
                                  <input type="text"name="plan_name"value="{{$plan->plan_name}}"/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Plan Price</label>
                                  <input type="text"name="plan_price"value="{{$plan->plan_price}}"/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Plan Duration</label>
                                  <input type="text"name="plan_duration"value="{{$plan->plan_duration}}"/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group"> 
                                  <label for="name">Plan For</label>
                                    <select name="plan_for" required>
                                        <option value="">Choose Plan For {{$plan->plan_for}}</option>
                                        @foreach($plansfor as $plasfor)
                                            <option value="{{ $plasfor }}" @if($plasfor == $plan->plan_for) selected @endif>{{ ucfirst($plasfor) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              </div>
                             
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Plan Details</label>
                                  <textarea name="plan_details"id="plan_details">{{$plan->plan_details}}</textarea>
                                </div>
                              </div>
                                <div class="update_btn text-right mb50">
                               <button type="submit"class="btn btn_i black_btn">Save</button>
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
  @push('scripts')
  <script>
    ClassicEditor
      .create(document.querySelector('#plan_details'))
      .catch(error => {
                console.error(error);
    });
  </script>
  @endpush
  @endsection