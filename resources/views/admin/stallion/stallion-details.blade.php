@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Stallion Details</h3>
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
                            <p class="text-center">Stallion Details</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form method="post"action="{{route('admin.stallion-details.store') }}"enctype='multipart/form-data'>
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
                                  <label for="name">Banner image</label>
                                  <input type="file" id="name"name="banner_image"@if(!$stalliondetails) required @endif/>
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
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">image</label>
                                  <input type="file" id="name" name="image" @if(!$stalliondetails) required @endif/>
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
          

    </script>
  @endsection

 