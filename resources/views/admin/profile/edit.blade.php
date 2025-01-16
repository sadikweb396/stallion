@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
    <div class="profile_main add_new_stallions">
        <div class="profile-info">
            <div class="title_bar mb20">
                <p class="text-center">Edit Profile</p>
            </div>
            <div class="profile_form_m">
                <div class="stallions_d_form mb50">
                    <form action="{{ url('update-profile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                      <input type="hidden"name="id"value="{{$editProfile->id}}">
                      <div class="form_main mb50">
                        <div class="form-group">
                          <label for="name">First Name</label>
                          <input type="text"id="name"value="{{$editProfile->first_name}}"name="first_name" />
                        </div>
                        <div class="form-group">
                          <label for="name">Last Name</label>
                          <input type="text" id="name"value="{{$editProfile->last_name}}"name="last_name" />
                        </div>
                        <div class="form-group">
                          <label for="mobile-number">Mobile Number</label>
                          <input type="number" id="mobile-number"value="{{$editProfile->phone}}"name="phone"
                          />
                        </div>
                        <div class="form-group">
                          <label for="email">Email Address</label>
                          <input type="email" id="email"value="{{$editProfile->email}}" name="email" />
                        </div>
                        <div class="form-group">
                          <label for="Home-Address">Address</label>
                          <input type="text" id="Home-Address"value="{{$editProfile->address}}"name="address"/>
                        </div>
                      
                        <div class="form-group">
                          <label for="Password">Password</label>
                          <input type="password"id="Password"value="{{$editProfile->password}}"name="Password"
                          />
                        </div>
                        <div class="form-group">
                          <label for="name">Profile Picture</label>
                          <input type="file" id="upload" name="image" />
                        </div>
                      </div>
                      <div class="form_submit">
                        <input
                          type="submit"
                          value="Save Changes"
                          class="submit_bttn btn_i btn black_btn"
                        />
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection