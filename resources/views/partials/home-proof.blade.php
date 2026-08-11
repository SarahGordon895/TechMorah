{{-- Client proof, delivery workflow, tech stack — fintech profile aligned --}}

<section class="tm-section">
    <div class="container">
        <div class="tm-header text-center mx-auto" style="max-width:720px;margin-left:auto;margin-right:auto;">
            <p class="tm-section-label">Proven delivery</p>
            <h2 class="tm-title">Systems we build for real clients</h2>
            <p class="tm-lead">From enterprise SMS and payment sandboxes to SME web systems — clear scope, documentation, and support handover. Leadership experience at partner firms is attributed honestly and is not presented as a TechMorah contract unless TechMorah was formally engaged.</p>
        </div>
        <div class="tm-grid tm-grid--4">
            <article class="tm-client-card tm-reveal">
                <span class="tm-badge">Enterprise · ongoing</span>
                <h4>Victoria Lush Limited</h4>
                <p class="mb-2">Company portal (VLL SMS), VLL Admin, SmSver1 — production on Linux VPS with SSL and documented handover.</p>
                <div>
                    <span class="tm-stack-badge">Company portal</span>
                    <span class="tm-stack-badge">Linux VPS</span>
                    <span class="tm-stack-badge">Laravel</span>
                </div>
            </article>
            <article class="tm-client-card tm-reveal">
                <span class="tm-badge">FinTech</span>
                <h4>iMartGroup — LipaPay</h4>
                <p class="mb-2">Sandbox on shared hosting — API reference and staging for mobile-money before production go-live.</p>
                <div>
                    <span class="tm-stack-badge">Shared hosting</span>
                    <span class="tm-stack-badge">REST APIs</span>
                    <span class="tm-stack-badge">Laravel</span>
                </div>
            </article>
            <article class="tm-client-card tm-reveal">
                <span class="tm-badge">SME &amp; retail</span>
                <h4>Custom web &amp; POS</h4>
                <p class="mb-2">Websites, POS, intranets, and brand kits — scoped for Tanzanian businesses and long-term maintainability.</p>
                <div>
                    <span class="tm-stack-badge">React</span>
                    <span class="tm-stack-badge">MySQL</span>
                    <span class="tm-stack-badge">UI/UX</span>
                </div>
            </article>
            <article class="tm-client-card tm-reveal">
                <span class="tm-badge">Sectors</span>
                <h4>Education &amp; hospitality</h4>
                <p class="mb-2">Library systems, campus ordering, IT support desks — bilingual UX and mobile-first interfaces.</p>
                <div>
                    <span class="tm-stack-badge">PWA</span>
                    <span class="tm-stack-badge">Payments</span>
                    <span class="tm-stack-badge">Support</span>
                </div>
            </article>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('blog') }}" class="btn btn-outline-secondary">View case studies</a>
            <a href="https://sarahgordon895.github.io/sarahgordon.github.io/" target="_blank" rel="noopener" class="btn btn-link">Founder portfolio →</a>
        </div>
    </div>
</section>

<section class="tm-section tm-section--paper">
    <div class="container">
        <div class="tm-header text-center mx-auto" style="max-width:640px;margin-left:auto;margin-right:auto;">
            <p class="tm-section-label">How we work</p>
            <h2 class="tm-title">From discovery to launch</h2>
            <p class="tm-lead">A predictable flow for banking channels, payment integrations, SMS platforms, or custom enterprise software.</p>
        </div>
        <div class="tm-workflow">
            <article class="tm-workflow-step tm-reveal">
                <div class="tm-workflow-step__num">01</div>
                <h4 class="h6 fw-bold">Discover &amp; align</h4>
                <p class="text-muted small mb-0">Goals, users, compliance, and success metrics — documented before build starts.</p>
            </article>
            <article class="tm-workflow-step tm-reveal">
                <div class="tm-workflow-step__num">02</div>
                <h4 class="h6 fw-bold">Design the experience</h4>
                <p class="text-muted small mb-0">Wireframes, UI systems, and branded assets as the single source of truth.</p>
            </article>
            <article class="tm-workflow-step tm-reveal">
                <div class="tm-workflow-step__num">03</div>
                <h4 class="h6 fw-bold">Build &amp; integrate</h4>
                <p class="text-muted small mb-0">Laravel services, React screens, REST APIs, SMS/WhatsApp/payment hooks.</p>
            </article>
            <article class="tm-workflow-step tm-reveal">
                <div class="tm-workflow-step__num">04</div>
                <h4 class="h6 fw-bold">Launch &amp; support</h4>
                <p class="text-muted small mb-0">Linux VPS or shared hosting, training, runbooks, and production iteration.</p>
            </article>
        </div>
    </div>
</section>

<section class="tm-section" style="padding-top:32px;padding-bottom:32px;">
    <div class="container text-center">
        <p class="tm-section-label mb-3">Technology we ship with</p>
        <div class="d-flex flex-wrap justify-content-center">
            @foreach(['Laravel', 'PHP', 'React', 'Flutter', 'T-SQL', 'MySQL', 'SQL Server', 'REST / Swagger', 'Twilio / SMS', 'OpenAI', 'Linux VPS', 'Shared hosting', 'IIS', 'M-Pesa'] as $tech)
            <span class="tm-stack-pill">{{ $tech }}</span>
            @endforeach
        </div>
    </div>
</section>
