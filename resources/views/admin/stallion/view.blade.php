@extends('layouts.owner.app')
@section('content')
<!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.css" rel="stylesheet">

<style>
  /* Modal Styles */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.7);
  }
  .model-open{
    display: block ;
  }
  .modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 20px;
    border-radius: 10px;
    width: 40%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    animation: fadeIn 0.5s ease;
  }
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(-10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  .modal-content h3 {
    margin-top: 0;
    text-align: center;
    color: #333;
    border-bottom: 2px solid #f4f4f9;
    padding-bottom: 10px;
  }
  .close {
    color: #aaa;
    float: right;
    font-size: 24px;
    font-weight: bold;
    cursor: pointer;
    transition: color 0.3s ease;
  }
  .close:hover,
  .close:focus {
    color: #ff0000;
  }

  /* Form Styles */
  form {
    display: flex;
    flex-direction: column;
    gap: 15px;
  }
  label {
    font-size: 14px;
    font-weight: bold;
    color: #555;
  }
  input, textarea {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
  }
  input:focus,
  textarea:focus {
    border-color: #000;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
  }
  textarea {
    resize: vertical;
    min-height: 60px;
  }
  button
  {
    background: black;
    color: white;
    border-radius: 5px;
    padding: 10px;
  }
    </style>
<div class="dash_body_inner">
  <div id="editDetailsModal" class="editDetailsModal modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Edit Stallion Details</h3>
        <form id="insertForm">
          <input type="text"name="stallionid"id="stallionid"value="{{$stallion->id}}">
          <label for="name">Name</label>
          <input type="text" id="name" name="name"value=""placeholder="Enter stallion's name">
          <label for="name">Performance History</label>
          <textarea id="performance_history" name="performanceHistory" placeholder="Enter performance history"></textarea>

          <label for="sire">Owner’s Story</label>
          <textarea name="owner_story" id="owner_story"></textarea>
          
          <label for="sire">Lifetime Story</label>
          <textarea name="lifetime_story" id="lifetime_story"></textarea>
          
          <label for="dam">Professional Trainer</label>
          <textarea name="professional_trainer" id="professional_trainer"></textarea>
          
          <label for="performanceHistory">Background Story</label>
          <textarea name="background_story"id="background_story"></textarea>
          
          <label for="ownersName">Bred By</label>
          <input type="text" id="bred_by" name="bred_by" placeholder="Enter bred by">
          
          <label for="ownersStory">Registration Number</label>
          <input type="text"id="registration_details"name="registration_details"required/>
          
          <label for="Performance">Put semen available from</label>
          <input type="date"id="put_semen_available_from" name="put_semen_available_from"required/>

          <label for="Performance">Current performing discipline</label>
          <input type="text"id="current_performing_discipline"name="current_performing_discipline"/>

          <label for="trainerHistory">Trainer History</label>
          <textarea name="trainer_history"id="trainer_history"></textarea>

          <label for="Performance">Height</label>
          <input type="height"id="height" name="height"required/>

          <label for="color">Color</label>
          <input type="text"id="color"name="color"required/>

          <label for="color">Date of Birth</label>
          <input type="date"name="date_of_birth"id="date_of_birth"required/>
          
          <label for="First foal crop year">First foal crop year</label>
          <input type="text"id="first_foal_crop_year"name="first_foal_crop_year"required/>
          
          <button type="submit">Save</button>
        </form>
      </div>
      
    </div>
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Stallion Details</h3>
                  </div>
                  <div class="searchbar d-flex gap10">
                    <div class="preview_btn">
                      <a href="#" class="btn btn_i black_btn">Preview</a>
                    </div>
                    <input type="search" class="search_i" />
                    <button class="btn btn_i black_btn">Search</button>
                  </div>
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">
                    <div class="tab-links d-flex justify-space-between mb20">
                      <button class="tab-link" data-tab="tab-1">
                        <i class="fa-solid fa-heart-circle-plus"></i> Personal
                        Details
                      </button>
                      <button class="tab-link" data-tab="tab-2">
                        <i class="fa-regular fa-image"></i> Perfomance History
                      </button>
                      <button class="tab-link" data-tab="tab-3">
                        <i class="fa-solid fa-video"></i> Background History
                      </button>
                      <button class="tab-link" data-tab="tab-4">
                        <i class="fa-solid fa-file-contract"></i> Media
                      </button>
                      <button class="tab-link" data-tab="tab-5">
                        <i class="fa-solid fa-temperature-empty"></i> Semen
                        Contract Details
                      </button>
                      <button class="tab-link" data-tab="tab-6">
                        <i class="fa-solid fa-temperature-empty"></i> Progeny
                        details
                      </button>
                    </div>
                    <div class="tab-content" id="tab-1">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div
                            class="title_bar mb20 d-flex justify-space-between gap20 align-items-center"
                          >
                            <div>
                              <p class="">Stallion Details</p>
                            </div>
                            <div class="edit_details">
                              <a href="#" class="btn black_btn btn_i form_btn editDetailsBtn"
                              data-id="{{$stallion->id}}">Edit Details
                              </a>
                            </div>
                          </div>
                          <div class="stallions_d_form mb50">
                            <div class="preview_list_stallion">
                              <ul class="">
                                <li class="list_items">Name:{{$stallion->name}} </li>
                                <li class="list_items">Status : Active</li>
                                <li class="list_items">Register : {{$stallion->registration_details}}</li>
                               
                                <li class="list_items">
                                  Owner story : Dummy content - Want to inspect
                                  every detail about the Stallion you’re
                                  breeding to ? Have questions about the sire of
                                  your future progeny?
                                </li>
                                <li class="list_items">
                                  Professional Trainer : ABCABCBA
                                </li>
                                <li class="list_items">
                                  Trainer History : Active
                                </li>
                                <li class="list_items">Bred By : Active</li>
                                <li class="list_items">Height: 12</li>
                                <li class="list_items">Gender : Sire</li>
                                <li class="list_items">Colour : Black</li>
                                <li class="list_items">
                                  Put semen available from: 12-March-2025
                                </li>
                                <li class="list_items">
                                  First foal crop year :2025
                                </li>
                                <li class="list_items">
                                  Current performing discipline: abc abc abc
                                </li>
                                <li class="list_items">
                                  Photographer Details: Dummy Dummy
                                </li>
                                <li class="list_items">
                                  DNA Profile : StoredSNP (71176 SNPs)
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-2">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div
                            class="title_bar mb20 d-flex justify-space-between gap20 align-items-center"
                          >
                            <div>
                              <p class="">Perfomance History</p>
                            </div>
                            <div class="edit_details">
                              <a href="#" class="btn black_btn btn_i form_btn"
                                >Edit Details
                              </a>
                            </div>
                          </div>
                          <div class="stallions_d_form mb50">
                            <div class="preview_list_stallion">
                              <ul class="">
                                <li class="list_items">
                                  {!!$stallion->performance_history!!}
                                </li>
                                
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-3">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div
                            class="title_bar mb20 d-flex justify-space-between gap20 align-items-center"
                          >
                            <div>
                              <p class="">Background History</p>
                            </div>
                            <div class="edit_details">
                              <a href="#" class="btn black_btn btn_i form_btn"
                                >Edit Details
                              </a>
                            </div>
                          </div>
                          <div class="stallions_d_form mb50">
                            <div class="preview_list_stallion">
                              <ul class="">
                                <li class="list_items"> {!!$stallion->background_story!!}</li>                        
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-4">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20 text-center">
                            <div>
                              <p class="">Media</p>
                            </div>
                          </div>
                          <div class="stallions_d_form mb50">
                            <div class="all_gallery">
                              <ul class="list-none d-flex gap10 flexwrap mb50">
                                @php  $stallionimages=DB::table('stallionimages')->where('stallion_id',$stallion->id)->get(); @endphp 
                                @foreach($stallionimages as $stallionimage)
                                <li class="gallery_list">
                                  <a href="#" class="item_img popupimg"data="{{$stallionimage->id}}">
                                    <img
                                      src="{{url($stallionimage->stallion_image)}}"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                @endforeach                    
                              </ul>
                              <div class="media_btn text-center">
                                <a href="#" class="btn btn_i black_btn"
                                  >Update</a
                                >
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-5">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div
                            class="title_bar mb20 d-flex justify-space-between gap20 align-items-center"
                          >
                            <div>
                              <p class="">Semen Contract Details</p>
                            </div>
                            <div class="edit_details">
                              <a href="#" class="btn black_btn btn_i form_btn"
                                >Edit Details
                              </a>
                            </div>
                          </div>
                          <div class="stallions_d_form mb50">
                            <div class="preview_list_stallion">
                              <ul class="">
                                <li class="list_items">Name: Sophiya</li>
                                <li class="list_items">Status : Active</li>
                                <li class="list_items">Register : HBR</li>
                                <li class="list_items">
                                  Registration Details: Abcabcabc
                                </li>
                                <li class="list_items">
                                  Owner story : Dummy content - Want to inspect
                                  every detail about the Stallion you’re
                                  breeding to ? Have questions about the sire of
                                  your future progeny?
                                </li>
                                <li class="list_items">
                                  Professional Trainer : ABCABCBA
                                </li>
                                <li class="list_items">
                                  Trainer History : Active
                                </li>
                                <li class="list_items">Bred By : Active</li>
                                <li class="list_items">Height: 12</li>
                                <li class="list_items">Gender : Sire</li>
                                <li class="list_items">Colour : Black</li>
                                <li class="list_items">
                                  Put semen available from: 12-March-2025
                                </li>
                                <li class="list_items">
                                  First foal crop year :2025
                                </li>
                                <li class="list_items">
                                  Current performing discipline: abc abc abc
                                </li>
                                <li class="list_items">
                                  Photographer Details: Dummy Dummy
                                </li>
                                <li class="list_items">
                                  DNA Profile : StoredSNP (71176 SNPs)
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-6">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div
                            class="title_bar mb20 d-flex justify-space-between gap20 align-items-center"
                          >
                            <div>
                              <p class="">Progeny details</p>
                            </div>
                            <div class="edit_details">
                              <a href="#" class="btn black_btn btn_i form_btn"
                                >Edit Details
                              </a>
                            </div>
                          </div>
                          <div class="stallions_d_form mb50">
                            <div class="preview_list_stallion mb50">
                              <ul class="">
                                <li class="list_items">Name: Sophiya</li>
                                <li class="list_items">Status : Active</li>
                                <li class="list_items">Register : HBR</li>
                                <li class="list_items">
                                  Registration Details: Abcabcabc
                                </li>
                                <li class="list_items">
                                  Owner story : Dummy content - Want to inspect
                                  every detail about the Stallion you’re
                                  breeding to ? Have questions about the sire of
                                  your future progeny?
                                </li>
                                <li class="list_items">
                                  Professional Trainer : ABCABCBA
                                </li>
                                <li class="list_items">
                                  Trainer History : Active
                                </li>
                                <li class="list_items">Bred By : Active</li>
                                <li class="list_items">Height: 12</li>
                              </ul>
                            </div>
                            <div class="title_bar mb20 text-center border0">
                              <div>
                                <p class="">Progeny Media</p>
                              </div>
                            </div>
                            <div class="all_gallery">
                              <ul class="list-none d-flex gap10 flexwrap mb50">
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                                <li class="gallery_list">
                                  <a href="#" class="item_img">
                                    <img
                                      src="./images/image (15).png"
                                      class="img-cover"
                                    />
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <div class="stallions_d_form mb50">
                            <div class="form_data">
                              <div class="upload-container mb50">
                                <div class="upload-section">
                                  <h3>Upload Gallery Images</h3>
                                  <input
                                    type="file"
                                    multiple
                                    class="upload-input"
                                    accept="image/*"
                                  />
                                </div>
                                <div class="upload-section">
                                  <h3>Upload Video</h3>
                                  <input
                                    type="file"
                                    multiple
                                    class="upload-input"
                                    accept="video/*"
                                  />
                                </div>
                                <div class="advertisement-container">
                                  <div
                                    class="upload-section advertisement-section"
                                  >
                                    <h3>Space For advertisements Image</h3>
                                    <input
                                      type="file"
                                      multiple
                                      class="upload-input"
                                      accept="image/*"
                                    />
                                  </div>
                                  <div
                                    class="upload-section advertisement-section"
                                  >
                                    <h3>Set Link For advertisements</h3>
                                    <input
                                      type="url"
                                      placeholder="Enter link here"
                                      class="link-input"
                                    />
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="btn_form_data d-flex align-items-center gap10">
                              <div class="btn">
                                <a href="#" class="btn btn_i black_btn"
                                  >Approve</a
                                >
                              </div>
                              <div class="btn">
                                <a href="#" class="btn btn_i black_btn">View</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="popup_media">
                  
                    @include('admin.stallion.popup')
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
@push('scripts')
<script>
$("body").on('click', '.popupimg', function() {
  var id =  $(this).attr('data'); 
  $.ajax({
        url: '/admin/popupdata', 
        type: 'GET', 
        data: { id: id }, 
        success: function(data) {
            $('.popup_media').html(data); 
        },
        error: function(xhr, status, error) {
            console.error("Error:", error); 
            $('.popup_media').html('<p>Something went wrong. Please try again later.</p>'); 
        }
    });
});

$("body").on('click', '.close_btn', function() {
  document.querySelector('.popup_media').style.display = 'none';

});

function showTab(tabId) {
    $(".tab-content").removeClass("active");
    $("#" + tabId).addClass("active");
    $(".tab-link").removeClass("active");
    $(".tab-link[data-tab='" + tabId + "']").addClass("active");
  }

showTab("tab-1");
</script>
<script>
$(document).ready(function() {
  $('#insertForm').on('submit', function(e) {
        e.preventDefault();  
        var id = $('#stallionid').val();  
        var name = $('#name').val();
        var email = $('#email').val(); 
        var performanceHistory=$('#performance_history').val(); 
        var backgroundStory=$('#background_story').val(); 
        var ownerStory=$('#background_story').val(); 
        var lifetimeStory=$('#lifetime_story').val(); 
        var professionaltrainer=$('#professional_trainer').val(); 
        var bredby=$('#bred_by').val();   
        var registrationdetails=$('#registration_details').val();
        var registrationdetails=$('#registration_details').val(); 
        var putsemenavailablefrom=$('#put_semen_available_from').val(); 
        var trainerHistory=$('#trainer_history').val();
        var trainerHistory=$('#trainer_history').val();

        
               
        $.ajax({
            url: '{{ route('admin.update.stallion') }}', 
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',  
                name: name,
                email: email,
                id:id,
                performance_history:performanceHistory,
                background_story:backgroundStory,
                background_story:backgroundStory,
                owner_story:ownerStory,
                lifetime_story:lifetimeStory,
                professional_trainer:professionaltrainer,
                bred_by:bredby,
                registration_details:registrationdetails,
                putsemenavailablefrom:putsemenavailablefrom,
                trainer_history:trainerHistory,
               
            },
            success: function(response) {      
                $(".editDetailsModal").removeClass('model-open');
                $('#response').html(response.message);
                $('#insertForm')[0].reset();      
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: response.message,
                    confirmButtonText: 'OK'
                });
            },
            error: function(xhr, status, error) {
              $('#response').html('<p style="color:red;">An error occurred: ' + error + '</p>');    
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Please try again.',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
$(".editDetailsBtn").on('click', function() {
$(".editDetailsModal").addClass('model-open');
var id = $(this).data('id');
$.ajax({
                url: `/stallion-details/${id}`,
                method: 'GET',
                success: function (response) {
                    $('#id').val(response.id);
                    $('#name').val(response.name);
                    $('#performance_history').val(response.performance_history);
                    $('#owner_story').val(response.owner_story);
                    $('#lifetime_story').val(response.lifetime_story);
                    $('#professional_trainer').val(response.professional_trainer);
                    $('#background_story').val(response.background_story);
                    $('#bred_by').val(response.bred_by);
                    $('#registration_details').val(response.registration_details);
                    $('#put_semen_available_from').val(response.put_semen_available_from);
                    $('#current_performing_discipline').val(response.current_performing_discipline);
                    $('#height').val(response.height);
                    $('#color').val(response.color);
                    $('#first_foal_crop_year').val(response.color);
                    $('#trainer_history').val(response.trainer_history);
                    $('#date_of_birth').val(response.date_of_birth);
                    $('#myModal').show();
                },
                // error: function () {
                //     alert('Unable to fetch data.');
                // }
            });
  });
 
$(".close").click(function(){
  $(".editDetailsModal").removeClass('model-open');
});
</script>
<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.js"></script>

@endpush
@endsection
 