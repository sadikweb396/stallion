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
                      <p class="mb20">All Our Team</p>
                      <div class="add_user">
                          @can('create user')
                          <a href="{{ url('admin/our-team/create') }}" class="btn btn-primary float-end btn btn_i black_btn">Add Our Team</a>
                            @endcan
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
                                  <th>Id</th>
                                  <th> Name</th>
                                  <th>Image</th>
                                  <th>Description</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                @foreach($ourteams as $key=>$ourteam)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$ourteam->name}}</td>
                                    <td><img src="{{url($ourteam->image)}}" width="100" height="100"></td>
                                    <td>{{$ourteam->description}}</td>
                                    <td>
                                    <a href="{{ url('admin/our-team/edit/' . $ourteam->id) }}" class="btn btn_i black_btn form_btn"><i class="fas fa-edit"></i></a>
                                    <a href="{{ url('admin/our-team/delete/' . $ourteam->id) }}"class="btn btn_i black_btn form_btn"><i class="fas fa-trash"></i></a>
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
@push('scripts')
<script>
    $(document).ready(function() {
    $('#search').on('keyup', function() {
        var query = $(this).val(); 
        if (query.length > 2) {
            $.ajax({
                url: "{{ route('admin.our-team-search') }}", 
                method: "GET",
                data: { query: query }, 
                success: function(response) {
                      if (response) {
                      $('#pagination').html('');
                      $('#myTable tbody').html(response);
                       
                    } else {
                      $('#pagination').html('');
                      $('#myTable tbody').html('<tr><td colspan="3" style="text-align:center;font-size:18px;">No results found</td></tr>');
                    }
                },
                error: function() {
                    console.log('An error occurred while fetching search results.');
                }
            });
        } else {
  
            if (query.length === 0) {
                window.location.reload();  
            }
          
        }
    });
});
</script> 
@endpush
