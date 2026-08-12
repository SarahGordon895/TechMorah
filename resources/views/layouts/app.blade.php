<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title', 'TechMorah Solution LTD — Fintech & Enterprise Technology')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="#050a18">
    <meta name="keywords" content="@yield('keywords', 'TechMorah Tanzania, digital solutions, microfinance, e-commerce, ISP management, payment gateway, web development')">
    <meta name="description" content="@yield('description', 'TechMorah Solution LTD — innovative digital solutions for web & system design, microfinance, e-commerce, ISP management, and payment gateway integration.')">

    @php
        $faviconPath = config('branding.favicon', 'img/techmorah-icon.png');
        $faviconType = str_ends_with(strtolower($faviconPath), '.svg') ? 'image/svg+xml' : 'image/png';
    @endphp
    <link rel="icon" type="{{ $faviconType }}" href="{{ asset($faviconPath) }}">
    <link rel="apple-touch-icon" href="{{ asset($faviconPath) }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&family=Source+Serif+4:opsz,wght@8..60,500;8..60,600;8..60,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}?v=20260812g" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="spinner" class="show" aria-hidden="true"><div class="spinner-grow" role="status"></div></div>

    @hasSection('page_navbar')
        @yield('page_navbar')
    @else
    <nav class="navbar tm-nav" id="navbar" aria-label="Primary">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand tm-nav__brand">
                <x-brand-mark size="lg" class="text-white">TechMorah Solution LTD</x-brand-mark>
            </a>
            <button class="menu-toggle tm-nav__toggle" type="button" aria-controls="navMenu" aria-expanded="false" aria-label="Open menu">
                <span></span><span></span><span></span>
            </button>
            <div class="navbar-collapse tm-nav__menu" id="navMenu">
                <div class="navbar-nav tm-nav__links">
                    <a href="{{ route('home') }}" class="nav-link tm-nav__link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-link tm-nav__link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                    <a href="{{ route('services') }}" class="nav-link tm-nav__link {{ request()->routeIs('services') ? 'active' : '' }}">Services</a>
                    <a href="{{ route('case-studies') }}" class="nav-link tm-nav__link {{ request()->routeIs('blog', 'case-studies') ? 'active' : '' }}">Case Studies</a>
                    <a href="{{ route('chat.index') }}" class="nav-link tm-nav__link {{ request()->routeIs('chat.index') ? 'active' : '' }}">AI Chatbot</a>
                    <a href="{{ route('contact') }}" class="nav-link tm-nav__link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </div>
                <a href="{{ route('contact') }}" class="btn btn-secondary tm-nav__cta">Talk to TechMorah</a>
            </div>
        </div>
    </nav>
    @endif

    <main id="main-content">
        @yield('content')
    </main>

    <footer class="footer tm-footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="footer-brand mb-3">
                        <x-brand-mark size="lg" class="text-white">TechMorah Solution LTD</x-brand-mark>
                    </div>
                    <p class="text-white-50 small mb-0">Innovative digital solutions — web &amp; systems, microfinance, e-commerce, ISP management, payment gateways, and East African delivery. Dar es Salaam Science Park, Tanzania.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('services') }}">Services</a></li>
                        <li><a href="{{ route('case-studies') }}">Case Studies</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('chat.index') }}">AI Chatbot</a></li>
                    </ul>
                </div>
                @unless (request()->routeIs('contact'))
                <div class="col-md-4">
                    <h5>Get In Touch</h5>
                    <p><i class="fas fa-map-marker-alt me-2 text-secondary"></i> Dar es Salaam Science Park</p>
                    <p><i class="fas fa-phone-alt me-2 text-secondary"></i> <a href="tel:+255655139724">+255 655 139 724</a></p>
                    <p><i class="fas fa-envelope me-2 text-secondary"></i> <a href="mailto:techmorahsolution@gmail.com">techmorahsolution@gmail.com</a></p>
                    <div class="d-flex gap-2 mt-3">
                        <a href="https://www.facebook.com/share/1JnhuGhcnf/" target="_blank" rel="noopener" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.linkedin.com/in/sarah-gordon-0502b335b" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="https://www.instagram.com/techmorahsolution_ltd" target="_blank" rel="noopener" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                @endunless
            </div>
            <p class="footer-legal text-center small mb-0 text-white-50">
                © {{ date('Y') }} TechMorah Solution LTD. All rights reserved. · Dar es Salaam Science Park · INNOVATE · INTEGRATE · IMPLEMENT · EMPOWER
            </p>
        </div>
        <div class="tm-footer__band">Enterprise systems · Integrations · Implementation · Support</div>
    </footer>

    <a href="#main-content" class="btn btn-secondary back-to-top" id="backToTop" aria-label="Back to top"><i class="fa fa-arrow-up text-white"></i></a>

    <script src="{{ asset('js/site.js') }}?v=20260812g" defer></script>
    @stack('scripts')
</body>
</html>
