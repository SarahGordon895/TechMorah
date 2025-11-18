@extends('layouts.app')

@section('title', 'Services | TechMorah Solution LTD')
@section('keywords', 'TechMorah services, AI integration, IT support, computerized accounting, web systems, WhatsApp automation')
@section('description', 'Explore TechMorah Solution LTD services: custom systems, AI copilots, IT support, UI/UX, and accounting automations built for East African businesses.')

@push('styles')
<style>
    .services-hero {
        background: linear-gradient(135deg, #0b0f15, #111c2b 60%, #0b0f15);
        color: #fff;
    }
    .services-hero .badge {
        letter-spacing: 0.1em;
    }
    .stats-card {
        border-radius: 20px;
        padding: 1.5rem;
        background: #111c2b;
        border: 1px solid rgba(255, 255, 255, 0.08);
        color: #f7f9fb;
    }
    .service-card {
        border-radius: 24px;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        background: #fff;
        border: 1px solid rgba(17, 28, 43, 0.05);
    }
    .service-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 45px rgba(9, 14, 20, 0.15);
    }
    .service-icon {
        width: 72px;
        height: 72px;
        border-radius: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #f1f5ff;
        color: #0d6efd;
        margin-bottom: 1rem;
        font-size: 1.75rem;
    }
    .cta-panel {
        border-radius: 28px;
        background: linear-gradient(135deg, #0d6efd, #5315d3);
        color: #fff;
    }
    .approach-step {
        border-left: 3px solid #0d6efd;
        padding-left: 1rem;
    }
    .consult-section {
        background: #f5f7fb;
    }
    .consult-card {
        border-radius: 24px;
        background: #fff;
        border: 1px solid rgba(13, 17, 23, 0.05);
    }
    .consult-card .form-control,
    .consult-card select,
    .consult-card textarea {
        border-radius: 14px;
        padding: 0.85rem 1rem;
    }
</style>
@endpush

@section('content')

<!-- Hero -->
<section class="services-hero py-5">
    <div class="container py-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-secondary text-uppercase mb-3">TechMorah Services</span>
                <h1 class="display-5 fw-bold mb-3">Systems, AI copilots, and support that stay in sync with your flow</h1>
                <p class="lead text-white-50 mb-4">From AI integration to computerized accounting, we ship solutions tailored to East African teams—always respecting your existing workflows and multilingual needs.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#consult" class="btn btn-secondary px-4 py-2">Book a consult</a>
                    <a href="https://wa.me/255655139724" target="_blank" class="btn btn-outline-light px-4 py-2">WhatsApp TechMorah</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row g-3">
                    @foreach ([
                        ['value' => '120+', 'label' => 'Projects shipped'],
                        ['value' => '99%', 'label' => 'Client happiness'],
                        ['value' => '24/7', 'label' => 'Human + AI support'],
                        ['value' => '25+', 'label' => 'Industries served'],
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

<!-- Services Grid -->
<section class="py-5">
    <div class="container py-4">
        <div class="text-center mb-5">
            <h5 class="text-primary">What we build</h5>
            <h2 class="fw-bold">Services engineered around TechMorah Solution LTD delivery playbooks</h2>
            <p class="text-muted mb-0">Every engagement blends bilingual UX research, automation, and post-launch care so your team keeps momentum.</p>
        </div>
        <div class="row g-4">
            @php
                $services = [
                    [
                        'icon' => 'fas fa-laptop-code',
                        'title' => 'Web & System Design',
                        'copy' => 'Laravel + React portals, intranets, and CRMs tuned for local compliance, multi-currency billing, and offline-first access.',
                        'cta' => '#consult',
                    ],
                    [
                        'icon' => 'fas fa-project-diagram',
                        'title' => 'Custom Integrations',
                        'copy' => 'API bridges for ERPs, mobile money, and WhatsApp so data flows across departments without breaking legacy tools.',
                        'cta' => '#consult',
                    ],
                    [
                        'icon' => 'fas fa-robot',
                        'title' => 'AI Integration & Automation',
                        'copy' => 'OpenAI, Groq, and WhatsApp bots that summarize tickets, escalate to humans, and keep transcripts synced across channels.',
                        'cta' => '#consult',
                    ],
                    [
                        'icon' => 'fas fa-headset',
                        'title' => 'IT Support & NOC',
                        'copy' => 'Proactive monitoring, FaceTime walkthroughs, and on-site dispatch supported by Azure + Twilio alerts 24/7.',
                        'cta' => '#consult',
                    ],
                    [
                        'icon' => 'fas fa-palette',
                        'title' => 'Graphic & UI/UX Design',
                        'copy' => 'Design systems, dashboards, and storytelling assets that hand off cleanly to engineering and marketing squads.',
                        'cta' => route('about'),
                    ],
                    [
                        'icon' => 'fas fa-calculator',
                        'title' => 'Computerized Accounting',
                        'copy' => 'Finance dashboards with Power BI, automated approvals, and audit-ready exports for cooperatives and SMEs.',
                        'cta' => '#consult',
                    ],
                ];
            @endphp

        @foreach ($services as $service)
            <div class="col-md-6 col-lg-4">
                <div class="service-card h-100 p-4 shadow-sm">
                    <div class="service-icon"><i class="{{ $service['icon'] }}"></i></div>
                    <h4 class="fw-semibold">{{ $service['title'] }}</h4>
                    <p class="text-muted">{{ $service['copy'] }}</p>
                    <a href="{{ $service['cta'] }}" class="btn btn-link text-primary p-0">Explore &rarr;</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>

<!-- Delivery Approach -->
<section class="bg-light py-5">
    <div class="container py-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <h5 class="text-primary">How we deliver</h5>
                <h2 class="fw-bold">Observability + human touch in every sprint</h2>
                <p class="text-muted">We blend remote collaboration with on-site rituals so projects never lose context. WhatsApp, AI copilots, and dashboards keep every stakeholder in sync.</p>
            </div>
            <div class="col-lg-7">
                <div class="row g-4">
                    @foreach ([
                        ['title' => 'Discover & co-design', 'copy' => 'Workshops to map current workflows, languages, and compliance requirements.'],
                        ['title' => 'Build & integrate', 'copy' => 'Sprints with shared demos, AI-assisted QA, and handoffs synced with your ops calendar.'],
                        ['title' => 'Launch & support', 'copy' => 'Playbooks for training, WhatsApp escalation trees, and analytics dashboards out of the box.'],
                    ] as $step)
                    <div class="col-sm-12">
                        <div class="bg-white rounded-4 p-4 shadow-sm h-100">
                            <div class="approach-step">
                                <h5 class="mb-2">{{ $step['title'] }}</h5>
                                <p class="text-muted mb-0">{{ $step['copy'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Consult Booking -->
<section class="consult-section py-5" id="consult">
    <div class="container py-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-5">
                <span class="badge bg-secondary text-uppercase mb-3">Book a consult</span>
                <h2 class="fw-bold mb-3">Match with a TechMorah consultant in one form</h2>
                <p class="text-muted">No page change needed—tell us what you need (AI rollout, accounting, integrations, or support) and a human expert follows up the same day.</p>
                <ul class="list-unstyled text-muted small">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>WhatsApp + email follow up with full context</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i>Bilingual demos (English/Kiswahili) when required</li>
                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Shared notes so delivery teams stay aligned</li>
                </ul>
            </div>
            <div class="col-lg-7">
                <div class="consult-card p-4 p-md-5 shadow-sm">
                    <h4 class="fw-semibold mb-3">Tell us about your project</h4>
                    <p class="text-muted">Fields marked * are required.</p>
                    <div class="alert d-none" id="consultAlert" role="alert"></div>
                    <form id="consultForm" autocomplete="off">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label small text-uppercase text-muted">Full name</label>
                                <input type="text" name="name" class="form-control" placeholder="Sarah Gordon">
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
                                    <option>AI Integration & Automation</option>
                                    <option>Web & System Design</option>
                                    <option>IT Support & NOC</option>
                                    <option>Computerized Accounting</option>
                                    <option>Other / Custom</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label small text-uppercase text-muted">Project details *</label>
                                <textarea name="message" class="form-control" rows="4" placeholder="Share goals, timelines, integrations, languages…" required></textarea>
                            </div>
                            <div class="col-12 d-flex flex-column flex-sm-row gap-3">
                                <button type="submit" class="btn btn-secondary px-4" id="consultSubmit">Book consult</button>
                                <a href="https://wa.me/255655139724" target="_blank" class="btn btn-outline-secondary px-4">Prefer WhatsApp?</a>
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
            alertBox.className = `alert alert-${type}`;
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
                message: `${form.focus.value ? `[Focus: ${form.focus.value}] ` : ''}${form.message.value.trim()}`,
            };

            if (!payload.email || !payload.message) {
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

                if (!response.ok || !data.success) {
                    throw new Error(data.message || 'Unable to send request');
                }

                showAlert('success', data.message || '✅ Request received! We will reach out shortly.');
                form.reset();
            } catch (error) {
                console.error(error);
                showAlert('danger', '❌ Unable to book consult right now. Please try again or use WhatsApp.');
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Book consult';
            }
        });
    })();
</script>
@endpush
