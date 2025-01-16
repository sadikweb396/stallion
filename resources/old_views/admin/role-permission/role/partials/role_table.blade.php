@foreach ($roles as $key=>$role)
<tr>
    <td>{{ ++$key }}</td>
        <td>{{ $role->name }}</td>
        <td><a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-warning">
            Add / Edit Role Permission
            </a>
            @can('update role')
                <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn_i black_btn form_btn">
                <i class="fas fa-edit"></i>
                </a>
                </a>
            @endcan
            @can('delete role')
            <a href="{{ url('roles/'.$role->id.'/delete') }}"  class="btn btn_i black_btn form_btn">
                <i class="fas fa-trash"></i>
            </a>
            @endcan
        </td>
</tr>
@endforeach