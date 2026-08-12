@extends('layouts.app')

@section('title', 'Contact — TechMorah Solution LTD')
@section('keywords', 'TechMorah contact, WhatsApp, Dar es Salaam Science Park, fintech Tanzania')
@section('description', 'Contact TechMorah Solution LTD — project form, WhatsApp, phone, and Dar es Salaam Science Park.')

@section('content')

<section class="tm-page-hero page-header">
    <div class="container text-center">
        <p class="tm-section-label" style="color:var(--copper-soft)">Get in touch</p>
        <h1 class="tm-title" style="color:#fff;font-size:clamp(2rem,5vw,2.8rem)">Contact TechMorah</h1>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;color:rgba(255,255,255,0.7)">
            Share your project brief — we typically reply within one business day.
        </p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Contact</li>
            </ol>
        </nav>
    </div>
</section>

<section class="tm-section">
    <div class="container">
        <div class="tm-contact-layout">
            <div class="tm-contact-main">
                <p class="tm-section-label">Project briefing</p>
                <h2 class="tm-title">Send a message</h2>
                <p class="tm-lead">Core banking, channels, payments, SMS, or a custom platform — tell us what you need.</p>

                <div id="contactAlert" class="alert d-none" role="alert"></div>
                @if(session('success'))
                    <div class="alert alert-success small">{{ session('success') }}</div>
                @elseif(session('error'))
                    <div class="alert alert-danger small">{{ session('error') }}</div>
                @endif

                <form id="contactForm" class="tm-form" method="POST" action="{{ route('contact.send') }}" data-techmorah-contact>
                    @csrf
                    <input type="hidden" name="source" value="contact">
                    <div class="honeypot-field" aria-hidden="true">
                        <label for="website_url">Website</label>
                        <input type="text" id="website_url" name="website_url" tabindex="-1" autocomplete="off">
                    </div>
                    <div class="tm-form__row">
                        <div>
                            <label class="form-label" for="name">Full name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Your name" required autocomplete="name">
                        </div>
                        <div>
                            <label class="form-label" for="email">Work email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="you@company.com" required autocomplete="email">
                        </div>
                    </div>
                    <div class="tm-form__row">
                        <div>
                            <label class="form-label" for="phone">Phone / WhatsApp</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="+255 …" autocomplete="tel">
                        </div>
                        <div>
                            <label class="form-label" for="focus">Focus area</label>
                            <select id="focus" name="focus" class="form-control">
                                <option value="">Select a focus</option>
                                <option>Core banking / microfinance support</option>
                                <option>Digital banking channels</option>
                                <option>Payments &amp; integrations</option>
                                <option>Enterprise SMS / messaging</option>
                                <option>Custom enterprise software</option>
                                <option>E-commerce</option>
                                <option>AI &amp; automation</option>
                                <option>Hosting &amp; infrastructure</option>
                                <option>Other</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="form-label" for="message">Project details</label>
                        <textarea id="message" name="message" class="form-control" rows="5" placeholder="Goals, timeline, and systems you use today…" required></textarea>
                    </div>
                    <div class="tm-form__actions">
                        <button type="submit" class="btn btn-secondary">Send message</button>
                        <a id="whatsappQuickChat" href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-outline-secondary">WhatsApp instead</a>
                    </div>
                </form>
            </div>

            <aside class="tm-contact-aside">
                <div class="tm-aside-card">
                    <p class="tm-section-label">Direct channels</p>
                    <h3 class="h5 mb-3">Talk to the team</h3>
                    <ul class="tm-aside-list">
                        <li>
                            <span>WhatsApp</span>
                            <a href="https://wa.me/255655139724" target="_blank" rel="noopener">+255 655 139 724</a>
                        </li>
                        <li>
                            <span>Phone</span>
                            <a href="tel:+255655139724">+255 655 139 724</a>
                        </li>
                        <li>
                            <span>Secondary</span>
                            <a href="tel:+255745700923">+255 745 700 923</a>
                        </li>
                        <li>
                            <span>Email</span>
                            <a href="mailto:techmorahsolution@gmail.com">techmorahsolution@gmail.com</a>
                        </li>
                        <li>
                            <span>Location</span>
                            <a href="https://www.google.com/maps/search/?api=1&query=Dar+es+Salaam+Science+Park" target="_blank" rel="noopener">Dar es Salaam Science Park</a>
                        </li>
                    </ul>
                    <a href="https://wa.me/255655139724?text=Hi%20TechMorah%2C%20I%20would%20like%20to%20discuss%20a%20project." target="_blank" rel="noopener" class="btn btn-secondary w-100 mt-3">Start WhatsApp</a>
                    <a href="{{ route('chat.index') }}" class="btn btn-outline-secondary w-100 mt-2">Open AI chatbot</a>
                </div>

                <div class="tm-aside-card">
                    <p class="tm-section-label">Hours</p>
                    <ul class="tm-aside-list">
                        <li><span>Mon – Fri</span><strong>08:00 – 17:00</strong></li>
                        <li><span>Saturday</span><strong>09:00 – 13:00</strong></li>
                        <li><span>Sunday</span><strong>Closed</strong></li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</section>

<section class="tm-section tm-section--paper" id="contactMap">
    <div class="container">
        <div class="tm-header">
            <p class="tm-section-label">Visit</p>
            <h2 class="tm-title">Dar es Salaam Science Park</h2>
            <p class="tm-lead">Open in Google Maps for directions.</p>
        </div>
        <div class="tm-map">
            <iframe
                title="TechMorah — Dar es Salaam Science Park"
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                allowfullscreen
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.111703975866!2d39.23275757502784!3d-6.778866766264675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4bff05c5f56d%3A0x6d7f38d4f6a4225f!2sDar%20es%20Salaam%20Science%20Park!5e0!3m2!1sen!2stz!4v1732114685176!5m2!1sen!2stz"
            ></iframe>
        </div>
        <div class="mt-3">
            <a href="https://www.google.com/maps/search/?api=1&query=Dar+es+Salaam+Science+Park" target="_blank" rel="noopener" class="btn btn-outline-secondary">Open in Google Maps</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/contact-form.js') }}"></script>
<script src="{{ asset('js/contact-whatsapp.js') }}"></script>
<script src="{{ asset('js/contact-page.js') }}"></script>
@endpush
