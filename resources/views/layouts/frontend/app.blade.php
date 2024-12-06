<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simone</title>

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
    <link rel="stylesheet" href="{{url('/assets/frontend/css/style.css')}}">

  </head>
  <body class="animations-enabled">
    @include('layouts.frontend.partials._header')
    <!-- banner section -->
    @yield('content')
    @include('layouts.frontend.partials._footer')  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script src="{{url('/assets/frontend/js/main.js')}}"></script>

    <!-- <link rel="stylesheet" href="{{url('/assets/frontend/css/style.css')}}"> -->

     <!-- get in touch end -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
      $(document).ready(function() {
            // Load the next page of users when the page link is clicked
            $(document).on('click', '.pagination a', function(e) {

                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1]; // Get the page number
                fetchUsers(page);
            });

            // Function to fetch users and update the user list
            function fetchUsers(page) {
              
                $.ajax({
                    url: '/stallions?page=' + page,
                    type: 'GET',
                    success: function(data) {
                   
                        $('#user-list').html(data); // Replace the user list with new data
                    }
                });
            }
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/toastr/build/toastr.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/toastr/build/toastr.min.js"></script>
    <script>
   const featuredStallionsElement = document.getElementById('featured_stallions');

// Variable to track if the toast is currently showing
let toastShown = false;

// Attaching the onClick event
featuredStallionsElement.onclick = function() {
    // Check if the toast is already shown
    if (!toastShown) {
        // Show the toast notification when clicked
        toastr.warning('Please Login!', '', {
            iconClass: 'toast-no-icon', // Hides the default icon
            closeButton: true, // Ensures the close button is visible and functional
            onHidden: function() {
                // Reset the flag when the toast is fully hidden (closed)
                toastShown = false;
            }
        });

        // Set the flag to true so the toast won't show again until it's closed
        toastShown = true;
    }
};


</script>

<script>
        $(document).ready(function() {
            // When the close button is clicked
            $('.close').click(function() {
            
                // Send an AJAX request to destroy the session
                $.ajax({
                    url: 'destroysession',
                    type: 'GET',
                    success: function(response) {
                        // Optionally, you can handle the response here (e.g., redirecting or showing a message)
                        //alert("Session destroyed!");
            
                    },
                   
                });
            });
        });
    </script>
 @include('sweetalert::alert')
  </body>
</html>
