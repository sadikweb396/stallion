@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
    <div class="our_stallions stallions_details">
        <div class="add_new_stallions">
            <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
                  <div class="stallions_title">
                    <h3>Badge Page</h3>
                  </div>             
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">             
                    <div class="tab-content active" id="tab-1">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20">
                            <p class="text-center">Badge Page</p>
                          </div>
                          <div class="stallions_d_form mb50">
                            <form action="{{route('admin.badge.store')}}"method="post"id="myForm">
                                @csrf
                              <div class="form_main">
                               <div class="form-group">
                                    <label for="name">Type</label>
                                    <select name="type"required>
                                        <option value="">Choose option</option>
                                        <option value="NEW TO EMINENT">NEW TO EMINENT</option>
                                        <option value="LATEST UPDATED">LATEST UPDATED</option>
                                        <option value="STALLION LIST">STALLION LIST</option>
                                        <option value="MARE LIST">MARE LIST</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                  <label for="name">Text</label>
                                  <input type="text"name="text"required/>
                                </div>
                                <div class="form-group">
                                  <label for="name">Color</label>
                                  <input type="color"name="color"value="#ff0000">
                                </div>
                                <div class="update_btn text-right mb50">
                                <button type="submit"class="btn btn_i black_btn">save</button>
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
<!-- The Modal -->
@endsection