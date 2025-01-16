@foreach($ourBrainThinkers as $ourBrainThinker)
<tr>
    <td>
        <div class="fetured_img">             
           <img src="{{url($ourBrainThinker->image)}}" class="img-cover" alt="" />              
        </div>
    </td>
    <td>
        <div class="List_name">
        {{$ourBrainThinker->heading}}
        </div>
    </td>
    <td style="width:800px;">
        <div class="List_name">
        {!!$ourBrainThinker->paragraph!!}
        </div>
    </td>
    <td>
        <a href="{{ url('admin/our-brain-and-thinker/edit/' . $ourBrainThinker->id) }}" class="btn btn_i black_btn form_btn"><i class="fas fa-edit"></i></a>
        <a href="{{ url('admin/our-brain-and-thinker/delete/' . $ourBrainThinker->id) }}"class="btn btn_i black_btn form_btn"><i class="fas fa-trash"></i></a>
    </td>
</tr>
@endforeach