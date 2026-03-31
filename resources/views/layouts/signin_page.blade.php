<!DOCTYPE html>
<html lang="en">

<head>
  <x-meta-tags 
    :title="$metaTitle ?? 'ClassKira — Every School. One System.'"
    :description="$metaDescription ?? 'ClassKira is a complete School Management System for modern Indian schools. Manage students, fees, attendance, exams, library and hostel from one unified platform.'"
  />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-5.1.3/css/bootstrap.min.css') }}">

  <!--Custom css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/ui-enhancements.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/frontend-redesign.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/classkira-redesign.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap-icons-1.8.1/bootstrap-icons.css') }}">
  
  <!--Toaster css-->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toastr.min.css') }}"/>
  @stack('styles')
</head>

<body>

    <div class="container-fluid h-100">
        @yield('content')
    </div>

    @include('external_plugin')

    <!--Main Jquery-->
    <script src="{{ asset('assets/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <!--Bootstrap bundle with popper-->
    <script src="{{ asset('assets/vendors/bootstrap-5.1.3/js/bootstrap.bundle.min.js') }}"></script>

    <!--Custom Script-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <!--Toaster Script-->
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>

    <script>
        
        "use strict";

        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
    </script>

    @include('components.register-modal')
</body>
</html>
