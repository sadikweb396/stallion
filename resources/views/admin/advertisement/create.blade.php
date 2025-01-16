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
                  <div class="stallions_search">
                    
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
                          <form method="post"action="{{route('admin.advertisement.store')}}"enctype='multipart/form-data'>
                            @csrf
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Page</label>
                                  <select name="page"required>
                                    <option value="">Choose option</option>
                                    <option value="Home">Home</option>
                                    <option value="Stallion">Stallion</option>
                                    <option value="Single Stallion">Single Stallion</option>
                                    <option value="Mare">Mare</option>
                                    <option value="Single Mare">Single Mare</option>
                                    <option value="Progeny">progeny</option>
                                    <option value="Event">Event</option>
                                    <option value="Photographer">Photographer</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                <label for="name">Link</label>
                                  <input type="text"name="link"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">image</label>
                                  <input type="file"name="image"id="bannerimage"onchange="bannerimagepreviews(event)"required>
                                  <img id="bannerimagepreview" src="" style="max-width: 300px;">
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
  @endsection