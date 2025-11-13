<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'TECHMORAH - Smart IT & Digital Solutions')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="@yield('keywords', 'IT solutions, software, web design, TECHMORAH')">
    <meta name="description" content="@yield('description', 'TECHMORAH - Innovative IT Solutions and AI Integration Agency')">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Saira:wght@600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- Libraries -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @stack('styles')
</head>

<body>
    <!-- Spinner -->
    <div id="spinner" class="show position-fixed w-100 vh-100 top-50 start-50 d-flex justify-content-center align-items-center bg-white">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>

    <!-- Topbar -->
    <div class="container-fluid bg-dark py-2 d-none d-md-flex">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="text-white-50 small">
                <i class="fas fa-map-marker-alt text-secondary me-2"></i> 23 Rankin Street, New York
                <span class="mx-3">|</span>
                <i class="fas fa-envelope text-secondary me-2"></i> support@techmorah.com
            </div>
            <div class="d-flex gap-2">
                <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-facebook-f text-primary"></i></a>
                <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-linkedin-in text-primary"></i></a>
                <a href="#" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-x-twitter text-primary"></i></a>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand fw-bold fs-3 text-white">
                <h1 class="text-white fw-bold d-block m-0">TECH<span class="text-secondary">MORAH</span></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <div class="navbar-nav ms-auto mx-xl-auto p-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('services') }}" class="nav-item nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
                    <a href="{{ route('blog') }}" class="nav-item nav-link {{ request()->routeIs('blog*') ? 'active' : '' }}">Blog Posts</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </div>
                <div class="d-none d-xl-flex flex-shirink-0">
                    <div id="phone-tada" class="d-flex align-items-center justify-content-center me-4">
                        <a href="tel:+255655139724" class="position-relative animated tada infinite">
                            <i class="fa fa-phone-alt text-white fa-2x"></i>
                            <div class="position-absolute" style="top: -7px; left: 20px;">
                                <span><i class="fa fa-comment-dots text-secondary"></i></span>
                            </div>
                        </a>
                    </div>
                    <div class="d-flex flex-column pe-4 border-end">
                        <span class="text-white-50">Have any questions?</span>
                        <span class="text-secondary">Call: +255 655 139 724</span>
                    </div>
                    <div class="d-flex align-items-center justify-content-center ms-4">
                        <a href="#" class="search-trigger"><i class="bi bi-search text-white fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer bg-dark text-light pt-5">
        <div class="container pb-4">
            <div class="row g-4">
                <div class="col-md-4">
                    <h4 class="text-white">TECH<span class="text-secondary">MORAH</span></h4>
                    <p class="text-white-50 small">Empowering businesses with AI, digital, and IT innovations for a smarter tomorrow.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-secondary mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li><a href="{{ route('services') }}" class="text-white-50 text-decoration-none">Our Services</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white-50 text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="text-secondary mb-3">Get In Touch</h5>
                    <p><i class="fas fa-phone-alt me-2 text-secondary"></i> +1 234 567 890</p>
                    <p><i class="fas fa-envelope me-2 text-secondary"></i> support@techmorah.com</p>
                </div>
            </div>
            <hr class="text-secondary">
            <p class="text-center small mb-0">© {{ date('Y') }} TECHMORAH. All rights reserved.</p>
        </div>
    </footer>

    <!-- Back to Top -->
    <a href="#" class="btn btn-secondary rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
