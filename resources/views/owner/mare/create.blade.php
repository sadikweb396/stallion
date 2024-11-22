@extends('layouts.owner.app')
@section('content')
<style>
.ck-label {
  display: none !important;
}
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

  /* Animation for the modal */
  @keyframes slideIn {
    from {
      opacity: 0;
      transform: translateY(-50px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Button Style */
  .model-button {
    padding: 8px 8px;
    margin-top:20px;
    margin-left:80%;
    font-size: 16px;
    background-color:var(--dark-grey);
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }
.popup-message{
  background-color: transparent;
  border: unset;
  padding: 15px 10px;
  min-width: 200px;
  font-family: var(--font-poppins);
  font-size: 16px;
  line-height: 20px;
  font-weight: 400;
  color: var(--dark-grey);
  cursor: pointer;
}

@media (max-width: 992px) {
 .popup-message {
      padding: 15px 15px;
      width: 100%;
  }
}
</style>
 <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Mare Details</h3>
                  </div>
                  <div class="stallions_search">
                    <form action="#"> 
                      <input
                        type="search"
                        placeholder="Enter Your Stallion Name"
                      />
                    </form>
                  </div>
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">
                    <div class="tab-links d-flex justify-space-between mb20">
                      <button class="tab-link active"data-tab="tab-1">
                        <i class="fa-solid fa-heart-circle-plus"></i> Mare Details

                      </button>
                      <button class="popup-message"onclick="showModal()">
                        <i class="fa-regular fa-image"></i> Images
                      </button>
                      <button class="popup-message"onclick="showModal()">
                        <i class="fa-solid fa-video"></i> Videos
                      </button>
                      <button class="popup-message"onclick="showModal()">
                        <i class="fa-solid fa-temperature-empty"></i> Progeny
                      </button>
                    </div>
                    <div class="tab-content active" id="tab-1">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20">
                            <p class="text-center">Mare Details</p>
                          </div>
                          <div class="stallions_d_form mb50">
                            <form action="{{route('owner.mare.store')}}"method="post">
                                @csrf
                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name"> Name </label>
                                  <input type="text" id="name"name="name" />
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Performance History
                                  </label>
                                  <textarea name="performance_history" id="editor1"></textarea>
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
                                  <textarea name="owner_story" id="editor2"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Lifetime Story
                                  </label>
                                  <textarea name="lifetime_Story" id="editor3"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Professional Trainer
                                  </label>
                                  <textarea name="professional_trainer" id="editor4"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="Performance"> Bred By </label>
                                  <input
                                    type="text"
                                    id="Bred-By"
                                    name="bred_by"
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Registration Details
                                  </label>
                                  <input
                                    type="text"
                                    id="Registration-Details"
                                    name="registration_details"
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Put semen available from
                                  </label>
                                  <input
                                    type="text"
                                    id="semen-available-from"
                                    name="put_semen_available_from"
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
                                  <textarea name="trainer_history" id="editor5"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="Performance"> Height </label>
                                  <input
                                    type="text"
                                    id="Height"
                                    name="height"
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="Performance"> Gender </label>
                                  <input
                                    type="text"
                                    id="Gender"
                                    name="gender"
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    First foal crop year
                                  </label>
                                  <input
                                    type="text"
                                    id="First-foal-crop-year"
                                    name="first_foal_crop_year"
                                  />
                                </div>
                                <div class="form-group">
                                  <label for="Performance">
                                    Please Select one Option
                                  </label>
                                  <select id="registration" name="registration">
                                    <option value="" disabled selected>
                                      Please choose below one
                                    </option>
                                    <option value="Provide-Photographer-for-me">
                                      Provide Photographer for me
                                    </option>
                                    <option
                                      value="Would-like-to-select-my-own-Photographer"
                                    >
                                      Would like to select my own Photographer
                                    </option>
                                    <option
                                      value="Would-like-to-select-my-own-Photographer"
                                    >
                                      Would like my own Personal Photographer-
                                      Please contact me regarding photography
                                      Guidlines
                                    </option>
                                    <option
                                      value="Would-like-my-own-Personal-Photographer-Please-contact-me-regarding-photography-Guidlines"
                                    >
                                      Would like my own Personal Photographer-
                                      Please contact me regarding photography
                                      Guidlines
                                    </option>
                                    <option
                                      value="Already-have-recent-photography-to-supply-Still-need-photography-to-be-done-Contact-me"
                                    >
                                      Already have recent photography to supply,
                                      Still need photography to be done. Contact
                                      me
                                    </option>
                                  </select>
                                </div>
                              </div>
                              <div class="update_btn text-right mb50">
                               <button type="submit"class="btn btn_i black_btn">Update</button>
                              </div>
                            </form>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-2">
                      <div class="main_tab_content">
                        <div class="main_stallions_i">
                          <div class="our_stallions">
                            <div
                              class="stallions_list_m d-flex gap20 flexwrap mb50"
                            >
                              <article
                                class="stallion_items stallions_add_new text-center"
                              >
                                <div class="stallion_title mb20">
                                  <p>Add New</p>
                                </div>
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center cursor-pointer"
                                >
                                  <p>+</p>
                                </div>
                              </article>
                              <article class="stallion_items text-center">
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                  style="
                                    background-image: url(../assets/image/hourse.png);
                                  "
                                >
                                  <span class="percent_box">
                                    <svg>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                      ></circle>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                        style="--percent: 90"
                                      ></circle>
                                    </svg>
                                  </span>
                                </div>
                                <div class="stallion_title mtb20">
                                  <p class="stallions_name">Stallions</p>
                                  <p class="stallion-location">Location Name</p>
                                  <p class="stallion_date">Date</p>
                                </div>
                              </article>
                            </div>
                            <div
                              class="update_btn d-flex justify-space-between mb50"
                            >
                              <button
                                class="btn btn_i black_btn Back_btn"
                                onclick="activateTab()"
                              >
                                Back
                              </button>
                              <button class="btn btn_i black_btn btn_update">
                                Update
                              </button>
                            </div>
                          </div>
                          <div class="add-new-img-p">
                            <div class="main-img">
                              <!-- image upload area for popup-->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-3">
                      <div class="main_tab_content">
                        <div class="main_stallions_i">
                          <div class="our_stallions">
                            <div
                              class="stallions_list_m d-flex gap20 flexwrap mb50"
                            >
                              <article
                                class="stallion_items stallions_add_new text-center"
                              >
                                <div class="stallion_title mb20">
                                  <p>Add New Videos</p>
                                </div>
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center cursor-pointer"
                                >
                                  <p>+</p>
                                </div>
                              </article>
                              <article class="stallion_items text-center">
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                  style="
                                    background-image: url(../assets/image/hourse.png);
                                  "
                                >
                                  <span class="percent_box">
                                    <svg>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                      ></circle>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                        style="--percent: 90"
                                      ></circle>
                                    </svg>
                                  </span>
                                </div>
                                <div class="stallion_title mtb20">
                                  <p class="stallions_name">Stallions</p>
                                  <p class="stallion-location">Location Name</p>
                                  <p class="stallion_date">Date</p>
                                </div>
                              </article>
                            </div>
                            <div
                              class="update_btn d-flex justify-space-between mb50"
                            >
                              <button
                                class="btn btn_i black_btn Back_btn"
                                onclick="activateTab()"
                              >
                                Back
                              </button>
                              <button class="btn btn_i black_btn btn_update">
                                Update
                              </button>
                            </div>
                          </div>
                          <div class="add-new-img-p">
                            <div class="main-img">
                              <!-- image upload area for popup-->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-4">
                      <div class="main_tab_content">
                        <div class="main_stallions_d main_stallions_semen">
                          <div class="title_bar mb20">
                            <p class="text-center">Semen Contract</p>
                          </div>
                          <div class="stallions_d_form mb50">
                            <form action="#">
                              <div class="form_main">
                                <div class="form-group">
                                  <div
                                    class="checkbox-group d-flex gap20 justify-space-between"
                                  >
                                    <div class="checkbox-group_i mb20">
                                      <label
                                        ><input
                                          type="checkbox"
                                          id="toggleCheckbox"
                                        />
                                        Chilled Semen
                                      </label>
                                    </div>

                                    <div class="inner_field field_show_1">
                                      <div class="form-group">
                                        <label
                                          ><input type="checkbox" /> LFG(Tick If
                                          You gave live foal guarantee)</label
                                        >
                                      </div>
                                    </div>
                                    <div class="inner_field field_show_1">
                                      <div
                                        class="form-group d-flex align-items-center justify-content-end gap10"
                                      >
                                        <label for="name">
                                          Price You want to offer
                                        </label>
                                        <input
                                          type="number"
                                          id="Price-You-want-to-offer"
                                          name="Price-You-want-to-offer"
                                        />
                                        <button class="edit_input btn">
                                          Edit
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div
                                    class="checkbox-group d-flex gap20 justify-space-between"
                                  >
                                    <div class="checkbox-group_i mb20">
                                      <label
                                        ><input
                                          type="checkbox"
                                          id="toggleCheckbox2"
                                        />
                                        Frozen
                                      </label>
                                    </div>

                                    <div class="inner_field field_show_2">
                                      <div class="form-group">
                                        <label
                                          ><input type="checkbox" /> LFG(Tick If
                                          You gave live foal guarantee)</label
                                        >
                                      </div>
                                    </div>
                                    <div class="inner_field field_show_2">
                                      <div
                                        class="form-group d-flex align-items-center justify-content-end gap10"
                                      >
                                        <label for="name">
                                          Price You want to offer
                                        </label>
                                        <input
                                          type="number"
                                          id="Price-You-want-to-offer"
                                          name="Price-You-want-to-offer"
                                        />
                                        <button class="edit_input btn">
                                          Edit
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="title_bar title_bar_t mb20">
                                  <p class="text-center">Vet Details</p>
                                </div>

                                <div class="form-group">
                                  <label for="name-breeding">
                                    Name of the Breeding center/Vet Clininc
                                  </label>
                                  <input
                                    type="text"
                                    id="name-breeding"
                                    name="name-breeding"
                                  />
                                  <button class="edit_input btn">Edit</button>
                                </div>
                                <div class="form-group">
                                  <label for="address"> Address </label>
                                  <input
                                    type="text"
                                    id="address"
                                    name="address"
                                  />
                                  <button class="edit_input btn">Edit</button>
                                </div>
                                <div class="form-group">
                                  <label for="vet-name"> Vet Name </label>
                                  <input
                                    type="text"
                                    id="vet-name"
                                    name="vet-name"
                                  />
                                  <button class="edit_input btn">Edit</button>
                                </div>
                                <div class="form-group">
                                  <label for="phone"> Phone </label>
                                  <input
                                    type="number"
                                    id="phone"
                                    name="phone"
                                  />
                                  <button class="edit_input btn">Edit</button>
                                </div>
                                <div class="form-group">
                                  <label for="email"> Email </label>
                                  <input type="email" id="email" name="email" />
                                  <button class="edit_input btn">Edit</button>
                                </div>
                                <div class="form-group">
                                  <label for="clinic-number"
                                    >Clinic Number</label
                                  >
                                  <input
                                    type="number"
                                    id="clinic-number"
                                    name="clinic-number"
                                  />
                                  <button class="edit_input btn">Edit</button>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div
                            class="update_btn text-right mb50 d-flex justify-space-between"
                          >
                            <button
                              class="btn btn_i black_btn Back_btn"
                              onclick="activateTab()"
                            >
                              Back
                            </button>
                            <button class="btn btn_i black_btn">Update</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-content" id="tab-5">
                      <div class="main_tab_content">
                        <div class="main_stallions_p">
                          <div class="our_stallions">
                            <div
                              class="stallions_list_m d-flex gap20 flexwrap mb50"
                            >
                              <article
                                class="stallion_items stallions_add_new text-center"
                              >
                                <div class="stallion_title mb20">
                                  <p>Progeny Name</p>
                                </div>
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center cursor-pointer add_progeny_data"
                                >
                                  <p>+</p>
                                </div>
                              </article>
                              <article class="stallion_items text-center">
                                <div
                                  class="label_edit_m d-flex justify-space-between mb20"
                                >
                                  <div class="stallions_label">
                                    <div class="stallion_label_inner">
                                      <label> For Sale </label>
                                    </div>
                                  </div>
                                  <div class="edit-button">
                                    <button class="btn">
                                      <i class="fa-solid fa-pencil"></i>
                                    </button>
                                  </div>
                                </div>
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                  style="
                                    background-image: url(../assets/image/hourse.png);
                                  "
                                >
                                  <span class="percent_box">
                                    <svg>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                      ></circle>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                        style="--percent: 90"
                                      ></circle>
                                    </svg>
                                  </span>
                                </div>
                                <div class="stallion_title mtb20">
                                  <p class="stallions_name">Progeny Name</p>
                                </div>
                                <div
                                  class="exceptional_progeny showed text-center"
                                >
                                  <img
                                    src="./images/star.png"
                                    alt="exceptional_progeny"
                                    class="img-contain"
                                  />
                                </div>
                              </article>
                              <article class="stallion_items text-center">
                                <div
                                  class="label_edit_m d-flex justify-space-between mb20"
                                >
                                  <div class="stallions_label">
                                    <div class="stallion_label_inner sold_tag">
                                      <label> Sold :$4555 </label>
                                    </div>
                                  </div>
                                  <div class="edit-button">
                                    <button class="btn">
                                      <i class="fa-solid fa-pencil"></i>
                                    </button>
                                  </div>
                                </div>
                                <div
                                  class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                  style="
                                    background-image: url(../assets/image/hourse.png);
                                  "
                                >
                                  <span class="percent_box">
                                    <svg>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                      ></circle>
                                      <circle
                                        cx="105"
                                        cy="105"
                                        r="100"
                                        style="--percent: 90"
                                      ></circle>
                                    </svg>
                                  </span>
                                </div>
                                <div class="stallion_title mtb20">
                                  <p class="stallions_name">Progeny Name</p>
                                </div>
                                <div
                                  class="exceptional_progeny showed text-center"
                                >
                                  <img
                                    src="./images/star.png"
                                    alt="exceptional_progeny"
                                    class="img-contain"
                                  />
                                </div>
                              </article>
                            </div>
                            <div
                              class="update_btn d-flex justify-space-between mb50"
                            >
                              <button
                                class="btn btn_i black_btn Back_btn"
                                onclick="activateTab()"
                              >
                                Back
                              </button>
                              <button class="btn btn_i black_btn btn_update">
                                Update
                              </button>
                            </div>
                          </div>
                          <div class="add-new-img-p">
                            <div class="main-img">
                              <!-- image upload area for popup-->
                            </div>
                          </div>
                        </div>
                        <div class="main_stallions_d">
                          <div class="add_new_progeny d-none">
                            <div class="title_bar mb20">
                              <p class="text-center">Progeny Details</p>
                            </div>
                            <div class="stallions_d_form mb50">
                              <form action="#">
                                <div class="form_main">
                                  <div class="form-group">
                                    <div
                                      class="checkbox-group d-flex align-items-center gap20 flexwrap"
                                    >
                                      <div
                                        class="checkbox-group_i mb20 d-flex align-items-center gap10"
                                      >
                                        <label
                                          class="d-flex align-items-center justify-space-between"
                                        >
                                          <span>For Sale</span>
                                          <input
                                            type="checkbox"
                                            id="for-sale"
                                          />
                                        </label>
                                        <button class="edit_input btn">
                                          Edit
                                        </button>
                                      </div>
                                      <div
                                        class="checkbox-group_i mb20 d-flex align-items-center gap10"
                                      >
                                        <label
                                          class="d-flex align-items-center justify-space-between"
                                        >
                                          <span>Marked as sold</span>
                                          <input
                                            type="checkbox"
                                            id="for-sold"
                                          />
                                        </label>
                                        <button class="edit_input btn">
                                          Edit
                                        </button>
                                      </div>
                                      <div
                                        class="checkbox-group_i mb20 d-flex align-items-center gap10"
                                      >
                                        <label
                                          class="d-flex align-items-center justify-space-between"
                                        >
                                          <span
                                            >Is this Exceptional Progeny?</span
                                          >
                                          <input
                                            type="checkbox"
                                            id="Exceptional"
                                          />
                                        </label>
                                        <button class="edit_input btn">
                                          Edit
                                        </button>
                                      </div>
                                      <div
                                        class="checkbox-group_i mb20 d-flex align-items-center gap10"
                                      >
                                        <label
                                          class="d-flex align-items-center justify-space-between"
                                        >
                                          <span>Display Picture</span>
                                          <input
                                            type="checkbox"
                                            id="display-picture"
                                          />
                                        </label>
                                        <button class="edit_input btn">
                                          Edit
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label for="name"> Name </label>
                                    <input type="text" id="name" name="name" />
                                    <button class="edit_input btn">Edit</button>
                                  </div>
                                  <div class="form-group">
                                    <label for="date-of-birth">
                                      Date of Birth
                                    </label>
                                    <input
                                      type="text"
                                      id="date-of-birth"
                                      name="date-of-birth"
                                    />
                                    <button class="edit_input btn">Edit</button>
                                  </div>
                                  <div class="form-group">
                                    <label for="gender"> Gender </label>
                                    <input
                                      type="text"
                                      id="gender"
                                      name="gender"
                                    />
                                    <button class="edit_input btn">Edit</button>
                                  </div>
                                  <div class="form-group">
                                    <label for="color"> Color </label>
                                    <input
                                      type="text"
                                      id="color"
                                      name="color"
                                    />
                                    <button class="edit_input btn">Edit</button>
                                  </div>
                                  <div class="form-group">
                                    <label for="registeration-number">
                                      Registration number
                                    </label>
                                    <input
                                      type="text"
                                      id="registeration-number"
                                      name="registeration-number"
                                    />
                                    <button class="edit_input btn">Edit</button>
                                  </div>
                                  <div class="form-group">
                                    <label for="breeder"> Breeder </label>
                                    <input
                                      type="text"
                                      id="breeder"
                                      name="breeder"
                                    />
                                    <button class="edit_input btn">Edit</button>
                                  </div>
                                  <div class="form-group">
                                    <label for="trainer"> Trainer </label>
                                    <input
                                      type="text"
                                      id="trainer"
                                      name="trainer"
                                    />
                                    <button class="edit_input btn">Edit</button>
                                  </div>
                                  <div class="form-group">
                                    <label for="Performance">
                                      Performance History
                                    </label>
                                    <input
                                      type="text"
                                      id="Performance"
                                      name="Performance"
                                    />
                                    <button class="edit_input btn">Edit</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                            <div
                              class="update_btn d-flex justify-space-between mb50"
                            >
                              <button
                                class="btn btn_i black_btn Back_btn"
                                onclick="activateTab()"
                              >
                                Back
                              </button>
                              <button class="btn btn_i black_btn">
                                Update
                              </button>
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

      <!-- The Modal -->
  <div id="myModal" class="modal">
    <!-- Modal Content -->
    <div class="modal-content">
      <h4>First Fill Mare Details</h4>
      <button class="model-button"onclick="closeModal()">Close</button>
    </div>
  </div>
    <script>
    // Function to open the modal
    function showModal() {
      document.getElementById("myModal").style.display = "block";
    }

    // Function to close the modal
    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }

    // Close the modal if the user clicks outside of the modal content
    window.onclick = function(event) {
      if (event.target === document.getElementById("myModal")) {
        closeModal();
      }
    }
  </script>
   <script>
        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
            .create(document.querySelector('#editor2'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#editor3'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#editor4'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#editor5'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection          