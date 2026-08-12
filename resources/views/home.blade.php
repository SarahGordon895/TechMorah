@extends('layouts.app')

@section('title', 'TechMorah Solution LTD — Fintech & Enterprise Technology Partner')
@section('description', 'TechMorah Solution LTD builds digital infrastructure that connects financial institutions, businesses and customers — core banking support, digital channels, payments, and East African delivery.')
@section('content')

<header class="tm-hero" id="home">
    <div class="tm-hero__grid" aria-hidden="true"></div>
    <div class="container tm-hero__inner">
        <div class="tm-hero__copy-block">
            <p class="tm-hero__eyebrow">Fintech &amp; Enterprise Technology Partner · 2026</p>
            <h1 class="tm-hero__brand">TechMorah</h1>
            <p class="tm-hero__lede">Building the digital infrastructure that connects financial institutions, businesses and customers.</p>
            <p class="tm-hero__copy">
                Core banking support, digital channels, payments, enterprise SMS, and custom platforms — delivered from Dar es Salaam Science Park with clear scope, documented handover, and production discipline.
            </p>
            <div class="tm-hero__actions">
                <a href="{{ route('contact') }}" class="btn btn-secondary">Talk to TechMorah</a>
                <a href="{{ route('services') }}" class="btn btn-outline-light">View services</a>
            </div>
            <p class="tm-hero__meta">Core banking · Digital channels · Payments · E-commerce · East African delivery</p>
            <div class="tm-hero__channels" aria-label="Capability focus">
                <span class="tm-hero__channel"><i class="fas fa-university"></i> Core banking</span>
                <span class="tm-hero__channel"><i class="fas fa-mobile-alt"></i> Mobile banking</span>
                <span class="tm-hero__channel"><i class="fas fa-globe"></i> Internet banking</span>
                <span class="tm-hero__channel"><i class="fas fa-users"></i> Agency banking</span>
                <span class="tm-hero__channel"><i class="fas fa-credit-card"></i> Digital payments</span>
                <span class="tm-hero__channel"><i class="fas fa-shopping-cart"></i> E-commerce</span>
            </div>
        </div>
        <div class="tm-hero__visual" aria-hidden="true">
            <div class="tm-hero__visual-glow"></div>
            <div class="tm-hero__visual-orb"></div>
            <div class="tm-hero__visual-lines"></div>
            <span class="tm-hero__visual-label">Secure · Integrated · Production-ready</span>
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
                <p class="tm-trust__label">Institutional relationships</p>
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
        <h2 class="tm-title">Your fintech &amp; enterprise technology partner</h2>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;">
            <strong class="text-white">TechMorah Solution LTD</strong> provides core banking support, digital channels, payment gateways, custom web platforms, and operational maintenance — one accountable partner from requirement workshop through production operation.
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
            <p class="tm-section-label">Capability pillars</p>
            <h2 class="tm-title">Fintech depth. Enterprise delivery.</h2>
            <p class="tm-lead">Specialised frameworks across microfinance, core banking support, alternate channels, payments, and AI-assisted operations — the same stack our founder ships in production.</p>
        </div>
        <div class="tm-grid tm-grid--3">
            <article class="tm-card tm-reveal">
                <div class="tm-card__icon"><i class="fas fa-university"></i></div>
                <h3>Core banking &amp; microfinance</h3>
                <p>Module setup, loan/savings workflows, GL mapping review, and database-first diagnostics within authorised platform scope.</p>
            </article>
            <article class="tm-card tm-reveal" data-delay="1">
                <div class="tm-card__icon"><i class="fas fa-mobile-alt"></i></div>
                <h3>Digital banking channels</h3>
                <p>Internet, mobile (Flutter), agency banking, USSD, and merchant journeys with OTP and REST/Swagger integration layers.</p>
            </article>
            <article class="tm-card tm-reveal" data-delay="2">
                <div class="tm-card__icon"><i class="fas fa-credit-card"></i></div>
                <h3>Payments &amp; integrations</h3>
                <p>Mobile-money gateways, developer sandboxes, callbacks, and reconciliation-aware payment flows.</p>
            </article>
            <article class="tm-card tm-reveal">
                <div class="tm-card__icon"><i class="fas fa-sms"></i></div>
                <h3>Enterprise SMS platforms</h3>
                <p>Admin consoles, reseller portals, bulk messaging, and API layers — proven on Victoria Lush production stacks.</p>
            </article>
            <article class="tm-card tm-reveal" data-delay="1">
                <div class="tm-card__icon"><i class="fas fa-laptop-code"></i></div>
                <h3>Custom enterprise software</h3>
                <p>Portals, POS, e-commerce, HR workflows, and Laravel + React systems engineered to fit operational logic.</p>
            </article>
            <article class="tm-card tm-reveal" data-delay="2">
                <div class="tm-card__icon"><i class="fas fa-robot"></i></div>
                <h3>AI ops &amp; automation</h3>
                <p>Knowledge assistants, support routing, and WhatsApp automation that respect your existing tools.</p>
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
            <h2 class="tm-title">Choose the channel that fits your flow</h2>
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
        <h2 class="tm-title">Ready to elevate your digital infrastructure?</h2>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;">Discuss core banking support, channels, payments, or a custom platform with TechMorah.</p>
        <a href="{{ route('contact') }}" class="btn btn-light">Contact us</a>
    </div>
</section>

@endsection
