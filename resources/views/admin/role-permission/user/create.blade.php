    
@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Create User</h3>
                  </div>
                  <div class="stallions_search">
                    
                  </div>
                </div>
                <div class="stallions_tabs_main">
                  <div class="tabs_i">
                    <div class="">
                      <div class="main_tab_content">
                        <div class="main_stallions_d">
                          <div class="title_bar mb20">
                            <p class="text-center">Create User</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form action="{{ url('users') }}" method="POST">
                            @csrf
                              <div class="form_main">
                                <div class="form-group">
                                    <label for="first-name">First Name</label>
                                    <input type="text" name="first_name" class="form-control"required/>
                                    @error('first_name')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="last-name">Last Name</label>
                                    <input type="text" name="last_name" class="form-control"required/>
                                    @error('last_name')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control"required/>
                                    @error('email')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Phone</label>
                                    <input type="text" name="phone" class="form-control"/>          
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password"name="password" class="form-control"required/>
                                    @error('password')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="role">Roles</label>
                                    <select name="roles[]" class="form-control" multiple>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                                    @error('roles')
                                    <div style="color: red;">{{ $message }}</div>
                                    @enderror
                                </div>
                              </div>
                              <div class="update_btn text-right mb50">
                               <button type="submit"class="btn btn_i black_btn">Save</button>
                              </div>
                            </form>

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