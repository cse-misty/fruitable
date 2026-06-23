<!DOCTYPE html>
<html lang="en">

<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Fruitables</title>


  <link rel="stylesheet" href="https://cloudflare.com">


  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.8/css/dataTables.dataTables.css">

  <!-- Toastr CSS  -->
  <link rel="stylesheet" href="https://cloudflare.com">

  <link rel='shortcut icon' type='image/x-icon' href="{{asset('backend/assets/img/favicon.ico')}}" />

  <!-- Dropzone CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.css">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/app.min.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/css/components.css')}}">

  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/custom.css')}}">

  @stack('css')
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @include('backend.includes.navber')
      @include('backend.includes.sideber')

      <!-- Main Content -->
      <div class="main-content">
        @yield('content')

        @include('sweetalert::alert')
      </div>

      @include('backend.includes.footer')
    </div>
  </div>

  <!-- ======================== SCRIPTS ======================== -->
  <script src="{{asset('backend/assets/js/app.min.js')}}"></script>

  <!-- Toastr -->
  <script src="https://cloudflare.com"></script>

  <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
  <script src="https://cdn.datatables.net/2.3.8/js/dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
  <script src="{{ asset('backend/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{asset('backend/assets/js/page/index.js')}}"></script>
  <script src="{{asset('backend/assets/js/scripts.js')}}"></script>
  <script src="{{asset('backend/assets/js/custom.js')}}"></script>


  <script>
    $(document).ready(function() {

        if ($.fn.DataTable && !$.fn.DataTable.isDataTable('#orderMenage')) {
            $('#orderMenage').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        }


        $(document).on("click", ".replyBtn", function(e) {
            e.preventDefault();
            let email = $(this).attr('data-email') || $(this).data('email');
            $('#modal_email').val(email);
            $('#replyModal').modal('show');
        });


        $(document).on("click", '[data-bs-dismiss="modal"], [data-dismiss="modal"], .close', function() {
            $('#replyModal').modal('hide');
            $('.modal-backdrop').remove();
        });
    });
  </script>

<!-- Toastr Script -->
<script>
    window.addEventListener('DOMContentLoaded', function() {
        if (typeof toastr !== "undefined") {
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "timeOut": "5000",
                "extendedTimeOut": "2000",
                "preventDuplicates": false,
                "showDuration": "300",
                "hideDuration": "1000"
            };

            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            @if(Session::has('error'))
                toastr.error("{{ Session::get('error') }}");
            @endif
        } else {
            console.error("Toastr CSS/JS links are missing in your layout dashboard layout structure.");
        }
    });
</script>


  <!-- CKEditor Script -->
  <script>
    document.querySelectorAll('.editor').forEach((editor) => {
        ClassicEditor
            .create(editor)
            .catch(error => {
                console.error(error);
            });
    });
  </script>

  

  @stack('js')
</body>
</html>
