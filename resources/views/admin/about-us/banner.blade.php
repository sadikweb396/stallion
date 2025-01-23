@extends('layouts.owner.app')

@section('content')
<div class="dash_body_inner">
    <div class="our_stallions stallions_details">
        <div class="add_new_stallions">
            <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
                <div class="stallions_title">
                    <h3>About Us Banner</h3>
                </div>
                <div class="stallions_search">
                    <!-- You can add a search input here if needed -->
                </div>
            </div>
            <div class="stallions_tabs_main">
                <div class="tabs_i">
                    <div class="main_tab_content">
                        <div class="main_stallions_d">
                            <div class="title_bar mb20">
                                <p class="text-center">About Us Banner</p>
                            </div>
                            <div class="stallions_d_form mb50">
                                <form method="post" action="{{ route('admin.about-us.banner-store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form_main">
                                        <div class="form-group">
                                            <label for="heading">Heading</label>
                                            <input type="text" name="heading" value="@if($banner){{$banner->heading}}@endif" required />
                                        </div>
                                    </div>

                                    <div class="form_main">
                                        <div class="form-group">
                                            <label for="text">Text</label>
                                            <textarea name="text" id="text">@if($banner){{$banner->text}}@endif</textarea>
                                        </div>
                                    </div>

                                    <div class="form_main">
                                        <div class="form-group">
                                            <div class="radio-buttons" style="display: flex; gap: 40px; align-items: center;">
                                                <label style="display: inline-flex; align-items: center;">
                                                    <input class="imgRadio" type="radio" name="media" value="image" onclick="toggleUploadSection('image')" @if($banner && $banner->type == 'image') checked @endif>
                                                    Image
                                                </label>
                                                <label style="display: inline-flex; align-items: center;">
                                                    <input class="vdoRadio" type="radio" name="media" value="video" onclick="toggleUploadSection('video')" @if($banner && $banner->type == 'video') checked  @endif>
                                                    Video
                                                </label>
                                            </div>

                                            <div class="imguploadSec" style="@if($banner && $banner->type == 'image') display:block; @else display: none; @endif">
                                                <div class="imageUpload" style="display: block;">
                                                    <label for="bannerimage">Background Image</label>
                                                    <input type="file" name="bannerimage" id="bannerimage" onchange="bannerimagepreviews(event)" accept="image/*">
                                                    @if($banner && $banner->type == 'image')
                                                        <img id="bannerimagepreview" src="@if($banner){{url($banner->image)}}@endif" alt="Image Preview" style="width:200px;height:200px;margin-top:10px;">
                                                    @else
                                                        <img id="bannerimagepreview" src="{{url('assets/frontend/image/dummy.jpg')}}" alt="Image Preview" style="width:200px;height:200px;margin-top:10px;">
                                                    @endif
                                                </div>
                                            </div>
                                                                                      
                                            <div class="vdouploadSec" style="@if($banner && $banner->type == 'video') display:block; @else display: none; @endif">
                                                <div class="vdoUpload" style="display: block;">
                                                    <label for="bannervideo">Background Video</label>
                                                    <input type="file" name="bannervideo" id="bannervideo" onchange="bannervideopreviews(event)" accept="video/*">
                                                    <video class="bannervideopreview" controls loop muted style="width:200px;height:200px;margin-top:10px;">
                                                        <source src="@if($banner){{url($banner->image)}}@endif" type="video/mp4">
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
  
@push('scripts')
<script>
    ClassicEditor
        .create(document.querySelector('#text'))
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
@endpush

@endsection
