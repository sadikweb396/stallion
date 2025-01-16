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
                <div class="all_user_title">
                  <p class="mb20">All Service More Information</p>
                  <div class="add_user">
                     
                      <a href="{{ url('admin/service/create') }}" class="btn btn-primary float-end btn btn_i black_btn">Add Service</a>
                     
                      </div>
                  </div>  
                  <div class="searchbar">
                      <input type="search"id="search"placeholder="Search" class="search_i" />
                  </div>
                  </div>
                  <div class="table-box-mm">
                    <table class="content-table" id="myTable">
                      <thead>
                        <tr>
                          <th>Image</th>
                          <th>Service Name</th>
                          <th>Title</th>
                          <th>Icon</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody class="stallionlist">
                      @foreach($servicedetails as $servicedetail)
                      <tr>
                        <td>
                          <div class="fetured_img">             
                            <img src="{{url($servicedetail->image)}}" class="img-cover" alt="" />              
                          </div>
                        </td>
                        <td>
                            @php $service=DB::table('services')->where('id',1)->first(); @endphp
                          <div class="List_name">
                            <a href="javascript:void(0)">{{$service->service_name}}</a>
                          </div>
                        </td>
                        <td>
                            
                        </td>
                        <td>
                          <div class="fetured_img">  
                            <img src="{{url($service->icon)}}" class="img-cover" alt="" />  
                         </div>
                        </td>                    
                        <td>           
                        </td>
                        </tr>
                        @endforeach
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
@endsection
