@foreach($mares as $mare)
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
        <button type="submit" data-id="{{$mare->id}}" id="approveBtn"class="btn btn_i black_btn form_btn ">Approve</button>
        <div id="model">
        </div>
        @elseif($mare->status==1)
        <button type="submit"data-id="{{$mare->id}}" id="declineBtn" class="btn btn_i black_btn form_btn">Decline</button>
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
        <button class="btn btn_i black_btn form_btn">
            View
        </button>
    </td>
</tr>
@endforeach