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
                                  <label for="name">Plan Tilte</label>
                                  <textarea name="plan_title"id="plan_details">{{$plan->plan_details}}</textarea>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <div id="dynamicInputContainer">
                                    <div class="input-group">
                                      <label for="name">Plan Details</label>
                                      @php 
                                          $plans = DB::table('plandetails')->where('plan_id', $plan->id)->get(); 
                                          $planempty = DB::table('plandetails')->where('plan_id', $plan->id)->first();
                                      @endphp
                                      @if(empty($planempty))
                                      <input type="text" class="plan" name="plan_details[]"value="{{$plan->plandetails}}"placeholder="Enter plan details" style="width:95%;">
                                      <button type="button" class="add-input">Add</button>
                                      @endif
                                      @foreach($plans as $key=>$plan)
                                      @if($key==0)
                                      <input type="text" class="plan" name="plan_details[]"value="{{$plan->plandetails}}"placeholder="Enter plan details" style="width:95%;">
                                      <button type="button" class="add-input">Add</button>
                                      @else
                                      <input type="text" class="plan-{{$key}}" name="plan_details[]"value="{{$plan->plandetails}}"placeholder="Enter plan details" style="width:95%;margin-top:10px;">
                                      <button type="button" class="remove-input-{{$key}}"><i class="fa-solid fa-xmark"></i></button>
                                      @endif
                                      @endforeach
                                     
                                    </div>
                                  </div> 
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
    $(document).ready(function () {
  // Function to add a new input field
  $('#dynamicInputContainer').on('click', '.add-input', function () {
    const newInputGroup = `
      <div class="input-group">
        <input type="text" class="plan" name="plan_details[]" placeholder="Enter plan details" style="width:95%;margin-top:10px;">
        <button type="button" class="remove-input"><i class="fa-solid fa-xmark"></i></button>
      </div>`;
    $('#dynamicInputContainer').append(newInputGroup);
  });
  @foreach($plans as $key => $plan)
    // Add the remove functionality for dynamically generated buttons
    $(document).on('click', '.remove-input-{{$key}}', function() {
      $('.plan-{{$key}}').remove();
      $('.remove-input-{{$key}}').remove();
    });
  @endforeach
 
  $('#dynamicInputContainer').on('click', '.remove-input', function () {
   
    $(this).closest('.input-group').remove();
  });
  });
</script>
  @endpush  
  @endsection