@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner dash_main_body">
  <div class="our_stallions stallions_details">
              <div class="add_new_stallions_list">
                <div class="stallions_tabs_main">
                  <div class="tabs_i">
                    <div class="tab-contents row dash_rows">
                      <div class="col-lg-7 mb20">
                        <div class="profile_status_m">
                          <div class="profile_title mb20">
                            <p>Subscriptions Plan Name</p>
                          </div>
                          <div class="table-box-mm">
                            <table class="content-table">
                              <tbody>
                                <tr>
                                  <td>Subscription Id</td>
                                  <td>{{$subscriptions->stripe_payment_id}}</td>
                                </tr>
                                <tr>
                                  <td>Subscription Status</td>
                                  <td>Active</td>
                                </tr>
                                <tr>
                                  <td>Subscription Price</td>
                                  <td>${{$subscriptions->amount}}</td> 
                                </tr>
                                <tr>
                                  <td>Expiration Date</td>
                                  <td>
                                    <?php  
                                    $date = $subscriptions->created_at;
                                    $date->modify('+1 year');
                                    $date=$date->format('Y-m-d '); 
                                    echo $date;
                                    ?>
                                  </td>
                                </tr>
                                <?php 
                                 $currentdate=new \DateTime();
                                 $currentdate=$currentdate->format('Y-m-d '); 
                                ?>  
                                <tr>
                                  <td>Billing Period</td>
                                  <td>Annually( Pay Every 12 months )</td>
                                </tr>              
                                @if($currentdate>=$date)
                                <tr>
                                  <td></td>
                                  <td>
                                    <a href="trt"class="btn btn_i black_btn form_btn text-right">
                                      Renew Now
                                    </a>
                                  </td>
                                </tr>
                                @endif
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