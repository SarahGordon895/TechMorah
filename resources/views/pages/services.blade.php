@extends('layouts.app')

@section('title', 'Services | TechMorah Solution LTD')
@section('keywords', 'TechMorah services, web development, microfinance, e-commerce, ISP management, payment gateway, monitoring, profiling, sandbox, performance testing Tanzania')
@section('description', 'TechMorah Solution LTD services: web & system design, UI/UX, IT support, accounting, microfinance, e-commerce, ISP management, payment gateway integration, monitoring, profiling, testing, and sandbox delivery.')

@section('content')

<section class="services-hero tm-page-hero py-5">
    <div class="container py-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-secondary text-uppercase mb-3">Platform, observability & delivery services</span>
                <h1 class="display-5 fw-bold mb-3">Digital solutions. Production delivery.</h1>
                <p class="lead text-white-50 mb-4">Web &amp; system design, UI/UX, IT support, accounting systems, microfinance, e-commerce, ISP management, payment gateway integration, monitoring, profiling, testing, and sandbox delivery — scoped for East African businesses.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#consult" class="btn btn-secondary px-4 py-2">Book a consult</a>
                    <a href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-outline-light px-4 py-2">WhatsApp TechMorah</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row g-3">
                    @foreach ([
                        ['value' => '4+', 'label' => 'Years leadership'],
                        ['value' => '10+', 'label' => 'Relationships'],
                        ['value' => '25+', 'label' => 'Platforms'],
                        ['value' => '12', 'label' => 'Service lines'],
                    ] as $stat)
                    <div class="col-6">
                        <div class="stats-card text-center h-100">
                            <h3 class="fw-bold mb-1">{{ $stat['value'] }}</h3>
                            <p class="small text-white-50 mb-0">{{ $stat['label'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tm-section">
    <div class="container">
        <div class="tm-header text-center mx-auto" style="max-width:680px;margin-left:auto;margin-right:auto;">
            <p class="tm-section-label">What we build</p>
            <h2 class="tm-title">Services engineered for production</h2>
            <p class="tm-lead">Aligned with the TechMorah 2026 company profile — and the same capabilities demonstrated across the founder’s live portfolio.</p>
        </div>
        <div class="tm-grid tm-grid--3">
            @php
                $services = [
                    ['icon' => 'fas fa-laptop-code', 'id' => 'web', 'title' => 'Web & System Design & Development', 'copy' => 'User-friendly, secure, and scalable systems and websites.'],
                    ['icon' => 'fas fa-cogs', 'id' => 'systems', 'title' => 'System Design & Development', 'copy' => 'Customised solutions tailored to optimise business processes and efficiency.'],
                    ['icon' => 'fas fa-paint-brush', 'id' => 'uiux', 'title' => 'Graphic Design & UI/UX Design', 'copy' => 'Creative visuals and intuitive interfaces to enhance brand impact.'],
                    ['icon' => 'fas fa-headset', 'id' => 'support', 'title' => 'IT Support Services', 'copy' => 'Reliable technical support for smooth and efficient operations.'],
                    ['icon' => 'fas fa-file-invoice-dollar', 'id' => 'accounting', 'title' => 'Computerised Accounting Solutions', 'copy' => 'Streamlined financial management for accurate and efficient reporting.'],
                    ['icon' => 'fas fa-hand-holding-usd', 'id' => 'microfinance', 'title' => 'Microfinance Solutions', 'copy' => 'Loan, savings, and member workflows for MFIs and community lenders.'],
                    ['icon' => 'fas fa-shopping-cart', 'id' => 'ecommerce', 'title' => 'E-Commerce Solutions', 'copy' => 'Storefronts, inventory, cart, checkout, and catalogue operations for digital sales.'],
                    ['icon' => 'fas fa-wifi', 'id' => 'isp', 'title' => 'ISP Management', 'copy' => 'Subscriber, billing, support, and payment flows for internet service providers.'],
                    ['icon' => 'fas fa-credit-card', 'id' => 'payments', 'title' => 'Payment Gateway & Integration', 'copy' => 'Collections, disbursements, sandboxes, callbacks, and reconciliation-aware APIs.'],
                    ['icon' => 'fas fa-sms', 'id' => 'sms', 'title' => 'Enterprise SMS Platforms', 'copy' => 'Admin consoles, reseller portals, bulk messaging, and API layers.'],
                    ['icon' => 'fas fa-chart-line', 'id' => 'observability', 'title' => 'Monitoring, Profiling & Observability', 'copy' => 'Application monitoring, browser observability, analytics, alerts, and profiling across development, staging, and production.'],
                    ['icon' => 'fas fa-flask', 'id' => 'sandbox', 'title' => 'Testing, Sandbox & Release Engineering', 'copy' => 'Sandbox environments, performance testing, build scenarios, custom assertions, and release-readiness support.'],
                ];
            @endphp
            @foreach ($services as $i => $service)
            <article class="tm-card tm-reveal" id="{{ $service['id'] }}" @if($i % 3) data-delay="{{ $i % 3 }}" @endif>
                <div class="tm-card__icon"><i class="{{ $service['icon'] }}"></i></div>
                <h3>{{ $service['title'] }}</h3>
                <p class="mb-3">{{ $service['copy'] }}</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="tm-section tm-section--paper">
    <div class="container">
        <div class="tm-header text-center mx-auto" style="max-width:760px;margin-left:auto;margin-right:auto;">
            <p class="tm-section-label">Capability expansion</p>
            <h2 class="tm-title">Performance, observability, and sandbox services</h2>
            <p class="tm-lead">Based on the current company direction, we also support the delivery layer around applications: how they are tested, monitored, profiled, packaged, and operated after launch.</p>
        </div>
        <div class="tm-grid tm-grid--3">
            <article class="tm-card tm-reveal">
                <div class="tm-card__icon"><i class="fas fa-layer-group"></i></div>
                <h3>Environment coverage</h3>
                <p class="mb-2">Support across the full delivery loop:</p>
                <ul class="tm-feature-list">
                    <li>Development</li>
                    <li>Testing / staging</li>
                    <li>Production</li>
                    <li>Windows + Linux support</li>
                </ul>
            </article>
            <article class="tm-card tm-reveal" data-delay="1">
                <div class="tm-card__icon"><i class="fas fa-binoculars"></i></div>
                <h3>Monitoring &amp; browser observability</h3>
                <ul class="tm-feature-list">
                    <li>Monitoring traces</li>
                    <li>Front-end observability</li>
                    <li>Browser monitoring</li>
                    <li>Analytics and notifications</li>
                    <li>Alerting support</li>
                </ul>
            </article>
            <article class="tm-card tm-reveal" data-delay="2">
                <div class="tm-card__icon"><i class="fas fa-microscope"></i></div>
                <h3>Profiling &amp; distributed analysis</h3>
                <ul class="tm-feature-list">
                    <li>Continuous profiling</li>
                    <li>Wall-time, CPU, IO, memory analysis</li>
                    <li>Network, SQL, and HTTP visibility</li>
                    <li>Distributed profiling / subprofiles</li>
                    <li>Browser or CLI-driven profiling</li>
                </ul>
            </article>
            <article class="tm-card tm-reveal">
                <div class="tm-card__icon"><i class="fas fa-vial"></i></div>
                <h3>Performance testing</h3>
                <ul class="tm-feature-list">
                    <li>Build verification</li>
                    <li>Scenario-based testing</li>
                    <li>Custom assertions</li>
                    <li>Custom metrics</li>
                    <li>Performance recommendations</li>
                </ul>
            </article>
            <article class="tm-card tm-reveal" data-delay="1">
                <div class="tm-card__icon"><i class="fas fa-toolbox"></i></div>
                <h3>Tooling &amp; integrations</h3>
                <ul class="tm-feature-list">
                    <li>SDK support</li>
                    <li>CLI workflows</li>
                    <li>Integration setup</li>
                    <li>Automatic profiling</li>
                    <li>Synthetic monitoring paths</li>
                </ul>
            </article>
            <article class="tm-card tm-reveal" data-delay="2">
                <div class="tm-card__icon"><i class="fas fa-box-open"></i></div>
                <h3>Packages &amp; sandbox delivery</h3>
                <ul class="tm-feature-list">
                    <li>Sandbox environments</li>
                    <li>Starter / growth / enterprise packages</li>
                    <li>Security / quality / debug add-on planning</li>
                    <li>Handover and documentation</li>
                    <li>Ongoing support packages</li>
                </ul>
            </article>
        </div>
    </div>
</section>

<section class="tm-section tm-section--paper">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <p class="tm-section-label">How we deliver</p>
                <h2 class="tm-title">Clear scope from workshop to production</h2>
                <p class="text-muted">Documented milestones, integration tests, training, and handover runbooks — so clients can operate, audit, and extend what we ship.</p>
            </div>
            <div class="col-lg-7">
                <div class="tm-workflow">
                    @foreach ([
                        ['n' => '01', 'title' => 'Discover & align', 'copy' => 'Workshops to map workflows, compliance, and success metrics before build starts.'],
                        ['n' => '02', 'title' => 'Design the experience', 'copy' => 'Wireframes, UI systems, and branded assets as the single source of truth.'],
                        ['n' => '03', 'title' => 'Build & integrate', 'copy' => 'Laravel, React, REST APIs, SMS/WhatsApp/payment hooks tested on real workflows.'],
                        ['n' => '04', 'title' => 'Test, sandbox & validate', 'copy' => 'Staging, sandbox environments, performance scenarios, assertions, and release checks before launch.'],
                        ['n' => '05', 'title' => 'Launch & support', 'copy' => 'VPS or shared hosting, monitoring, alerts, training, runbooks, and production iteration.'],
                    ] as $step)
                    <article class="tm-workflow-step tm-reveal">
                        <div class="tm-workflow-step__num">{{ $step['n'] }}</div>
                        <h4 class="h6 fw-bold">{{ $step['title'] }}</h4>
                        <p class="text-muted small mb-0">{{ $step['copy'] }}</p>
                    </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="consult-section tm-section" id="consult">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <span class="badge bg-secondary text-uppercase mb-3">Book a consult</span>
                <h2 class="tm-title">Match with a TechMorah consultant</h2>
                <p class="text-muted">Tell us what you need — microfinance, e-commerce, ISP management, payments, SMS, monitoring, profiling, sandbox work, or a custom platform. We typically reply within one business day.</p>
                <ul class="list-unstyled text-muted small">
                    <li class="mb-2"><i class="fas fa-check me-2 text-primary"></i>WhatsApp + email follow-up with full context</li>
                    <li class="mb-2"><i class="fas fa-check me-2 text-primary"></i>Honest scope and attribution on every engagement</li>
                    <li><i class="fas fa-check me-2 text-primary"></i>Founder-led technical leadership</li>
                </ul>
            </div>
            <div class="col-lg-7">
                <div class="consult-card p-4 p-md-5">
                    <h4 class="fw-semibold mb-3">Tell us about your project</h4>
                    <p class="text-muted">Fields marked * are required.</p>
                    <div class="alert d-none" id="consultAlert" role="alert"></div>
                    <form id="consultForm" autocomplete="off">
                        @csrf
                        <input type="hidden" name="source" value="consultation">
                        <div class="honeypot-field" aria-hidden="true">
                            <label for="consult_website_url">Website</label>
                            <input type="text" id="consult_website_url" name="website_url" tabindex="-1" autocomplete="off">
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small text-uppercase text-muted">Full name</label>
                                <input type="text" name="name" class="form-control" placeholder="Your name">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-uppercase text-muted">Email *</label>
                                <input type="email" name="email" class="form-control" placeholder="you@company.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-uppercase text-muted">Phone / WhatsApp</label>
                                <input type="text" name="phone" class="form-control" placeholder="+255 655 139 724">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label small text-uppercase text-muted">Focus area *</label>
                                <select name="focus" class="form-control" required>
                                    <option value="" selected disabled>Select one</option>
                                    <option>Web &amp; system design</option>
                                    <option>Microfinance solutions</option>
                                    <option>E-commerce</option>
                                    <option>ISP management</option>
                                    <option>Payment gateway &amp; integration</option>
                                    <option>Computerised accounting</option>
                                    <option>Graphic design &amp; UI/UX</option>
                                    <option>IT support</option>
                                    <option>Enterprise SMS</option>
                                    <option>Monitoring, profiling &amp; observability</option>
                                    <option>Testing, sandbox &amp; release engineering</option>
                                    <option>Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small text-uppercase text-muted">Project details *</label>
                                <textarea name="message" class="form-control" rows="4" placeholder="Share goals, timelines, integrations…" required></textarea>
                            </div>
                            <div class="col-12 d-flex flex-column flex-sm-row gap-3">
                                <button type="submit" class="btn btn-secondary px-4" id="consultSubmit">Book consult</button>
                                <a href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-outline-secondary px-4">Prefer WhatsApp?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
(function () {
    const form = document.getElementById('consultForm');
    const alertBox = document.getElementById('consultAlert');
    const submitBtn = document.getElementById('consultSubmit');
    if (!form) return;
    const showAlert = (type, message) => {
        alertBox.className = 'alert alert-' + type;
        alertBox.textContent = message;
        alertBox.classList.remove('d-none');
    };
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        alertBox.classList.add('d-none');
        const payload = {
            name: form.name.value.trim() || null,
            email: form.email.value.trim(),
            phone: form.phone.value.trim() || null,
            focus: form.focus.value || null,
            source: 'consultation',
            website_url: form.website_url ? form.website_url.value : '',
            message: (form.focus.value ? '[Focus: ' + form.focus.value + '] ' : '') + form.message.value.trim(),
        };
        if (!payload.email || !form.message.value.trim()) {
            showAlert('danger', 'Please fill in the required fields.');
            return;
        }
        submitBtn.disabled = true;
        submitBtn.textContent = 'Booking…';
        try {
            const response = await fetch('{{ route('contact.send') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(payload),
            });
            const data = await response.json();
            if (!response.ok || !data.success) throw new Error(data.message || 'Unable to send request');
            showAlert('success', data.message || 'Request received. We will reach out shortly.');
            form.reset();
        } catch (error) {
            showAlert('danger', 'Unable to book consult right now. Please try again or use WhatsApp.');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Book consult';
        }
    });
})();
</script>
@endpush
