@extends('layouts.app')

@section('title', 'TechMorah Solution LTD — Digital Solutions Partner')
@section('description', 'TechMorah Solution LTD provides innovative digital solutions — web & system design, UI/UX, IT support, accounting systems, microfinance, e-commerce, ISP management, and payment gateway integration.')
@section('content')

<header class="tm-hero" id="home">
    <div class="tm-hero__grid" aria-hidden="true"></div>
    <div class="container tm-hero__inner">
        <div class="tm-hero__copy-block">
            <p class="tm-hero__eyebrow">Digital Solutions Partner · 2026</p>
            <h1 class="tm-hero__brand">TechMorah</h1>
            <p class="tm-hero__lede">Innovative digital solutions that empower businesses and individuals to thrive in the digital era.</p>
            <p class="tm-hero__copy">
                Web &amp; system design, UI/UX, IT support, computerised accounting, microfinance, e-commerce, ISP management, and payment gateway integration — delivered from Dar es Salaam Science Park with clear scope and production discipline.
            </p>
            <div class="tm-hero__actions">
                <a href="{{ route('contact') }}" class="btn btn-secondary">Talk to TechMorah</a>
                <a href="{{ route('services') }}" class="btn btn-outline-light">View services</a>
            </div>
            <p class="tm-hero__meta">Microfinance · E-commerce · ISP · Payments · East African delivery</p>
            <div class="tm-hero__channels" aria-label="Capability focus">
                <span class="tm-hero__channel"><i class="fas fa-laptop-code"></i> Web &amp; systems</span>
                <span class="tm-hero__channel"><i class="fas fa-hand-holding-usd"></i> Microfinance</span>
                <span class="tm-hero__channel"><i class="fas fa-shopping-cart"></i> E-commerce</span>
                <span class="tm-hero__channel"><i class="fas fa-wifi"></i> ISP management</span>
                <span class="tm-hero__channel"><i class="fas fa-credit-card"></i> Payment gateways</span>
                <span class="tm-hero__channel"><i class="fas fa-file-invoice-dollar"></i> Accounting</span>
            </div>
        </div>
        <div class="tm-hero__visual" aria-hidden="true">
            <img src="{{ asset('img/home-hero-corporate.png') }}" alt="" class="tm-hero__visual-img" loading="eager" decoding="async">
            <div class="tm-hero__visual-glow"></div>
            <div class="tm-hero__visual-lines"></div>
            <span class="tm-hero__visual-label">Let&rsquo;s innovate together</span>
        </div>
    </div>
</header>

<section class="tm-trust">
    <div class="container">
        <div class="tm-trust__grid">
            <div class="tm-reveal" data-delay="0">
                <p class="tm-trust__value" data-count="4" data-suffix="+">4+</p>
                <p class="tm-trust__label">Years technical leadership</p>
            </div>
            <div class="tm-reveal" data-delay="1">
                <p class="tm-trust__value" data-count="10" data-suffix="+">10+</p>
                <p class="tm-trust__label">Client relationships</p>
            </div>
            <div class="tm-reveal" data-delay="2">
                <p class="tm-trust__value" data-count="25" data-suffix="+">25+</p>
                <p class="tm-trust__label">Platforms delivered</p>
            </div>
            <div class="tm-reveal" data-delay="3">
                <p class="tm-trust__value" data-count="10" data-suffix="">10</p>
                <p class="tm-trust__label">Core technology lines</p>
            </div>
        </div>
    </div>
</section>

<section class="tm-section tm-section--navy">
    <div class="container text-center">
        <p class="tm-section-label">Who we are</p>
        <h2 class="tm-title">Your digital solutions partner</h2>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;">
            <strong class="text-white">TechMorah Solution LTD</strong> provides innovative digital solutions that empower businesses and individuals to thrive in the digital era — one accountable partner from requirement workshop through production operation.
        </p>
        <div class="tm-values mx-auto" style="max-width:720px;margin-left:auto;margin-right:auto;margin-bottom:28px;">
            <div class="tm-values__item">Innovate</div>
            <div class="tm-values__item">Integrate</div>
            <div class="tm-values__item">Implement</div>
            <div class="tm-values__item">Empower</div>
        </div>
        <a href="{{ route('about') }}" class="btn btn-outline-light">About TechMorah</a>
    </div>
</section>

@include('partials.home-proof')

<section class="tm-section">
    <div class="container">
        <div class="tm-header text-center mx-auto" style="max-width:640px;margin-left:auto;margin-right:auto;">
            <p class="tm-section-label">Our services</p>
            <h2 class="tm-title">What we build and support</h2>
            <p class="tm-lead">Flyer-aligned service lines plus specialised platforms for microfinance, e-commerce, ISP management, and payment gateway integration.</p>
        </div>
        <div class="tm-grid tm-grid--3">
            <article class="tm-card tm-reveal">
                <div class="tm-card__icon"><i class="fas fa-laptop-code"></i></div>
                <h3>Web &amp; system design</h3>
                <p>User-friendly, secure, and scalable systems and websites.</p>
            </article>
            <article class="tm-card tm-reveal" data-delay="1">
                <div class="tm-card__icon"><i class="fas fa-cogs"></i></div>
                <h3>System design &amp; development</h3>
                <p>Customised solutions tailored to optimise business processes and efficiency.</p>
            </article>
            <article class="tm-card tm-reveal" data-delay="2">
                <div class="tm-card__icon"><i class="fas fa-paint-brush"></i></div>
                <h3>Graphic design &amp; UI/UX</h3>
                <p>Creative visuals and intuitive interfaces to enhance brand impact.</p>
            </article>
            <article class="tm-card tm-reveal">
                <div class="tm-card__icon"><i class="fas fa-hand-holding-usd"></i></div>
                <h3>Microfinance solutions</h3>
                <p>Loan, savings, and member workflows built for MFIs and community lenders.</p>
            </article>
            <article class="tm-card tm-reveal" data-delay="1">
                <div class="tm-card__icon"><i class="fas fa-wifi"></i></div>
                <h3>ISP management</h3>
                <p>Subscriber, billing, support, and payment flows for internet providers.</p>
            </article>
            <article class="tm-card tm-reveal" data-delay="2">
                <div class="tm-card__icon"><i class="fas fa-credit-card"></i></div>
                <h3>Payment gateway &amp; integration</h3>
                <p>Collections, disbursements, sandboxes, callbacks, and reconciliation-aware APIs.</p>
            </article>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('services') }}" class="btn btn-outline-secondary">Full service catalogue</a>
        </div>
    </div>
</section>

<section class="tm-section tm-section--paper">
    <div class="container">
        <div class="tm-header text-center mx-auto" style="max-width:640px;margin-left:auto;margin-right:auto;">
            <p class="tm-section-label">Connect</p>
            <h2 class="tm-title">Let&rsquo;s innovate together</h2>
            <p class="tm-lead">Web chat, WhatsApp, and structured contact routing — monitored by the TechMorah team.</p>
        </div>
        <div class="tm-grid tm-grid--3">
            <article class="tm-card tm-reveal text-center">
                <div class="tm-card__icon mx-auto"><i class="fas fa-comments"></i></div>
                <h3>AI web chat</h3>
                <p class="mb-3">Ask about services and delivery in real time.</p>
                <a href="{{ route('chat.index') }}" class="btn btn-secondary">Start chatting</a>
            </article>
            <article class="tm-card tm-reveal text-center" data-delay="1">
                <div class="tm-card__icon mx-auto"><i class="fab fa-whatsapp"></i></div>
                <h3>WhatsApp</h3>
                <p class="mb-3">Message +255 655 139 724 for project enquiries.</p>
                <a href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-outline-secondary">WhatsApp us</a>
            </article>
            <article class="tm-card tm-reveal text-center" data-delay="2">
                <div class="tm-card__icon mx-auto"><i class="fas fa-envelope"></i></div>
                <h3>Project briefing</h3>
                <p class="mb-3">Share scope, timeline, and stack for a same-day response.</p>
                <a href="{{ route('contact') }}" class="btn btn-outline-secondary">Contact support</a>
            </article>
        </div>
    </div>
</section>

<section class="tm-section tm-section--navy text-center">
    <div class="container">
        <h2 class="tm-title">Ready to elevate your digital operations?</h2>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;">Discuss microfinance, e-commerce, ISP management, payments, or a custom platform with TechMorah.</p>
        <a href="{{ route('contact') }}" class="btn btn-light">Contact us</a>
    </div>
</section>

@endsection
