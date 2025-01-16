@foreach($plans as $key=>$plan)
<tr>
    <td>{{++$key}}</td>
    <td>{{$plan->plan_name}}</td>
    <td>{{$plan->plan_price}}</td>
    <td>{{$plan->plan_duration}}</td>
    <td>{{$plan->plan_for}}</td> 
    <td>
        <a href="{{ url('admin/plan/edit/' . $plan->id) }}" class="btn btn_i black_btn form_btn"><i class="fas fa-edit"></i></a>
        <a href="{{ url('admin/plan/delete/' . $plan->id) }}"class="btn btn_i black_btn form_btn"><i class="fas fa-trash"></i></a>
    </td>                 
</tr>
@endforeach