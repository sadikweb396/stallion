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
                            <p>All Plan</p>
                            <div class="searchbar">
                                <a href="{{url('admin/plan/create')}}"class="btn btn_i black_btn">Add Plan</a>
                            </div>
                          </div>
                          <div class="table-box-mm">
                            <table class="content-table" id="myTable">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Plan Name</th>
                                  <th>Plan Price</th>
                                  <th>Plan Duration</th>
                                  <th>Plan For</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                @foreach($plans as $key=>$plan)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$plan->plan_name}}</td>
                                    <td>{{$plan->plan_price}}</td>
                                    <td>{{$plan->plan_duration}}</td>
                                    <td>{{$plan->plan_for}}</td> 
                                    <td><a href="{{ url('admin/plan/edit/' . $plan->id) }}" class="btn btn_i black_btn form_btn">Edit</a>
                                    <a href="{{ url('admin/plan/delete/' . $plan->id) }}"class="btn btn_i black_btn form_btn">Delete</a>
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