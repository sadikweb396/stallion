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
                            <p>All Stallions</p>
                            <div class="searchbar">
                                <input type="search" class="search_i" />
                                <button class="btn btn_i black_btn">Search</button>
                            </div>
                          </div>
                          <div class="table-box-mm">
                            <table class="content-table" id="myTable">
                              <thead>
                                <tr>
                                  <th>Fetured Image</th>
                                  <th>Name</th>
                                  <th>Author</th>
                                  <th>Date</th>
                                  <th>Status</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                @foreach($stallions as $stallion)
                                <tr>
                                    <td>
                                        <div class="fetured_img">
                                        @php
                                          $stallionImage = \App\Models\stallionimage::where('id',$stallion->id)->orderBy('id','desc')->first();
                                        @endphp
                                            <img src="{{url($stallionImage->stallion_image)}}" class="img-cover" alt="" />
                                        </div>
                                    </td>
                                  <td>
                                    <div class="List_name">
                                        <a href="javascript:void(0)">{{$stallion->name}}</a>

                                    </div>
                                  </td>
                                   @php
                                     $user = \App\Models\user::where('id',$stallion->user_id)->first();
                                   @endphp
                                  <td>{{$user->username}}</td>
                                  <td>01 Dec 2023</td>
                                  <td>
                                  @if($stallion->status==0)
                                  <form action="{{ route('admin.approve', $stallion->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <!-- Or use POST if appropriate -->
                                    <button type="submit" class="btn btn_i black_btn form_btn">Approve</button>
                                  </form>
                                  
                                  @elseif($stallion->status==1)
                                  <form action="{{ route('admin.decline', $stallion->id) }}" method="POST" style="display: inline;">
                                      @csrf
                                  <button type="submit" class="btn btn_i black_btn form_btn">Decline</button>
                                  </form>
                                  @endif
                                    
                                  </td>
                                  <td>
                                    
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                      View
                                    </button>
                                    
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