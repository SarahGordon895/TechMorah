@extends('layouts.app')

@section('title', 'Services - ' . config('app.name'))

@section('content')

@push('styles')
<style>
    .service-card {
        @apply bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 overflow-hidden h-full flex flex-col;
        transition: all 0.3s ease;
    }
    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .service-icon {
        @apply w-20 h-20 rounded-2xl flex items-center justify-center text-4xl mx-auto mb-6;
        transition: all 0.3s ease;
    }
    .service-card:hover .service-icon {
        transform: scale(1.1);
    }
    .stats-card {
        @apply bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 text-center;
        transition: all 0.3s ease;
    }
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-primary to-secondary py-20 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNTkgMzBMMzAgNjBMMSAzMFozMFoiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIi8+PC9zdmc+')] opacity-20"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Our Services</h1>
            <nav class="flex justify-center space-x-2 text-white/90">
                <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                <span>/</span>
                <span>Services</span>
            </nav>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="bg-gray-50 dark:bg-gray-900 py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="stats-card group">
                <div class="text-4xl font-bold text-primary mb-2">99%</div>
                <h5 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Client Satisfaction</h5>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Our clients love our work</p>
            </div>
            <div class="stats-card group">
                <div class="text-4xl font-bold text-primary mb-2">150+</div>
                <h5 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Projects Completed</h5>
                <p class="text-gray-500 dark:text-gray-400 text-sm">And counting</p>
            </div>
            <div class="stats-card group">
                <div class="text-4xl font-bold text-primary mb-2">10+</div>
                <h5 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Years Experience</h5>
                <p class="text-gray-500 dark:text-gray-400 text-sm">In the industry</p>
            </div>
            <div class="stats-card group">
                <div class="text-4xl font-bold text-primary mb-2">24/7</div>
                <h5 class="text-lg font-semibold text-gray-800 dark:text-white mb-1">Support</h5>
                <p class="text-gray-500 dark:text-gray-400 text-sm">Dedicated team</p>
            </div>
        </div>
    </div>
</div>

<!-- Services Section -->
<div class="py-16 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="inline-block text-primary font-medium mb-3">Our Services</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Services Built Specifically For Your Business</h2>
            <p class="text-gray-600 dark:text-gray-300">We provide a wide range of IT solutions to help your business grow and succeed in the digital world.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Web Development -->
            <div class="service-card group">
                <div class="p-6">
                    <div class="service-icon bg-blue-100 text-blue-600 dark:bg-blue-900/30 dark:text-blue-400">
                        <i class="fas fa-code"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Web Development</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Custom websites and web applications built with the latest technologies to ensure high performance and scalability.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Responsive Design</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>E-commerce Solutions</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Custom Web Apps</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center text-primary font-medium group-hover:text-primary-600 transition-colors">
                        Learn more <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- Mobile App Development -->
            <div class="service-card group">
                <div class="p-6">
                    <div class="service-icon bg-purple-100 text-purple-600 dark:bg-purple-900/30 dark:text-purple-400">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Mobile App Development</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Cross-platform mobile applications that deliver seamless user experiences across all devices.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>iOS & Android</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>React Native</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>App Maintenance</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center text-primary font-medium group-hover:text-primary-600 transition-colors">
                        Learn more <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- UI/UX Design -->
            <div class="service-card group">
                <div class="p-6">
                    <div class="service-icon bg-green-100 text-green-600 dark:bg-green-900/30 dark:text-green-400">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">UI/UX Design</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Beautiful and intuitive user interfaces designed to enhance user engagement and satisfaction.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>User Research</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Wireframing</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Prototyping</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center text-primary font-medium group-hover:text-primary-600 transition-colors">
                        Learn more <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- Digital Marketing -->
            <div class="service-card group">
                <div class="p-6">
                    <div class="service-icon bg-yellow-100 text-yellow-600 dark:bg-yellow-900/30 dark:text-yellow-400">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Digital Marketing</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Data-driven digital marketing strategies to increase your online presence and drive business growth.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>SEO</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Social Media</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>PPC</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center text-primary font-medium group-hover:text-primary-600 transition-colors">
                        Learn more <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- Cloud Solutions -->
            <div class="service-card group">
                <div class="p-6">
                    <div class="service-icon bg-indigo-100 text-indigo-600 dark:bg-indigo-900/30 dark:text-indigo-400">
                        <i class="fas fa-cloud"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Cloud Solutions</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Scalable and secure cloud infrastructure solutions tailored to your business requirements.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Cloud Migration</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>AWS & Azure</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>24/7 Monitoring</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center text-primary font-medium group-hover:text-primary-600 transition-colors">
                        Learn more <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>

            <!-- IT Consulting -->
            <div class="service-card group">
                <div class="p-6">
                    <div class="service-icon bg-red-100 text-red-600 dark:bg-red-900/30 dark:text-red-400">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">IT Consulting</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">Expert technology consulting to help you make the right IT decisions for your business.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Technology Strategy</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Digital Transformation</span>
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>IT Infrastructure</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-flex items-center text-primary font-medium group-hover:text-primary-600 transition-colors">
                        Learn more <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-gradient-to-r from-primary to-secondary py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNTkgMzBMMzAgNjBMMSAzMFozMFoiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIi8+PC9zdmc+')] opacity-20"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Transform Your Business?</h2>
            <p class="text-xl text-white/90 mb-8">Let's work together to create something amazing. Get in touch with our team today to discuss your project.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-primary bg-white hover:bg-gray-100 transition-colors">
                    Get Started
                </a>
                <a href="{{ route('contact') }}#contact" class="inline-flex items-center justify-center px-8 py-3 border-2 border-white text-base font-medium rounded-md text-white hover:bg-white/10 transition-colors">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="inline-block text-primary font-medium mb-3">Testimonials</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">What Our Clients Say</h2>
            <p class="text-gray-600 dark:text-gray-300">Hear from businesses that have transformed their operations with our solutions.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400 text-xl">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-6">"Working with TechMorah was a game-changer for our business. Their web development team delivered beyond our expectations."</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-xl font-bold text-primary mr-4">SJ</div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Sarah Johnson</h4>
                        <p class="text-sm text-gray-500">CEO, TechCorp</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400 text-xl">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-6">"The mobile app they developed for us has significantly improved our customer engagement. Highly recommended!"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-xl font-bold text-primary mr-4">MC</div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Michael Chen</h4>
                        <p class="text-sm text-gray-500">Founder, AppVenture</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                <div class="flex items-center mb-4">
                    <div class="text-yellow-400 text-xl">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
                <p class="text-gray-600 dark:text-gray-300 mb-6">"Their digital marketing strategies have helped us reach new customers and grow our online presence dramatically."</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center text-xl font-bold text-primary mr-4">ER</div>
                    <div>
                        <h4 class="font-semibold text-gray-900 dark:text-white">Emily Rodriguez</h4>
                        <p class="text-sm text-gray-500">Marketing Director, BrandUp</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FAQ Section -->
<div class="py-16 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="inline-block text-primary font-medium mb-3">FAQs</span>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Frequently Asked Questions</h2>
            <p class="text-gray-600 dark:text-gray-300">Find answers to common questions about our services and processes.</p>
        </div>

        <div class="max-w-3xl mx-auto space-y-4">
            <!-- FAQ Item 1 -->
            <div x-data="{ open: false }" class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <span class="font-medium text-gray-900 dark:text-white">What services do you offer?</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-collapse class="px-6 py-4 text-gray-600 dark:text-gray-300">
                    We offer a wide range of services including web development, mobile app development, UI/UX design, digital marketing, cloud solutions, and IT consulting. Our team of experts works closely with clients to deliver customized solutions that meet their specific business needs.
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div x-data="{ open: false }" class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <span class="font-medium text-gray-900 dark:text-white">How long does a typical project take?</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-collapse class="px-6 py-4 text-gray-600 dark:text-gray-300">
                    The timeline for each project varies depending on the scope and complexity. A simple website might take 4-6 weeks, while a complex web application could take several months. During our initial consultation, we'll provide you with a detailed project timeline based on your specific requirements.
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div x-data="{ open: false }" class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <span class="font-medium text-gray-900 dark:text-white">What is your pricing model?</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-collapse class="px-6 py-4 text-gray-600 dark:text-gray-300">
                    We offer flexible pricing models to suit different project needs, including fixed-price projects, time and materials, and dedicated team models. The cost depends on the project scope, complexity, and timeline. Contact us for a free consultation and a tailored quote.
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div x-data="{ open: false }" class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                <button @click="open = !open" class="w-full px-6 py-4 text-left flex justify-between items-center bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                    <span class="font-medium text-gray-900 dark:text-white">Do you provide ongoing support after launch?</span>
                    <svg :class="{ 'rotate-180': open }" class="w-5 h-5 text-gray-500 transform transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="open" x-collapse class="px-6 py-4 text-gray-600 dark:text-gray-300">
                    Yes, we offer comprehensive post-launch support and maintenance services. Our support packages include regular updates, security patches, performance optimization, and 24/7 monitoring. We also provide training and documentation to help your team manage the solution effectively.
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Final CTA -->
<div class="bg-gray-900 py-16 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNTkgMzBMMzAgNjBMMSAzMFozMFoiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIi8+PC9zdmc+')] opacity-20"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Start Your Project?</h2>
            <p class="text-xl text-gray-300 mb-8">Let's discuss how we can help you achieve your business goals with our expert IT solutions.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-100 transition-colors">
                    Get a Free Quote
                </a>
                <a href="tel:+1234567890" class="inline-flex items-center justify-center px-8 py-3 border-2 border-white text-base font-medium rounded-md text-white hover:bg-white/10 transition-colors">
                    <i class="fas fa-phone-alt mr-2"></i> Call Us Now
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Initialize Alpine.js components
    document.addEventListener('alpine:init', () => {
        // Any Alpine.js initialization code can go here
    });
</script>
@endpush

@endsection
                        <a href="{{ route('contact') }}" class="w-full text-center block px-4 py-2 bg-gradient-to-r from-green-500 to-teal-500 text-white rounded-lg hover:opacity-90 transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>

            <!-- Computerized Accounting -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-card">
                    <div class="p-2 bg-gradient-to-r from-red-500 to-orange-500 h-1"></div>
                    <div class="p-6 flex-grow">
                        <div class="service-icon bg-red-50 dark:bg-red-900/20 text-red-500">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Computerized Accounting</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">Streamline your financial operations with our professional accounting solutions.</p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-gray-600 dark:text-gray-400">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Bookkeeping</span>
                            </li>
                            <li class="flex items-center text-gray-600 dark:text-gray-400">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Financial Reporting</span>
                            </li>
                            <li class="flex items-center text-gray-600 dark:text-gray-400">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Tax Preparation</span>
                            </li>
                        </ul>
                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-gray-700/30">
                        <a href="{{ route('contact') }}" class="w-full text-center block px-4 py-2 bg-gradient-to-r from-red-500 to-orange-500 text-white rounded-lg hover:opacity-90 transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>

            <!-- Computer Accessories -->
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-card">
                    <div class="p-2 bg-gradient-to-r from-amber-500 to-yellow-500 h-1"></div>
                    <div class="p-6 flex-grow">
                        <div class="service-icon bg-amber-50 dark:bg-amber-900/20 text-amber-500">
                            <i class="fas fa-keyboard"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">Computer Accessories</h3>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">High-quality computer hardware and accessories from leading brands.</p>
                        <ul class="space-y-2 mb-6">
                            <li class="flex items-center text-gray-600 dark:text-gray-400">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Keyboards & Mice</span>
                            </li>
                            <li class="flex items-center text-gray-600 dark:text-gray-400">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Monitors & Displays</span>
                            </li>
                            <li class="flex items-center text-gray-600 dark:text-gray-400">
                                <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                <span>Networking Equipment</span>
                            </li>
                        </ul>
                    </div>
                    <div class="p-4 bg-gray-50 dark:bg-gray-700/30">
                        <a href="{{ route('contact') }}" class="w-full text-center block px-4 py-2 bg-gradient-to-r from-amber-500 to-yellow-500 text-white rounded-lg hover:opacity-90 transition-all duration-300">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Services End -->

<!-- CTA Section -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-700 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-white mb-6">Ready to Start Your Project?</h2>
            <p class="text-blue-100 text-lg mb-8">Get in touch with us today and let's discuss how we can help your business grow.</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center px-8 py-3 bg-white text-blue-600 font-medium rounded-full hover:bg-blue-50 transition-colors duration-300">
                Contact Us
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</div>

<!-- Testimonial Start -->
<div class="container-xxl py-16">
    <div class="container">
        <div class="text-center mx-auto mb-12 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">// Testimonials //</h6>
            <h1 class="display-6 mb-4">What Our Clients Say</h1>
            <p class="text-gray-600 dark:text-gray-400">Don't just take our word for it. Here's what our clients have to say about working with us.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 h-full shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <img class="w-12 h-12 rounded-full object-cover mr-4" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">John Smith</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">CEO, Tech Solutions Inc.</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 italic">"The team at TECHMORAH transformed our online presence completely. Their web development services are top-notch!"</p>
                    <div class="flex mt-4 text-amber-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 h-full shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <img class="w-12 h-12 rounded-full object-cover mr-4" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Sarah Johnson</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Marketing Director, Bright Ideas</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 italic">"Their IT support team is incredibly responsive and knowledgeable. They've been an invaluable partner for our business."</p>
                    <div class="flex mt-4 text-amber-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 wow fadeInUp mx-auto" data-wow-delay="0.3s">
                <div class="bg-white dark:bg-gray-800 rounded-xl p-6 h-full shadow-sm hover:shadow-md transition-all">
                    <div class="flex items-center mb-4">
                        <img class="w-12 h-12 rounded-full object-cover mr-4" src="https://randomuser.me/api/portraits/men/75.jpg" alt="Client">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Michael Brown</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Owner, Brown & Co.</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300 italic">"The accounting software they implemented has saved us countless hours of manual work. Highly recommended!"</p>
                    <div class="flex mt-4 text-amber-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

@push('scripts')
<script>
    // Initialize WOW.js
    new WOW().init();
</script>
@endpush

@endsection
