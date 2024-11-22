@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Performance and Progeny</h3>
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
                            <p class="text-center">Performance and Progeny</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form method="post"action="{{route('admin.performance-progeny.store') }}"enctype='multipart/form-data'>
                            @csrf
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Heading </label>
                                  <textarea name="heading"id="editor1">{{$progenyperformance->heading}}</textarea>
                                  @error('heading')
                                  <div class="text-danger">{{ $message  }}</div>
                                  @enderror
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Paragraph</label>
                                  <textarea name="paragraph"id="editor2">{{$progenyperformance->paragraph}}</textarea>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Image</label>
                                  <input type="file" id="name"name="image"onchange="previewImage(event)">
                                </div>
                                @error('image')
                                  <div class="text-danger">{{ $message  }}</div>
                                @enderror 
                                <img  id="imagePreview" src="{{url($progenyperformance->image)}}"width="20%">
                               
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