@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
  <div class="our_stallions stallions_details">
    <div class="add_new_stallions">
      <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
        <div class="stallions_title">
          <h3>Get Touch Image</h3>
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
                  <p class="text-center">Get Touch Image</p>
                </div>
                <div class="stallions_d_form mb50">
                  <form method="post" action="{{ route('admin.gettouch-image-store') }}" enctype='multipart/form-data'>
                    @csrf
                    <div class="form_main">
                      <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="imageUpload" onchange="previewImage(event)" 
                               @if(!$gettouch || !$gettouch->image) required @endif>
                        <img id="imagePreview" src="@if($gettouch){{ url($gettouch->image) }}@endif" style="max-width: 300px;">
                      </div>
                      <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" id="logoUpload" onchange="previewLogo(event)" 
                               @if(!$gettouch || !$gettouch->logo) required @endif>
                        <img id="logoPreview" src="@if($gettouch){{ url($gettouch->logo) }}@endif" style="max-width: 300px;">
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
  function previewImage(event) {
    const imagePreview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
      imagePreview.src = e.target.result;
      imagePreview.style.display = 'block'; 
    };

    if (file) {
      reader.readAsDataURL(file); 
    }
  }

  function previewLogo(event) {
    const logoPreview = document.getElementById('logoPreview');
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(e) {
      logoPreview.src = e.target.result;
      logoPreview.style.display = 'block'; 
    };

    if (file) {
      reader.readAsDataURL(file); 
    }
  }
</script>
@endpush
@endsection
