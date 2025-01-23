@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Advertisement</h3>
                  </div>
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">       
                    <div class="">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20">
                            <p class="text-center">Advertisement</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form method="post"action="{{route('admin.advertisement.update')}}"enctype='multipart/form-data'>
                            @csrf
                              <input type="hidden"name="id"value="{{$edit->id}}">
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Page</label>
                                   <?php   
                                    $selectedPage = $edit->page; 
                                    ?>
                                    <select name="page" required>
                                        <option value="">Choose option</option>
                                        <option value="Home" <?php echo ($selectedPage == 'Home') ? 'selected' : ''; ?>>Home</option>
                                        <option value="Stallion" <?php echo ($selectedPage == 'Stallion') ? 'selected' : ''; ?>>Stallion</option>
                                        <option value="Single Stallion" <?php echo ($selectedPage == 'Single Stallion') ? 'selected' : ''; ?>>Single Stallion</option>
                                        <option value="Mare" <?php echo ($selectedPage == 'Mare') ? 'selected' : ''; ?>>Mare</option>
                                        <option value="Single Mare" <?php echo ($selectedPage == 'Single Mare') ? 'selected' : ''; ?>>Single Mare</option>
                                        <option value="Progeny" <?php echo ($selectedPage == 'Progeny') ? 'selected' : ''; ?>>Progeny</option>
                                        <option value="Event" <?php echo ($selectedPage == 'Event') ? 'selected' : ''; ?>>Event</option>
                                        <option value="Photographer" <?php echo ($selectedPage == 'Photographer') ? 'selected' : ''; ?>>Photographer</option>
                                    </select>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Link</label>
                                  <input type="text"name="link"value="{{$edit->link}}"required/>
                                </div>
                              </div>
                              <!-- <div class="form_main">
                                <div class="form-group">
                                  <label for="name">image</label>
                                  <input type="file"name="image"id="bannerimage"onchange="bannerimagepreviews(event)">
                                  <img id="bannerimagepreview"  src="{{url($edit->image)}}" style="max-width: 300px;">
                                </div>
                              </div> -->

                              <div class="form_main">
                                        <div class="form-group">
                                            <div class="radio-buttons" style="display: flex; gap: 40px; align-items: center;">
                                                <label style="display: inline-flex; align-items: center;">
                                                    <input class="imgRadio" type="radio" name="media" value="image" onclick="toggleUploadSection('image')" @if($edit && $edit->type == 'image') checked @endif>
                                                    Image
                                                </label>
                                                <label style="display: inline-flex; align-items: center;">
                                                    <input class="vdoRadio" type="radio" name="media" value="video" onclick="toggleUploadSection('video')" @if($edit && $edit->type == 'video') checked  @endif>
                                                    Video
                                                </label>
                                            </div>

                                            <div class="imguploadSec" style="@if($edit && $edit->type == 'image') display:block; @else display: none; @endif">
                                                <div class="imageUpload" style="display: block;">
                                                    <label for="bannerimage">Background Image</label>
                                                    <input type="file" name="bannerimage" id="bannerimage" onchange="bannerimagepreviews(event)" accept="image/*">
                                                    @if($edit && $edit->type == 'image')
                                                        <img id="bannerimagepreview" src="@if($edit){{url($edit->image)}}@endif" alt="Image Preview" style="width:200px;height:200px;margin-top:10px;">
                                                    @else
                                                        <img id="bannerimagepreview" src="{{url('assets/frontend/image/dummy.jpg')}}" alt="Image Preview" style="width:200px;height:200px;margin-top:10px;">
                                                    @endif
                                                </div>
                                            </div>
                                                                                      
                                            <div class="vdouploadSec" style="@if($edit && $edit->type == 'video') display:block; @else display: none; @endif">
                                                <div class="vdoUpload" style="display: block;">
                                                    <label for="bannervideo">Background Video</label>
                                                    <input type="file" name="bannervideo" id="bannervideo" onchange="bannervideopreviews(event)" accept="video/*">
                                                    <video class="bannervideopreview" controls loop muted style="width:200px;height:200px;margin-top:10px;">
                                                        <source src="@if($edit){{url($edit->image)}}@endif" type="video/mp4">
                                                    </video>
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
@endpush
@endsection     
   