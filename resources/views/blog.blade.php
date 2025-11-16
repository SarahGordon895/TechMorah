@extends('layouts.app')

@section('title', 'Blog - ' . config('app.name'))

@push('styles')
<style>
    .blog-card {
        @apply bg-white dark:bg-gray-800 rounded-xl shadow-sm hover:shadow-xl transition-all duration-500 overflow-hidden h-full flex flex-col;
        border: 1px solid rgba(0,0,0,0.05);
    }
    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.1);
    }
    .blog-category {
        @apply absolute top-4 right-4 px-4 py-1.5 bg-gradient-to-r from-primary to-secondary text-white rounded-full text-xs font-semibold tracking-wide uppercase shadow-md;
        z-index: 2;
    }
    .blog-image {
        @apply w-full h-48 md:h-56 bg-gray-100 dark:bg-gray-700 relative overflow-hidden;
    }
    .blog-image img {
        @apply w-full h-full object-cover transition-transform duration-700 group-hover:scale-110;
    }
    .blog-content {
        @apply p-6 flex-1 flex flex-col;
    }
    .blog-title {
        @apply text-xl font-bold text-gray-900 dark:text-white mb-3 hover:text-primary dark:hover:text-secondary transition-colors duration-300;
    }
    .blog-excerpt {
        @apply text-gray-600 dark:text-gray-300 mb-4 line-clamp-3;
    }
    .blog-meta {
        @apply flex items-center text-xs text-gray-500 dark:text-gray-400 space-x-3 mt-auto pt-4 border-t border-gray-100 dark:border-gray-700;
    }
    .blog-footer {
        @apply mt-4 pt-4 border-t border-gray-100 dark:border-gray-700 flex justify-between items-center;
    }
    .read-more {
        @apply inline-flex items-center text-primary dark:text-secondary font-medium hover:underline;
    }
    .pagination .page-link {
        @apply px-4 py-2 mx-1 rounded-md transition-all duration-300;
    }
    .pagination .page-item.active .page-link {
        @apply bg-gradient-to-r from-primary to-secondary text-white;
    }
    .pagination .page-item:not(.active) .page-link {
        @apply bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-primary to-secondary py-24 md:py-32 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHZpZXdCb3g9IjAgMCA2MCA2MCIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48cGF0aCBkPSJNNTkgMzBMMzAgNjBMMSAzMFozMFoiIGZpbGw9IiNmZmYiIGZpbGwtb3BhY2l0eT0iMC4xIi8+PC9zdmc+')] opacity-20"></div>
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">Our Latest <span class="text-secondary">Insights</span></h1>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">Stay updated with the latest trends, news, and insights in technology and digital transformation.</p>
            
            <!-- Search Bar -->
            <div class="max-w-xl mx-auto relative">
                <input type="text" placeholder="Search articles..." class="w-full px-6 py-4 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-300">
                <button class="absolute right-2 top-1/2 -translate-y-1/2 bg-gradient-to-r from-secondary to-primary text-white p-3 rounded-full hover:opacity-90 transition-opacity">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Stats Section -->
<div class="bg-white dark:bg-gray-900 py-12 border-b border-gray-100 dark:border-gray-800">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center p-6 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300">
                <div class="text-4xl font-bold text-primary mb-2">99%</div>
                <p class="text-gray-600 dark:text-gray-300 font-medium">Client Satisfaction</p>
            </div>
            <div class="text-center p-6 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300">
                <div class="text-4xl font-bold text-primary mb-2">150+</div>
                <p class="text-gray-600 dark:text-gray-300 font-medium">Projects Completed</p>
            </div>
            <div class="text-center p-6 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300">
                <div class="text-4xl font-bold text-primary mb-2">50+</div>
                <p class="text-gray-600 dark:text-gray-300 font-medium">Expert Team Members</p>
            </div>
            <div class="text-center p-6 bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300">
                <div class="text-4xl font-bold text-primary mb-2">24/7</div>
                <p class="text-gray-600 dark:text-gray-300 font-medium">Support Available</p>
            </div>
        </div>
    </div>
</div>

<!-- Blog Posts -->
<div class="py-16 bg-white dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <!-- Category Filter -->
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button class="px-5 py-2 rounded-full bg-gradient-to-r from-primary to-secondary text-white font-medium text-sm">All Posts</button>
            <button class="px-5 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 font-medium text-sm transition-colors">Technology</button>
            <button class="px-5 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 font-medium text-sm transition-colors">AI & ML</button>
            <button class="px-5 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 font-medium text-sm transition-colors">Web Development</button>
            <button class="px-5 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 font-medium text-sm transition-colors">Mobile Apps</button>
        </div>

        <!-- Featured Post -->
        <div class="row mb-16">
            <div class="col-md-6">
                <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1472&q=80" 
                     alt="Featured Post" 
                     class="w-full h-full object-cover">
            </div>
            <div class="col-md-6">
                <div class="uppercase tracking-wide text-sm text-primary font-semibold mb-2">Featured</div>
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4 hover:text-primary dark:hover:text-secondary transition-colors">
                    <a href="#">The Future of AI in Modern Web Development</a>
                </h2>
                <p class="text-gray-600 dark:text-gray-300 mb-6">
                    Discover how artificial intelligence is revolutionizing the way we build and interact with web applications. Learn about the latest trends and tools that are shaping the future of web development.
                </p>
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg" alt="Author">
                             alt="Featured Post" 
                             class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    </div>
                </div>
                <div class="p-8 md:p-10">
                    <div class="uppercase tracking-wide text-sm text-primary font-semibold mb-2">Featured</div>
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-4 hover:text-primary dark:hover:text-secondary transition-colors">
                        <a href="#">The Future of AI in Modern Web Development</a>
                    </h2>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Discover how artificial intelligence is revolutionizing the way we build and interact with web applications. Learn about the latest trends and tools that are shaping the future of web development.
                    </p>
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg" alt="Author">
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900 dark:text-white">John Doe</p>
                            <div class="flex space-x-1 text-sm text-gray-500 dark:text-gray-400">
                                <time datetime="2023-05-16">May 16, 2023</time>
                                <span aria-hidden="true">&middot;</span>
                                <span>10 min read</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Latest Articles</h2>
            <div class="w-20 h-1 bg-gradient-to-r from-primary to-secondary mx-auto mb-6"></div>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Explore our collection of articles, tutorials, and insights on the latest in technology and digital transformation.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Blog Post 1 -->
            <article class="blog-card group">
                <div class="blog-image group">
                    <img src="{{ asset('images/blog-1.jpg') }}" alt="Web Development Trends 2023" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                         class="w-full h-full object-cover">
                    <span class="blog-category">Web Dev</span>
                </div>
                <div class="blog-content">
                    <div class="flex items-center mb-3">
                        <span class="text-xs font-medium text-primary bg-primary/10 px-3 py-1 rounded-full">Technology</span>
                        <span class="mx-2 text-gray-300">•</span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">May 15, 2023</span>
                    </div>
                    <h3 class="blog-title">
                        <a href="#">Top 10 Web Development Trends to Watch in 2023</a>
                    </h3>
                    <p class="blog-excerpt">
                        Discover the most impactful web development trends that are shaping the digital landscape this year and how they can benefit your business.
                    </p>
                    <div class="blog-meta">
                        <div class="flex items-center">
                            <img class="w-6 h-6 rounded-full mr-2" src="https://randomuser.me/api/portraits/women/44.jpg" alt="Author">
                            <span class="text-xs">Sarah Johnson</span>
                        </div>
                        <span class="text-xs">8 min read</span>
                    </div>
                </div>
            </article>

            <!-- Blog Post 2 -->
            <article class="blog-card group">
                <div class="blog-image group">
                    <img src="https://images.unsplash.com/photo-1677442135136-760c813263f8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" 
                         alt="AI Revolution" 
                         class="w-full h-full object-cover">
                    <span class="blog-category">AI/ML</span>
                </div>
                <div class="blog-content">
                    <div class="flex items-center mb-3">
                        <span class="text-xs font-medium text-blue-600 bg-blue-100 dark:bg-blue-900/30 px-3 py-1 rounded-full">AI & ML</span>
                        <span class="mx-2 text-gray-300">•</span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">June 2, 2023</span>
                    </div>
                    <h3 class="blog-title">
                        <a href="#">How AI is Transforming Business Operations in 2023</a>
                    </h3>
                    <p class="blog-excerpt">
                        Explore the latest advancements in artificial intelligence and how businesses are leveraging AI to streamline operations and enhance customer experiences.
                    </p>
                    <div class="blog-meta">
                        <div class="flex items-center">
                            <img class="w-6 h-6 rounded-full mr-2" src="https://randomuser.me/api/portraits/men/32.jpg" alt="Author">
                            <span class="text-xs">Michael Chen</span>
                        </div>
                        <span class="text-xs">12 min read</span>
                    </div>
                </div>
            </article>

            <!-- Blog Post 3 -->
            <article class="blog-card group">
                <div class="blog-image group">
                    <img src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                         alt="Mobile App Development" 
                         class="w-full h-full object-cover">
                    <span class="blog-category">Mobile</span>
                </div>
                <div class="blog-content">
                    <div class="flex items-center mb-3">
                        <span class="text-xs font-medium text-green-600 bg-green-100 dark:bg-green-900/30 px-3 py-1 rounded-full">Mobile</span>
                        <span class="mx-2 text-gray-300">•</span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">June 18, 2023</span>
                    </div>
                    <h3 class="blog-title">
                        <a href="#">The Ultimate Guide to Cross-Platform Mobile Development</a>
                    </h3>
                    <p class="blog-excerpt">
                        Compare the best cross-platform frameworks and learn how to choose the right one for your next mobile app project.
                    </p>
                    <div class="blog-meta">
                        <div class="flex items-center">
                            <img class="w-6 h-6 rounded-full mr-2" src="https://randomuser.me/api/portraits/women/68.jpg" alt="Author">
                            <span class="text-xs">Emily Rodriguez</span>
                        </div>
                        <span class="text-xs">15 min read</span>
                    </div>
                </div>
            </article>
        </div>

        <!-- Pagination -->
        <div class="mt-16 flex justify-center">
            <nav class="flex items-center space-x-2">
                <a href="#" class="px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <i class="fas fa-chevron-left text-xs"></i>
                </a>
                <a href="#" class="px-4 py-2 bg-gradient-to-r from-primary to-secondary text-white rounded-md">1</a>
                <a href="#" class="px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">2</a>
                <a href="#" class="px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">3</a>
                <span class="px-2 text-gray-500">...</span>
                <a href="#" class="px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">8</a>
                <a href="#" class="px-4 py-2 border border-gray-200 dark:border-gray-700 rounded-md text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <i class="fas fa-chevron-right text-xs"></i>
                </a>
            </nav>
        </div>
    </div>
</div>

<!-- Newsletter Section -->
<div class="bg-gradient-to-r from-primary to-secondary py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Subscribe to Our Newsletter</h2>
            <p class="text-white/90 mb-8 max-w-2xl mx-auto">Stay updated with our latest news, articles, and resources. No spam, we promise!</p>
            
            <form class="flex flex-col sm:flex-row gap-3 max-w-xl mx-auto">
                <input type="email" placeholder="Enter your email" class="flex-1 px-6 py-4 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white placeholder-white/70 focus:outline-none focus:ring-2 focus:ring-white focus:border-transparent transition-all duration-300">
                <button type="submit" class="px-8 py-4 bg-white text-primary font-semibold rounded-full hover:bg-gray-100 transition-colors">Subscribe</button>
            </form>
        </div>
    </div>
</div>

<!-- Popular Tags -->
<div class="py-16 bg-gray-50 dark:bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">Popular Tags</h2>
            <div class="w-20 h-1 bg-gradient-to-r from-primary to-secondary mx-auto mb-6"></div>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Browse our most popular topics and categories</p>
        </div>
        
        <div class="flex flex-wrap justify-center gap-3">
            <a href="#" class="px-5 py-2 bg-white dark:bg-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-primary hover:text-white dark:hover:bg-secondary transition-colors">#WebDevelopment</a>
            <a href="#" class="px-5 py-2 bg-white dark:bg-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-primary hover:text-white dark:hover:bg-secondary transition-colors">#AI</a>
            <a href="#" class="px-5 py-2 bg-white dark:bg-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-primary hover:text-white dark:hover:bg-secondary transition-colors">#MobileApps</a>
            <a href="#" class="px-5 py-2 bg-white dark:bg-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-primary hover:text-white dark:hover:bg-secondary transition-colors">#CloudComputing</a>
            <a href="#" class="px-5 py-2 bg-white dark:bg-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-primary hover:text-white dark:hover:bg-secondary transition-colors">#Cybersecurity</a>
            <a href="#" class="px-5 py-2 bg-white dark:bg-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-primary hover:text-white dark:hover:bg-secondary transition-colors">#UXDesign</a>
            <a href="#" class="px-5 py-2 bg-white dark:bg-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-primary hover:text-white dark:hover:bg-secondary transition-colors">#Blockchain</a>
            <a href="#" class="px-5 py-2 bg-white dark:bg-gray-700 rounded-full text-sm font-medium text-gray-700 dark:text-gray-200 hover:bg-primary hover:text-white dark:hover:bg-secondary transition-colors">#IoT</a>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Initialize animations
    document.addEventListener('DOMContentLoaded', function() {
        // Add animation to stats counters on scroll
        const animateOnScroll = () => {
            const stats = document.querySelectorAll('.stat-counter');
            stats.forEach(stat => {
                const rect = stat.getBoundingClientRect();
                if (rect.top < window.innerHeight - 50) {
                    stat.classList.add('animate-count');
                }
            });
        };

        window.addEventListener('scroll', animateOnScroll);
        animateOnScroll(); // Run once on load
    });
</script>
@endpush

@endsection
            <div class="blog-card group">
                <div class="relative overflow-hidden h-64">
                    <img src="{{ asset('images/blog-2.jpg') }}" alt="Cybersecurity Best Practices" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <span class="blog-category">Security</span>
                </div>
                <div class="blog-content">
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">Essential Cybersecurity Practices for Businesses</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Protect your business from cyber threats with these essential security practices.</p>
                    </div>
                    <div class="blog-footer">
                        <div class="blog-meta">
                            <span>June 10, 2023</span>
                        </div>
                        <a href="#" class="text-primary hover:text-secondary font-medium">Read More →</a>
                    </div>
                </div>
            </div>

            <!-- Blog Post 3 -->
            <div class="blog-card group">
                <div class="relative overflow-hidden h-64">
                    <img src="{{ asset('images/blog-3.jpg') }}" alt="Cloud Computing Benefits" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <span class="blog-category">Cloud</span>
                </div>
                <div class="blog-content">
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-3">Why Cloud Computing is Essential for Modern Businesses</h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">Discover how cloud computing can transform your business operations and drive growth.</p>
                    </div>
                    <div class="blog-footer">
                        <div class="blog-meta">
                            <span>June 5, 2023</span>
                        </div>
                        <a href="#" class="text-primary hover:text-secondary font-medium">Read More →</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            <nav class="flex items-center space-x-2">
                <a href="#" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                    Previous
                </a>
                <a href="#" class="px-4 py-2 border border-primary bg-primary text-white rounded-md hover:bg-primary-dark">
                    1
                </a>
                <a href="#" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                    2
                </a>
                <a href="#" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                    3
                </a>
                <a href="#" class="px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">
                    Next
                </a>
            </nav>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="bg-primary py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Ready to Transform Your Business?</h2>
        <p class="text-xl text-white/90 mb-8 max-w-3xl mx-auto">Get in touch with our experts to discuss how we can help you achieve your business goals with our innovative solutions.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('contact') }}" class="inline-block bg-white text-primary font-semibold px-8 py-3 rounded-lg hover:bg-gray-100 transition-colors">
                Contact Us
            </a>
            <a href="{{ route('services') }}" class="inline-block border-2 border-white text-white font-semibold px-8 py-3 rounded-lg hover:bg-white/10 transition-colors">
                Our Services
            </a>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Add any custom JavaScript for the blog page here
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize any blog-specific JavaScript
    });
</script>
@endpush
