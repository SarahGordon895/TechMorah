@extends('layouts.app')

@section('title', 'Contact Us - ' . config('app.name'))

@push('styles')
<style>
    .contact-card {
        @apply bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl transition-all duration-500 overflow-hidden hover:-translate-y-2;
    }
    .contact-icon {
        @apply w-12 h-12 rounded-lg flex items-center justify-center mb-4 text-2xl;
    }
    .form-input {
        @apply w-full px-4 py-3 rounded-xl border border-gray-200 dark:border-gray-700 focus:ring-2 focus:ring-orange-500 focus:border-transparent dark:bg-gray-800 dark:text-white placeholder-gray-400 text-sm transition-all duration-300;
    }
    .form-label {
        @apply block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2;
    }
</style>
@endpush
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">// Contact Us //</h6>
                <h1 class="display-6 mb-4">Get In Touch With Us</h1>
                <p class="mb-0">Have a question or want to work together? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
            </div>

            <!-- Info Cards -->
            <div class="row g-4 mb-5">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="contact-card">
                        <div class="p-2 bg-gradient-to-r from-orange-500 to-amber-500 h-1"></div>
                        <div class="p-6 text-center">
                            <div class="contact-icon bg-orange-50 dark:bg-orange-900/20 text-orange-500 mx-auto">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Our Location</h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">23 Ranking Street, New York, NY 10001</p>
                            <a href="https://maps.google.com" target="_blank" class="inline-flex items-center text-orange-500 hover:text-orange-600 dark:text-orange-400 dark:hover:text-orange-300 transition-colors">
                                View on Map <i class="fas fa-arrow-right ml-1 text-sm"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="contact-card">
                        <div class="p-2 bg-gradient-to-r from-blue-500 to-cyan-500 h-1"></div>
                        <div class="p-6 text-center">
                            <div class="contact-icon bg-blue-50 dark:bg-blue-900/20 text-blue-500 mx-auto">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Call Us</h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">+255 655 139 724</p>
                            <div class="flex justify-center gap-3">
                                <a href="tel:+255655139724" class="inline-flex items-center px-4 py-2 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors">
                                    <i class="fas fa-phone-alt text-xs mr-1"></i> Call
                                </a>
                                <a href="sms:+255655139724" class="inline-flex items-center px-4 py-2 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors">
                                    <i class="fas fa-sms text-sm mr-1"></i> SMS
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="contact-card">
                        <div class="p-2 bg-gradient-to-r from-green-500 to-teal-500 h-1"></div>
                        <div class="p-6 text-center">
                            <div class="contact-icon bg-green-50 dark:bg-green-900/20 text-green-500 mx-auto">
                                <i class="far fa-envelope"></i>
                            </div>
                            <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Email Us</h4>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">info@techmorah.com</p>
                            <a href="mailto:info@techmorah.com" class="inline-flex items-center px-6 py-2 rounded-full bg-gradient-to-r from-green-500 to-teal-500 text-white hover:opacity-90 transition-opacity">
                                <i class="far fa-envelope mr-2"></i> Send Email
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="contact-card">
                        <div class="p-2 bg-gradient-to-r from-orange-500 to-amber-500 h-1"></div>
                        <div class="p-6">
                            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Send Us a Message</h2>
                            <p class="text-gray-600 dark:text-gray-400 mb-6">Have questions or want to discuss a project? Fill out the form and we'll get back to you as soon as possible.</p>
                            
                            <form id="contactForm" method="POST" action="{{ route('contact.send') }}" class="space-y-5">
                                @csrf
                                
                                @if(session('success'))
                                    <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-xl mb-4">
                                        <p class="text-green-700 dark:text-green-400 flex items-center">
                                            <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
                                        </p>
                                    </div>
                                @endif

                                <div>
                                    <label for="name" class="form-label">Your Name</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-user text-gray-400"></i>
                                        </div>
                                        <input type="text" id="name" name="name" required 
                                            class="form-input pl-10"
                                            placeholder="John Doe">
                                    </div>
                                </div>

                                <div>
                                    <label for="email" class="form-label">Email Address</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-envelope text-gray-400"></i>
                                        </div>
                                        <input type="email" id="email" name="email" required
                                            class="form-input pl-10"
                                            placeholder="you@example.com">
                                    </div>
                                </div>

                                <div>
                                    <label for="subject" class="form-label">Subject</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <i class="fas fa-tag text-gray-400"></i>
                                        </div>
                                        <input type="text" id="subject" name="subject" required
                                            class="form-input pl-10"
                                            placeholder="How can we help you?">
                                    </div>
                                </div>

                                <div>
                                    <label for="message" class="form-label">Your Message</label>
                                    <div class="relative">
                                        <div class="absolute top-3 left-3">
                                            <i class="fas fa-comment-alt text-gray-400"></i>
                                        </div>
                                        <textarea id="message" name="message" rows="5" required
                                            class="form-input pl-10 pt-3"
                                            placeholder="Tell us about your project or inquiry..."></textarea>
                                    </div>
                                </div>

                                <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-amber-500 text-white py-3 px-6 rounded-xl hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition-all duration-300 flex items-center justify-center">
                                    <i class="far fa-paper-plane mr-2"></i> Send Message
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="contact-card h-full">
                        <div class="p-2 bg-gradient-to-r from-blue-500 to-cyan-500 h-1"></div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Our Location</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-6">Visit our office or drop us a message anytime</p>
                            
                            <div class="relative rounded-xl overflow-hidden mb-8 border border-gray-200 dark:border-gray-700">
                                <div class="aspect-w-16 aspect-h-9 w-full">
                                    <iframe 
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.9663095343008!2d-74.00425872426691!3d40.74076987932881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259bf5c1654f3%3A0xc80f9cfce5383d5d!2sMadison%20Square%20Garden!5e0!3m2!1sen!2sus!4v1620000000000!5m2!1sen!2sus" 
                                        width="100%" 
                                        height="300" 
                                        style="border:0;" 
                                        allowfullscreen="" 
                                        loading="lazy"
                                        class="rounded-xl">
                                    </iframe>
                                </div>
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                    <a href="https://maps.google.com" target="_blank" class="inline-flex items-center text-white bg-gradient-to-r from-blue-500 to-cyan-500 px-4 py-2 rounded-lg hover:opacity-90 transition-opacity">
                                        <i class="fas fa-directions mr-2"></i> Get Directions
                                    </a>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <h4 class="font-semibold text-lg text-gray-900 dark:text-white mb-3">Business Hours</h4>
                                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-xl">
                                        <ul class="space-y-3">
                                            <li class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700">
                                                <span class="text-gray-600 dark:text-gray-400">Monday - Friday</span>
                                                <span class="font-medium text-gray-900 dark:text-white">9:00 AM - 6:00 PM</span>
                                            </li>
                                            <li class="flex justify-between items-center py-2 border-b border-gray-100 dark:border-gray-700">
                                                <span class="text-gray-600 dark:text-gray-400">Saturday</span>
                                                <span class="font-medium text-gray-900 dark:text-white">10:00 AM - 4:00 PM</span>
                                            </li>
                                            <li class="flex justify-between items-center py-2">
                                                <span class="text-gray-600 dark:text-gray-400">Sunday</span>
                                                <span class="font-medium text-rose-500">Closed</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="pt-4 border-t border-gray-100 dark:border-gray-800">
                                    <h4 class="font-semibold text-lg text-gray-900 dark:text-white mb-3">Follow Us</h4>
                                    <div class="flex space-x-4">
                                        <a href="#" class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/20 text-blue-500 flex items-center justify-center hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                        <a href="#" class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/20 text-blue-400 flex items-center justify-center hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                        <a href="#" class="w-10 h-10 rounded-full bg-pink-50 dark:bg-pink-900/20 text-pink-500 flex items-center justify-center hover:bg-pink-100 dark:hover:bg-pink-900/30 transition-colors">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                        <a href="#" class="w-10 h-10 rounded-full bg-blue-50 dark:bg-blue-900/20 text-blue-600 flex items-center justify-center hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection

@push('scripts')
<script>
    // Initialize WOW.js
    new WOW().init();

    // Form submission handling
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('contactForm');
        if (form) {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalBtnText = submitBtn.innerHTML;
                
                // Show loading state
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Sending...';
                
                // Remove any existing messages
                const existingMessages = document.querySelectorAll('.form-message');
                existingMessages.forEach(msg => msg.remove());
                
                try {
                    const formData = new FormData(form);
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            name: form.querySelector('[name="name"]').value,
                            email: form.querySelector('[name="email"]').value,
                            subject: form.querySelector('[name="subject"]').value,
                            message: form.querySelector('[name="message"]').value
                        })
                    });
                    
                    const data = await response.json();
                    
                    if (response.ok) {
                        // Reset form on success
                        form.reset();
                        
                        // Show success message
                        const successHtml = `
                            <div class="form-message p-4 mb-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-700 rounded-xl">
                                <p class="text-green-700 dark:text-green-400 flex items-center">
                                    <i class="fas fa-check-circle mr-2"></i> ✅ Message sent successfully! We'll be in touch soon.
                                </p>
                            </div>
                        `;
                        form.insertAdjacentHTML('beforebegin', successHtml);
                    } else {
                        // Show error message
                        const errorHtml = `
                            <div class="form-message p-4 mb-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 rounded-xl">
                                <p class="text-red-700 dark:text-red-400">
                                    <i class="fas fa-exclamation-circle mr-2"></i> ❌ Failed to send message. Please try again.
                                </p>
                            </div>
                        `;
                        form.insertAdjacentHTML('beforebegin', errorHtml);
                    }
                } catch (error) {
                    console.error('Error:', error);
                    const errorHtml = `
                        <div class="form-message p-4 mb-6 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-700 rounded-xl">
                            <p class="text-red-700 dark:text-red-400">
                                <i class="fas fa-exclamation-circle mr-2"></i> ❌ Error sending message. Please try again later.
                            </p>
                        </div>
                    `;
                    form.insertAdjacentHTML('beforebegin', errorHtml);
                } finally {
                    // Reset button state
                    // Reset button state
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalBtnText;
                }
            });
        }
    });
</script>
@endpush
