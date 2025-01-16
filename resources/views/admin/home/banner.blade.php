@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
    <div class="our_stallions stallions_details">
        <div class="add_new_stallions">
            <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
                <div class="stallions_title">
                    <h3>Banner </h3>
                </div>                 
            </div>
            <div class="stallions_tabs_main">
                <div class="tabs_i">               
                    <div class="">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20">
                            <p class="text-center">Banner</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form method="post"action="{{route('admin.home-banner') }}"enctype='multipart/form-data'>
                            @csrf
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Background Image </label>
                                  <input type="file"name="bannerimage"id="bannerimage"onchange="bannerimagepreviews(event)">
                                  <img id="bannerimagepreview" src="{{url($homebanner->bannerimage)}}" alt="Image Preview" style="max-width: 300px;">
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Image</label>
                                  <input type="file"name="image"id="imageUpload"onchange="previewImage(event)">
                                  <img id="imagePreview" src="{{url($homebanner->image)}}" alt="Image Preview" style="max-width: 300px;">
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Text</label>
                                  <textarea name="text"value="{{$homebanner->text}}">@if($homebanner){{$homebanner->text}}@endif</textarea>
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