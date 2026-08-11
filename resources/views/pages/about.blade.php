@extends('layouts.app')

@section('title', 'About — TechMorah Solution LTD')
@section('keywords', 'TechMorah fintech, core banking Tanzania, Sarah George Gordon, Dar es Salaam Science Park')
@section('description', 'TechMorah Solution LTD is an East African fintech and enterprise technology partner. Mission, vision, leadership, and delivery principles.')

@section('content')
<section class="tm-page-hero page-header">
    <div class="container text-center">
        <p class="tm-section-label" style="color:var(--copper-soft)">Corporate foundation</p>
        <h1 class="tm-title" style="color:#fff;font-size:clamp(2rem,5vw,2.8rem)">About TechMorah Solution LTD</h1>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;color:rgba(255,255,255,0.7)">
            Fintech and enterprise technology — core banking support, digital channels, payments, and East African delivery.
        </p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</section>

<section class="tm-trust">
    <div class="container">
        <div class="tm-trust__grid">
            <div><p class="tm-trust__value">4+</p><p class="tm-trust__label">Years leadership</p></div>
            <div><p class="tm-trust__value">10+</p><p class="tm-trust__label">Relationships</p></div>
            <div><p class="tm-trust__value">25+</p><p class="tm-trust__label">Platforms</p></div>
            <div><p class="tm-trust__value">10</p><p class="tm-trust__label">Service lines</p></div>
        </div>
    </div>
</section>

<section class="tm-section">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <img src="{{ asset('img/TechMorahSolution.png') }}" class="img-fluid border" alt="TechMorah Solution LTD" loading="lazy">
            </div>
            <div class="col-lg-6">
                <p class="tm-section-label">Who we are</p>
                <h2 class="tm-title">Built on production experience</h2>
                <p class="text-muted">TechMorah Solution LTD is a founder-led fintech and enterprise technology company covering e-commerce, custom software, integrations, communication platforms, microfinance and core banking support, digital banking channels, AI automation, deployment and implementation support.</p>
                <p class="text-muted">We combine product discovery, business analysis, UX, full-stack engineering, integration, deployment, documentation, training and post-launch support — one accountable partner from first workshop through production operation.</p>
                <p class="text-muted small"><strong>Attribution:</strong> Leadership experience at partner firms (including Craft Silicon, Victoria Lush, and iMart Group) reflects professional execution history. It is not presented as a TechMorah company contract unless TechMorah was formally engaged.</p>
                <div class="mt-4 d-flex flex-wrap gap-3">
                    <a href="{{ route('contact') }}" class="btn btn-secondary">Start a project</a>
                    <a href="https://sarahgordon895.github.io/sarahgordon.github.io/" target="_blank" rel="noopener" class="btn btn-outline-secondary">Founder portfolio</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tm-section tm-section--paper">
    <div class="container">
        <div class="tm-header text-center">
            <p class="tm-section-label">Principles</p>
            <h2 class="tm-title">Mission, vision &amp; values</h2>
        </div>
        <div class="tm-grid tm-grid--3">
            <article class="tm-card">
                <h3>Mission</h3>
                <p>Deliver reliable digital and financial-technology products, integrations and support through clear scope, practical engineering, transparent communication and documented handover.</p>
            </article>
            <article class="tm-card">
                <h3>Vision</h3>
                <p>Become a trusted East African fintech and enterprise technology partner for core banking, digital channels, payments, messaging, AI-assisted operations and long-term digital support.</p>
            </article>
            <article class="tm-card">
                <h3>Core values</h3>
                <p>INNOVATE · INTEGRATE · IMPLEMENT · EMPOWER — with integrity, ownership, quality, security, clarity and continuous improvement in every engagement.</p>
            </article>
        </div>
    </div>
</section>

<section class="tm-section">
    <div class="container">
        <div class="tm-header">
            <p class="tm-section-label">Leadership</p>
            <h2 class="tm-title">Sarah George Gordon</h2>
            <p class="tm-lead">Co-Founder &amp; CEO · Principal Technologist</p>
        </div>
        <p class="text-muted" style="max-width:720px">4+ years across full-stack software, enterprise SMS, fintech systems, and core banking support. Current full-time role: Full Stack Developer at <strong>iMart Group LTD</strong>. Prior professional engagements include Craft Silicon (core banking / channel support), Victoria Lush Limited (portal &amp; SMS), and iMart LipaPay ecosystem work.</p>
        <div class="d-flex flex-wrap mt-3">
            <span class="tm-stack-pill">Laravel</span>
            <span class="tm-stack-pill">React</span>
            <span class="tm-stack-pill">Flutter</span>
            <span class="tm-stack-pill">T-SQL</span>
            <span class="tm-stack-pill">SQL Server</span>
            <span class="tm-stack-pill">MySQL</span>
            <span class="tm-stack-pill">Digital banking channels</span>
        </div>
    </div>
</section>

<section class="tm-section tm-section--navy text-center">
    <div class="container">
        <p class="tm-section-label">Dar es Salaam Science Park</p>
        <h2 class="tm-title">Ready to scope your next system?</h2>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto">WhatsApp +255 655 139 724 · techmorahsolution@gmail.com</p>
        <a href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-outline-light me-2 mb-2">WhatsApp</a>
        <a href="{{ route('contact') }}" class="btn btn-light mb-2">Contact form</a>
    </div>
</section>
@endsection
