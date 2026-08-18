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
                    <div class="col-6">
                        <div class="stats-card text-center h-100">
                            <h3 class="fw-bold mb-1">4+</h3>
                            <p class="small text-white-50 mb-0">Years leadership</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stats-card text-center h-100">
                            <h3 class="fw-bold mb-1">10+</h3>
                            <p class="small text-white-50 mb-0">Relationships</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stats-card text-center h-100">
                            <h3 class="fw-bold mb-1">25+</h3>
                            <p class="small text-white-50 mb-0">Platforms</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stats-card text-center h-100">
                            <h3 class="fw-bold mb-1">12</h3>
                            <p class="small text-white-50 mb-0">Service lines</p>
                        </div>
                    </div>
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
            <article class="tm-card tm-reveal" id="web">
                <div class="tm-card__icon"><i class="fas fa-laptop-code"></i></div>
                <h3>Web &amp; System Design &amp; Development</h3>
                <p class="mb-3">User-friendly, secure, and scalable systems and websites.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            <article class="tm-card tm-reveal" id="systems" data-delay="1">
                <div class="tm-card__icon"><i class="fas fa-cogs"></i></div>
                <h3>System Design &amp; Development</h3>
                <p class="mb-3">Customised solutions tailored to optimise business processes and efficiency.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            <article class="tm-card tm-reveal" id="uiux" data-delay="2">
                <div class="tm-card__icon"><i class="fas fa-paint-brush"></i></div>
                <h3>Graphic Design &amp; UI/UX Design</h3>
                <p class="mb-3">Creative visuals and intuitive interfaces to enhance brand impact.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            <article class="tm-card tm-reveal" id="support">
                <div class="tm-card__icon"><i class="fas fa-headset"></i></div>
                <h3>IT Support Services</h3>
                <p class="mb-3">Reliable technical support for smooth and efficient operations.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            <article class="tm-card tm-reveal" id="accounting" data-delay="1">
                <div class="tm-card__icon"><i class="fas fa-file-invoice-dollar"></i></div>
                <h3>Computerised Accounting Solutions</h3>
                <p class="mb-3">Streamlined financial management for accurate and efficient reporting.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            <article class="tm-card tm-reveal" id="microfinance" data-delay="2">
                <div class="tm-card__icon"><i class="fas fa-hand-holding-usd"></i></div>
                <h3>Microfinance Solutions</h3>
                <p class="mb-3">Loan, savings, and member workflows for MFIs and community lenders.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            <article class="tm-card tm-reveal" id="ecommerce">
                <div class="tm-card__icon"><i class="fas fa-shopping-cart"></i></div>
                <h3>E-Commerce Solutions</h3>
                <p class="mb-3">Storefronts, inventory, cart, checkout, and catalogue operations for digital sales.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            <article class="tm-card tm-reveal" id="isp" data-delay="1">
                <div class="tm-card__icon"><i class="fas fa-wifi"></i></div>
                <h3>ISP Management</h3>
                <p class="mb-3">Subscriber, billing, support, and payment flows for internet service providers.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            <article class="tm-card tm-reveal" id="payments" data-delay="2">
                <div class="tm-card__icon"><i class="fas fa-credit-card"></i></div>
                <h3>Payment Gateway &amp; Integration</h3>
                <p class="mb-3">Collections, disbursements, sandboxes, callbacks, and reconciliation-aware APIs.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            <article class="tm-card tm-reveal" id="sms">
                <div class="tm-card__icon"><i class="fas fa-sms"></i></div>
                <h3>Enterprise SMS Platforms</h3>
                <p class="mb-3">Admin consoles, reseller portals, bulk messaging, and API layers.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            <article class="tm-card tm-reveal" id="observability" data-delay="1">
                <div class="tm-card__icon"><i class="fas fa-chart-line"></i></div>
                <h3>Monitoring, Profiling &amp; Observability</h3>
                <p class="mb-3">Application monitoring, browser observability, analytics, alerts, and profiling across development, staging, and production.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
            <article class="tm-card tm-reveal" id="sandbox" data-delay="2">
                <div class="tm-card__icon"><i class="fas fa-flask"></i></div>
                <h3>Testing, Sandbox &amp; Release Engineering</h3>
                <p class="mb-3">Sandbox environments, performance testing, build scenarios, custom assertions, and release-readiness support.</p>
                <a href="#consult" class="btn btn-link p-0">Explore →</a>
            </article>
        </div>
    </div>
</section>

@include('partials.platform-pillars')

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
            <article class="tm-card tm-reveal" data-delay="2" id="sandbox">
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

<section class="tm-section" id="packages">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-5">
                <p class="tm-section-label">Pricing &amp; packages</p>
                <h2 class="tm-title">Scoped for production delivery</h2>
                <p class="tm-lead">Starter, growth, and enterprise packages — or observability layered onto payment, ISP, SMS, and custom platform work.</p>
            </div>
            <div class="col-lg-7">
                <div class="tm-grid tm-grid--3">
                    <article class="tm-card tm-reveal">
                        <h3>Starter</h3>
                        <p class="mb-2">Development + staging</p>
                        <ul class="tm-feature-list">
                            <li>Core monitoring</li>
                            <li>Browser observability</li>
                            <li>Basic alert routing</li>
                        </ul>
                    </article>
                    <article class="tm-card tm-reveal" data-delay="1">
                        <h3>Growth</h3>
                        <p class="mb-2">Production visibility</p>
                        <ul class="tm-feature-list">
                            <li>Continuous profiling</li>
                            <li>Performance tests</li>
                            <li>Recommendations + tuning</li>
                        </ul>
                    </article>
                    <article class="tm-card tm-reveal" data-delay="2">
                        <h3>Enterprise</h3>
                        <p class="mb-2">Full sandbox package</p>
                        <ul class="tm-feature-list">
                            <li>Sandbox environment</li>
                            <li>SDK / CLI / integrations</li>
                            <li>Handover + support</li>
                        </ul>
                    </article>
                </div>
            </div>
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
                    <article class="tm-workflow-step tm-reveal">
                        <div class="tm-workflow-step__num">01</div>
                        <h4 class="h6 fw-bold">Discover &amp; align</h4>
                        <p class="text-muted small mb-0">Workshops to map workflows, compliance, and success metrics before build starts.</p>
                    </article>
                    <article class="tm-workflow-step tm-reveal">
                        <div class="tm-workflow-step__num">02</div>
                        <h4 class="h6 fw-bold">Design the experience</h4>
                        <p class="text-muted small mb-0">Wireframes, UI systems, and branded assets as the single source of truth.</p>
                    </article>
                    <article class="tm-workflow-step tm-reveal">
                        <div class="tm-workflow-step__num">03</div>
                        <h4 class="h6 fw-bold">Build &amp; integrate</h4>
                        <p class="text-muted small mb-0">Laravel, React, REST APIs, SMS/WhatsApp/payment hooks tested on real workflows.</p>
                    </article>
                    <article class="tm-workflow-step tm-reveal">
                        <div class="tm-workflow-step__num">04</div>
                        <h4 class="h6 fw-bold">Test, sandbox &amp; validate</h4>
                        <p class="text-muted small mb-0">Staging, sandbox environments, performance scenarios, assertions, and release checks before launch.</p>
                    </article>
                    <article class="tm-workflow-step tm-reveal">
                        <div class="tm-workflow-step__num">05</div>
                        <h4 class="h6 fw-bold">Launch &amp; support</h4>
                        <p class="text-muted small mb-0">VPS or shared hosting, monitoring, alerts, training, runbooks, and production iteration.</p>
                    </article>
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
