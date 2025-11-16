@extends('layouts.app')

@section('title', 'About - ' . config('app.name'))
@section('keywords', 'TechMorah about, AI solutions company, IT support, web development agency')
@section('description', 'Learn about TechMorah Solution Limited—our mission, expertise, and technology culture powering modern businesses.')

@section('content')
<!-- Page Header -->
<section class="container-fluid page-header py-5" style="background: radial-gradient(circle at top, #1f1813, #0c0b0a);">
    <div class="container text-center py-5 text-white">
        <h1 class="display-4 mb-3 fw-bold">About TechMorah</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Fact Strip -->
<section class="container-fluid bg-secondary py-4 text-white">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3">
                <h2 class="text-primary fw-bold mb-0">99%</h2>
                <small>Happy Clients</small>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="text-primary fw-bold mb-0">25+</h2>
                <small>Industries Served</small>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="text-primary fw-bold mb-0">120+</h2>
                <small>Projects Delivered</small>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="text-primary fw-bold mb-0">5★</h2>
                <small>Average Rating</small>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="container py-5 my-4">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6 position-relative">
            <img src="https://images.unsplash.com/photo-1529333166437-7750a6dd5a70?auto=format&fit=crop&w=900&q=80" class="img-fluid rounded-4 w-75" alt="Team" style="margin-bottom:20%;">
            <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=900&q=80" class="img-fluid rounded-4 w-50 position-absolute shadow" alt="Workspace" style="top:45%; left:35%;">
        </div>
        <div class="col-lg-6">
            <p class="text-primary text-uppercase fw-semibold">Who We Are</p>
            <h2 class="fw-bold mb-3">TechMorah Solution Limited</h2>
            <p class="text-muted">We build innovative digital solutions that empower businesses and individuals to thrive. From AI-infused chat experiences to Twilio-powered messaging and enterprise-grade IT support, TechMorah keeps communication and operations seamless.</p>
            <p class="text-muted">Our multi-disciplinary team blends strategy, design, engineering, and 24/7 support, ensuring every release feels polished and on-brand—just like our communication flyer.</p>
            <div class="mt-4 d-flex flex-wrap gap-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-secondary">AI & Automation</span>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-secondary">Human Support</span>
                </div>
            </div>
            <a href="{{ route('contact') }}" class="btn btn-secondary px-5 rounded-pill mt-4">Work With Us</a>
        </div>
    </div>
</section>

<!-- Mission & Values -->
<section class="container-fluid py-5" style="background:#f5f1ed;">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 h-100 shadow-sm">
                    <h4 class="text-secondary">Mission</h4>
                    <p class="text-muted">Deliver reliable digital products and AI experiences that mirror TechMorah’s flyer-grade polish across every channel.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 h-100 shadow-sm">
                    <h4 class="text-secondary">Vision</h4>
                    <p class="text-muted">Become East Africa’s most trusted multi-channel technology partner for modern organisations.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 h-100 shadow-sm">
                    <h4 class="text-secondary">Values</h4>
                    <ul class="list-unstyled text-muted mb-0">
                        <li>• Transparency & collaboration</li>
                        <li>• Design consistency</li>
                        <li>• 24/7 responsiveness</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-5 text-white" style="background:linear-gradient(120deg,#ff750f,#933AFE);">
    <div class="container text-center">
        <p class="text-uppercase small fw-semibold" style="letter-spacing:0.3rem">Let’s Innovate Together</p>
        <h2 class="fw-bold mb-3">Ready to launch a TechMorah-grade experience?</h2>
        <p class="mb-4">WhatsApp +255 655 139 724 or message us via AI chat—we’ll respond faster than the next deploy.</p>
        <a href="https://wa.me/255655139724" target="_blank" class="btn btn-light rounded-pill px-4 me-2">WhatsApp</a>
        <a href="{{ route('contact') }}" class="btn btn-outline-light rounded-pill px-4">Contact Form</a>
    </div>
</section>
@endsection
