@extends('layouts.owner.app')
@section('content')
<style>
  .content-table{
    border-radius: 0px !important; 
    box-shadow: none;
  }
  .profileText{
    justify-content:space-between;
  }
  .profileImg{
    height:50px;
    width: 50px;
    object-fit:cover;
  }
  .content-table{
    margin:0;
  }
  </style>
<div class="dash_body_inner">
    <div class="our_stallions stallions_details">
        <div class="add_new_stallions">
            <div class="stallions_tabs_main mt50">
                <div class="tabs_i">
                    <div class="tab-content active" id="tab-1">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div
                            class="title_bar"
                          >
                            <div class="profileText d-flex">
                              <p>Profile details</p>
                              <p><a href="{{url('edit-profile/'.$profile->id)}}">Edit Profile</a></p>
                            </div>
                          </div>
                            <div class="table-box-mm">
                                <table class="content-table" id="myTable">
                                    <thead>
                                    @if($profile->image)
                                    <tr>
                                       <th>Profile Image</th>
                                        <th> 
                                          <img class="profileImg" src="{{url($profile->image)}}"alt="User avtaar"></th>
                                        </tr>
                                        @endif
                                       
                                        <tr>
                                        <th>Name</th>
                                        <th>{{$profile->username}}</th>
                                        </tr>
                                       
                                        @if($profile->email)
                                        <tr>
                                        <th>Email</th>
                                        <th>{{$profile->email}}</th>   
                                        </tr>
                                        @endif
                                        @if($profile->phone)
                                        <tr>
                                        <th>Phone</th>
                                        <th>{{$profile->phone}}</th>   
                                        </tr>
                                        @endif
                                        @if($profile->address)
                                        <tr>
                                        <th>Address</th>
                                        <th>{{$profile->address}}</th>   
                                        </tr>
                                        @endif
                                    </thead>     
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection