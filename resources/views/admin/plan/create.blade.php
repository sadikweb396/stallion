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
                          <form method="post"action="{{route('admin.plan.store') }}"enctype='multipart/form-data'>
                            @csrf
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Plan Name </label>
                                  <input type="text"name="plan_name"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Plan Price</label>
                                  <input type="text"name="plan_price"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Plan Duration</label>
                                  <input type="text"name="plan_duration"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group"id="plantype">
                                  <label for="name">Plan For</label>
                                  <select name="plan_for"id="plan_for"required>
                                    <option value="">Choose Plan For</option>
                                    <option id="owner" value="owner">Owner</option>
                                    <option id="member" value="member">Member</option>
                                    <option id="service" value="service">Service</option>
                                    <option id="stallion" value="stallion">Stallion</option>
                                    <option id="mare" value="mare">Mare</option>
                                  </select>
                                </div>
                              </div>
     
                              <div class="form_main">
                              <div class="form-group"id="plantypes">
                              </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Plan Title</label>
                                  <textarea name="plan_title"id="plan_details"></textarea>
                                </div>
                              </div>  
                              <div class="form_main">
                                <div class="form-group">
                                  <div id="dynamicInputContainer">
                                    <div class="input-group">
                                      <label for="name">Plan Details</label>
                                      <input type="text" class="plan" name="plan_details[]" placeholder="Enter plan details" style="width:95%;">
                                      <button type="button" class="add-input">Add</button>
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

  // Function to remove an input field
  $('#dynamicInputContainer').on('click', '.remove-input', function () {
    $(this).closest('.input-group').remove();
  });
 });
</script>
@endpush      
 @endsection