@extends('layouts.app')

@section('title', 'Contact - ' . config('app.name'))
@section('keywords', 'TechMorah contact, WhatsApp +255655139724, AI solutions, IT support Tanzania')
@section('description', 'Contact TechMorah Solution LTD — form, WhatsApp, AI chat, phone, email, and map. Dar es Salaam Science Park.')

@push('styles')
<link href="{{ asset('css/contact-page.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="contact-page">
    <div class="container-fluid page-header py-5 mb-0">
        <div class="container text-center py-4 py-md-5">
            <h1 class="display-2 text-white mb-3">Contact Us</h1>
            <p class="lead text-white-50 mx-auto mb-4 px-2" style="max-width: 640px;">
                Form, WhatsApp, AI chat, or visit us — pick the channel that fits. We respond fast.
            </p>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0 flex-wrap">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active text-white">Contact</li>
                </ol>
            </nav>
            <div class="channel-pills px-2">
                <a href="#contact-form-section" class="channel-pill"><i class="fas fa-envelope me-1"></i> Email form</a>
                <a href="https://wa.me/255655139724" target="_blank" rel="noopener" class="channel-pill"><i class="fab fa-whatsapp me-1"></i> WhatsApp</a>
                <a href="#contactChat" class="channel-pill"><i class="fas fa-robot me-1"></i> AI chat</a>
                <a href="#contactMap" class="channel-pill"><i class="fas fa-map-marker-alt me-1"></i> Map</a>
            </div>
        </div>
    </div>

    <div class="container-fluid contact-stats py-4 py-md-5">
        <div class="container">
            <div class="row g-3 g-md-4 text-white">
                <div class="col-6 col-lg-3">
                    <div class="d-flex align-items-center stat-card p-3 p-md-4">
                        <h1 class="me-2 me-md-3 text-white mb-0">2+</h1>
                        <h5 class="mb-0">Years delivery</h5>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="d-flex align-items-center stat-card p-3 p-md-4">
                        <h1 class="me-2 me-md-3 text-white mb-0">24/7</h1>
                        <h5 class="mb-0">Support ready</h5>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="d-flex align-items-center stat-card p-3 p-md-4">
                        <h1 class="me-2 me-md-3 text-white mb-0"><i class="fab fa-whatsapp"></i></h1>
                        <h5 class="mb-0">WhatsApp live</h5>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="d-flex align-items-center stat-card p-3 p-md-4">
                        <h1 class="me-2 me-md-3 text-white mb-0"><i class="fas fa-robot"></i></h1>
                        <h5 class="mb-0">AI assistant</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="contact-intro py-4 py-md-5">
        <div class="container text-center">
            <h5 class="text-secondary text-uppercase mb-2">Get in touch</h5>
            <h2 class="fw-bold mb-3">Tell us about your project</h2>
            <p class="text-muted mb-0 mx-auto px-2" style="max-width: 650px;">
                Enterprise SMS, payments, web systems, or IT support — we scope honestly and reply the same day when possible.
            </p>
        </div>
    </section>

    <div class="container pb-4 pb-md-5 px-3 px-sm-4">
        <div class="contact-detail p-3 p-md-4 p-lg-5 text-white">
            <div class="whatsapp-cta d-flex flex-column flex-md-row align-items-stretch align-items-md-center justify-content-between gap-3 p-3 p-md-4 mb-4">
                <div class="d-flex align-items-center gap-3">
                    <div class="flex-shrink-0 rounded-circle d-flex align-items-center justify-content-center bg-success bg-opacity-25" style="width:52px;height:52px;">
                        <i class="fab fa-whatsapp text-success fs-3"></i>
                    </div>
                    <div>
                        <small class="text-secondary text-uppercase d-block">Fastest channel</small>
                        <h5 class="mb-0">WhatsApp +255 655 139 724</h5>
                    </div>
                </div>
                <a href="https://wa.me/255655139724?text=Hi%20TechMorah%2C%20I%20would%20like%20to%20discuss%20a%20project." target="_blank" rel="noopener" class="btn btn-whatsapp rounded-pill px-4 py-2 fw-semibold w-100 w-md-auto">
                    <i class="fab fa-whatsapp me-2"></i>Start WhatsApp
                </a>
            </div>

            <div class="row g-3 g-md-4 mb-4">
                <div class="col-md-4">
                    <div class="contact-info-card d-flex p-3">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:44px;height:44px;">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div class="ms-3 min-w-0">
                            <h4 class="text-secondary h6 text-uppercase mb-1">Address</h4>
                            <a href="https://www.google.com/maps/search/?api=1&query=Dar+es+Salaam+Science+Park" target="_blank" rel="noopener" class="text-white text-decoration-none small">Dar es Salaam Science Park, Tanzania</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-card d-flex p-3">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:44px;height:44px;">
                            <i class="fa fa-phone text-white"></i>
                        </div>
                        <div class="ms-3">
                            <h4 class="text-secondary h6 text-uppercase mb-1">Call</h4>
                            <a class="text-white text-decoration-none d-block" href="tel:+255655139724">+255 655 139 724</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info-card d-flex p-3">
                        <div class="flex-shrink-0 btn-square bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width:44px;height:44px;">
                            <i class="fa fa-envelope text-white"></i>
                        </div>
                        <div class="ms-3 min-w-0">
                            <h4 class="text-secondary h6 text-uppercase mb-1">Email</h4>
                            <a class="text-white text-decoration-none small text-break" href="mailto:techmorahsolution@gmail.com">techmorahsolution@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-lg-7">
                    <div class="p-3 p-md-4 p-lg-5 contact-form-card h-100" id="contact-form-section">
                        <h4 class="mb-3">Send a message</h4>
                        <div id="contactAlert" class="alert d-none alert-contact" role="alert"></div>
                        @if(session('success'))
                            <div class="alert alert-success alert-contact small">{{ session('success') }}</div>
                        @elseif(session('error'))
                            <div class="alert alert-danger alert-contact small">{{ session('error') }}</div>
                        @endif
                        <form id="contactForm" method="POST" action="{{ route('contact.send') }}" data-techmorah-contact>
                            @csrf
                            <input type="hidden" name="source" value="contact">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="name">Full name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Your name" required autocomplete="name">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="you@company.com" required autocomplete="email">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="phone">Phone / WhatsApp</label>
                                    <input type="tel" id="phone" name="phone" class="form-control" placeholder="+255 …" autocomplete="tel">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="focus">What do you need?</label>
                                    <select id="focus" name="focus" class="form-select">
                                        <option value="">Select a focus</option>
                                        <option>Web & system development</option>
                                        <option>Enterprise SMS / messaging</option>
                                        <option>Payments & integrations</option>
                                        <option>AI & automation</option>
                                        <option>IT support & NOC</option>
                                        <option>UI/UX & branding</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label" for="message">Project details</label>
                                    <textarea id="message" name="message" class="form-control" rows="4" placeholder="Goals, timeline, and systems you use today…" required></textarea>
                                </div>
                                <div class="col-12 d-flex flex-column flex-sm-row gap-2 gap-sm-3">
                                    <button type="submit" class="btn btn-contact-primary flex-fill py-2">Send message</button>
                                    <a id="whatsappQuickChat" href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-whatsapp flex-fill py-2 text-center">
                                        <i class="fab fa-whatsapp me-2"></i>WhatsApp instead
                                    </a>
                                </div>
                                <div class="col-12">
                                    <small>Form emails techmorahsolution@gmail.com. WhatsApp button pre-fills from your answers.</small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5" id="contactChat">
                    <div class="p-3 p-md-4 contact-chat-card h-100 d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-start gap-2 mb-2">
                            <h4 class="mb-0">AI assistant</h4>
                            <a href="{{ route('chat.index') }}" class="btn btn-sm btn-contact-outline">Full chat</a>
                        </div>
                        <small class="mb-2">Quick answers about services, SMS, payments, and support.</small>
                        <div id="contactChatMessages" class="contact-chat-messages flex-grow-1">
                            <p class="contact-chat-empty text-muted small text-center mb-0 py-4">Ask about pricing, SMS platforms, or timelines…</p>
                        </div>
                        <div class="d-flex flex-wrap gap-2 my-2">
                            <button type="button" class="contact-quick-reply quick-reply-chip" data-reply="What does a Laravel web system cost?">Pricing</button>
                            <button type="button" class="contact-quick-reply quick-reply-chip" data-reply="We need an SMS admin like VLL">SMS platform</button>
                            <button type="button" class="contact-quick-reply quick-reply-chip" data-reply="M-Pesa / payment integration help">Payments</button>
                        </div>
                        <form id="contactChatForm" class="contact-chat-input-row">
                            <input type="text" id="contactChatInput" class="form-control" placeholder="Type your question…" autocomplete="off" maxlength="500">
                            <button type="submit" class="btn btn-contact-primary px-3">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4 py-md-5 px-3 px-sm-4">
        <div class="row g-4">
            <div class="col-lg-5">
                <div class="hours-block p-3 p-md-4 h-100">
                    <h2 class="h4 mb-3">Business hours</h2>
                    <p class="text-white-50 small mb-4">WhatsApp and AI chat are available outside hours — we reply when online.</p>
                    <ul class="list-unstyled mb-0 small">
                        <li class="mb-2 d-flex justify-content-between gap-2"><span>Monday – Friday</span><span class="text-secondary">9:00 – 18:00</span></li>
                        <li class="mb-2 d-flex justify-content-between gap-2"><span>Saturday</span><span class="text-secondary">10:00 – 16:00</span></li>
                        <li class="d-flex justify-content-between gap-2"><span>Sunday</span><span class="text-secondary">Closed</span></li>
                    </ul>
                    <a href="tel:+255655139724" class="btn btn-contact-outline w-100 mt-4 py-2"><i class="fa fa-phone me-2"></i>Call now</a>
                </div>
            </div>
            <div class="col-lg-7" id="contactMap">
                <div class="contact-map-card p-3 p-md-4 h-100">
                    <h2 class="h4 mb-3">Find us</h2>
                    <p class="text-white-50 small mb-3">Dar es Salaam Science Park — open in Google Maps for directions.</p>
                    <div class="contact-map-wrap">
                        <iframe
                            title="TechMorah — Dar es Salaam Science Park"
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            allowfullscreen
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.111703975866!2d39.23275757502784!3d-6.778866766264675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4bff05c5f56d%3A0x6d7f38d4f6a4225f!2sDar%20es%20Salaam%20Science%20Park!5e0!3m2!1sen!2stz!4v1732114685176!5m2!1sen!2stz"
                        ></iframe>
                    </div>
                    <div class="contact-map-actions">
                        <a href="https://www.google.com/maps/search/?api=1&query=Dar+es+Salaam+Science+Park" target="_blank" rel="noopener" class="btn btn-contact-primary btn-sm">Open in Google Maps</a>
                        <a href="https://wa.me/255655139724?text=Hi%2C%20I%27m%20heading%20to%20Dar%20es%20Salaam%20Science%20Park." target="_blank" rel="noopener" class="btn btn-whatsapp btn-sm">WhatsApp directions</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/contact-form.js') }}"></script>
<script src="{{ asset('js/contact-whatsapp.js') }}"></script>
<script src="{{ asset('js/contact-chat-embed.js') }}"></script>
<script src="{{ asset('js/contact-page.js') }}"></script>
@endpush
