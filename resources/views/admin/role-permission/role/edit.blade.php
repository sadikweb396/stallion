@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
            <div class="our_stallions stallions_details">
              <div class="add_new_stallions">
                <div
                  class="satllion_title_search_m d-flex justify-space-between align-items-center mb20"
                >
                  <div class="stallions_title">
                    <h3>Edit Role</h3>
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
                            <p class="text-center">Edit Role</p>
                          </div>
                          <div class="stallions_d_form mb50">
                          <form action="{{ url('roles/'.$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                              <div class="form_main">
                                <div class="form-group">
                                  <label for="name">Role Name </label>
                                  <input type="text" id="name"value="{{ $role->name }}"name="name" />
                                  @if ($errors->any())
                                    <ul class="alert alert-warning">
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                    @endif
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