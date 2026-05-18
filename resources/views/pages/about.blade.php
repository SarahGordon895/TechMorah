@extends('layouts.app')

@section('title', 'About - ' . config('app.name'))
@section('keywords', 'TechMorah Solution LTD about, Laravel developer Tanzania, enterprise SMS, LipaPay, full stack agency')
@section('description', 'TechMorah Solution LTD — full-stack delivery for enterprise SMS, payments, and SME systems. Based at Dar es Salaam Science Park.')

@section('content')
<section class="container-fluid page-header py-5" style="background: radial-gradient(circle at top, #1f1813, #0c0b0a);">
    <div class="container text-center py-5 text-white">
        <h1 class="display-4 mb-3 fw-bold">About TechMorah Solution LTD</h1>
        <p class="lead text-white-50 mx-auto mb-4" style="max-width:640px;">Full-stack systems, integrations, and support — grounded in real client work across SMS, payments, and operations software.</p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">About</li>
            </ol>
        </nav>
    </div>
</section>

<section class="container-fluid bg-secondary py-4 text-white">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-6 col-md-3">
                <h2 class="text-primary fw-bold mb-0">2+</h2>
                <small>Years shipping systems</small>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="text-primary fw-bold mb-0">Enterprise</h2>
                <small>SMS & payments</small>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="text-primary fw-bold mb-0">Laravel</h2>
                <small>Full-stack core</small>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="text-primary fw-bold mb-0">24/7</h2>
                <small>Support-ready</small>
            </div>
        </div>
    </div>
</section>

<section class="container py-5 my-4">
    <div class="row g-5 align-items-center">
        <div class="col-lg-6 position-relative">
            <img src="{{ asset('img/TechMorahSolution.png') }}" class="img-fluid rounded-4 shadow" alt="TechMorah Solution LTD">
        </div>
        <div class="col-lg-6">
            <p class="text-primary text-uppercase fw-semibold tm-section-label">Who we are</p>
            <h2 class="fw-bold mb-3">Built on production experience</h2>
            <p class="text-muted">TechMorah Solution LTD is led by practitioners who ship — not slide decks. Our foundation is enterprise SMS for <strong>Victoria Lush Limited</strong> (VLL Admin, VLL SMS, SmSver1), payment sandbox work for <strong>iMartGroup LipaPay</strong>, and two years of self-employed delivery for Tanzanian SMEs: POS, websites, intranets, and brand systems.</p>
            <p class="text-muted">We bridge product thinking, UI/UX, and engineering: workshops become wireframes, then Laravel and React with clear APIs and MySQL. Clients get documented handovers, Git-backed workflows, and communication that respects timelines and budgets.</p>
            <div class="mt-4 d-flex flex-wrap gap-2">
                <span class="badge bg-secondary">Laravel & PHP</span>
                <span class="badge bg-secondary">React & APIs</span>
                <span class="badge bg-secondary">SMS & Twilio</span>
                <span class="badge bg-secondary">OpenAI assistants</span>
                <span class="badge bg-secondary">UI/UX & branding</span>
            </div>
            <div class="mt-4 d-flex flex-wrap gap-3">
                <a href="{{ route('contact') }}" class="btn btn-secondary px-5 rounded-pill">Start a project</a>
                <a href="https://sarahgordon895.github.io/sarahgordon.github.io/" target="_blank" rel="noopener" class="btn btn-outline-secondary rounded-pill px-4">Founder portfolio</a>
            </div>
        </div>
    </div>
</section>

<section class="container pb-5">
    <div class="text-center mb-5">
        <p class="tm-section-label mb-2">Experience</p>
        <h2 class="fw-bold">Where we have delivered</h2>
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="p-4 bg-white rounded-4 h-100 shadow-sm border">
                <h4 class="fw-bold">Victoria Lush Limited — Full Stack</h4>
                <p class="text-muted small mb-2">Ongoing · Enterprise SMS</p>
                <p class="text-muted mb-0">VLL Admin (Laravel), customer portal (VLL SMS), legacy SmSver1 stack — bulk messaging, resellers, and operations dashboards.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-4 bg-white rounded-4 h-100 shadow-sm border">
                <h4 class="fw-bold">iMartGroup Ltd — LipaPay sandbox</h4>
                <p class="text-muted small mb-2">Enterprise · FinTech</p>
                <p class="text-muted mb-0">Developer hub, API reference, and staging for mobile-money flows — enterprise delivery practices and code review culture.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-4 bg-white rounded-4 h-100 shadow-sm border">
                <h4 class="fw-bold">SME & retail — Self-employed delivery</h4>
                <p class="text-muted small mb-2">2+ years</p>
                <p class="text-muted mb-0">Custom web systems, POS, applications, and brand kits for multiple customers across Tanzania.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-4 bg-white rounded-4 h-100 shadow-sm border">
                <h4 class="fw-bold">Technical leadership</h4>
                <p class="text-muted small mb-2">2025 — Present</p>
                <p class="text-muted mb-0">Technical project management and full-stack development — roadmaps, team coordination, and scalable solution delivery.</p>
            </div>
        </div>
    </div>
</section>

<section class="container-fluid py-5" style="background:#f5f1ed;">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 h-100 shadow-sm">
                    <h4 class="text-secondary">Mission</h4>
                    <p class="text-muted mb-0">Deliver reliable digital products and integrations that organisations can operate, audit, and extend — with honest scope and documented handover.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 h-100 shadow-sm">
                    <h4 class="text-secondary">Vision</h4>
                    <p class="text-muted mb-0">Become East Africa’s trusted partner for enterprise web, messaging, payments, and AI-assisted operations.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 bg-white rounded-4 h-100 shadow-sm">
                    <h4 class="text-secondary">Values</h4>
                    <ul class="list-unstyled text-muted mb-0">
                        <li>• Clear communication before code</li>
                        <li>• Production-minded engineering</li>
                        <li>• On-time, maintainable delivery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 text-white" style="background:linear-gradient(120deg,#ff750f,#933AFE);">
    <div class="container text-center">
        <p class="text-uppercase small fw-semibold" style="letter-spacing:0.3rem">Dar es Salaam Science Park</p>
        <h2 class="fw-bold mb-3">Ready to scope your next system?</h2>
        <p class="mb-4">WhatsApp +255 655 139 724 · techmorahsolution@gmail.com · AI chat on this site.</p>
        <a href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-light rounded-pill px-4 me-2 mb-2">WhatsApp</a>
        <a href="{{ route('contact') }}" class="btn btn-outline-light rounded-pill px-4 mb-2">Contact form</a>
    </div>
</section>
@endsection
