<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description', 'LOQ - Hệ thống quản lý trắc nghiệm trực tuyến cho giáo dục')">
    
    <title>@yield('title', 'LOQ') - Hệ thống trắc nghiệm</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    
    <!-- CSS Dependencies -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
</head>
<body class="@yield('body-class', '')">
    <!-- Loading Spinner -->
    <div id="loading-spinner" class="loading-spinner">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Đang tải...</span>
        </div>
    </div>

    <!-- Navigation -->
    @auth
        @if(request()->routeIs('admin.*'))
            @include('layouts.partials.navbar-admin')
        @else
            @include('layouts.partials.navbar-student')
        @endif
    @else
        @include('layouts.partials.navbar')
    @endauth

    <!-- Flash Messages -->
    @include('layouts.partials.flash-messages')

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.partials.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    
    <!-- App Scripts -->
    <script>
        // Hide loading spinner when page loads
        window.addEventListener('load', function() {
            const spinner = document.getElementById('loading-spinner');
            if (spinner) {
                spinner.style.display = 'none';
            }
        });
        
        // CSRF token for AJAX requests
        if (window.axios) {
            window.axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }
        
        // Initialize Bootstrap dropdowns manually (fallback)
        document.addEventListener('DOMContentLoaded', function() {
            // Check if Bootstrap is loaded
            if (typeof bootstrap !== 'undefined') {
                console.log('Bootstrap loaded successfully:', bootstrap.Dropdown.VERSION);
                
                // Initialize all dropdowns
                const dropdownElementList = document.querySelectorAll('[data-bs-toggle="dropdown"]');
                const dropdownList = [...dropdownElementList].map(dropdownToggleEl => new bootstrap.Dropdown(dropdownToggleEl));
                
                console.log('Initialized', dropdownList.length, 'dropdowns');
            } else {
                console.error('Bootstrap not loaded!');
            }
        });
    </script>
</body>
</html>
