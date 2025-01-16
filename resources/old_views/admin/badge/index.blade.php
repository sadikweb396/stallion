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
                            <p>All Badge</p>
                            <div class="searchbar">
                                <a href="{{url('admin/badge/create')}}"class="btn btn_i black_btn">Add Badge</a>
                            </div>
                          </div>
                          <div class="table-box-mm">
                            <table class="content-table" id="myTable">
                              <thead>
                                <tr>
                                  <th>Type</th>
                                  <th>Text</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                @foreach($badges as $badge)
                                <tr>
                                <td>
                                {{$badge->type}}
                                </td>
                                <td>
                                {{$badge->text}}
                                </td>
                                <td>                
                                <a href="{{ url('admin/badge/edit/'.$badge->id) }}"class="btn btn_i black_btn form_btn">
                                     Edit
                                </a>
                                <a href="{{ url('admin/badge/delete/'.$badge->id) }}"class="btn btn_i black_btn form_btn">
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