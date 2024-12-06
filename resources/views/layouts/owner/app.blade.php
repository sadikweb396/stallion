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
    $(document).ready(function() {
        var url;  // Declare url outside to make it accessible globally

        $('#approveBtn').click(function() {
            var id = $('#approveBtn').data('id');
            url = '{{ url('admin/approve') }}/' + id;  // Construct URL with the ID
            $('#model').empty();
            // Append the confirmation button to the modal or a container
            $('#model').append('<div style="margin-top: 10px;" class=""><a class="btn btn_i black_btn form_btn" id="confirmApproveBtn" class="btn btn-primary">Confirm</a></div>');
        });

        // When the confirm button is clicked
        $(document).on('click', '#confirmApproveBtn', function() {
            $.ajax({
                url: url,  // Use the dynamically constructed URL
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  // Include CSRF token for security
                    // You can add any additional data here if needed
                },
                success: function(response) {
                    location.reload();  // Reload the page after successful approval
                },
                error: function(xhr, status, error) {
                    alert('Error occurred! Status: ' + status + ', Error: ' + error);  // Handle error
                }
            });
        });
    });

    $(document).ready(function() {
        var url;  // Declare url outside to make it accessible globally

        $('#declineBtn').click(function() {
            var id = $('#declineBtn').data('id');
            url = '{{ url('admin/decline') }}/' + id;  // Construct URL with the ID
            $('#model').empty();
            // Append the confirmation button to the modal or a container
            $('#model').append('<div style="margin-top: 10px;" class=""><a class="btn btn_i black_btn form_btn" id="confirmApproveBtn" class="btn btn-primary">Confirm</a></div>');
        });

        // When the confirm button is clicked
        $(document).on('click', '#confirmApproveBtn', function() {
            $.ajax({
                url: url,  // Use the dynamically constructed URL
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  // Include CSRF token for security
                    // You can add any additional data here if needed
                },
                success: function(response) {
                    location.reload();  // Reload the page after successful approval
                },
                error: function(xhr, status, error) {
                    alert('Error occurred! Status: ' + status + ', Error: ' + error);  // Handle error
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#photographer').change(function() {
            // Optionally clear previous appended content if needed
            $('#photographerappend').empty();

            var selectedOptionId = $(this).find('option:selected').attr('id');
            
            // Check if the selected option ID matches any of the values
            if (selectedOptionId == 2 || selectedOptionId == 3 || selectedOptionId == 4 || selectedOptionId == 5 || selectedOptionId == 6) {
                
                // Get the base URL
                let baseurl = window.location.origin;
                
                // Create the photographer link
                var photographer = '<a href="' + baseurl + '/photographers">Photographer Link</a>';

                // Create the PDF link
                var pdf = '<a href="' + baseurl + '/assets/admin/image/profile-image.jpeg"><i class="fas fa-file-pdf"></a>';
                
                // Append both links to the #photographerappend div
                $("#photographerappend").append('<span>' + photographer + '</span>' + ' ' + '<span>' + pdf + '</span>');
            }
        });
    });
</script>

    <script>
    $(document).ready(function() {
        $('#plan_for').change(function() {
        $('#plantypes').empty();  //
            var selectedOptionId = $(this).find('option:selected').attr('id');
            // Check if the select for "Plan For" already exists 
            if ((selectedOptionId == 'mare' || selectedOptionId == 'stallion') && $('#plan_for').next('select').length === 0) {   
              $("#plantypes").append(
                    '<label for="name">Plan For</label>' +
                    '<select name="plan_for" id="plan_for" required>' +
                    '<option value="">Choose Option</option>' +
                    '<option value="1">Plan For First Stallion</option>' +
                    '<option value="2">Plan For Second To Five Stallion</option>' +
                    '<option value="3">Plan For After Five Stallion</option>' +
                    '</select>'
                );
            }
        });
    });
  </script>
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

          // Initialize CKEditor
          ClassicEditor
            .create(document.querySelector('#performance_history'))
            .catch(error => {
                console.error(error);
            });

            ClassicEditor
            .create(document.querySelector('#owner_story'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#lifetime_Story'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#personal_trainer'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#trainer_history'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#background_story'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#plan'))
            .catch(error => {
                console.error(error);
            });
            ClassicEditor
            .create(document.querySelector('#plan_details'))
            .catch(error => {
                console.error(error);
            });
                
//     document.getElementById('myForm').addEventListener('submit', function(event) {
  
//     function validateField(fieldId, messageId, message) {
//         const field = document.getElementById(fieldId);
//         const messageContainer = $(messageId);
        
      
//         messageContainer.empty();
        
//         if (field.value.trim() === '') {
//             messageContainer.append(message);
        
//             field.scrollIntoView({ behavior: 'smooth', block: 'center' });
//             field.focus();
//             return false; 
//         }
//           return true; 
//     }
//     const isPerformanceValid = validateField('performance_history', '#performance', "Performance history field is required");
//     const isOwnerValid = validateField('owner_story', '#owner', "Owner story field is required");
//     const isLifestoryValid = validateField('lifetime_Story', '#lifetime', "Life time story is required");
//     const isPersonaltrainerValid = validateField('personal_trainer','#personaltrainer', "Personal Trainer required");
//     const isTrainerHistoryValid = validateField('trainer_history','#trainerhistory', "Trainer history required");
//     if (!isPerformanceValid || !isOwnerValid || !isLifestoryValid || !isPersonaltrainerValid  || !isTrainerHistoryValid)  {
//         event.preventDefault();
//     }
// });  

  // Function to open the modal
  function showModal() {
      document.getElementById("myModal").style.display = "block";
    }

    // Function to close the modal
    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }

    // Close the modal if the user clicks outside of the modal content
    window.onclick = function(event) {
      if (event.target === document.getElementById("myModal")) {
        closeModal();
      }
    }
    </script>
     

  @include('sweetalert::alert')
  </body>
</html>
