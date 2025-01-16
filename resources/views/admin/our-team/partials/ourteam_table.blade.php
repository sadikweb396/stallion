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