@extends('layouts.app')

@section('title', 'Contact - ' . config('app.name'))
@section('keywords', 'TechMorah contact, WhatsApp +255655139724, AI solutions, IT support')
@section('description', 'Reach TechMorah Solution Limited via WhatsApp, phone, email, or the contact form. We respond fast across all channels.')

@push('styles')
<style>
    .contact-hero {
        background: radial-gradient(circle at top, #2b1f18, #0d0b09);
    }
    .contact-card {
        border: 1px solid rgba(0,0,0,0.05);
        transition: all .3s ease;
    }
    .contact-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 35px -20px rgba(0,0,0,0.2);
    }
    .contact-detail .btn-square {
        width: 70px;
        height: 70px;
        display:flex;
        align-items:center;
        justify-content:center;
    }
    .contact-map iframe {
        border-radius: 1.5rem;
        min-height: 320px;
    }
</style>
@endpush

@section('content')
<!-- Bootstrap section -->

    <!-- Contact top info bar -->
    <div class="bg-black text-white py-2">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
            <div class="text-white-50 small d-flex align-items-center gap-3">
                <span><i class="fas fa-map-marker-alt text-success me-2"></i>Dar es Salaam Science Park, Tanzania</span>
                <span class="d-none d-md-inline">|</span>
                <span><i class="fas fa-envelope text-success me-2"></i>techmorahsolution@gmail.com</span>
            </div>
            <div class="d-flex gap-2">
                <a href="https://www.facebook.com/share/1JnhuGhcnf/?mibextid=wwXIfr" target="_blank" rel="noopener" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-facebook-f text-primary"></i></a>
                <a href="https://www.linkedin.com/in/sarah-gordon-0502b335b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app" target="_blank" rel="noopener" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-linkedin-in text-primary"></i></a>
                <a href="https://www.instagram.com/techmorahsolution_ltd?igsh=MXZqZm80eXkwbjgyZQ%3D%3D&utm_source=qr" target="_blank" rel="noopener" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-instagram text-primary"></i></a>
            </div>
        </div>
    </div>

    <!-- Contact Page Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand fw-bold">TECH<span class="text-secondary">MORAH</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#contactNav" aria-controls="contactNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="contactNav">
                <div class="navbar-nav ms-auto gap-lg-2">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                    <a href="{{ route('about') }}" class="nav-link">About</a>
                    <a href="{{ route('services') }}" class="nav-link">Services</a>
                    <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                    <a href="{{ route('chat.index') }}" class="nav-link">AI Chatbot</a>
                    <a href="{{ route('contact') }}" class="nav-link active">Contact</a>
                </div>
                <div class="d-none d-xl-flex align-items-center ms-4">
                    <div class="d-flex flex-column pe-3 border-end border-secondary">
                        <small class="text-white-50">Need help?</small>
                        <span class="text-secondary">Call +255 655 139 724</span>
                    </div>
                    <a href="tel:+255655139724" class="btn btn-sm btn-secondary ms-3">Call Us</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contact Section -->
    <div class="container py-5">
        <div class="row mt-4">
            <div class="col-lg-6">
                <h2 class="mb-4">Get in Touch</h2>
                <p class="mb-5">Reach TechMorah Solution Limited via WhatsApp, phone, email, or the contact form. We respond fast across all channels.</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0 bg-light shadow-sm mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Address</h5>
                                <p class="card-text">Dar es Salaam Science Park, Tanzania</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-0 bg-light shadow-sm mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Phone & FaceTime</h5>
                                <p class="card-text">+255 655 139 724</p>
                                <div class="mt-2">
                                    <a href="tel:+255655139724" class="btn btn-sm btn-primary">Call</a>
                                    <a href="sms:+255655139724" class="btn btn-sm btn-primary">SMS</a>
                                    <a href="facetime:+255655139724" class="btn btn-sm btn-primary">FaceTime</a>
                                    <a href="https://wa.me/255655139724" target="_blank" rel="noopener noreferrer" class="btn btn-sm btn-success">WhatsApp</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0 bg-light shadow-sm mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Email</h5>
                                <p class="card-text">techmorahsolution@gmail.com</p>
                                <div class="mt-2">
                                    <a href="mailto:techmorahsolution@gmail.com" class="btn btn-sm btn-primary">Email Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4">Send Us a Message</h2>
                <form id="contactForm" method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="John Doe" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone (Optional)</label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="+1 (555) 123-4567">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message" name="message" rows="6" class="form-control" placeholder="Tell us about your inquiry..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                    <div id="formAlert" class="mt-4"></div>
                </form>
            </div>
        </div>
    </div>

    <!-- Map & Additional Info -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="mb-4">Business Hours</h2>
                <p class="mb-5">Our business hours are as follows:</p>
                <div class="row">
                    <div class="col-md-6">
                        <p><span class="font-medium">Monday - Friday:</span> 9:00 AM - 6:00 PM</p>
                    </div>
                    <div class="col-md-6">
                        <p><span class="font-medium">Saturday:</span> 10:00 AM - 4:00 PM</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p><span class="font-medium">Sunday:</span> Closed</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <iframe
                    class="w-100 h-100"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.111703975866!2d39.23275757502784!3d-6.778866766264675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185c4bff05c5f56d%3A0x6d7f38d4f6a4225f!2sDar%20es%20Salaam%20Science%20Park!5e0!3m2!1sen!2stz!4v1731783590000!5m2!1sen!2stz"
                    allowfullscreen=""
                ></iframe>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('contactForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const form = e.target;
            const alertBox = document.getElementById('formAlert');
            const submitBtn = form.querySelector('button[type="submit"]');

            // Show loading state
            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';
            alertBox.innerHTML = '<div class="text-blue-600 dark:text-blue-400 text-sm">📨 Sending your message...</div>';

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({
                        name: form.name.value,
                        email: form.email.value,
                        phone: form.phone.value,
                        message: form.message.value,
                    }),
                });

                if (response.ok) {
                    form.reset();
                    alertBox.innerHTML = '<div class="text-green-600 dark:text-green-400 text-sm font-medium">✅ Message sent successfully! We\'ll be in touch soon.</div>';
                    submitBtn.textContent = 'Send Message';
                    submitBtn.disabled = false;
                } else {
                    alertBox.innerHTML = '<div class="text-red-600 dark:text-red-400 text-sm">❌ Failed to send message. Please try again.</div>';
                    submitBtn.textContent = 'Send Message';
                    submitBtn.disabled = false;
                }
            } catch (error) {
                console.error('Error:', error);
                alertBox.innerHTML = '<div class="text-red-600 dark:text-red-400 text-sm">❌ Error sending message. Please try again later.</div>';
                submitBtn.textContent = 'Send Message';
                submitBtn.disabled = false;
            }
        });
    </script>
</body>
</html>
