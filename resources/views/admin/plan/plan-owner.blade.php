
@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
  <div class="our_stallions stallions_details">
    <div class="add_new_stallions">
      <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
        <div class="stallions_title">
          <h3>Plan Owner</h3>
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
                            <p class="text-center">Plan Owner</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form method="post"action="{{ route('admin.plan-owner-store') }}"enctype='multipart/form-data'>
                            @csrf
                            <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text"name="text"value="@if($planowner){{$planowner->text}}@endif"required>
                                </div>
                              </div> 
                                  
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Title</label>
                                  <input type="text"name="title"value="@if($planowner){{$planowner->title}}@endif"required>
                                </div>
                              </div> 
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Description</label>
                                  <textarea name="description"id="paragraph">@if($planowner){{$planowner->description}}@endif</textarea>
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
  @endsection