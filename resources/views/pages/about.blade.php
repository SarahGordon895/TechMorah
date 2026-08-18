@extends('layouts.app')

@section('title', 'About — TechMorah Solution LTD')
@section('keywords', 'TechMorah digital solutions, Sarah George Gordon, Dar es Salaam Science Park, microfinance, e-commerce, ISP')
@section('description', 'TechMorah Solution LTD provides innovative digital solutions — web & systems, UI/UX, IT support, accounting, microfinance, e-commerce, ISP management, and payment gateway integration.')

@section('content')

<header class="tm-about-hero">
    <div class="tm-about-hero__glow" aria-hidden="true"></div>
    <div class="tm-about-hero__mesh" aria-hidden="true"></div>
    <div class="container tm-about-hero__inner">
        <div class="tm-about-hero__copy">
            <p class="tm-about-hero__eyebrow">About · TechMorah Solution Limited</p>
            <h1 class="tm-about-hero__brand">TechMorah</h1>
            <p class="tm-about-hero__tag">Solution Limited</p>
            <p class="tm-about-hero__lede">
                We provide innovative digital solutions that empower businesses and individuals to thrive in the digital era.
            </p>
            <div class="tm-about-hero__actions">
                <a href="{{ route('contact') }}" class="btn btn-secondary">Let&rsquo;s innovate together</a>
                <a href="{{ route('services') }}" class="btn btn-outline-light">Explore services</a>
            </div>
        </div>
        <aside class="tm-about-hero__panel" aria-hidden="true">
            <div class="tm-about-hero__mark">
                <img src="{{ asset('img/techmorah-icon.png') }}" alt="" loading="eager" decoding="async">
            </div>
            <p class="tm-about-hero__panel-line">Innovate · Integrate · Implement · Empower</p>
        </aside>
    </div>
</header>

<section class="tm-trust">
    <div class="container">
        <div class="tm-trust__grid">
            <div class="tm-reveal"><p class="tm-trust__value" data-count="4" data-suffix="+">4+</p><p class="tm-trust__label">Years leadership</p></div>
            <div class="tm-reveal" data-delay="1"><p class="tm-trust__value" data-count="10" data-suffix="+">10+</p><p class="tm-trust__label">Client relationships</p></div>
            <div class="tm-reveal" data-delay="2"><p class="tm-trust__value" data-count="25" data-suffix="+">25+</p><p class="tm-trust__label">Platforms delivered</p></div>
            <div class="tm-reveal" data-delay="3"><p class="tm-trust__value" data-count="12" data-suffix="">12</p><p class="tm-trust__label">Service lines</p></div>
        </div>
    </div>
</section>

<section class="tm-about-story">
    <div class="container tm-about-story__grid">
        <div class="tm-about-story__visual tm-reveal" aria-hidden="true">
            <div class="tm-about-story__visual-frame">
                <img src="{{ asset('img/home-hero-corporate.png') }}" alt="" loading="lazy" decoding="async">
            </div>
            <div class="tm-about-story__visual-accent"></div>
        </div>
        <div class="tm-about-story__copy tm-reveal" data-delay="1">
            <p class="tm-section-label">Who we are</p>
            <h2 class="tm-title">A digital solutions partner built for real operations</h2>
            <p class="tm-lead">
                TechMorah Solution LTD is a founder-led company that designs, builds, and supports production systems — from first workshop through launch and handover.
            </p>
            <p class="text-muted">
                We bring product discovery, UX, full-stack engineering, integrations, hosting, training, and documentation into one accountable delivery flow — including monitoring, profiling, and sandbox validation from development through staging to production. Based at Dar es Salaam Science Park, we serve East African businesses that need clarity, reliability, and systems that teams can actually run.
            </p>
            <ul class="tm-about-checklist">
                <li>Clear scope before build starts</li>
                <li>Production-minded engineering and integrations</li>
                <li>Documented handover and ongoing support</li>
            </ul>
            <div class="tm-about-story__actions">
                <a href="{{ route('blog') }}" class="btn btn-outline-secondary">See case studies</a>
                <a href="https://sarah-gordon.org/" target="_blank" rel="noopener" class="btn btn-link">Founder portfolio →</a>
            </div>
        </div>
    </div>
</section>

<section class="tm-section tm-section--navy" id="how-we-operate">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <p class="tm-section-label">Delivery loop</p>
                <h2 class="tm-title">Development, sandbox, and production — one TechMorah flow</h2>
                <p class="tm-lead">Performance monitoring, continuous profiling, deterministic profiling, and testing are TechMorah services. We apply them on the platforms we build and on stacks clients already run.</p>
                <ul class="tm-feature-list tm-feature-list--light">
                    <li>Development: debug, improve, validate</li>
                    <li>Testing / staging / sandbox: test, validate, decide</li>
                    <li>Production: monitor, identify, understand</li>
                    <li>Languages: PHP, Python, Go, Node.js, Ruby, Rust</li>
                </ul>
            </div>
            <div class="col-lg-7">
                @include('partials.delivery-loop')
            </div>
        </div>
    </div>
</section>

<section class="tm-about-focus">
    <div class="container">
        <div class="tm-header text-center mx-auto" style="max-width:640px;margin-left:auto;margin-right:auto;">
            <p class="tm-section-label">What we deliver</p>
            <h2 class="tm-title">Capabilities shaped for growth</h2>
            <p class="tm-lead">Core digital services, plus specialised platforms for microfinance, e-commerce, ISP management, payment gateway integration, and observability across PHP, Python, Go, Node.js, Ruby, and Rust.</p>
        </div>
        <div class="tm-about-focus__list">
            <article class="tm-about-focus__item tm-reveal">
                <span class="tm-about-focus__icon"><i class="fas fa-desktop"></i></span>
                <div>
                    <h3>Web &amp; system design</h3>
                    <p>User-friendly, secure, and scalable systems and websites.</p>
                </div>
            </article>
            <article class="tm-about-focus__item tm-reveal" data-delay="1">
                <span class="tm-about-focus__icon"><i class="fas fa-cogs"></i></span>
                <div>
                    <h3>System design &amp; development</h3>
                    <p>Customised solutions tailored to optimise business processes and efficiency.</p>
                </div>
            </article>
            <article class="tm-about-focus__item tm-reveal" data-delay="2">
                <span class="tm-about-focus__icon"><i class="fas fa-paint-brush"></i></span>
                <div>
                    <h3>Graphic design &amp; UI/UX</h3>
                    <p>Creative visuals and intuitive interfaces to enhance brand impact.</p>
                </div>
            </article>
            <article class="tm-about-focus__item tm-reveal">
                <span class="tm-about-focus__icon"><i class="fas fa-headset"></i></span>
                <div>
                    <h3>IT support services</h3>
                    <p>Reliable technical support for smooth and efficient operations.</p>
                </div>
            </article>
            <article class="tm-about-focus__item tm-reveal" data-delay="1">
                <span class="tm-about-focus__icon"><i class="fas fa-file-invoice-dollar"></i></span>
                <div>
                    <h3>Computerised accounting</h3>
                    <p>Streamlined financial management for accurate and efficient reporting.</p>
                </div>
            </article>
            <article class="tm-about-focus__item tm-reveal" data-delay="2">
                <span class="tm-about-focus__icon"><i class="fas fa-hand-holding-usd"></i></span>
                <div>
                    <h3>Microfinance solutions</h3>
                    <p>Loan, savings, and member workflows for MFIs and community lenders.</p>
                </div>
            </article>
            <article class="tm-about-focus__item tm-reveal">
                <span class="tm-about-focus__icon"><i class="fas fa-shopping-cart"></i></span>
                <div>
                    <h3>E-commerce solutions</h3>
                    <p>Storefronts, inventory, checkout, and catalogue operations for digital sales.</p>
                </div>
            </article>
            <article class="tm-about-focus__item tm-reveal" data-delay="1">
                <span class="tm-about-focus__icon"><i class="fas fa-wifi"></i></span>
                <div>
                    <h3>ISP management</h3>
                    <p>Subscriber, billing, support, and payment flows for internet providers.</p>
                </div>
            </article>
            <article class="tm-about-focus__item tm-reveal" data-delay="2">
                <span class="tm-about-focus__icon"><i class="fas fa-credit-card"></i></span>
                <div>
                    <h3>Payment gateway &amp; integration</h3>
                    <p>Collections, disbursements, sandboxes, callbacks, and reconciliation-aware APIs.</p>
                </div>
            </article>
            <article class="tm-about-focus__item tm-reveal">
                <span class="tm-about-focus__icon"><i class="fas fa-chart-line"></i></span>
                <div>
                    <h3>Monitoring, profiling &amp; observability</h3>
                    <p>Continuous profiling, monitoring, and testing across development, sandbox, and production — PHP, Python, Go, Node.js, Ruby, and Rust.</p>
                </div>
            </article>
        </div>
    </div>
</section>

<section class="tm-about-principles">
    <div class="container">
        <div class="tm-header text-center mx-auto" style="max-width:560px;margin-left:auto;margin-right:auto;">
            <p class="tm-section-label">How we work</p>
            <h2 class="tm-title">Mission, vision &amp; values</h2>
        </div>
        <div class="tm-about-principles__row">
            <article class="tm-about-principle tm-reveal">
                <p class="tm-about-principle__label">Mission</p>
                <h3>Reliable products. Clear delivery.</h3>
                <p>Deliver digital products, integrations, and support through practical engineering, transparent communication, and documented handover.</p>
            </article>
            <article class="tm-about-principle tm-reveal" data-delay="1">
                <p class="tm-about-principle__label">Vision</p>
                <h3>Trusted East African partner.</h3>
                <p>Become the go-to digital solutions partner for microfinance, e-commerce, ISP management, payments, messaging, and long-term support.</p>
            </article>
            <article class="tm-about-principle tm-reveal" data-delay="2">
                <p class="tm-about-principle__label">Values</p>
                <h3>Innovate. Integrate. Implement. Empower.</h3>
                <p>Integrity, ownership, quality, security, and clarity in every engagement — from discovery workshop to production operation.</p>
            </article>
        </div>
    </div>
</section>

<section class="tm-about-leader">
    <div class="container tm-about-leader__grid">
        <div class="tm-about-leader__copy tm-reveal">
            <p class="tm-section-label">Leadership</p>
            <h2 class="tm-title">Sarah George Gordon</h2>
            <p class="tm-about-leader__role">Co-Founder &amp; CEO · Principal Technologist</p>
            <p class="text-muted">
                4+ years across full-stack software, enterprise SMS, payments, e-commerce, and ISP digital platforms. Current full-time role: Full Stack Developer at <strong>iMart Group LTD</strong> (LipaPay, SMS desk, ELMS). Prior work includes Victoria Lush Limited (portal &amp; SMS on Linux VPS) and Active Targets e-commerce.
            </p>
            <p class="text-muted small">
                Leadership experience at partner firms is attributed honestly and is not presented as a TechMorah contract unless TechMorah was formally engaged.
            </p>
            <div class="tm-about-leader__pills">
                <span class="tm-stack-pill">Laravel</span>
                <span class="tm-stack-pill">PHP</span>
                <span class="tm-stack-pill">Python</span>
                <span class="tm-stack-pill">Go</span>
                <span class="tm-stack-pill">Node.js</span>
                <span class="tm-stack-pill">Ruby</span>
                <span class="tm-stack-pill">Rust</span>
                <span class="tm-stack-pill">React</span>
                <span class="tm-stack-pill">Flutter</span>
                <span class="tm-stack-pill">Filament</span>
                <span class="tm-stack-pill">Payment gateways</span>
                <span class="tm-stack-pill">ISP systems</span>
                <span class="tm-stack-pill">E-commerce</span>
                <span class="tm-stack-pill">Linux VPS</span>
            </div>
        </div>
        <aside class="tm-about-leader__aside tm-reveal" data-delay="1">
            <p class="tm-about-leader__aside-label">Headquarters</p>
            <p class="tm-about-leader__aside-value">Dar es Salaam Science Park</p>
            <p class="tm-about-leader__aside-label">Direct line</p>
            <p class="tm-about-leader__aside-value"><a href="tel:+255655139724">+255 655 139 724</a></p>
            <p class="tm-about-leader__aside-label">Email</p>
            <p class="tm-about-leader__aside-value"><a href="mailto:techmorahsolution@gmail.com">techmorahsolution@gmail.com</a></p>
            <a href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-secondary mt-3">WhatsApp TechMorah</a>
        </aside>
    </div>
</section>

<section class="tm-about-cta">
    <div class="container text-center">
        <p class="tm-section-label" style="color:var(--brand-y)">Next step</p>
        <h2 class="tm-title">Let&rsquo;s innovate together</h2>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;">
            Tell us about your microfinance, e-commerce, ISP, payments, or custom platform need — we typically reply within one business day.
        </p>
        <div class="tm-about-cta__actions">
            <a href="{{ route('contact') }}" class="btn btn-light">Contact us</a>
            <a href="{{ route('services') }}" class="btn btn-outline-light">View services</a>
        </div>
    </div>
</section>

@endsection
