<!DOCTYPE html>
<html lang="en">
<head>
    <x-meta-tags 
        :title="$metaTitle ?? 'ClassKira — Every School. One System.'"
        :description="$metaDescription ?? 'ClassKira is a complete School Management System for modern Indian schools. Manage students, fees, attendance, exams, library and hostel from one unified platform.'"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @include('frontend.include_top')
    @stack('styles')
</head>

<body data-bs-spy="scroll" data-bs-target=".header-area" data-bs-offset="50" tabindex="0">

    @include('frontend.header')

    @yield('content')

    @include('frontend.footer')

    @include('external_plugin')
    
    @include('frontend.include_buttom')
    
    @include('components.register-modal')
    <script src="{{ asset('js/classkira-ui.js') }}"></script>
</body>
</html>