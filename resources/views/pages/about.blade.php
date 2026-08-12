@extends('layouts.app')

@section('title', 'About — TechMorah Solution LTD')
@section('keywords', 'TechMorah digital solutions, Sarah George Gordon, Dar es Salaam Science Park, microfinance, e-commerce, ISP')
@section('description', 'TechMorah Solution LTD provides innovative digital solutions. Mission, vision, leadership, and delivery principles.')

@section('content')
<section class="tm-page-hero page-header">
    <div class="container text-center">
        <p class="tm-section-label" style="color:var(--copper-soft)">Corporate foundation</p>
        <h1 class="tm-title" style="color:#fff;font-size:clamp(2rem,5vw,2.8rem)">About TechMorah Solution LTD</h1>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;color:rgba(255,255,255,0.7)">
            Innovative digital solutions that empower businesses and individuals to thrive in the digital era.
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
                <img src="{{ asset('img/techmorah-flyer.png') }}" class="img-fluid border" alt="TechMorah Solution LTD company profile" loading="lazy">
            </div>
            <div class="col-lg-6">
                <p class="tm-section-label">Who we are</p>
                <h2 class="tm-title">Built on production experience</h2>
                <p class="text-muted">TechMorah Solution LTD is a founder-led digital solutions company covering web &amp; system design, graphic &amp; UI/UX design, IT support, computerised accounting, microfinance platforms, e-commerce, ISP management, and payment gateway integration.</p>
                <p class="text-muted">We combine product discovery, business analysis, UX, full-stack engineering, integration, deployment, documentation, training and post-launch support — one accountable partner from first workshop through production operation.</p>
                <p class="text-muted small"><strong>Attribution:</strong> Leadership experience at partner firms (including Victoria Lush and iMart Group) reflects professional execution history. It is not presented as a TechMorah company contract unless TechMorah was formally engaged.</p>
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
                <p>Deliver reliable digital products, integrations and support through clear scope, practical engineering, transparent communication and documented handover.</p>
            </article>
            <article class="tm-card">
                <h3>Vision</h3>
                <p>Become a trusted East African digital solutions partner for microfinance, e-commerce, ISP management, payments, messaging and long-term digital support.</p>
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
        <p class="text-muted" style="max-width:720px">4+ years across full-stack software, enterprise SMS, payments, e-commerce, and ISP digital platforms. Current full-time role: Full Stack Developer at <strong>iMart Group LTD</strong> (LipaPay, SMS desk, ELMS). Prior professional engagements include Victoria Lush Limited (portal &amp; SMS on Linux VPS) and Active Targets e-commerce. Company expertise mirrors the founder’s production stack — see the <a href="https://sarahgordon895.github.io/sarahgordon.github.io/" target="_blank" rel="noopener">founder portfolio</a>.</p>
        <div class="d-flex flex-wrap mt-3">
            <span class="tm-stack-pill">Laravel</span>
            <span class="tm-stack-pill">React</span>
            <span class="tm-stack-pill">Flutter</span>
            <span class="tm-stack-pill">Filament</span>
            <span class="tm-stack-pill">MySQL</span>
            <span class="tm-stack-pill">Payment gateways</span>
            <span class="tm-stack-pill">ISP systems</span>
            <span class="tm-stack-pill">E-commerce</span>
            <span class="tm-stack-pill">Linux VPS</span>
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
