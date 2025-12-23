@if ($successMessage)
    <div class="notification notification-success">
        {{ $successMessage }}
    </div>
@endif

@if (session('error'))
    <div class="notification notification-error">
        {{ session('error') }}
    </div>
@endif

@yield('content')
