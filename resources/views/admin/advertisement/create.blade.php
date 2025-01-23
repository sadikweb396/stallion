@extends('layouts.owner.app')

@section('content')
<div class="dash_body_inner">
    <div class="our_stallions stallions_details">
        <div class="add_new_stallions">
            <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
                <div class="stallions_title">
                    <h3>Advertisement</h3>
                </div>
            </div>
            
            <div class="stallions_tabs_main">
                <div class="tabs_i">
                    <div>
                        <div class="main_tab_content">
                            <div class="main_stallions_d">
                                <div class="title_bar mb20">
                                    <p class="text-center">Advertisement</p>
                                </div>
                                
                                <div class="stallions_d_form mb50">
                                    <form method="post" action="{{ route('admin.advertisement.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form_main">
                                            <div class="form-group">
                                                <label for="page">Page</label>
                                                <select name="page" required>
                                                    <option value="">Choose option</option>
                                                    <option value="Home">Home</option>
                                                    <option value="Stallion">Stallion</option>
                                                    <option value="Single Stallion">Single Stallion</option>
                                                    <option value="Mare">Mare</option>
                                                    <option value="Single Mare">Single Mare</option>
                                                    <option value="Progeny">Progeny</option>
                                                    <option value="Event">Event</option>
                                                    <option value="Photographer">Photographer</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form_main">
                                            <div class="form-group">
                                                <label for="link">Link</label>
                                                <input type="text" name="link" required />
                                            </div>
                                        </div>
                                        
                              <div class="form_main">
                                        <div class="form-group">
                                            <div class="radio-buttons" style="display: flex; gap: 40px; align-items: center;">
                                                <label style="display: inline-flex; align-items: center;">
                                                    <input class="imgRadio" type="radio" name="media" value="image" onclick="toggleUploadSection('image')"checked>
                                                    Image
                                                </label>
                                                <label style="display: inline-flex; align-items: center;">
                                                    <input class="vdoRadio" type="radio" name="media" value="video" onclick="toggleUploadSection('video')" >
                                                    Video
                                                </label>
                                            </div>

                                            <div class="imguploadSec" style="display: block;">
                                                <div class="imageUpload" style="display: block;">
                                                    <label for="bannerimage">Background Image</label>
                                                    <input type="file" name="bannerimage" id="bannerimage" onchange="bannerimagepreviews(event)" accept="image/*">
                                                   
                                                        <img id="bannerimagepreview" src="{{url('assets/frontend/image/dummy.jpg')}}" alt="Image Preview" style="width:200px;height:200px;margin-top:10px;">
                                                  
                                                </div>
                                            </div>
                                                                                      
                                            <div class="vdouploadSec" style="display: none;">
                                                <div class="vdoUpload" style="display: block;">
                                                    <label for="bannervideo">Background Video</label>
                                                    <input type="file" name="bannervideo" id="bannervideo" onchange="bannervideopreviews(event)" accept="video/*">
                                                    <video class="bannervideopreview" controls loop muted style="width:200px;height:200px;margin-top:10px;">
                                                        <source src="" type="video/mp4">
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="update_btn text-right mb50">
                                            <button type="submit" class="btn btn_i black_btn">Save</button>
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
   