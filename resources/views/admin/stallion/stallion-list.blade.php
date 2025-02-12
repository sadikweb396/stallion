@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Stallion List Page</h3>
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
                            <p class="text-center">Stallion List</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form method="post"action="{{route('admin.stallion-list.store') }}"enctype='multipart/form-data'>
                            @csrf
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Banner Heading</label>
                                  <input type="text" id="name"name="banner_heading"value="@if($stalliondetails){{$stalliondetails->banner_heading}}@endif"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Banner Text</label>
                                  <input type="text" id="name"name="banner_text"value="@if($stalliondetails){{$stalliondetails->banner_pargaraph}}@endif"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">

                                  <div class="radio-buttons" style="display: flex; gap: 40px; align-items: center;">
                                      <label style="display: inline-flex; align-items: center;">
                                          <input class="imgRadio" type="radio" name="media"value="image" onclick="toggleUploadSection('image')" @if($stalliondetails && $stalliondetails->type == 'image') checked @endif>
                                          Image
                                      </label>
                                      <label style="display: inline-flex; align-items: center;">
                                          <input class="vdoRadio" type="radio" name="media" value="video" onclick="toggleUploadSection('video')" @if($stalliondetails && $stalliondetails->type == 'video') checked  @endif >
                                          Video
                                      </label>
                                  </div>
                                <div class="imguploadSec" style="@if($stalliondetails && $stalliondetails->type == 'image') display:block; @else display: none; @endif">
                                      <div class="imageUpload" style="display: block;">
                                          <label for="bannerimage">Background Image</label>
                                          <input type="file" name="bannerimage" id="bannerimage" onchange="bannerimagepreviews(event)" accept="image/*">
                                          @if($stalliondetails && $stalliondetails->type == 'image')
                                          <img id="bannerimagepreview" src="@if($stalliondetails){{url($stalliondetails->banner_image)}}@endif" alt="Image Preview" style="width:200px;height:200px;margin-top:10px;">
                                          @else
                                          <img id="bannerimagepreview" src="{{url('assets/frontend/image/dummy.jpg')}}" alt="Image Preview" style="width:200px;height:200px;margin-top:10px;">
                                          @endif
                                        </div>
                                  </div>
                                                                                                                          
                                 <div class="vdouploadSec"style="@if($stalliondetails && $stalliondetails->type == 'video') display:block; @else display: none; @endif">
                                    <div class="vdoUpload" style="display: block;">
                                        <label for="bannervideo">Background Video</label>
                                        <input type="file" name="bannervideo" id="bannervideo" onchange="bannervideopreviews(event)" accept="video/*">
                                        <video class="bannervideopreview" controls loop muted  style="width:200px;height:200px;margin-top:10px;">
                                          <source src="@if($stalliondetails){{url($stalliondetails->banner_image)}}@endif" type="video/mp4">
                                        </video>
                                    </div>
                                  </div>


                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Heading First</label>
                                  <input type="text" id="name"name="heading_first"value="@if($stalliondetails){{$stalliondetails->heading1}}@endif"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Paragraph First</label>
                                  <textarea name="first_paragraph" id="first_paragraph">@if($stalliondetails){{$stalliondetails->paragraph1}}@endif</textarea>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Heading Second</label>
                                  <input type="text" id="name"name="heading_second"value="@if($stalliondetails){{$stalliondetails->heading2}}@endif"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Paragraph Second</label>
                                  <textarea name="second_paragraph" id="second_paragraph">@if($stalliondetails){{$stalliondetails->paragraph2}}@endif</textarea>
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
          <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#performance_history'))
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
            .create(document.querySelector('#first_paragraph'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#second_paragraph'))
            .catch(error => {
                console.error(error);
            });
          
            function toggleUploadSection(type) {
            document.querySelector(".imguploadSec").style.display = "none";
            document.querySelector(".vdouploadSec").style.display = "none";

            if (type === "image") {
                document.querySelector(".imguploadSec").style.display = "block";
            } else if (type === "video") {
                document.querySelector(".vdouploadSec").style.display = "block";
            }
        }
    </script>
   
  @endsection

    