@extends('layouts.app')

@section('title', 'TechMorah Solution LTD — Enterprise Web, SMS & Integration')
@section('content')

<!-- Hero Section -->
<div class="container-fluid px-0 position-relative tm-hero-dark">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/carousel-1.jpg') }}" class="w-100" alt="AI Solutions">
                <div class="carousel-caption d-flex flex-column justify-content-center">
                    <h1 class="display-4 fw-bold text-white animated fadeInDown">Enterprise systems. Real integrations. East Africa delivery.</h1>
                    <p class="lead text-white animated fadeInUp">Laravel platforms, SMS & payment sandboxes, and AI-ready support — built by a team that ships production software for Victoria Lush, iMartGroup, and growing SMEs.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center mt-3">
                        <a href="{{ route('contact') }}" class="btn btn-secondary rounded-pill px-4 py-2">Book a consultation</a>
                        <a href="{{ route('services') }}" class="btn btn-outline-light rounded-pill px-4 py-2">View services</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/carousel-2.jpg') }}" class="w-100" alt="Tech Development">
                <div class="carousel-caption d-flex flex-column justify-content-center">
                    <h1 class="display-4 fw-bold text-white animated fadeInDown">From wireframe to production — on your timeline</h1>
                    <p class="lead text-white animated fadeInUp">Discovery, UI/UX, Laravel + React builds, M-Pesa & SMS integrations, and 24/7 support handover — documented every step.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center mt-3">
                        <a href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-secondary rounded-pill px-4 py-2">WhatsApp +255 655 139 724</a>
                        <a href="{{ route('about') }}" class="btn btn-outline-light rounded-pill px-4 py-2">Our story</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About -->
<section class="py-5" style="background: linear-gradient(135deg, rgba(4,11,31,0.95), rgba(15,26,58,0.85));">
    <div class="container text-center">
        <h5 class="text-secondary mb-2">Who We Are</h5>
        <h2 class="fw-bold text-white mb-4">Your technology partner in Dar es Salaam & beyond</h2>
        <p class="text-white-50 mx-auto" style="max-width:700px;">
            <strong class="text-white fw-semibold">TechMorah Solution LTD</strong> delivers full-stack systems — enterprise SMS (Victoria Lush), payment sandboxes (iMartGroup LipaPay), custom web & POS for SMEs, and AI-assisted support. We align product, design, and engineering so your project ships with clarity, not guesswork.
        </p>
        <a href="{{ route('about') }}" class="btn btn-secondary rounded-pill mt-3 px-4 py-2">Learn More</a>
    </div>
</section>

@include('partials.home-proof')

<!-- Connect Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h5 class="text-primary d-flex flex-wrap align-items-center justify-content-center gap-2 gap-md-3 mb-3">
                <span class="mb-0">Connect with</span>
                <x-brand-mark size="sm" class="brand-mark--align-text">TechMorah Solution LTD</x-brand-mark>
            </h5>
            <h2 class="fw-bold">Choose the channel that fits your flow</h2>
            <p class="text-muted">Web chat, WhatsApp, and FaceTime are all powered by our OpenAI assistant.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="h-100 border rounded-4 p-4 shadow-sm text-center">
                    <div class="mb-3"><i class="fas fa-comments fa-2x text-primary"></i></div>
                    <h4>AI Web Chat</h4>
                    <p class="text-muted">Ask anything in real-time. Personalized context pulled from your ongoing session.</p>
                    <a href="{{ route('chat.index') }}" class="btn btn-primary rounded-pill px-4">Start Chatting</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 border rounded-4 p-4 shadow-sm text-center">
                    <div class="mb-3"><i class="fab fa-whatsapp fa-2x text-success"></i></div>
                    <h4>WhatsApp + FaceTime</h4>
                    <p class="text-muted">Message or call us on +255 655 139 724. Twilio automation keeps each thread in sync.</p>
                    <div class="d-grid gap-2">
                        <a href="https://wa.me/255655139724" target="_blank" class="btn btn-outline-success rounded-pill">WhatsApp Us</a>
                        <a href="tel:+255655139724" class="btn btn-outline-dark rounded-pill">Call / FaceTime</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="h-100 border rounded-4 p-4 shadow-sm text-center">
                    <div class="mb-3"><i class="fas fa-layer-group fa-2x text-secondary"></i></div>
                    <h4>Contact Routing</h4>
                    <p class="text-muted">Need unified support? Our team routes SMS, WhatsApp, and voice transcripts manually for bespoke care.</p>
                    <a href="{{ route('contact') }}" class="btn btn-secondary rounded-pill px-4">Contact Support</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services / Expertise -->
<section class="py-5" style="background: linear-gradient(180deg, #fff 0%, #f5f7ff 50%, rgba(4,11,31,0.04) 100%);">
    <div class="container">
        <div class="text-center mb-5">
            <h5 class="text-primary mb-2">Our Expertise</h5>
            <h2 class="fw-bold">Transformative Services for Modern Businesses</h2>
            <p class="text-muted mb-0">Direct from our TechMorah flyer—every service is engineered to keep your organisation responsive, secure, and innovative.</p>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="d-flex align-items-start gap-3 p-4 border rounded-4 h-100 bg-white shadow-sm">
                    <div class="text-primary fs-2"><i class="fas fa-laptop-code"></i></div>
                    <div>
                        <h4 class="fw-semibold">Web & System Design & Development</h4>
                        <p class="text-muted mb-0">User-friendly, secure, and scalable systems plus websites that feel native to your customer journeys.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start gap-3 p-4 border rounded-4 h-100 bg-white shadow-sm">
                    <div class="text-warning fs-2"><i class="fas fa-cogs"></i></div>
                    <div>
                        <h4 class="fw-semibold">System Design & Development</h4>
                        <p class="text-muted mb-0">Customised solutions tailored to optimise business processes, efficiency, and integration.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex align-items-start gap-3 p-4 border rounded-4 h-100 bg-white shadow-sm">
                    <div class="text-info fs-2"><i class="fas fa-palette"></i></div>
                    <div>
                        <h4 class="fw-semibold">Graphic Design & UI/UX Design</h4>
                        <p class="text-muted mb-0">Creative visuals and intuitive interfaces that elevate your brand impact across every touchpoint.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex align-items-start gap-3 p-4 border rounded-4 h-100 bg-white shadow-sm">
                    <div class="text-success fs-2"><i class="fas fa-headset"></i></div>
                    <div>
                        <h4 class="fw-semibold">IT Support Services</h4>
                        <p class="text-muted mb-0">Reliable technical support for smooth operations, proactive monitoring, and rapid Twilio-enabled responses.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex align-items-start gap-3 p-4 border rounded-4 h-100 bg-white shadow-sm">
                    <div class="text-secondary fs-2"><i class="fas fa-calculator"></i></div>
                    <div>
                        <h4 class="fw-semibold">Computerized Accounting Solutions</h4>
                        <p class="text-muted mb-0">Streamlined financial management for accurate reporting, AI-ready dashboards, and compliance peace of mind.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="d-flex align-items-start gap-3 p-4 border rounded-4 h-100 bg-white shadow-sm">
                    <div class="text-danger fs-2"><i class="fas fa-robot"></i></div>
                    <div>
                        <h4 class="fw-semibold">AI Integration & Automation</h4>
                        <p class="text-muted mb-0">Wire OpenAI, WhatsApp, and Twilio Voice into your internal tools for faster support, insights, and smart workflows.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('contact') }}" class="btn btn-secondary rounded-pill px-4">Let’s Innovate Together</a>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="py-5 tm-gradient-bg text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Ready to elevate your business?</h2>
        <p class="mb-4 d-flex flex-wrap align-items-center justify-content-center gap-2 text-center px-2">
            <span>Let’s discuss how</span>
            <x-brand-mark size="sm" class="brand-mark--align-text flex-shrink-0">TechMorah Solution LTD</x-brand-mark>
            <span>can transform your digital strategy.</span>
        </p>
        <a href="{{ route('contact') }}" class="btn btn-light rounded-pill px-5 py-3">Contact Us</a>
    </div>
</section>

@endsection
