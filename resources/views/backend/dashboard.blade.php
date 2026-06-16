<!DOCTYPE html>
<html lang="en">

<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Fruitables</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('backend/assets/css/custom.css')}}">


  <link rel='shortcut icon' type='image/x-icon' href="{{asset('backend/assets/img/favicon.ico')}}" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropzone@5.9.3/dist/min/dropzone.min.css">

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

  <!-- General JS Scripts -->
  <script src="{{asset('backend/assets/js/app.min.js')}}"></script>
  <!-- JS Libraries -->
  <script src="{{ asset('backend/assets/bundles/apexcharts/apexcharts.min.js') }}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('backend/assets/js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('backend/assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('backend/assets/js/custom.js')}}"></script>

  <!-- Dropzone JS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>

  @stack('js')
</body>

</html>
