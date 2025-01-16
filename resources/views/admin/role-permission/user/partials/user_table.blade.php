@foreach ($users as $key => $user)
<tr>
    <td>{{ ++$key }}</td>
    <td>{{ $user->username }}</td>
    <td>
        @can('update role')
        <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn_i black_btn form_btn">
            <i class="fas fa-edit"></i>
        </a>
        @endcan

        @can('delete role')
        <a href="{{ url('users/'.$user->id.'/delete') }}"  class="btn btn_i black_btn form_btn">
            <i class="fas fa-trash"></i>
        </a>
        @endcan
    </td>
</tr>
@endforeach
