@extends('layouts.frontend.app')
@section('content')
    <!-- banner section -->
    <section
      class="hero_banner_m d-flex align-items-center stallions-banner"
      style="background-image: url('{{ asset('assets/frontend/image/stallions-banner.png') }}');">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="hero_banner_i">
              <div class="banner_heading-m text-center mb20">
                <h1>Mares</h1>
              </div>
              <div class="para_banner text-center">
                <p>
                  The Sire Producing Quality <br />
                  Genetics and Performers
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- banner section end-->
    <!-- Category Slider start -->
    <section
      id="categorySlider"
      class="pdb100 categorySlider stallion-category"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="stallions_heading text-center">
              <h2>Featured Lisitngs</h2>
            </div>
            <div id="catslider" class="catslider owl-carousel owl-theme">
            @foreach($stallions as $stallion)
                    @php
                    $stallionImage = $stallion->stallionImages->firstWhere('new_element', 1) ?? 
                        $stallion->stallionImages->first();
                    @endphp
                    @if($stallionImage)
              <div class="item">
                <a href="javascript:void(0)">
                  <div
                    class="catimg d-flex align-items-end justify-content-center"
                    style="background-image: url({{ $stallionImage->stallion_image }});">
                    <div class="cattitle">
                      <p>{{ $stallion->name }}</p>
                    </div>
                  </div>
                </a>
              </div>
              @endif
              @endforeach
              
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Category end -->
    <!-- simple info section start -->
    <section class="about_stallions pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="about_stallion_m">
              <div class="about_stallion_heading text-center mb20">
                <h2>Heading about something about Sttalions</h2>
              </div>
              <div class="about_stallions_para text-center mb20">
                <p>
                  About 300-500 words about Stallions and what we do and offer
                  so that we can target SEO as well.
                </p>
                <p>
                  About 300-500 words about Stallions and what we do and offer
                  so that we can target SEO as well. About 300-500 words about
                  Stallions and what we do and offer so that we can target SEO
                  as well. About 300-500 words about Stallions and what we do
                  and offer so that we can target SEO as well. About 300-500
                  words about Stallions and what we do and offer so that we can
                  target SEO as well.About 300-500 words about Stallions and
                  what we do and offer so that we can target SEO as well. About
                  300-500 words about Stallions and what we do and offer so that
                  we can target SEO as well.
                </p>
              </div>
              <div class="about_stallions_btn text-center">
                <a href="javascript:void(0)" class="btn_i about_stallion_btn"
                  >Get Started</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- info section end -->
    <!-- stallion listing start -->
    <section class="stallion_listing_m pdb100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="stallion_listing_inner">
                    <div class="stallion_listing_heading text-center mb20">
                        <h2>Mares Listings</h2>
                    </div>
                    <div class="listing_stallion_m d-flex gap20 flexwrap mb50" id="stallion-list">
                        @foreach($stallions as $stallion)
                        
                            @php
                                $stallionImage = $stallion->stallionImages->firstWhere('new_element', 1) ?? 
                                                 $stallion->stallionImages->first();
                            @endphp
                            @if($stallionImage)
                                <article
                                    class="list_stallion_a d-flex align-items-end justify-content-center"
                                    style="background-image: url('{{ $stallionImage->stallion_image }}');"
                                >
                                    <a href="{{ url('single-mare', $stallion->name) }}" aria-label="listing article">
                                        <div class="listing_title">
                                            <p>{{ $stallion->name }}</p>
                                        </div>
                                    </a>
                                </article>
                            @endif
                        @endforeach
                    </div>
                    <div class="listing_load_more text-center">
                        <button id="load-more" class="btn_i" data-offset="{{ count($stallions) }}" aria-label="Load More listing">Load More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Stallion listing end -->
    <!-- Stallion with us start -->
    <section
      class="with_us_main pdb100"
      style="background-image: url('./assets/image/Rectangle\ 43.png')"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="with_us_inner text-center">
              <div class="with_us_heading mb50">
                <h2>
                  List your Stallion <br />
                  With Us
                </h2>
              </div>
              <div class="with_us_btn">
                <a
                  href="javascript:void(0)"
                  class="btn_i"
                  aria-label="with Us listing"
                  >Get Started</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Stallion with us end -->
    <!-- simple info section start -->
    <section class="about_stallions pdb100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="about_stallion_m">
              <div class="about_stallion_heading text-center mb20">
                <h2>Heading about something about Sttalions</h2>
              </div>
              <div class="about_stallions_para text-center mb20">
                <p>
                  About 300-500 words about Stallions and what we do and offer
                  so that we can target SEO as well.
                </p>
                <p>
                  About 300-500 words about Stallions and what we do and offer
                  so that we can target SEO as well. About 300-500 words about
                  Stallions and what we do and offer so that we can target SEO
                  as well. About 300-500 words about Stallions and what we do
                  and offer so that we can target SEO as well. About 300-500
                  words about Stallions and what we do and offer so that we can
                  target SEO as well.About 300-500 words about Stallions and
                  what we do and offer so that we can target SEO as well. About
                  300-500 words about Stallions and what we do and offer so that
                  we can target SEO as well.
                </p>
              </div>
              <div class="about_stallions_btn text-center">
                <a href="javascript:void(0)" class="btn_i about_stallion_btn"
                  >Get Started</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- info section end -->

    <!-- Get in touch start -->
    <section id="get_touch_m">
      <div class="container-fluid no-padding hidden">
        <div class="row">
          <div class="col-lg-6">
            <div
              class="get_touch_bg d-flex justify-content-center"
              style="background-image: url('./assets/image/Rectangle\ 21.png')"
            >
              <div class="get_touch_logo">
                <img
                  src="./assets/image/2__2_-removebg-preview (1).png"
                  alt="get in touch logo"
                  class="img-contain"
                />
              </div>
            </div>
          </div>
          <div class="col-lg-6 d-flex align-items-center">
            <div class="get_touch_form_m">
              <div class="get_touch_sub">
                <h5>Contact Us</h5>
              </div>
              <div class="get_touch_heading mb20">
                <h3>Get In Touch</h3>
              </div>
              <div class="forms_main">
                <form action="#">
                  <div class="main_groups d-flex gap20">
                    <div class="group_fields">
                      <label for="fname"
                        ><span class="visually-hidden">First name:</span></label
                      >
                      <input
                        type="text"
                        id="fname"
                        name="fname"
                        placeholder="Your Name"
                      />
                    </div>
                    <div class="group_fields">
                      <label for="Yphone"
                        ><span class="visually-hidden">Your Phone</span></label
                      >
                      <input
                        type="phone"
                        id="phone"
                        name="phone"
                        placeholder="Your Phone"
                      />
                    </div>
                  </div>
                  <div class="main_groups">
                    <div class="group_fields">
                      <label for="Youremail"
                        ><span class="visually-hidden">Your Email</span></label
                      >
                      <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Your Email"
                      />
                    </div>
                  </div>

                  <div class="main_groups">
                    <div class="group_fields">
                      <label for="textarea"
                        ><span class="visually-hidden"
                          >Enter Your Message</span
                        ></label
                      >
                      <textarea
                        id="w3review"
                        name="w3review"
                        rows="4"
                        cols="48"
                        placeholder="Enter Your Message"
                      ></textarea>
                    </div>
                  </div>
                  <div class="main_groups">
                    <input
                      type="submit"
                      value="Submit"
                      class="submit_bttn btn_i"
                    />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- get in touch end -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
   $(document).ready(function() {
    $('#load-more').click(function() {
        var offset = $(this).data('offset');

        $.ajax({
            url: "{{ route('stallionlist') }}", // Adjust with your route name
            type: "GET",
            data: { offset: offset },
            success: function(data) {
                if (data.length > 0) {
                    $.each(data, function(index, stallion) {
                        // Check if stallion_images exists and is an array
                        if (Array.isArray(stallion.stallion_images)) {
                            var stallionImage = stallion.stallion_images.find(image => image.new_element === 1) || 
                                                (stallion.stallion_images.length > 0 ? stallion.stallion_images[0] : null);
                            
                            if (stallionImage) {
                                $('#stallion-list').append(`
                                    <article class="list_stallion_a d-flex align-items-end justify-content-center" style="background-image: url('${stallionImage.stallion_image}');">
                                        <a href="{{ url('single-stallion', '') }}/${stallion.name}" aria-label="listing article">
                                            <div class="listing_title">
                                                <p>${stallion.name}</p>
                                            </div>
                                        </a>
                                    </article>
                                `);
                            } else {
                                console.warn(`No valid image found for stallion: ${stallion.name}`);
                            }
                        } else {
                            console.warn(`stallion_images is not an array for stallion: ${stallion.name}`);
                        }
                    });
                    $('#load-more').data('offset', offset + 1); // Increase offset
                } else {
                    $('#load-more').hide(); // Hide button if no more data
                }
            }
        });
    });
});

</script>
@endsection