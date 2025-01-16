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
    function toggleActiveState() {
    var allAnimalItem = document.getElementById("all-animal-item");
    allAnimalItem.classList.toggle("active");
    var otherItems = document.querySelectorAll('.menu_list_items');
    otherItems.forEach(function(item) {
      if (item !== allAnimalItem) {
        item.classList.remove("active");
      }
    });
  }
  </script>
    @stack('scripts')
    <script>
    $(document).ready(function() {
    var url;  
    $('.approveBtn').click(function(){
    var id = $(this).data('id');
    url = '{{ url('admin/approve') }}/' + id; 
    $('#model').empty();
    $('#model').append('<div style="margin-top: 10px;" class=""><a class="btn btn_i black_btn form_btn" id="confirmApproveBtn" class="btn btn-primary">Confirm</a></div>');
        $(document).on('click','#confirmApproveBtn', function(){
            $.ajax({
                url: url,  
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  
                    
                },
                success: function(response) {
                    location.reload();  
                },
                
            });
        });
    });
});
$(document).ready(function(){
    var url;  
    $('.declineBtn').click(function(){
    var id = $(this).data('id');
    url = '{{ url('admin/decline') }}/' + id;  
    $('#model').empty();
    $('#model').append('<div style="margin-top: 10px;" class=""><a class="btn btn_i black_btn form_btn" id="confirmApproveBtn" class="btn btn-primary">Confirm</a></div>');
    $(document).on('click', '#confirmApproveBtn', function() {
            $.ajax({
                url: url,  
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',  
                  
                },
                success: function(response) {
                    location.reload();  
                },
               
            });
        });
    });
    });
</script>
<script>
    $(document).ready(function(){
        $('#photographer').change(function() {
        $('#photographerappend').empty();
        var selectedOptionId = $(this).find('option:selected').attr('id');
        if (selectedOptionId == 2 || selectedOptionId == 3 || selectedOptionId == 4 || selectedOptionId == 5 || selectedOptionId == 6) {
        let baseurl = window.location.origin;
        var photographer = '<a href="' + baseurl + '/photographers">Photographer Link</a>';
        var pdf = '<a href="' + baseurl + '/assets/admin/image/profile-image.jpeg"><i class="fas fa-file-pdf"></a>';
                
                $("#photographerappend").append('<span>' + photographer + '</span>' + ' ' + '<span>' + pdf + '</span>');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#plan_for').change(function(){
        $('#plantypes').empty();  //
            var selectedOptionId = $(this).find('option:selected').attr('id');
            if ((selectedOptionId == 'stallion') && $('#plan_for').next('select').length === 0) {   
              $("#plantypes").append(
                    '<label for="name">Plan For</label>' +
                    '<select name="plan_for" id="plan_for" required>' +
                    '<option value="">Choose Option</option>' +
                    '<option value="plan for first stallion">Plan For First Stallion</option>' +
                    '<option value="plan for second stallion">Plan For Second To Five Stallion</option>' +
                    '<option value="plan for after five stallion">Plan For After Five Stallion</option>' +
                    '</select>'
                );
            }
            else if((selectedOptionId == 'mare') && $('#plan_for').next('select').length === 0)
            {
                $("#plantypes").append(
                    '<label for="name">Plan For</label>' +
                    '<select name="plan_for" id="plan_for" required>' +
                    '<option value="">Choose Option</option>' +
                    '<option value="plan for first mare">Plan For First Mare</option>' +
                    '<option value="plan for second mare">Plan For Second To Five Mare</option>' +
                    '<option value="plan for after five mare">Plan For After Five Mare</option>' +
                    '</select>'
                );
            }
        });
    });
  </script>

  <script>

    // ClassicEditor
    //         .create(document.querySelector('#topsideheading'))
    //         .catch(error => {
    //             console.error(error);
    //         });
      
    // ClassicEditor
    //     .create(document.querySelector('#topsideparagraph'))
    //     .catch(error => {
    //           console.error(error);
    //     });
    // ClassicEditor
    //         .create(document.querySelector('#homeprogenyheding'))
    //         .catch(error => {
    //             console.error(error);
    //     });
      
    // ClassicEditor
    //         .create(document.querySelector('#homeprogenyparagraph'))
    //         .catch(error => {
    //             console.error(error);
    //     });

      function previewImage(event) {
        const imagePreview = document.getElementById('imagePreview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block'; 
        };

        if (file) {
            reader.readAsDataURL(file); 
        }
    }

    function bannerimagepreviews(event) {
        const imagePreview = document.getElementById('bannerimagepreview');
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block'; 
        };

        if (file) {
            reader.readAsDataURL(file); 
        }
    }
    function showModal() {
          document.getElementById("myModal").style.display = "block";
        }

    function closeModal() {
          document.getElementById("myModal").style.display = "none";
        }

    window.onclick = function(event) {
          if (event.target === document.getElementById("myModal")) {
            closeModal();
          }
        }

</script>    
  @include('sweetalert::alert')
</body>
</html>
