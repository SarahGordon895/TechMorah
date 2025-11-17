@extends('layouts.app')

@section('title', 'Services - ' . config('app.name'))
@section('keywords', 'TechMorah Solution LTD services, web design, system design, UI/UX, IT Support, accounting solutions')
@section('description', 'Explore TechMorah Solution LTD services — web & system development, UI/UX, IT support, and computerized accounting solutions tailored for modern businesses.')

@section('content')
<div class="bg-light">
    <!-- Page Header -->
    <section class="container-fluid page-header py-5" style="background: radial-gradient(circle at top, #1b1510, #050403);">
        <div class="container text-center py-5 text-white">
            <h1 class="display-4 fw-bold mb-4">Services</h1>
            <p class="lead text-white-50 mb-4">We provide innovative digital solutions that empower businesses and individuals to thrive in the digital era.</p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-white" aria-current="page">Services</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Fact / Stats -->
    <section class="container-fluid bg-secondary py-5 text-white">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-lg-3 col-6">
                    <div class="d-flex flex-column align-items-center">
                        <h1 class="text-primary fw-bold mb-0">99%</h1>
                        <small>Success in happy customers</small>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="d-flex flex-column align-items-center">
                        <h1 class="text-primary fw-bold mb-0">25+</h1>
                        <small>Industries empowered</small>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="d-flex flex-column align-items-center">
                        <h1 class="text-primary fw-bold mb-0">120+</h1>
                        <small>Projects delivered</small>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="d-flex flex-column align-items-center">
                        <h1 class="text-primary fw-bold mb-0">5★</h1>
                        <small>Average client rating</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="container-fluid services py-5 my-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5" style="max-width:600px;">
                <h5 class="text-primary">Our Services</h5>
                <h1>Services Built Specifically For Your Business</h1>
            </div>
            <div class="row g-5 services-inner">
                @foreach ([
                    ['icon'=> 'fa-laptop-code','title'=>'Web & System Design & Development','desc'=>'User-friendly, secure, and scalable systems and websites.'],
                    ['icon'=> 'fa-project-diagram','title'=>'System Design & Development','desc'=>'Customized solutions tailored to optimise business processes and efficiency.'],
                    ['icon'=> 'fa-palette','title'=>'Graphic Design & UI/UX Design','desc'=>'Creative visuals and intuitive interfaces to enhance brand impact.'],
                    ['icon'=> 'fa-headset','title'=>'IT Support Services','desc'=>'Reliable technical support for smooth and efficient operations.'],
                    ['icon'=> 'fa-calculator','title'=>'Computerized Accounting Solutions','desc'=>'Streamlined financial management for accurate, efficient reporting.'],
                ] as $service)
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay=".2s">
                    <div class="services-item bg-white">
                        <div class="p-4 text-center services-content">
                            <div class="services-content-icon">
                                <i class="fa {{ $service['icon'] }} fa-4x mb-4 text-primary"></i>
                                <h4 class="mb-3">{{ $service['title'] }}</h4>
                                <p class="mb-4 text-muted">{{ $service['desc'] }}</p>
                                <a href="{{ route('contact') }}" class="btn btn-secondary text-white px-5 py-3 rounded-pill">Let’s Talk</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-5 text-white" style="background: linear-gradient(120deg, #ff750f, #933AFE);">
        <div class="container text-center">
            <p class="text-uppercase small fw-semibold" style="letter-spacing:0.3rem">Let’s Innovate Together</p>
            <h2 class="fw-bold mb-3">Ready to unlock the next TechMorah Solution LTD success story?</h2>
            <p class="mb-4">Message us on WhatsApp +255 655 139 724 or schedule a strategy session today.</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="https://wa.me/255655139724" target="_blank" class="btn btn-light rounded-pill px-4">WhatsApp Us</a>
                <a href="{{ route('contact') }}" class="btn btn-outline-light rounded-pill px-4">Book a Discovery Call</a>
            </div>
        </div>
    </section>
</div>
@endsection
