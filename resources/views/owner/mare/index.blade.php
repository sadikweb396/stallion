@extends('layouts.owner.app')
@section('content')
<div class="dash_body_inner">
            <div class="our_stallions">
              <div class="stallions_list_m d-flex gap20 flexwrap">
                <article class="stallion_items stallions_add_new text-center">
                  <div class="stallion_title mb20">
                    <p>Add New</p>
                  </div>
                  <div
                    class="add_stallion_bar d-flex align-items-center justify-content-center"
                  >
                    <p><a href="{{route('owner.mare.create')}}">+</a></p>
                  </div>
                </article>
                @foreach($stallions as $stallion)
                <article class="stallion_items text-center">
                  <div class="stallion_title mb20">
                    <p>{{$stallion->name}}</p>
                  </div>

                  <a href="{{ route('owner.mare',['id' => $stallion->id]) }}" class="d-flex align-items-center gap10">
                 
                  <div
                    class="add_stallion_bar d-flex align-items-center justify-content-center background-img"
                    style="background-image: url(../assets/image/hourse.png)">
                    <span class="percent_box">
                      <svg>
                        <circle cx="105" cy="105" r="100"></circle>
                        <circle
                          cx="105"
                          cy="105"
                          r="100"
                          style="--percent: 90"
                        ></circle>
                      </svg>
                    </span>
                  </div>
                  </a>
                </article>
                @endforeach
              </div>
            </div>
          </div>
@endsection

