@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
  <div class="our_stallions stallions_details">
    <div class="add_new_stallions">
      <div class="satllion_title_search_m d-flex justify-space-between align-items-center mb20">
           <div class="stallions_title">
            <h3>Edit Photographer</h3>
            </div>
          </div>
          <div class="stallions_tabs_main">
            <div class="tabs_i">     
              <div class="">
                <div class="main_tab_content">
                  <div class="main_stallions_d">
                    <div class="title_bar mb20">
                      <p class="text-center">Photographer</p>
                    </div>
                    <div class="stallions_d_form mb50">
                      <form method="post"action="{{route('admin.photographer.update') }}"enctype='multipart/form-data'>
                            @csrf
                            <input type="hidden"value="{{$photographer->id}}"name="id">
                          <div class="form_main">
                            <div class="form-group">
                              <label for="name">Photographer Name </label>
                              <input type="text" id="name"name="photographername"value="{{$photographer->photographer_name}}"required/>
                            </div>
                            </div>
                          <div class="form_main">
                            <div class="form-group">
                              <label for="name">Location</label>
                              <input type="text" id="name"name="location"value="{{$photographer->location}}"required/>
                            </div>
                          </div>
                          <div class="form_main">
                              <div class="form-group">
                                  <label for="name">Phone</label>
                                  <input type="number"name="phone"value="{{$photographer->phone}}"required/>
                              </div>
                            </div>
                          <div class="form_main">
                            <div class="form-group">
                              <label for="name">Travel Radius</label>
                              <input type="text" id="name"name="travel_radius"value="{{$photographer->travel_radius}}"required/>
                            </div>
                          </div>
                          <div class="form_main">
                              <div class="form-group">
                                <label for="name">Individual Price</label>
                                <input type="text" id="name"name="single_pic_price"value="{{$photographer->single_pic_price}}"required/>
                              </div>
                          </div>
                          <div class="form_main">
                            <div class="form-group">
                              <label for="name">Multi Price</label>
                              <input type="text" id="name"name="multiple_pic_price"value="{{$photographer->multiple_pic_price}}"required/>
                            </div>
                          </div>
                          <div class="form_main">
                            <div class="form-group">
                              <label for="name">Address</label>
                              <input type="text" id="name"name="address"value="{{$photographer->address}}"required/>
                            </div>
                          </div>
                          <div class="form_main">
                            <div class="form-group">
                                <label for="name">Image</label>
                                <input type="file" id="imageUpload"onchange="previewImage(event)"name="photographerimage"/>
                                <img  src="{{url($photographer->photographer_image)}}"id="imagePreview" src="" alt="Image Preview" style="max-width: 300px; ">
                            </div>
                          </div> 
                          <div class="form_main">
                                <div class="form-group">
                                  <label for="name">pdf</label>
                                  <input type="file" id="imageUpload"name="pdf"accept="application/pdf"/>
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