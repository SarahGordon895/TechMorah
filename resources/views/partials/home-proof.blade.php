{{-- Client proof, delivery workflow, tech stack — aligned with real portfolio work --}}

<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <p class="tm-section-label mb-2">Proven delivery</p>
            <h2 class="fw-bold">Systems we build for real clients</h2>
            <p class="text-muted mx-auto" style="max-width:720px;">
                From enterprise SMS and payment sandboxes to SME web systems — TechMorah Solution LTD ships production software with clear scope, documentation, and support handover.
            </p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="tm-client-card">
                    <span class="badge bg-secondary mb-2">Enterprise · ongoing</span>
                    <h4 class="h5 fw-bold">Victoria Lush Limited</h4>
                    <p class="text-muted small mb-2">VLL Admin, VLL SMS portal, SmSver1 legacy stack — bulk messaging, resellers, and operations.</p>
                    <div>
                        <span class="badge bg-light text-dark tm-stack-badge">Laravel</span>
                        <span class="badge bg-light text-dark tm-stack-badge">APIs</span>
                        <span class="badge bg-light text-dark tm-stack-badge">SMS</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="tm-client-card">
                    <span class="badge bg-secondary mb-2">FinTech</span>
                    <h4 class="h5 fw-bold">iMartGroup — LipaPay</h4>
                    <p class="text-muted small mb-2">Sandbox developer hub, API reference, and staging for mobile-money flows before production.</p>
                    <div>
                        <span class="badge bg-light text-dark tm-stack-badge">REST</span>
                        <span class="badge bg-light text-dark tm-stack-badge">Sandbox</span>
                        <span class="badge bg-light text-dark tm-stack-badge">Laravel</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="tm-client-card">
                    <span class="badge bg-secondary mb-2">SME & retail</span>
                    <h4 class="h5 fw-bold">Custom web & POS</h4>
                    <p class="text-muted small mb-2">Websites, POS, intranets, and brand kits — scoped for Tanzanian businesses and long-term maintainability.</p>
                    <div>
                        <span class="badge bg-light text-dark tm-stack-badge">React</span>
                        <span class="badge bg-light text-dark tm-stack-badge">MySQL</span>
                        <span class="badge bg-light text-dark tm-stack-badge">UI/UX</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="tm-client-card">
                    <span class="badge bg-secondary mb-2">Sectors</span>
                    <h4 class="h5 fw-bold">Education & hospitality</h4>
                    <p class="text-muted small mb-2">Library systems, campus ordering, IT support desks — bilingual UX and mobile-first interfaces.</p>
                    <div>
                        <span class="badge bg-light text-dark tm-stack-badge">PWA</span>
                        <span class="badge bg-light text-dark tm-stack-badge">Payments</span>
                        <span class="badge bg-light text-dark tm-stack-badge">Support</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('blog') }}" class="btn btn-outline-secondary rounded-pill px-4">View case studies</a>
            <a href="https://sarahgordon895.github.io/sarahgordon.github.io/" target="_blank" rel="noopener" class="btn btn-link text-secondary">View founder portfolio →</a>
        </div>
    </div>
</section>

<section class="py-5" style="background: linear-gradient(180deg, #f8f9fc 0%, #fff 100%);">
    <div class="container">
        <div class="text-center mb-5">
            <p class="tm-section-label mb-2">How we work</p>
            <h2 class="fw-bold">From discovery to launch</h2>
            <p class="text-muted mx-auto" style="max-width:640px;">A predictable flow so stakeholders always know what is happening — whether we ship a web app, POS rollout, or full integration.</p>
        </div>
        <div class="row g-4">
            @foreach([
                ['01', 'Discover & align', 'Goals, users, compliance, and success metrics — captured before build starts.'],
                ['02', 'Design the experience', 'Wireframes, UI systems, and branded assets as the single source of truth for engineering.'],
                ['03', 'Build & integrate', 'Laravel services, React screens, REST APIs, SMS/WhatsApp/payment hooks — tested on real workflows.'],
                ['04', 'Launch & support', 'Training, documentation, monitoring, and iteration so your team keeps momentum.'],
            ] as $step)
            <div class="col-md-6 col-lg-3">
                <div class="tm-workflow-step">
                    <div class="tm-workflow-step__num mb-2">{{ $step[0] }}</div>
                    <h4 class="h6 fw-bold">{{ $step[1] }}</h4>
                    <p class="text-muted small mb-0">{{ $step[2] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="py-4 border-top border-bottom bg-white">
    <div class="container text-center">
        <p class="tm-section-label mb-3">Technology we ship with</p>
        <div class="d-flex flex-wrap justify-content-center">
            @foreach(['Laravel', 'PHP', 'React', 'JavaScript', 'MySQL', 'REST APIs', 'Twilio / SMS', 'OpenAI', 'Bootstrap', 'Git', 'M-Pesa integrations', 'Power BI'] as $tech)
            <span class="tm-stack-pill">{{ $tech }}</span>
            @endforeach
        </div>
    </div>
</section>
