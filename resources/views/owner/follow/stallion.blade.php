@extends('layouts.owner.app')
@section('content')
<style>
.category_badeg{
    position: absolute;
    top: 0;
    color: white;
    background-color: #98806d;
    width: 100%;
    z-index: 999;
    padding: 6px;
}
.category_badeg marquee{
    font-size: 20px;
}
  </style>
    <div class="dash_body_inner">
        <div class="our_stallions stallions_details">
            <div class="main_fllowed d-flex align-items-center gap20 flexwrap mb20">
                @forelse($follows as $follow)
                    @php
                        // Retrieve the first stallion image where 'new_element' is 1 or fall back to the first image
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
                                    <a href="{{ url('single-stallion/'.$follow->stallion->slug) }}" class="btn btn_i" target="_blank">View Stallion</a>
                                </div>
                            </div>
                            <div class="category_badeg">
                                <p class="upperBanner">
                                    <marquee behavior="smoth" direction="left">Stallion</marquee>
                                </p>
                            </div>
                        </a>
                    </article>
                    @empty
                        No follows available<a href="{{url('stallions')}}"class="follow"target="_blank">Click</a>
                    @endforelse
            </div>
        </div>
    </div>
@endsection