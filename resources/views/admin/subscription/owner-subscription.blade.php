@extends('layouts.owner.app')
@section('content')
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
                                  <th>Name</th>
                                  <th>Subscription Status</th>
                                  <th>Expiration Date</th> 
                                  <th>Renew</th>
                                </tr>
                              </thead>
                              <tbody>  
                                @foreach($subscriptions as $key=>$subscription)    
                                <tr>
                                   <td>
                                    @php $planName=DB::table('plans')->where('plan_for',$subscription->plan)->first(); @endphp 
                                    {{$planName->plan_name}}
                                   </td>
                                   <td>
                                    @if($subscription->stallion_id)
                                    @php $name=DB::table('stallions')->select('name')->where('id',$subscription->stallion_id)->first(); @endphp 
                                    {{$name->name}}
                                    @endif
                                   </td>
                                   <?php  
                                    $date = $subscription->created_at;
                                    $date->modify('+1 year');
                                    $date=$date->format('Y-m-d '); 
                                    
                                    ?>
                                    <?php 
                                    $currentdate=new \DateTime();
                                    $currentdate=$currentdate->format('Y-m-d '); 
                                    ?>
                                    @if($key==0) 
                                    <td>Active</td>
                                    @else
                                    @if($currentdate>=$date)
                                    <td>Inactive</td>
                                    @else
                                    <td>Active</td>
                                    @endif
                                    @endif

                                  <td>
                                  @if($key==0) 
                                   Life Time
                                  @else
                                  <?php  
                                    $date = $subscription->created_at;
                                    $date->modify('+1 year');
                                    $date=$date->format('Y-m-d '); 
                                    echo $date;
                                  ?>
                                  @endif
                                  </td>
                                 
                                  <?php  
                                    $date = $subscription->created_at;
                                    $date->modify('+1 year');
                                    $date=$date->format('Y-m-d '); 
                                    
                                    ?>
                                    <?php 
                                    $currentdate=new \DateTime();
                                    $currentdate=$currentdate->format('Y-m-d '); 
                                    ?> 
                                 @if($key==0) 
                                 <td>
                                    <a href="{{url('subscription/'.$subscription->id) }}"class="btn btn_i black_btn form_btn">View</a>
                                  </td>
                                 @else

                                  @if($currentdate>=$date)
                                  <td>
                                    <a href="{{url('subscription-renew/'.$subscription->id) }}"class="btn btn_i black_btn form_btn">Renew</a>
                                  </td>
                                  @else
                                  <td>
                                    <a href="{{url('subscription/'.$subscription->id) }}"class="btn btn_i black_btn form_btn">View</a>
                                  </td>
                                  @endif
                                  @endif
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
        </div>
    </div>
</div>

@endsection