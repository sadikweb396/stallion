
@extends('layouts.owner.app')
@section('content')
@can('Dashboard')
<div class="dash_body_inner dash_main_body">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions_list">
                <div class="stallions_tabs_main">
                  <div class="tabs_i">
                    <div class="tab-contents row dash_rows">
                      <div class="col-lg-7 mb20">
                        <div class="main_tab_content">
                          <div class="main_stallions_i">
                            <div class="our_stallions">
                              <div
                                class="stallions_list_m d-flex gap20 flexwrap mb20"
                              >
                                <article class="stallion_items text-center">
                                  <div class="stallion_title mtb20">
                                    <p class="stallions_name">All Stallions</p>
                                  </div>
                                  <a href="{{url('admin/stallions')}}">
                                  <div
                                    class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                    style="
                                      background-image: url(../assets/image/hourse.png);
                                    "
                                  >    
                                </div>
                                </a>
                                </article>
                                <article class="stallion_items text-center">
                                  <div class="stallion_title mtb20">
                                    <p class="stallions_name">All Mares</p>
                                  </div>
                                  <a href="{{url('admin/mares')}}">
                                  <div
                                    class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                    style="
                                      background-image: url(../assets/image/hourse.png);
                                    ">
                                 
                                </div>
                                </a>
                                </article>
                                <article class="stallion_items text-center">
                                  <div class="stallion_title mtb20">
                                    <p class="stallions_name">All Progenies</p>
                                  </div>
                                  <a href="{{url('admin/progenies')}}">
                                  <div
                                    class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                                    style="
                                      background-image: url(../assets/image/hourse.png);
                                    "
                                  ></div>
                                  </a>
                                </article>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="profile_status_m">
                          <div class="profile_title mb20">
                            <p>2024 Semen contract</p>
                          </div>
                          <div class="table-box-mm">
                            <table class="content-table">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Status</th>
                                  <th>Date</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Stallions Name</td>
                                  <td>End Contract</td>
                                  <td>01 Dec 2023</td>
                                  <td>
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      View
                                    </button>
                                  </td>
                                </tr>
                                <tr class="active-row">
                                  <td>Stallions Name</td>
                                  <td>Processing</td>
                                  <td>16 Sep 2024</td>
                                  <td>
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      View
                                    </button>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Stallions Name</td>
                                  <td>Processing</td>
                                  <td>16 Sep 2024</td>
                                  <td>
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      View
                                    </button>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Stallions Name</td>
                                  <td>Processing</td>
                                  <td>16 Sep 2024</td>
                                  <td>
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      View
                                    </button>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Stallions Name</td>
                                  <td>Processing</td>
                                  <td>16 Sep 2024</td>
                                  <td>
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      View
                                    </button>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Stallions Name</td>
                                  <td>Processing</td>
                                  <td>16 Sep 2024</td>
                                  <td>
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      View
                                    </button>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Stallions Name</td>
                                  <td>Processing</td>
                                  <td>16 Sep 2024</td>
                                  <td>
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      View
                                    </button>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <div class="profile_status_m mb20">
                          <div class="profile_title mb20">
                            <p>Profiles Status</p>
                          </div>
                          <div class="table-box-mm">
                            <table class="content-table">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Status</th>
                                  <th>Date</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Stallions</td>
                                  <td>Decline</td>
                                  <td>01 Dec 2023</td>
                                  <td>
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      Approve
                                    </button>
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      Decline
                                    </button>
                                  </td>
                                </tr>          
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="profile_status_m mb20">
                          <div class="profile_title mb20">
                            <p>Event List</p>
                          </div>
                          <div class="table-box-mm">
                            <table class="content-table">
                              <thead>
                                <tr>
                                  <th>Name</th>
                                  <th>Status</th>
                                  <th>Date</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Stallions</td>
                                  <td>Decline</td>
                                  <td>01 Dec 2023</td>
                                  <td>
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      View
                                    </button>
                                  </td>
                                </tr>        
                             
                              </tbody>
                            </table>
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
      </div>
    </div>
@endcan 
@endsection