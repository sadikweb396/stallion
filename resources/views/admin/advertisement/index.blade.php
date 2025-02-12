@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner dash_main_body">
            <div class="our_stallions stallions_details events_m">
              <div class="add_new_stallions_list">
                <div class="stallions_tabs_main">
                  <div class="tabs_i">
                    <div class="tab-contents row">
                      <div class="col-lg-12">  
                       <div class="profile_status_m mb20">
                          <div class="profile_title mb20 d-flex align-items-center justify-space-between">
                            <p>All Advertisement</p>
                            <div class="searchbar">
                                <a href="{{url('admin/advertisement/create')}}"class="btn btn_i black_btn">Add Advertisement</a>
                            </div>
                          </div>
                          <div class="table-box-mm">
                            <table class="content-table" id="myTable">
                              <thead>
                                <tr>
                                  <th>Image</th>
                                  <th>Page</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                @foreach($advertisements as $advertisement)
                                <tr>
                                    <td>
                                        <div class="fetured_img">
                                      
                                            <img src="{{url($advertisement->image)}}" class="img-cover" alt="" />
                                        </div>
                                    </td>
                                  <td>
                                    <div class="List_name">
                                        <a href="javascript:void(0)">{{$advertisement->page}}</a>

                                    </div>
                                  </td>      
                               
                                  <td>                
                                    <a href="{{ url('admin/advertisement/edit/'.$advertisement->id) }}"
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      Edit
                                    </a>
                                    <a href="{{ url('admin/advertisement/delete/'.$advertisement->id) }}"
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      Delete
                                    </a>
                                  </td>
                                </tr>
                               @endforeach
                              </tbody>
                              
                            </table>
                            <div class="pagination d-flex justify-content-center" id="pagination"></div>
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