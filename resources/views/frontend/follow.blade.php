<article class="list_stallion_a d-flex align-items-end justify-content-center"
              style="background-image: url('{{ $stallionImage->stallion_image }}');" >
                  <div class="maque_badges">
                    <marquee behavior="smooth" direction="left">
                      Mare Profile Updated
                    </marquee>
                  </div>
                  <a href="#" aria-label="listing article">
                    <div class="listing_title">
                      <p>{{ $stallion->name }}</p>
                    </div>
                  </a>
                  
                  @php $follow=follow($stallion->id,$stallion->user_id) @endphp 
                  @if($follow->isEmpty())   
                   <!-- <form action="{{ route('follow', $stallion->id) }}" method="POST">
                    @csrf
                    @method('POST') 
                    <button type="submit" class="btn btn-success"> -->
                    <div class="fetured_stallions follow-btn" data-stallion-id="{{ $stallion->id }}">
                    <div
                      id="featured_star"
                      class="featured_star"
                      data-filled="false"
                     
                    >
                      &#9734;
                    </div>
                    </div>
                    <!-- </button>
                   </form> -->
                   
                   @else 

                   <form action="{{ route('unfollow', $stallion->id) }}" method="POST">
                    @csrf
                    @method('POST') 
                    <button type="submit" class="btn btn-success">
                    <div class="fetured_stallions">
                    <div id="featured_star" class="featured_star filled" data-filled="true">★</div>
                    </div> 
                    </button>
                   </form>
                @endif
                 
                </article>