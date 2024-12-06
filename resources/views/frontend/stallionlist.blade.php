<style>
    .hidden 
    {
        display:none;
    }
    .featured_star_blank {
    font-size: 30px;
    font-weight: 400;
    cursor: pointer;
    color: var(--white);
    position: absolute;
    bottom: 18px;
    right: 20px;
}

.pagination nav > div:first-child {
    display: flex;
    justify-content: space-evenly;
}
.pagination nav > div:first-child span, .pagination nav > div:first-child a {
    background-color: #171717;
    color: #fff;
    padding: 8px 15px;
    border-radius: 5px;
    font-size: 17px;
    line-height: 20px;
    font-family: var(--font-poppins);
}
</style>
<section class="stallion_listing_m pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="stallion_listing_inner">
              <div class="stallion_listing_heading text-center mb20">
                <h2>Stallions Listings</h2>
              </div>
              <div class="listing_stallion_m d-flex gap20 flexwrap mb50">
              @foreach($stallions as $stallion)
              @auth
              @php
                $stallionImage = $stallion->stallionImages->firstWhere('new_element', 1) ?? 
                $stallion->stallionImages->first();
              @endphp
              @if($stallionImage)
              <article class="list_stallion_a d-flex align-items-end justify-content-center"
              style="background-image: url('{{ $stallionImage->stallion_image }}');">
                  <div class="maque_badges">
                    <marquee behavior="smooth" direction="left">
                      Mare Profile Updated
                    </marquee>
                  </div>
                  <a href="{{ url('single-stallion', $stallion->slug) }}" aria-label="listing article">
                    <div class="listing_title">
                      <p>{{ $stallion->name }}</p>
                    </div>
                  </a>

                  @php $follow=follow($stallion->id,$stallion->user_id) @endphp @if($follow->isEmpty())    <form action="{{ route('follow', $stallion->id) }}" method="POST">
                    @csrf
                    @method('POST') <!-- This can be POST because we're using a simple button -->
                    <button type="submit" class="btn btn-success">
                    <div class="fetured_stallions">
                    <div
                      id="featured_star"
                      class="featured_star"
                      data-filled="false"
                    >
                      &#9734;
                    </div>
                    </div>
                    </button>
                   </form>@else 

                   <form action="{{ route('unfollow', $stallion->id) }}" method="POST">
                    @csrf
                    @method('POST') <!-- This can be POST because we're using a simple button -->
                    <button type="submit" class="btn btn-success">
                    <div class="fetured_stallions">
                    <div id="featured_star" class="featured_star filled" data-filled="true">★</div>
                    </div> 
                    </button>
                   </form>
                @endif
                 
                </article>
                @endif
                @else
                @php
                $stallionImage = $stallion->stallionImages->firstWhere('new_element', 1) ?? 
                $stallion->stallionImages->first();
                @endphp
                @if($stallionImage)
                <article class="list_stallion_a d-flex align-items-end justify-content-center"
                  style="background-image: url('{{ $stallionImage->stallion_image }}');">
              <div class="maque_badges">
                  <marquee behavior="smooth" direction="left">
                      Mare Profile Updated
                  </marquee>
              </div>
              <a href="{{ url('single-stallion', $stallion->name) }}" aria-label="listing article">
                  <div class="listing_title">
                      <p>{{ $stallion->name }}</p>
                  </div>
              </a>
              <div class="" id="featured_stallions">
                  <div  class="featured_star_blank" >☆</div>
              </div>
          </article>
               @endif
                @endauth
                @endforeach
              </div>
              <div class="pagination">
                    {{ $stallions->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

   
