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
                                  <td>Subscription Name</td>
                                  <td>{{$plan->plan_name}}</td>
                                </tr>
                               
                                <tr>
                                  <td>Renew Subscription Price</td>
                                  <td>{{$plan->plan_price}}</td> 
                                </tr>
                               
                                <tr>
                                  <td>Duration</td>
                                  <td>{{$plan->plan_duration}}</td>
                                </tr>                        
                                <tr>
                                  <td></td>
                                  <td>
                                    <a href="{{url('renew-subscription/payment')}}"class="btn btn_i black_btn form_btn text-right">
                                      Renew Now
                                    </a>
                                  </td>
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
@endsection