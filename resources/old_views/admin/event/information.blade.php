
@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
  <div class="our_stallions stallions_details">
    <div class="add_new_stallions">
      <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
        <div class="stallions_title">
          <h3>Progeny Information</h3>
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
                            <p class="text-center">Progeny Information</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form method="post"action="{{ route('admin.event-information-store') }}"enctype='multipart/form-data'>
                            @csrf
                            <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Heading 1</label>
                                  <input type="text"name="heading1"value="@if($information){{$information->heading1}}@endif"required>
                                </div>
                              </div> 
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Paragraph 1</label>
                                  <textarea name="paragraph1"id="text">@if($information){{$information->paragraph1}}@endif</textarea>
                                </div>
                              </div>    
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Heading 2</label>
                                  <input type="text"name="heading2"value="@if($information){{$information->heading2}}@endif"required>
                                </div>
                              </div> 
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Paragraph</label>
                                  <textarea name="paragraph2"id="paragraph">@if($information){{$information->paragraph2}}@endif</textarea>
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