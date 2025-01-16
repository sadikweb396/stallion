@extends('layouts.owner.app')
@section('content')
<style>
    .follow{
      color: #007BFF;
      text-decoration:underline;  
    }     

    a:hover {
     
      color: #0056b3; 
    }
  </style>
    <div class="dash_body_inner">
        <div class="our_stallions stallions_details">
            <div class="main_fllowed d-flex align-items-center gap20 flexwrap mb20">
                @forelse($follows as $follow)
                    @php
                        $stallionImage = $follow->stallion->stallionimages
                            ->where('new_element', 1)
                            ->first() ??
                            $follow->stallion->stallionimages->first();
                    @endphp       
                    <article class="Fllowed_list background-img d-flex align-items-center justify-content-center" 
                             style="background-image: url(@if($stallionImage){{ url($stallionImage->stallion_image) }} @else {{ asset('images/default-image.jpg') }} @endif);">
                        <a href="javascript:void(0)">
                            <div class="list_info_m text-center">
                                <h3 class="mb20">{{ $follow->stallion->name }}</h3>
                                <p class="mb20">
                                    <span>Status:</span>
                                    <span class="dynamic_data">{{ $follow->stallion->status ?? 'Active' }}</span>
                                </p>
                                <p class="mb20">
                                    <span>color:</span>
                                    <span class="dynamic_data">{{ $follow->stallion->color  }}</span>
                                </p>
                                <div class="list_link">
                                    <a href="{{ url('single-stallion/'.$follow->stallion->slug) }}" class="btn btn_i">View Mare</a>
                                </div>
                            </div>
                            <div class="category_badegs">
                                <p>
                                    <a href="javascript:void(0)">Mares</a>
                                </p>
                            </div>
                        </a>
                    </article>
                    @empty
                        No follows available<a href="{{url('mares')}}"class="follow"target="_blank">Click</a>
                @endforelse
            </div>
        </div>
    </div>
@endsection
