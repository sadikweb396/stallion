@foreach($stallions as $stallion)
                      <tr>
                        <td>
                          <div class="fetured_img">
                            @php 
                            $stallionImage = \App\Models\stallionimage::where('stallion_id',$stallion->id)->orderBy('id','ASC')->first();
                            @endphp
                            @if( $stallionImage)
                            <img src="{{url($stallionImage->stallion_image)}}" class="img-cover" alt="" />
                            @endif
                          </div>
                        </td>
                        <td>
                          <div class="List_name">
                            <a href="javascript:void(0)">{{$stallion->name}}</a>
                          </div>
                        </td>
                        @php 
                        $user = \App\Models\user::where('id',$stallion->user_id)->first();
                        @endphp
                        <td>{{$user->username}}</td>
                        <td>{{$stallion->date_of_birth}}</td>
                        <td>
                            @if($stallion->status_count==5)
                            @if($stallion->status==0)
                            <button type="submit" data-id="{{$stallion->id}}" id="approveBtn"class="btn btn_i black_btn form_btn ">Approve</button>
                            <div id="model">
                            </div>
                            @elseif($stallion->status==1)
                            <button type="submit"data-id="{{$stallion->id}}" id="declineBtn" class="btn btn_i black_btn form_btn">Decline</button>
                            <div id="model">
                            </div>
                            @else
                            @endif
                            @else
                            @endif
                        </td>
                          
                          <td>
                             @if($stallion->status_count==5)
                              <p class="btn btn_i black_btn form_btn">Completed </p>
                             @else
                              <p class="btn btn_i black_btn form_btn">Incomplete </p>
                             @endif  
                          </td>
                          <td>
                            <button class="btn btn_i black_btn form_btn">
                              View
                            </button>
                                    
                          </td>
                        </tr>
                        @endforeach