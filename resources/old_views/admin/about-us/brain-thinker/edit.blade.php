
@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
  <div class="our_stallions stallions_details">
    <div class="add_new_stallions">
      <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
        <div class="stallions_title">
          <h3>Edit Our Brain & Thinker</h3>
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
                            <p class="text-center">Edit  Our Brain & Thinker</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form method="post"action="{{ route('admin.our-brain-and-thinker.update') }}"enctype='multipart/form-data'>
                            @csrf
                              <input type="hidden"name="id"id="{{$brainthinker->id}}"value="{{$brainthinker->id}}">
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Heading</label>
                                  <input type="text"name="heading"value="{{$brainthinker->heading}}"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Paragraph</label>
                                  <textarea name="paragraph"id="text">{{$brainthinker->paragraph}}</textarea>
                                </div>
                              </div>      
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Image</label>
                                  <input type="file"name="image"id="imageUpload"onchange="previewImage(event)">
                                  <img id="imagePreview"src="{{url($brainthinker->image)}}"style="max-width: 300px;">
                                </div>
                              </div>     
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Facebook Link</label>
                                  <input type="text"name="facebook_link"value="{{$brainthinker->facebook_link}}"/>
                                </div>
                              </div>   
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Twitter Link</label>
                                  <input type="text"name="twitter_link"value="{{$brainthinker->twitter_link}}"/>
                                </div>
                              </div>        
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Instagram Link</label>
                                  <input type="text"name="instagram_link"value="{{$brainthinker->instagram_link}}"/>
                                </div>
                              </div>  
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Video Link</label>
                                  <input type="text"name="video_link"value="{{$brainthinker->video_link}}"/>
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