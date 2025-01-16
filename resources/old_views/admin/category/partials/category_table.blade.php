@foreach($categorys as $category)
<tr>
    <td>
        <div class="fetured_img">
        <img src="{{url($category->catimage)}}" class="img-cover" alt="" />
    </div>
    </td>
    <td>
        <div class="List_name">
            <a href="javascript:void(0)">{{$category->categoryname}}</a>
        </div>
    </td>
    <td>  
        <a href="{{url('admin/category/edit',$category->id)}}"class="btn btn_i black_btn form_btn">
                                      Edit
        </button>     
    </td>
</tr>
@endforeach