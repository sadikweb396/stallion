@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
  <div class="our_stallions stallions_details">
    <div class="add_new_stallions">
      <div class="satllion_title_search_m d-flex justify-content-between align-items-center mb-4">
        <div class="stallions_title">
          <h3>What we do</h3>
        </div>
        <div class="stallions_search">
        </div>
      </div>
      <div class="stallions_tabs_main">
        <div class="tabs_i">
         
            <div class="main_tab_content">
              <div class="main_stallions_d">
                <div class="title_bar mb-4">
                  <p class="text-center">What we do</p>
                </div>
                <div class="stallions_d_form mb-5">
                  <form method="post" action="{{ route('admin.what-we-do.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form_main">
                      <div class="form-group">
                        <label for="name">Heading</label>
                        <input type="text" name="heading" value="@if($whatwedo){{$whatwedo->heading}}@endif" required class="form-control" />
                      </div>
                    </div>
                    <div class="form_main">
                      <div class="form-group">
                        <label for="name">Paragraph</label>
                        <textarea name="paragraph" id="text" class="form-control">@if($whatwedo){{$whatwedo->paragraph}}@endif</textarea>
                      </div>
                    </div>
                    <div class="form_main">
                      <div class="form-group">
                        <label for="name">Image</label>
                        <input type="file" name="image" id="imageUpload" class="form-control" onchange="previewImage(event)">
                        <img id="imagePreview" src="@if($whatwedo){{url($whatwedo->image)}}@endif" style="max-width: 300px; margin-top: 10px;">
                      </div>
                    </div>
                    <div class="update_btn text-right mb-5">
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
</script>
@endpush
@endsection
