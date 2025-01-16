@extends('layouts.owner.app')
@section('content')
<style>
/* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; 
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Enable scrolling if needed */
    background-color: rgba(0, 0, 0, 0.5); /* Black w/ opacity */
    padding-top: 60px;
  }
 /* Modal Content */
 .modal-content {
    background-color: #fff;
    margin: 5% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    max-width: 300px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    animation: slideIn 0.3s ease-in-out;
  }
  
</style>
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Stallion Details</h3>
                  </div>
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">
                    <div class="tab-links d-flex justify-space-between mb20">
                      <button class="tab-link active"data-tab="tab-1">
                        <i class="fa-solid fa-heart-circle-plus"></i> Stallion
                        Details
                      </button>
                      <button class="popup-message"onclick="showModal()">
                        <i class="fa-regular fa-image"></i> Images
                      </button>
                      <button class="popup-message"onclick="showModal()">
                        <i class="fa-solid fa-video"></i> Videos
                      </button>
                      <button class="popup-message"onclick="showModal()">
                        <i class="fa-solid fa-file-contract"></i> Semen Contract
                      </button>
                      <button class="popup-message"onclick="showModal()">
                        <i class="fa-solid fa-temperature-empty"></i> Progeny
                      </button>
                      <button class="popup-message"onclick="showModal()">
                        <i class="fa-solid fa-temperature-empty"></i> Pedigree
                      </button>
                    </div>
                    <div class="tab-content active" id="tab-1">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20">
                            <p class="text-center">Stallion Details</p>
                          </div>
                          <div class="stallions_d_form mb50">
                            <form action="{{route('owner.stallion.store')}}"method="post"id="myForm">
                                @csrf
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name"> Name </label>
                                  <input type="text" id="name"name="name" required/>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Performance History
                                  </label>
                                  <textarea name="performance_history" id="performance_history"></textarea>
                                  <p id="performance"class="validation-stallion"><p>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Owner’s Name
                                  </label>
                                  <input
                                    type="text"
                                    id="owner-text"
                                    name="owner-text"value="{{ Auth::user()->username }}"
                                  readonly/>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Owner’s Story
                                  </label>
                                  <textarea name="owner_story" id="owner_story"></textarea>
                                  <p id="owner"class="validation-stallion"><p>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Lifetime Story
                                  </label>
                                  <textarea name="lifetime_story" id="lifetime_Story"></textarea>
                                  <p id="lifetime"class="validation-stallion"><p>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Professional Trainer
                                  </label>
                                  <textarea name="professional_trainer" id="personal_trainer"></textarea>
                                  <p id="personaltrainer"class="validation-stallion"><p>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                   Background Story 
                                  </label>
                                  <textarea name="background_story"id="background_story"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="Performance"> Bred By </label>
                                  <input
                                    type="text"
                                    id="Bred-By"
                                    name="bred_by"required
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Registration Number
                                  </label>
                                  <input
                                    type="text"
                                    id="Registration-Details"
                                    name="registration_details"required
                                  />
                                 
                                <div class="form-group">
                                  <label for="Performance">
                                    Put semen available from
                                  </label>
                                  <input
                                    type="date"
                                    id="semen-available-from"
                                    name="put_semen_available_from"required
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Current performing discipline
                                  </label>
                                  <input
                                    type="text"
                                    id="performing-discipline"
                                    name="current_performing_discipline"
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Trainer History
                                  </label>
                                  <textarea name="trainer_history"id="trainer_history"></textarea>
                                  <p id="trainerhistory"class="validation-stallion"><p>
                                </div>
                                <div class="form-group">
                                  <label for="Performance"> Height </label>
                                  <input
                                    type="text"
                                    id="Height"
                                    name="height"required
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                   color
                                  </label>
                                  <input type="text" name="color" required>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                  Date of Birth
                                  </label>
                                  <input type="date" name="date_of_birth" required>
                                </div>
                                
                                <div class="form-group">
                                  <label for="Performance">
                                    First foal crop year
                                  </label>
                                  <input
                                    type="text"
                                    id="First-foal-crop-year"
                                    name="first_foal_crop_year"required
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Please Select one Option
                                  </label>
                                  <select id="photographer" name="photographer"required>
                                    <option value="" disabled selected>
                                      Please choose below one
                                    </option>
                                    <option id="1"value="1">
                                      Provide Photographer for me
                                    </option>
                                    <option id="2"
                                      value="2"
                                    >
                                      Would like to select my own Photographer
                                    </option>
                                    <option id="3"
                                      value="3"
                                    >
                                      Would like my own Personal Photographer-
                                      Please contact me regarding photography
                                      Guidlines
                                    </option>
                                    <option id="4"
                                      value="4"
                                    >
                                      Would like my own Personal Photographer-
                                      Please contact me regarding photography
                                      Guidlines
                                    </option>
                                    <option id="5"
                                      value="5"
                                    >
                                      Already have recent photography to supply,
                                      Still need photography to be done. Contact
                                      me
                                    </option>
                                  </select>
                                </div>
                              </div>
                              <div class="photographerappend"id="photographerappend">
                              </div>
                              <div class="update_btn text-right mb50">
                               <button type="submit"class="btn btn_i black_btn">save</button>
                              </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-2">
                    </div>
                    <div class="tab-content" id="tab-3">
                    </div>
                    <div class="tab-content" id="tab-4">
                    </div>
                    <div class="tab-content" id="tab-5">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
            <!-- The Modal -->
    <div id="myModal" class="modal">
      <!-- Modal Content -->
      <div class="modal-content">
        <h4>First Fill Stallion Details</h4>
        <button class="model-button"onclick="closeModal()">Close</button>
      </div>
    </div>  
    @push('scripts')
  <script>
   ClassicEditor
    .create(document.querySelector('#performance_history'))
    .catch(error => {
        console.error(error);
    });

  ClassicEditor
    .create(document.querySelector('#owner_story'))
    .catch(error => {
          console.error(error);
  });

  ClassicEditor
    .create(document.querySelector('#lifetime_Story'))
    .catch(error => {
          console.error(error);
  });


  ClassicEditor
    .create(document.querySelector('#personal_trainer'))
    .catch(error => {
          console.error(error);
  });

  ClassicEditor
    .create(document.querySelector('#background_story'))
    .catch(error => {
          console.error(error);
  });

  ClassicEditor
      .create(document.querySelector('#trainer_history'))
      .catch(error => {
                console.error(error);
  });
</script>
@endpush
@endsection          