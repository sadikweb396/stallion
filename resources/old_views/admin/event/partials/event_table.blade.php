@foreach($events as $event)
<tr>
    <td>
    <div class="fetured_img">             
        <img src="{{url($event->image)}}" class="img-cover" alt="" />              
    </div>
    </td>
    <td>
    <div class="List_name">
        <a href="javascript:void(0)">{{$event->event_name}}</a>
    </div>
    </td>
    <td>
        {{$event->association_hosting_event}}
    </td>
    <td>
        {{ \Carbon\Carbon::create($event->start_date)->format('j F Y') }}
    </td>
    <td>
        {{ \Carbon\Carbon::create($event->start_date)->format('j F Y') }}
    </td>
    <td>
        {{$event->event_type}}
    </td>  
    <td>           
        <a href="{{ url('admin/event/edit/' . $event->id) }}" class="btn btn_i black_btn form_btn"><i class="fas fa-edit"></i></a>
        <a href="{{ url('admin/event/delete/' . $event->id) }}"class="btn btn_i black_btn form_btn"><i class="fas fa-trash"></i></a>
    </td>
</tr>
@endforeach