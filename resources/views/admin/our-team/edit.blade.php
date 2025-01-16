
@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
  <div class="our_stallions stallions_details">
    <div class="add_new_stallions">
      <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
        <div class="stallions_title">
          <h3>Edit Our Team</h3>
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
                            <p class="text-center">Edit Our Team </p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form method="post"action="{{ route('admin.our-team.update') }}"enctype='multipart/form-data'>
                            @csrf
                              <input type="hidden"name="id"value="{{$edit->id}}">
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Name </label>
                                  <input type="text"name="name"value="{{$edit->name}}"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Description</label>
                                  <textarea name="description">{{$edit->description}}</textarea>
                                </div>
                              </div>    
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Image</label>
                                  <input type="file"name="image"id="imageUpload"onchange="previewImage(event)">
                                  <img id="imagePreview"src="{{url($edit->image)}}"style="max-width: 300px;">
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
          ClassicEditor
            .create(document.querySelector('#text'))
            .catch(error => {
                console.error(error);
            });
</script>
@endpush
@endsection