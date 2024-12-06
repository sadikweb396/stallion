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
                            <p>Get In Touch</p>
                            <div class="searchbar">
                                <input type="search" class="search_i" />
                                <button class="btn btn_i black_btn">Search</button>
                            </div>
                          </div>
                          <div class="table-box-mm">
                            <table class="content-table" id="myTable">
                              <thead>
                                <tr>
                                  <th>Id</th>
                                  <th>Name</th>
                                  <th>Phone</th>
                                  <th>Email</th>
                                  <th>Message</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                @foreach($gettouchs as $key=>$gettouch)
                                <tr>
                                  <td>{{++$key}}</td>                          
                                  <td>
                                    <div class="List_name">
                                        <a href="javascript:void(0)">{{$gettouch->name}}</a>
                                    </div>
                                  </td>    
                                  <td>{{$gettouch->phone}}</td> 
                                  <td>{{$gettouch->email}}</td>
                                  <td>{{$gettouch->message}}</td>                                   
                                  <td>
                                    <button
                                      class="btn btn_i black_btn form_btn"
                                    >
                                     Delete
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