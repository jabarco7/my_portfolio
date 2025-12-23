<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Portfolio') }} - @yield('title', 'Admin Panel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .fa,
        .fas,
        .far,
        .fab,
        .fal {
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('admin.layouts.styles')
</head>

<body>
    <div class="flex h-screen">
        @include('admin.layouts.sidebar')
        
        <!-- Main content -->
        <div class="main-content flex-1 overflow-auto lg:ml-0 lg:pl-0 pl-0">
            @include('admin.layouts.header')

            <!-- Page content -->
            <main class="p-6">
                @php
                    $successMessage = session('success');
                    if ($successMessage) {
                        \Log::info('Success message found in session: ' . $successMessage);
                    } else {
                        \Log::info('No success message in session');
                    }
                @endphp
                
@include('admin.layouts.notifications')
            </main>
        </div>
    </div>

    @include('admin.layouts.scripts')
    @include('admin.layouts.helper-scripts')
            

    @stack('scripts')
</body>

</html>
