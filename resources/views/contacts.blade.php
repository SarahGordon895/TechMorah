@extends('layouts.app')

@section('title', 'Contact - ' . config('app.name'))
@section('keywords', 'TechMorah contact, WhatsApp +255655139724, AI solutions, IT support')
@section('description', 'Reach TechMorah Solution Limited via WhatsApp, phone, email, or the contact form. We respond fast across all channels.')

@push('styles')
<style>
    .contact-page .page-header {
        background: linear-gradient(120deg, #0a0a0a, #1a1a1a);
        position: relative;
    }
    .contact-page .page-header::after {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at top, rgba(21,255,153,0.25), rgba(0,0,0,0.8));
    }
    .contact-page .page-header > .container {
        position: relative;
        z-index: 2;
    }
    .contact-page .contact-detail {
        background: #0f0f0f;
        border-radius: 1.5rem;
    }
    .contact-page .contact-form-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 1.5rem;
        backdrop-filter: blur(10px);
    }
    .contact-page .contact-form-card .form-control {
        border-radius: 999px;
        border: none;
        background: rgba(255,255,255,0.08);
        color: #fff;
        padding: 0.85rem 1.25rem;
    }
    .contact-page .contact-form-card textarea.form-control {
        border-radius: 1.5rem;
        min-height: 160px;
    }
    .contact-page .contact-map iframe {
        border-radius: 1.5rem;
        min-height: 360px;
        border: none;
    }
    .contact-page .stat-card {
        border-radius: 1rem;
        background: rgba(0,0,0,0.25);
        border: 1px solid rgba(255,255,255,0.08);
    }
    .contact-page .whatsapp-cta {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.08);
        border-radius: 1.25rem;
    }
    .contact-page .btn-whatsapp {
        background: #25D366;
        color: #0f0f0f;
    }
    .contact-page .btn-whatsapp:hover {
        filter: brightness(1.1);
        color: #0f0f0f;
    }
</style>
@endpush

@section('page_topbar')
<!-- Contact top info bar -->
<div class="container-fluid bg-dark py-2 d-none d-md-flex">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div class="text-white-50 small d-flex flex-wrap align-items-center gap-3">
                <span><i class="fas fa-map-marker-alt me-2 text-secondary"></i>Dar es Salaam Science Park, Tanzania</span>
                <span>|</span>
                <span><i class="fas fa-envelope me-2 text-secondary"></i>techmorahsolution@gmail.com</span>
            </div>
            <div id="note" class="text-secondary small d-none d-xl-flex"><small>Note: We respond fast across phone, WhatsApp, and email.</small></div>
            <div class="d-flex gap-2">
                <a href="https://www.facebook.com/share/1JnhuGhcnf/?mibextid=wwXIfr" target="_blank" rel="noopener" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-facebook-f text-primary"></i></a>
                <a href="https://www.linkedin.com/in/sarah-gordon-0502b335b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="_blank" rel="noopener" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-linkedin-in text-primary"></i></a>
                <a href="https://www.instagram.com/techmorahsolution_ltd?igsh=MXZqZm80eXkwbjgyZQ%3D%3D&utm_source=qr" target="_blank" rel="noopener" class="bg-light nav-fill btn btn-sm-square rounded-circle"><i class="fab fa-instagram text-primary"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_navbar')
<!-- Contact Page Navbar -->
<div class="container-fluid bg-primary">
    <div class="container">
        <nav class="navbar navbar-dark navbar-expand-lg py-0">
            <a href="{{ route('home') }}" class="navbar-brand">
                <h1 class="text-white fw-bold d-block">TECH<span class="text-secondary">MORAH</span></h1>
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse" data-bs-target="#contactNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse bg-transparent" id="contactNav">
                <div class="navbar-nav ms-auto mx-xl-auto p-0">
                    <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active text-secondary' : '' }}">Home</a>
                    <a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active text-secondary' : '' }}">About</a>
                    <a href="{{ route('services') }}" class="nav-item nav-link {{ request()->routeIs('services') ? 'active text-secondary' : '' }}">Services</a>
                    <a href="{{ route('blog') }}" class="nav-item nav-link {{ request()->routeIs('blog') ? 'active text-secondary' : '' }}">Blog Posts</a>
                    <a href="{{ route('chat.index') }}" class="nav-item nav-link {{ request()->routeIs('chat.index') ? 'active text-secondary' : '' }}">AI Chatbot</a>
                    <a href="{{ route('contact') }}" class="nav-item nav-link active text-secondary">Contact</a>
                </div>
            </div>
            <div class="d-none d-xl-flex flex-shrink-0 align-items-center">
                <div class="d-flex align-items-center justify-content-center me-4">
                    <a href="tel:+255655139724" class="position-relative">
                        <i class="fa fa-phone-alt text-white fa-2x"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
                            <i class="fa fa-comment-dots text-dark"></i>
                        </span>
                    </a>
                </div>
                <div class="d-flex flex-column pe-4 border-end">
                    <span class="text-white-50">Have any questions?</span>
                    <span class="text-secondary">Call / FaceTime: +255 655 139 724</span>
                </div>
                <div class="d-flex align-items-center justify-content-center ms-4">
                    <a href="{{ route('contact') }}#contactForm" class="text-white"><i class="bi bi-search text-white fa-2x"></i></a>
                </div>
            </div>
        </nav>
    </div>
</div>
@endsection

@section('content')
    <div class="contact-page">
        <!-- Page Header -->
        <div class="container-fluid page-header py-5 mb-0">
            <div class="container text-center py-5">
                <h1 class="display-2 text-white mb-4">Contact Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item text-white-50">Pages</li>
                        <li class="breadcrumb-item active text-white">Contact</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Fact Strip -->
        <div class="container-fluid bg-secondary py-5">
            <div class="container">
                <div class="row g-4 text-white">
                    <div class="col-6 col-lg-3">
                        <div class="d-flex align-items-center stat-card p-4">
                            <h1 class="me-3 text-primary mb-0">99%</h1>
                            <h5 class="mb-0">Happy Clients</h5>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="d-flex align-items-center stat-card p-4">
                            <h1 class="me-3 text-primary mb-0">25+</h1>
                            <h5 class="mb-0">Industries Served</h5>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="d-flex align-items-center stat-card p-4">
                            <h1 class="me-3 text-primary mb-0">120+</h1>
                            <h5 class="mb-0">Projects Delivered</h5>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3">
                        <div class="d-flex align-items-center stat-card p-4">
                            <h1 class="me-3 text-primary mb-0">24/7</h1>
                            <h5 class="mb-0">Support Coverage</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Detail + Form -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5" style="max-width: 650px;">
                    <h5 class="text-primary text-uppercase">Get In Touch</h5>
                    <h1 class="mb-3">Contact us for any inquiry</h1>
                    <p class="text-muted">Reach TechMorah Solution Limited via WhatsApp, phone, email, or the contact form. We respond fast across all channels.</p>
                </div>
                <div class="contact-detail position-relative p-4 p-md-5 text-white">
                    <div class="whatsapp-cta d-flex flex-column flex-lg-row align-items-center justify-content-between gap-3 p-4 mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="btn-square bg-success bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width:56px;height:56px;">
                                <i class="fab fa-whatsapp text-success fs-3"></i>
                            </div>
                            <div>
                                <small class="text-secondary text-uppercase d-block">Instant Support</small>
                                <h5 class="mb-0">Prefer WhatsApp? Chat with TechMorah now.</h5>
                            </div>
                        </div>
                        <a href="https://wa.me/255655139724?text=Hi%20TechMorah%2C%20I%20need%20assistance%20with..." target="_blank" rel="noopener" class="btn btn-whatsapp rounded-pill px-4 fw-semibold">
                            <i class="fab fa-whatsapp me-2"></i>Start WhatsApp Chat
                        </a>
                    </div>
                    <div class="row g-4 mb-4 justify-content-center">
                        <div class="col-xl-4 col-lg-6">
                            <div class="d-flex bg-dark bg-opacity-25 p-3">
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fas fa-map-marker-alt text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Address</h4>
                                    <a href="https://goo.gl/maps/tw2q4yWAPsn" target="_blank" class="text-white text-decoration-none">Dar es Salaam Science Park, Tanzania</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="d-flex bg-dark bg-opacity-25 p-3">
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-phone text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Call / WhatsApp</h4>
                                    <a class="text-white text-decoration-none d-block" href="tel:+255655139724">+255 655 139 724</a>
                                    <a class="text-white-50 text-decoration-none" href="https://wa.me/255655139724" target="_blank" rel="noopener">Chat on WhatsApp</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-6">
                            <div class="d-flex bg-dark bg-opacity-25 p-3">
                                <div class="flex-shrink-0 btn-square bg-secondary rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="fa fa-envelope text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h4 class="text-primary">Email Us</h4>
                                    <a class="text-white text-decoration-none" href="mailto:techmorahsolution@gmail.com">techmorahsolution@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-5 align-items-stretch">
                        <div class="col-lg-6">
                            <div class="p-4 p-md-5 h-100 contact-map">
                                <iframe class="w-100 h-100" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.111703975866!2d39.23275757502784!3d-6.778866766264675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4bff05c5f56d%3A0x6d7f38d4f6a4225f!2sDar%20es%20Salaam%20Science%20Park!5e0!3m2!1sen!2stz!4v1732114685176!5m2!1sen!2stz" style="border:0;min-height:360px;" allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-4 p-md-5 contact-form-card text-white">
                                <h4 class="mb-4">Send us a direct message</h4>
                                <form id="contactForm" method="POST" action="{{ route('contact.send') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Full Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone (Optional)">
                                    </div>
                                    <div class="mb-3">
                                        <textarea id="message" name="message" class="form-control" placeholder="Share the details of your inquiry" required></textarea>
                                    </div>
                                    <div class="d-flex flex-column flex-md-row gap-3">
                                        <button type="submit" class="btn bg-primary text-white py-3 px-5 flex-fill">Send Message</button>
                                        <a id="whatsappQuickChat" href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-whatsapp py-3 px-5 flex-fill text-center fw-semibold"><i class="fab fa-whatsapp me-2"></i>Message via WhatsApp</a>
                                    </div>
                                    <small class="text-white-50 d-block mt-2">We auto-fill your WhatsApp chat with the info above for faster support.</small>
                                    <div id="formAlert" class="mt-4"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Business Hours & Map -->
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="mb-4">Business Hours</h2>
                    <p class="mb-5">Our business hours are as follows:</p>
                    <div class="row">
                        <div class="col-md-6">
                            <p><span class="fw-semibold">Monday - Friday:</span> 9:00 AM - 6:00 PM</p>
                        </div>
                        <div class="col-md-6">
                            <p><span class="fw-semibold">Saturday:</span> 10:00 AM - 4:00 PM</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><span class="fw-semibold">Sunday:</span> Closed</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 contact-map">
                    <iframe
                        class="w-100 h-100"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.111703975866!2d39.23275757502784!3d-6.778866766264675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4bff05c5f56d%3A0x6d7f38d4f6a4225f!2sDar%20es%20Salaam%20Science%20Park!5e0!3m2!1sen!2stz!4v1732114685176!5m2!1sen!2stz"
                        style="border:0;min-height:360px;"
                        allowfullscreen
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    const whatsappButton = document.getElementById('whatsappQuickChat');

    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const alertBox = document.getElementById('formAlert');
        const submitBtn = form.querySelector('button[type="submit"]');

        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending...';
        alertBox.innerHTML = '<div class="text-info small">📨 Sending your message...</div>';

        try {
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    name: form.name.value,
                    email: form.email.value,
                    phone: form.phone.value,
                    message: form.message.value,
                }),
            });

            const data = await response.json().catch(() => ({}));
            if (response.ok && data.success) {
                form.reset();
                alertBox.innerHTML = `<div class="text-success small fw-semibold">✅ ${data.message}</div>`;
            } else {
                alertBox.innerHTML = `<div class="text-danger small">❌ ${data.message || 'Failed to send message. Please try again.'}</div>`;
            }
        } catch (error) {
            console.error('Contact form error', error);
            alertBox.innerHTML = '<div class="text-danger small">❌ Error sending message. Please try again later.</div>';
        } finally {
            submitBtn.textContent = 'Send Message';
            submitBtn.disabled = false;
        }
    });

    const updateWhatsAppLink = () => {
        if (!whatsappButton) return;
        const name = form.name.value.trim() || 'there';
        const email = form.email.value.trim() || 'not provided';
        const phone = form.phone.value.trim() || 'not provided';
        const message = form.message.value.trim() || 'I would like to know more about your services.';
        const text = `Hi TechMorah team, my name is ${name}. Email: ${email}. Phone: ${phone}. Message: ${message}`;
        whatsappButton.href = `https://wa.me/255655139724?text=${encodeURIComponent(text)}`;
    };

    ['input', 'change'].forEach(evt => {
        form.addEventListener(evt, updateWhatsAppLink);
    });
    updateWhatsAppLink();
});
</script>
@endpush
