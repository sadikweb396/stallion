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
                            <p>All Mares</p>
                            <div class="searchbar">
                                <input type="search"id="search"placeholder="Search" class="search_i" />
                            </div>
                          </div>
                          <div class="table-box-mm">
                            <table class="content-table" id="myTable">
                              <thead>
                                <tr>
                                  <th>Image</th>
                                  <th>Name</th>
                                  <th>Author</th>
                                  <th>Date</th>
                                  <th>Status</th>
                                  <th>Profile</th>
                                  <th>Action</th>
                                </tr>
                              </thead>
                              <tbody class="">
                                @foreach($mares as $key=>$mare)
                                <tr>
                                    <td>
                                        <div class="fetured_img">
                                        @php
                                          $stallionImage = \App\Models\stallionimage::where('stallion_id',$mare->id)->orderBy('id','ASC')->first();
                                        @endphp
                                        @if( $stallionImage)
                                            <img src="{{url($stallionImage->stallion_image)}}" class="img-cover" alt="" />
                                        @endif
                                        </div>
                                    </td>
                                  <td> 
                                    <div class="List_name">
                                        <a href="javascript:void(0)">{{$mare->name}}</a>

                                    </div>
                                  </td>
                                   @php
                                     $user = \App\Models\user::where('id',$mare->user_id)->first();
                                   @endphp
                                  <td>{{$user->username}}</td>
                                  <td>{{$mare->date_of_birth}}</td>
                                  <td>
                                  @if($mare->status_count==5)
                                  @if($mare->status==0)
                                  <button type="submit"data-id="{{$mare->id}}"id="approveBtn{{++$key}}"class="approveBtn btn btn_i black_btn form_btn">Approve</button> 
                                  <div id="model">
                                  </div>
                                  @elseif($mare->status==1)
                                  <button class="declineBtn btn btn_i black_btn form_btn"data-id="{{$mare->id}}" id="declineBtn{{++$key}}">Decline</button>
                                  <div id="model">
                                  </div>
                                  @else
                                  @endif
                                  @else
                                  @endif
                                 </td>   
                                  <td>
                                  @if($mare->status_count==5)
                                  <p class="btn btn_i black_btn form_btn">Completed </p>
                                  @else
                                  <p class="btn btn_i black_btn form_btn">Incomplete </p>
                                  @endif  
                                  </td>
                                  <td>
                                  <a href="{{ url('admin/mare/view/' . $mare->id) }}"class="btn btn_i black_btn form_btn">
                                       View
                                  </a> 
                                    
                                  </td>
                                </tr>
                               @endforeach
                              </tbody>     
                            </table>
                            <div class="pagination d-flex justify-content-center" id="pagination">{{ $mares->links() }}</div>
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
    url: "{{ route('admin.mare-search') }}", 
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
                    alert('An error occurred while fetching search results.');
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