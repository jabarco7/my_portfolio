<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" :data-theme="theme">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Portfolio') }}</title>

{{-- 
    @vite(['resources/css/home.css', 'resources/js/home.js'])
    @vite(['resources/css/about.css', 'resources/js/about.js'])
    @vite(['resources/css/certificates.css', 'resources/js/certificates.js']) --}}


    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">

    <!-- TailwindCSS -->
    @vite(['resources/css/app.css', 'resources/css/icon-sizes.css', 'resources/js/app.js'])
    
    <!-- Certificates CSS and JS -->
    @vite(['resources/css/certificates.css', 'resources/js/certificates.js'])

    {{-- <!-- Theme Override CSS -->
    <link rel="stylesheet" href="{{ asset('css/theme-override.css') }}"> --}}

    <!-- Theme Icons CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/theme-icons.css') }}"> --}}

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" 
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Force Font Awesome fonts */
        .fab {
            font-family: "Font Awesome 6 Brands" !important;
        }
        .fas, .fa-solid {
            font-family: "Font Awesome 6 Free" !important;
            font-weight: 900 !important;
        }
        .far, .fa-regular {
            font-family: "Font Awesome 6 Free" !important;
            font-weight: 400 !important;
        }
    </style>

    <!-- Custom Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

</head>

<body x-data="{ theme: localStorage.getItem('theme') || 'light' }" x-init="$watch('theme', value => { localStorage.setItem('theme', value);
    document.documentElement.setAttribute('data-theme', value); })" @theme-changed.window="theme = $event.detail.theme">
    <!-- Navbar -->

    @include('components.navbar')



    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')


    <!-- Alpine.js for interactivity -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
