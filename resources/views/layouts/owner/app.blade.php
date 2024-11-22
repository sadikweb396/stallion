<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <!-- font add -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <!-- font awsome cdns -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
    <!-- link css -->
    <link rel="stylesheet" href="{{url('/assets/frontend/css/style.css')}}">
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
  </head>
  <body class="dash_body_m">
    <div class="main_dashboard_m">
      <div class="dashboard_wrapper_f d-flex">
       @include('layouts.owner.partials._sidebar') 
       <div class="dashboard_body_content">
       @include('layouts.owner.partials._header') 
       @yield('content')
       </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
    <script src="{{url('/assets/admin/js/main.js')}}"></script>
    <script>
      ClassicEditor
            .create(document.querySelector('#topsideheading'))
            .catch(error => {
                console.error(error);
            });
      
      ClassicEditor
        .create(document.querySelector('#topsideparagraph'))
        .catch(error => {
              console.error(error);
        });
         ClassicEditor
            .create(document.querySelector('#homeprogenyheding'))
            .catch(error => {
                console.error(error);
            });
      
          ClassicEditor
            .create(document.querySelector('#homeprogenyparagraph'))
            .catch(error => {
                console.error(error);
            });

      function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block'; // Show the preview
        };

        if (file) {
            reader.readAsDataURL(file); // Convert file to base64 string
        }
    }
    </script>
  @include('sweetalert::alert')
  </body>
</html>
