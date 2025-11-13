@extends('layouts.app')

@section('title', 'Welcome to TECHMORAH - AI & IT Solutions Agency')

@push('styles')
<style>
    .floating-buttons {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    
    .floating-btn {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }
    
    .floating-btn:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.3);
    }
    
    .whatsapp-btn {
        background-color: #25D366;
    }
    
    .call-btn {
        background-color: #007bff;
    }
    
    .ai-chat-btn {
        background-color: #6f42c1;
    }
    
    .ai-chat-container {
        position: fixed;
        bottom: 100px;
        right: 30px;
        width: 350px;
        height: 500px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        z-index: 1001;
        display: none;
        flex-direction: column;
        overflow: hidden;
    }
    
    .chat-header {
        background: #6f42c1;
        color: white;
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .chat-messages {
        flex: 1;
        padding: 15px;
        overflow-y: auto;
    }
    
    .chat-input {
        padding: 15px;
        border-top: 1px solid #eee;
        display: flex;
        gap: 10px;
    }
    
    .chat-input input {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 20px;
        outline: none;
    }
    
    .chat-input button {
        background: #6f42c1;
        color: white;
        border: none;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    
    .message {
        margin-bottom: 15px;
        max-width: 80%;
    }
    
    .bot-message {
        align-self: flex-start;
        background: #f1f1f1;
        padding: 10px 15px;
        border-radius: 15px 15px 15px 5px;
    }
    
    .user-message {
        align-self: flex-end;
        background: #6f42c1;
        color: white;
        padding: 10px 15px;
        border-radius: 15px 15px 5px 15px;
        margin-left: auto;
    }
    
    /* Typing indicator */
    .typing-indicator {
        display: flex;
        gap: 5px;
        padding: 10px 15px;
        width: fit-content;
    }
    
    .typing-indicator span {
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background-color: #888;
        animation: typing 1s infinite ease-in-out;
    }
    
    .typing-indicator span:nth-child(2) {
        animation-delay: 0.2s;
    }
    
    .typing-indicator span:nth-child(3) {
        animation-delay: 0.4s;
    }
    
    @keyframes typing {
        0%, 60%, 100% { transform: translateY(0); }
        30% { transform: translateY(-5px); }
    }
</style>
@endpush

@section('content')

<!-- Hero Section -->
<div class="container-fluid px-0 position-relative">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/carousel-1.jpg') }}" class="w-100" alt="AI Solutions">
                <div class="carousel-caption d-flex flex-column justify-content-center">
                    <h1 class="display-4 fw-bold text-white animated fadeInDown">Innovative AI & IT Solutions</h1>
                    <p class="lead text-white animated fadeInUp">Empower your business with smart automation and seamless digital tools.</p>
                    <a href="{{ route('services') }}" class="btn btn-secondary rounded-pill px-4 py-2 mt-3">Explore Services</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/carousel-2.jpg') }}" class="w-100" alt="Tech Development">
                <div class="carousel-caption d-flex flex-column justify-content-center">
                    <h1 class="display-4 fw-bold text-white animated fadeInDown">Custom Software & Cloud Systems</h1>
                    <p class="lead text-white animated fadeInUp">We build scalable, secure, and efficient digital ecosystems for your success.</p>
                    <a href="{{ route('contact') }}" class="btn btn-secondary rounded-pill px-4 py-2 mt-3">Get In Touch</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- About -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h5 class="text-primary mb-2">Who We Are</h5>
        <h2 class="fw-bold mb-4">Empowering Businesses through Smart Technology</h2>
        <p class="text-muted mx-auto" style="max-width:700px;">
            At TECHMORAH, we combine AI, cloud, and modern software to drive innovation, efficiency, and growth. From small startups to enterprises — we help you scale intelligently.
        </p>
        <a href="{{ route('about') }}" class="btn btn-primary rounded-pill mt-3 px-4 py-2">Learn More</a>
    </div>
</section>

<!-- Services -->
<section class="py-12 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="text-center mb-10">
            <span class="inline-block px-3 py-1 text-xs font-semibold text-orange-600 dark:text-orange-400 uppercase tracking-wider mb-3">Our Expertise</span>
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-3">IT Solutions</h2>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto text-sm">Tailored technology solutions for your business needs.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Web Design & Development -->
            <div class="group bg-white dark:bg-gray-800 rounded-lg border border-gray-100 dark:border-gray-700 hover:border-orange-300 dark:hover:border-orange-700 transition-colors duration-300 h-full flex flex-col">
                <div class="p-6 flex-1 flex flex-col">
                    <div class="w-12 h-12 bg-orange-50 dark:bg-orange-900/20 rounded-lg flex items-center justify-center mb-4 text-orange-500">
                        <i class="fas fa-laptop-code text-2xl text-orange-500"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Web Design & Development</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">Custom, responsive websites that deliver exceptional user experiences and drive business growth. From sleek portfolios to powerful e-commerce platforms.</p>
                    <ul class="space-y-2 text-sm text-gray-500 dark:text-gray-400 mt-auto pt-3 border-t border-gray-100 dark:border-gray-700">
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> Responsive Design</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> E-commerce Solutions</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> CMS Integration</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- System Design & Development -->
            <div class="group relative bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl transition-all duration-500 overflow-hidden hover:-translate-y-2">
                <div class="p-2 bg-gradient-to-r from-blue-500 to-cyan-500 h-1"></div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="w-12 h-12 bg-blue-50 dark:bg-blue-900/20 rounded-lg flex items-center justify-center mb-4 text-blue-500">
                        <i class="fas fa-server text-2xl text-blue-500"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">System Design & Development</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">Robust and scalable system architectures tailored to your business needs. We build custom software solutions that streamline operations and boost efficiency.</p>
                    <ul class="space-y-2 text-sm text-gray-500 dark:text-gray-400 mt-auto pt-3 border-t border-gray-100 dark:border-gray-700">
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> Custom Software</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> API Development</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> System Integration</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- UI/UX Design -->
            <div class="group relative bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl transition-all duration-500 overflow-hidden hover:-translate-y-2">
                <div class="p-2 bg-gradient-to-r from-purple-500 to-pink-500 h-1"></div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="w-12 h-12 bg-purple-50 dark:bg-purple-900/20 rounded-lg flex items-center justify-center mb-4 text-purple-500">
                        <i class="fas fa-paint-brush text-2xl text-purple-500"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">UI/UX Design</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">Intuitive and visually stunning interfaces that enhance user engagement and drive conversions. We focus on creating seamless user journeys.</p>
                    <ul class="space-y-2 text-sm text-gray-500 dark:text-gray-400 mt-auto pt-3 border-t border-gray-100 dark:border-gray-700">
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> User Research</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> Wireframing & Prototyping</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> Usability Testing</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- IT Support Services -->
            <div class="group relative bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl transition-all duration-500 overflow-hidden hover:-translate-y-2">
                <div class="p-2 bg-gradient-to-r from-green-500 to-teal-500 h-1"></div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="w-12 h-12 bg-green-50 dark:bg-green-900/20 rounded-lg flex items-center justify-center mb-4 text-green-500">
                        <i class="fas fa-headset text-2xl text-green-500"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">IT Support Services</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">Comprehensive IT support to keep your business running smoothly. From troubleshooting to system maintenance, we've got you covered.</p>
                    <ul class="space-y-2 text-sm text-gray-500 dark:text-gray-400 mt-auto pt-3 border-t border-gray-100 dark:border-gray-700">
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> 24/7 Technical Support</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> Network Management</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> System Maintenance</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Computerized Accounting -->
            <div class="group relative bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl transition-all duration-500 overflow-hidden hover:-translate-y-2">
                <div class="p-2 bg-gradient-to-r from-red-500 to-orange-500 h-1"></div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="w-12 h-12 bg-red-50 dark:bg-red-900/20 rounded-lg flex items-center justify-center mb-4 text-red-500">
                        <i class="fas fa-calculator text-2xl text-red-500"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Computerized Accounting</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">Streamline your financial operations with our professional accounting software solutions and bookkeeping services.</p>
                    <ul class="space-y-2 text-sm text-gray-500 dark:text-gray-400 mt-auto pt-3 border-t border-gray-100 dark:border-gray-700">
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> Bookkeeping</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> Financial Reporting</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> Tax Preparation</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Computer Accessories Sales -->
            <div class="group relative bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-xl transition-all duration-500 overflow-hidden hover:-translate-y-2">
                <div class="p-2 bg-gradient-to-r from-amber-500 to-yellow-500 h-1"></div>
                <div class="p-6 flex-1 flex flex-col">
                    <div class="w-12 h-12 bg-amber-50 dark:bg-amber-900/20 rounded-lg flex items-center justify-center mb-4 text-amber-500">
                        <i class="fas fa-keyboard text-2xl text-amber-500"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Computer Accessories</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 leading-relaxed">High-quality computer accessories and peripherals to enhance your computing experience. We offer top brands at competitive prices.</p>
                    <ul class="space-y-2 text-sm text-gray-500 dark:text-gray-400 mt-auto pt-3 border-t border-gray-100 dark:border-gray-700">
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> Keyboards & Mice</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> Monitors & Displays</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="h-4 w-4 text-green-500 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-gray-600 dark:text-gray-300"> Networking Equipment</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Ready to elevate your business?</h2>
        <p class="mb-4">Let’s discuss how TECHMORAH can transform your digital strategy.</p>
        <a href="{{ route('contact') }}" class="btn btn-light rounded-pill px-5 py-3">Contact Us</a>
    </div>
</section>

<!-- Floating Action Buttons -->
<div class="floating-buttons">
    <button class="floating-btn ai-chat-btn" id="openChat">
        <i class="fas fa-robot"></i>
    </button>
    <a href="https://wa.me/255655139724" class="floating-btn whatsapp-btn" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>
    <a href="tel:+255655139724" class="floating-btn call-btn">
        <i class="fas fa-phone"></i>
    </a>
</div>

<!-- AI Chat Container -->
<div class="ai-chat-container" id="chatContainer" style="display: none;">
    <div class="chat-header">
        <h6 class="mb-0">AI Assistant</h6>
        <button id="closeChat" style="background: none; border: none; color: white; font-size: 20px; cursor: pointer;">
            &times;
        </button>
    </div>
    <div class="chat-messages d-flex flex-column" id="chatMessages">
        <div class="message bot-message">
            Hello! I'm your AI assistant. How can I help you today?
        </div>
    </div>
    <form id="chatForm" class="chat-input">
        <input type="text" id="userInput" placeholder="Type your message..." autocomplete="off">
        <button type="submit">
            <i class="fas fa-paper-plane"></i>
        </button>
    </form>
</div>

@push('scripts')
<script src="https://kit.fontawesome.com/your-code.js" crossorigin="anonymous"></script>
<script>
    // Ensure CSRF token is available
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize CSRF token
        window.csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        
        // Initialize chat functionality
        initChat();
    });

    function initChat() {
        // Toggle chat window
        const openChatBtn = document.getElementById('openChat');
        const closeChatBtn = document.getElementById('closeChat');
        const chatContainer = document.getElementById('chatContainer');
        const chatForm = document.getElementById('chatForm');
        const userInput = document.getElementById('userInput');
        
        if (openChatBtn) {
            openChatBtn.addEventListener('click', function() {
                chatContainer.style.display = chatContainer.style.display === 'flex' ? 'none' : 'flex';
                if (chatContainer.style.display === 'flex') {
                    userInput.focus();
                }
            });
        }
        
        if (closeChatBtn) {
            closeChatBtn.addEventListener('click', function() {
                chatContainer.style.display = 'none';
            });
        }
        
        // Handle form submission
        if (chatForm) {
            chatForm.addEventListener('submit', function(e) {
                e.preventDefault();
                sendMessage();
            });
        }
        
        // Handle Enter key in input
        if (userInput) {
            userInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });
        }
    }
    
    // Handle sending messages
    async function sendMessage() {
        const userInput = document.getElementById('userInput');
        const message = userInput.value.trim();
        
        if (message === '') return;
        
        // Disable input while sending
        userInput.disabled = true;
        
        // Add user message to chat
        addMessage(message, 'user');
        userInput.value = '';
        
        // Show typing indicator
        const typingIndicator = addTypingIndicator();
        
        try {
            const response = await fetch('{{ route('ai.chat') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': window.csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ message: message })
            });
            
            const data = await response.json();
            
            // Remove typing indicator
            typingIndicator.remove();
            
            if (data.response) {
                addMessage(data.response, 'bot');
            } else if (data.error) {
                console.error('AI Error:', data.error);
                addMessage('I apologize, but I encountered an error. Please try again in a moment.', 'bot');
            }
        } catch (error) {
            console.error('Network Error:', error);
            typingIndicator.remove();
            addMessage('I\'m having trouble connecting to the server. Please check your internet connection and try again.', 'bot');
        } finally {
            // Re-enable input
            userInput.disabled = false;
            userInput.focus();
        }
    }
    
    // Add typing indicator
    function addTypingIndicator() {
        const messagesContainer = document.getElementById('chatMessages');
        if (!messagesContainer) return null;
        
        const typingDiv = document.createElement('div');
        typingDiv.className = 'message bot-message typing-indicator';
        typingDiv.innerHTML = '<span></span><span></span><span></span>';
        messagesContainer.appendChild(typingDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        return typingDiv;
    }
    
    function addMessage(text, sender) {
        const messagesContainer = document.getElementById('chatMessages');
        if (!messagesContainer) return;
        
        const messageDiv = document.createElement('div');
        messageDiv.className = `message ${sender}-message`;
        messageDiv.textContent = text;
        messagesContainer.appendChild(messageDiv);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }
</script>
@endpush

@endsection
