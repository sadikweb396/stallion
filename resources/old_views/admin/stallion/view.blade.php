@extends('layouts.owner.app')
@section('content')
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
        <form id="stallionDetailsForm">
          <label for="name">Name:</label>
          <input type="text" id="name" name="name"value=""placeholder="Enter stallion's name">
          
          <label for="sire">Sire:</label>
          <input type="text" id="sire" name="sire" placeholder="Enter sire's name">
          
          <label for="dam">Dam:</label>
          <input type="text" id="dam" name="dam" placeholder="Enter dam's name">
          
          <label for="performanceHistory">Performance History:</label>
          <textarea id="performanceHistory" name="performanceHistory" placeholder="Enter performance history"></textarea>
          
          <label for="ownersName">Owner's Name:</label>
          <input type="text" id="ownersName" name="ownersName" placeholder="Enter owner's name">
          
          <label for="ownersStory">Owner's Story:</label>
          <textarea id="ownersStory" name="ownersStory" placeholder="Enter owner's story"></textarea>
          
          <label for="lifetimeStory">Lifetime Story:</label>
          <textarea id="lifetimeStory" name="lifetimeStory" placeholder="Enter lifetime story"></textarea>
          
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
                                >Edit Details
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
        url: '/admin/popupdata', // Correct base URL
        type: 'GET', // Use uppercase for HTTP method
        data: { id: id }, // Send the correct key-value pair
        success: function(data) {
            $('.popup_media').html(data); // Insert the response data into .popup_media
        },
        error: function(xhr, status, error) {
            console.error("Error:", error); // Log the error for debugging
            $('.popup_media').html('<p>Something went wrong. Please try again later.</p>'); // Show user-friendly error message
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
$(".editDetailsBtn").on('click', function() {
  
  $(".editDetailsModal").addClass('model-open');
}); 
$(".close").click(function(){
  $(".editDetailsModal").removeClass('model-open');
});
</script>

@endpush
@endsection
 