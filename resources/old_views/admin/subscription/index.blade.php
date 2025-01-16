@extends('layouts.owner.app')
@section('content')
@if($subscriptions)
<div class="dash_body_inner dash_main_body">
    <div class="our_stallions stallions_details">
        <div class="add_new_stallions_list">
            <div class="stallions_tabs_main">
                <div class="tabs_i">
                    <div class="tab-contents row dash_rows">
                      <div class="col-lg-12 mb20">
                        <div class="profile_status_m">
                          <div class="profile_title mb20">
                            <p>Subscriptions</p>
                          </div>
                          <div class="table-box-mm">  
                            <table class="content-table">
                              <thead>
                                <tr>
                                  <th>Subscription Plan</th>
                                  <th>Subscription Status</th>
                                  <th>Expiration Date</th> 
                                  <th>Renew</th>
                                </tr>
                              </thead>
                              <tbody>      
                                <tr>
                                  <td>{{$subscriptions->plan}}</td>
                                  <td>Active</td>
                                  <td>
                                  <?php  
                                    $date = $subscriptions->created_at;
                                    $date->modify('+1 year');
                                    $date=$date->format('Y-m-d '); 
                                    echo $date;
                                  ?>
                                  </td>
                                  <?php  
                                    $date = $subscriptions->created_at;
                                    $date->modify('+1 year');
                                    $date=$date->format('Y-m-d '); 
                                    
                                    ?>
                                    <?php 
                                    $currentdate=new \DateTime();
                                    $currentdate=$currentdate->format('Y-m-d '); 
                                    ?> 
                                  @if($currentdate>=$date)
                                  <td>
                                    <a href="{{url('subscription-renew/'.$subscriptions->id) }}"class="btn btn_i black_btn form_btn">Renew</a>
                                  </td>
                                  @else
                                  <td>
                                    <a href="{{url('subscription/'.$subscriptions->id) }}"class="btn btn_i black_btn form_btn">View</a>
                                  </td>
                                  @endif
                                </tr>    
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
        </div>
    </div>
</div>
@endif
@endsection