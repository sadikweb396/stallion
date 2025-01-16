
                                @foreach ($permissions as $key=>$permission)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                       @can('update role')
                                        <a href="{{ url('permissions/'.$permission->id.'/edit') }}"  class="btn btn_i black_btn form_btn">
                                        <i class="fas fa-edit"></i>
                                        </a>
                                        @endcan
                                        @can('delete role')
                                        <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn_i black_btn form_btn">
                                        <i class="fas fa-trash"></i>
                                        </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            