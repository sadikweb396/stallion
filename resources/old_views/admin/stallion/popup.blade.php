@if($stalliondata)
<div class="inner_pop d-flex justify-content-center">
    <div class="close_btn">
        <i class="fa-solid fa-xmark"></i>
    </div>
    <div class="pop_img_preview">
        <img src="{{url($stalliondata->stallion_image)}}"alt=""class="img-cover"/>
    </div>
    <div class="pop_img_info">
        <div class="inner_info">
            <div class="info_list">
                <ul class="list-none">
                   <li class="list_items_img">
                        <span class="list_item_t"> Name : </span>
                        <span class="dynamic_list">
                           {{$stalliondata->stallion_name}}
                        </span>
                    </li>
                    <li class="list_items_img">
                        <span class="list_item_t"> Location : </span>
                        <span class="dynamic_list"> {{$stalliondata->stallion_location}} </span>
                    </li>
                    <li class="list_items_img">
                        <span class="list_item_t"> Date : </span>
                        <span class="dynamic_list"> {{$stalliondata->date}}  </span>
                    </li>   
                </ul>
            </div>
            <div class="image_info_form">
                <form action="{{ route('admin.set-image') }}"method="post">
                  <input type="hidden"name="id"value="{{$stalliondata->id}}">
                  @csrf
                    <div class="form_main">
                                <div class="form-group">
                                  <label for="title"
                                    ><span class="label_list"
                                      >Name</span
                                    ></label
                                  >
                                  <input
                                    type="text"
                                    placeholder=""
                                    class="input_title"value="{{$stalliondata->stallion_name}}"
                                  />
                                </div>
                               
                                <div class="form-group">
                                  <label for="title"
                                    ><span class="label_list"
                                      >Location</span
                                    ></label
                                  >
                                  <input
                                    type="text"
                                    placeholder=""
                                    class="input_title"value="{{$stalliondata->stallion_location}}"
                                  />
                                </div>

                                <div class="form-group">
                                          <label for="Date"> Date </label>
                                          <input
                                            type="date"
                                            id="calender"value="{{$stalliondata->date}}"
                                            name="calender"required
                                          />
                                        </div>
                  
                                <div class="form-group mb20">
                                  <label for="Set_as"
                                    ><span class="label_list">
                                      Set As
                                    </span></label
                                  >
                                  <select id="Set_as" name="setimage">
                                    @if($stalliondata->banner_image == 0 && $stalliondata->performance_image == 0 && $stalliondata->background_image == 0 && $stalliondata->exclusive_data == 0)
                                    <option value="" disabled="" selected="">
                                      Please Select Image
                                    </option>
                                    @endif
                                    <option value="banner_image" 
                                        @if(isset($stalliondata) && $stalliondata->banner_image == 1) selected @endif>
                                      Banner Image
                                    </option>
                                    <option value="performance_image" 
                                          @if(isset($stalliondata) && $stalliondata->performance_image == 1) selected @endif>
                                      Perfomance History Image
                                    </option>
                                    <option value="background_image" 
                                          @if(isset($stalliondata) && $stalliondata->background_image == 1) selected @endif>
                                      Background Story Image
                                    </option>

                                    <option value="exclusive_data" 
                                          @if(isset($stalliondata) && $stalliondata->exclusive_data == 1) selected @endif>
                                      Exclusive Data Image
                                    </option>
                                    <option value="new_element" 
                                          @if(isset($stalliondata) && $stalliondata->new_element == 1) selected @endif>
                                      New Element Image
                                    </option>

                                  </select>
                                </div>
                                <div class="form-group">
                                  <input type="submit"class="btn btn_i black_btn form_btn_img"/>
                               </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
