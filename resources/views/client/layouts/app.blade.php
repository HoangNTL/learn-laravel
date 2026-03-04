<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <meta name="description" content="@yield('meta_description', '')" />
    <meta name="keywords" content="@yield('meta_keywords', '')" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,700;1,700&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('clientTheme/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clientTheme/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clientTheme/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clientTheme/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clientTheme/assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('clientTheme/assets/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('clientTheme/assets/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('clientTheme/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('clientTheme/assets/css/style.css') }}">

    <!-- Custom Styles -->
    @stack('styles')

    <title>@yield('title', 'UntreeStore - E-commerce Template')</title>
</head>

<body>
    <!-- Search Form Component -->
    @include('client.components.search-form')

    <!-- Mobile Menu -->
    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <!-- Navigation Component -->
    @include('client.components.navigation')

    <!-- Main Content Area -->
    @yield('content')

    <!-- Footer Component -->
    @include('client.components.footer')

    <!-- Loading Overlay -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- JavaScript Files -->
    <script src="{{ asset('clientTheme/assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('clientTheme/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('clientTheme/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('clientTheme/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('clientTheme/assets/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('clientTheme/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('clientTheme/assets/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('clientTheme/assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('clientTheme/assets/js/aos.js') }}"></script>
    <script src="{{ asset('clientTheme/assets/js/custom.js') }}"></script>

    <!-- Custom Scripts -->
    @stack('scripts')
</body>
</html>
