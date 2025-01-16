<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> -->
    <title>Simone</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- font css -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
      rel="stylesheet"
    />
    <!-- owl css -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
    />
    <link rel="stylesheet" href="{{url('/assets/frontend/css/style.css')}}">

  </head>
  <body class="animations-enabled">
    @include('layouts.frontend.partials._header')
    <!-- banner section -->
    @yield('content')
    @include('layouts.frontend.partials._footer')  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    @stack('scripts')
    <script src="{{url('/assets/frontend/js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <link rel="stylesheet" href="{{url('/assets/frontend/css/style.css')}}"> -->
     <script>
 $(document).on('click', '#featured_stallions', function(e) {
    // Check if the toast is already being shown
    if (!window.toastShown) {
        // Show the toast
        toastr.warning('Please Login!', '', {
            iconClass: 'toast-no-icon', 
            closeButton: true, 
            onHidden: function() {
                // Reset the flag when the toast is hidden
                window.toastShown = false;
            }
        });

        // Set the flag to true to prevent showing it again until it's closed
        window.toastShown = true;
    }
});
</script>
     
    <link href="https://cdn.jsdelivr.net/npm/toastr/build/toastr.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/toastr/build/toastr.min.js"></script>
<!-- 
    <script>
       const carouselContainer = document.querySelector(".carousel-container");
      const items = document.querySelectorAll(".carousel-item");
      const leftArrow = document.querySelector(".left-arrow");
      const rightArrow = document.querySelector(".right-arrow");
      let currentIndex = 0;
      let hoverTimeout;

      function updateCarousel() {
        items.forEach((item, index) => {
          item.classList.remove("middle");
          if (index === currentIndex) {
            item.classList.add("middle");
          }
        });
        const offset = -currentIndex * 33.33;
        carouselContainer.style.transform = `translateX(${offset}%)`;
      }

      function playVideo(item) {
        const video = item.querySelector("video");
        const progressBar = item.querySelector(
          ".percent_box circle:nth-child(2)"
        );
        if (video) {
          video.currentTime = 0;
          video.play();
          hoverTimeout = setInterval(() => {
            const percent = (video.currentTime / video.duration) * 100;
            progressBar.style.setProperty("--percent", percent);
            if (percent >= 100) {
              clearInterval(hoverTimeout);
              moveToNextItem();
            }
          }, 100);
        }
      }

      function pauseVideo(item) {
        const video = item.querySelector("video");
        if (video) {
          video.pause();
          clearTimeout(hoverTimeout);
        }
      }

      function moveToNextItem() {
        currentIndex = (currentIndex + 1) % items.length;
        updateCarousel();
      }

      items.forEach((item, index) => {
        item.addEventListener("mouseover", () => {
          if (index === currentIndex) {
            playVideo(item);
          }
        });
        item.addEventListener("mouseout", () => {
          if (index === currentIndex) {
            pauseVideo(item);
          }
        });
      });

      leftArrow.addEventListener("click", () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        updateCarousel();
      });

      rightArrow.addEventListener("click", () => {
        currentIndex = (currentIndex + 1) % items.length;
        updateCarousel();
      });

      updateCarousel();
    </script> -->
 
 @include('sweetalert::alert')
  </body>
</html>
