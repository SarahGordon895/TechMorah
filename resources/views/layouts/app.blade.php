<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'TechMorah Solution LTD - Smart IT & Digital Solutions')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="@yield('keywords', 'IT solutions, software, web design, TechMorah Solution LTD')">
    <meta name="description" content="@yield('description', 'TechMorah Solution LTD - Innovative IT Solutions and AI Integration Agency')">

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

    @hasSection('page_topbar')
        @yield('page_topbar')
    @else
        @unless (request()->routeIs('contact'))
        <!-- Topbar -->
        <div class="container-fluid bg-dark py-2 d-none d-md-flex">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="text-white-50 small">
                    <i class="fas fa-map-marker-alt text-secondary me-2"></i> 23 Rankin Street, New York
                    <span class="mx-3">|</span>
                    <i class="fas fa-envelope text-secondary me-2"></i> techmorahsolution@gmail.com
                </div>
                <div class="d-flex gap-2">
                    <a href="https://www.facebook.com/share/1JnhuGhcnf/?mibextid=wwXIfr" target="_blank" rel="noopener" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-facebook-f text-primary"></i></a>
                    <a href="https://www.linkedin.com/in/sarah-gordon-0502b335b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="_blank" rel="noopener" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-linkedin-in text-primary"></i></a>
                    <a href="https://www.instagram.com/techmorahsolution_ltd?igsh=MXZqZm80eXkwbjgyZQ%3D%3D&utm_source=qr" target="_blank" rel="noopener" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-instagram text-primary"></i></a>
                </div>
            </div>
        </div>
        @endunless
    @endif

    @hasSection('page_navbar')
        @yield('page_navbar')
    @else
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand fw-bold fs-3 text-white">
                <h1 class="text-white fw-bold d-block m-0">Tech<span class="text-secondary">Morah Solution LTD</span></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <div class="navbar-nav ms-auto gap-lg-2">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
                    <a href="{{ route('blog') }}" class="nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a>
                    <a href="{{ route('chat.index') }}" class="nav-link {{ request()->routeIs('chat.index') ? 'active' : '' }}">AI Chatbot</a>
                    <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </div>
                <div class="d-none d-xl-flex align-items-center ms-4">
                    <div class="d-flex flex-column pe-3 border-end border-secondary">
                        <small class="text-white-50">Need help?</small>
                        <span class="text-secondary">Call +255 655 139 724</span>
                    </div>
                    <a href="tel:+255655139724" class="btn btn-sm btn-secondary ms-3">Call Us</a>
                </div>
                <div class="d-flex align-items-center justify-content-center ms-4">
                    <a href="#" class="search-trigger"><i class="bi bi-search text-white fa-2x"></i></a>
                </div>
            </div>
        </div>
    </nav>
    @endif

    <!-- Page Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer bg-dark text-light pt-5">
        <div class="container pb-4">
            <div class="row g-4">
                <div class="col-md-4">
                    <h4 class="text-white">Tech<span class="text-secondary">Morah Solution LTD</span></h4>
                    <p class="text-white-50 small">Empowering businesses with AI, digital, and IT innovations for a smarter tomorrow.</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-secondary mb-3">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}" class="text-white-50 text-decoration-none">About Us</a></li>
                        <li><a href="{{ route('services') }}" class="text-white-50 text-decoration-none">Our Services</a></li>
                        <li><a href="{{ route('contact') }}" class="text-white-50 text-decoration-none">Contact</a></li>
                        <li><a href="{{ route('chat.index') }}" class="text-white-50 text-decoration-none">AI Chatbot</a></li>
                    </ul>
                </div>
                @unless (request()->routeIs('contact'))
                <div class="col-md-4">
                    <h5 class="text-secondary mb-3">Get In Touch</h5>
                    <p><i class="fas fa-phone-alt me-2 text-secondary"></i> +255 655 139 724</p>
                    <p><i class="fas fa-envelope me-2 text-secondary"></i> techmorahsolution@gmail.com</p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="https://www.facebook.com/share/1JnhuGhcnf/?mibextid=wwXIfr" target="_blank" rel="noopener" class="btn btn-sm btn-outline-light rounded-circle"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.linkedin.com/in/sarah-gordon-0502b335b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="_blank" rel="noopener" class="btn btn-sm btn-outline-light rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/techmorahsolution_ltd?igsh=MXZqZm80eXkwbjgyZQ%3D%3D&utm_source=qr" target="_blank" rel="noopener" class="btn btn-sm btn-outline-light rounded-circle"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                @endunless
            </div>
            <hr class="text-secondary">
            <p class="text-center small mb-0">© {{ date('Y') }} TechMorah Solution LTD. All rights reserved.</p>
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
