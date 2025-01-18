@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
  <div class="our_stallions stallions_details events_m add_photographers">
    <div class="add_new_stallions">
      <div class="satllion_title_search_m mb20">
        <div class="stallions_title d-flex align-items-center justify-space-between">
            <div>
              <h3>Photographers</h3>
            </div>
            <div class="searchbar">
                <input type="search" class="search_i" />
                <button class="btn btn_i black_btn">Search</button>
            </div>
        </div>
      </div>
      <div class="stallions_tabs_main">
        <div class="tabs_i">
          <div class="tab-contents">
            <div class="main_tab_content">
              <div class="main_stallions_p">
                <div class="our_stallions">
                  <div class="stallions_list_m d-flex gap20 flexwrap mb50">
                    <article class="stallion_items stallions_add_new text-center d-flex align-items-center justify-content-center flexcolumn gap20"
                              >
                      <div class="stallion_title mb20">
                            <p>Add New Images</p>
                      </div>
                      <div class="add_stallion_bar d-flex align-items-center justify-content-center cursor-pointer add_progeny_data">
                            <p>+</p>
                          </div>
                     </article>
                        @foreach($photographers as $photographer)
                          <article class="stallion_items text-center">
                            <div class="label_edit_m d-flex justify-content-end">
                              <div class="edit-button">
                              <a href="{{ url('admin/photographer/edit/' . $photographer->id) }}" class="btn">
                                <i class="fa-solid fa-pencil"></i>
                              </a>
                              </div>
                            </div>
                            <div class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                              style="background-image: url('{{url($photographer->photographer_image) }}');">
                                <span class="percent_box">
                                  <svg><circle cx="105"cy="105"r="100"></circle><circle cx="105"cy="105"r="100"style="--percent: 90"></circle>
                                  </svg>
                                </span>
                            </div>
                            <div class="stallion_title mtb20">
                              <p class="stallions_name">
                                {{$photographer->photographer_name}}
                              </p>
                              <p class="stallion-location">
                                Location : {{$photographer->location}}
                              </p>
                              <p class="stallion_date">
                                Travel Radius: {{$photographer->travel_radius}}
                              </p>
                              <p class="stallion_date">
                                Individual Price :{{$photographer->single_pic_price}}
                              </p>
                              <p class="stallion_date">Multi Price :{{$photographer->multiple_pic_price}}</p>
                            </div>
                          </article>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="main_stallions_d add_new_progeny d-none">
                    <div class="">
                            <div class="title_bar mb20">
                              <p class="text-center">Add Images And Details</p>
                              <p
                                class="back_to_btn add_progeny_data cursor-pointer"
                              >
                                <i class="fa-solid fa-arrow-left"></i>
                              </p>
                            </div>
                            <div class="stallions_d_form mb50">
                            <form method="post"action="{{route('admin.photographer.store') }}"enctype='multipart/form-data'>
                            @csrf
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Photographer Name </label>
                                  <input type="text" id="name"name="photographername"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Location</label>
                                  <input type="text" id="name"name="location"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Phone</label>
                                  <input type="number"name="phone"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Travel Radius</label>
                                  <input type="text" id="name"name="travel_radius"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Individual Price</label>
                                  <input type="number" id="name"name="single_pic_price"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Multi Price</label>
                                  <input type="number" id="name"name="multiple_pic_price"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Address</label>
                                  <input type="text" id="name"name="address"required/>
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Image</label>
                                  <input type="file" id="imageUpload"onchange="previewImage(event)"name="photoimage"required/>
                                  <img id="imagePreview" src="" alt="Image Preview" style="max-width: 300px; display: none;">
                                </div>
                              </div>
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">pdf</label>
                                  <input type="file" id="imageUpload"name="pdf"accept="application/pdf" required />
                                </div>
                              </div>             
                              <div class="update_btn text-right mb50">
                               <button type="submit"class="btn btn_i black_btn">Save</button>
                              </div>
                            </form>
                            </div>
                            <div class="update_btn d-flex justify-space-between mb50 gap10">

                   </div>
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
  function previewImage(event) {
  const file = event.target.files[0];
  const reader = new FileReader();
  reader.onload = function(e) {
  const imgElement = document.getElementById('imagePreview');
  imgElement.src = e.target.result;
  imgElement.style.display = 'block';
  }
  if (file) {
  reader.readAsDataURL(file);
  }
  }
</script>
@endsection

