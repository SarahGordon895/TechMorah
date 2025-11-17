@extends('layouts.app')

@section('title', 'Blog - ' . config('app.name'))
@section('keywords', 'TechMorah blog, AI updates, IT news, digital insights')
@section('description', 'Discover TechMorah Solution Limited blog stories covering AI, IT strategy, and modern digital transformation trends.')

@push('styles')
<style>
    .blog-page .page-header { background: linear-gradient(120deg,#0a0a0a,#1a1a1a); position:relative; }
    .blog-page .page-header::after { content:''; position:absolute; inset:0; background:radial-gradient(circle at top,rgba(21,255,153,.2),rgba(0,0,0,.9)); }
    .blog-page .page-header > .container { position:relative; z-index:1; }
    .blog-page .stat-card { border-radius:1rem; background:rgba(0,0,0,.25); border:1px solid rgba(255,255,255,.08); }
    .blog-page .blog-item { transition:transform .3s ease, box-shadow .3s ease; border-radius:1.25rem; overflow:hidden; }
    .blog-page .blog-item:hover { transform:translateY(-6px); box-shadow:0 25px 70px rgba(0,0,0,.25); }
    .blog-page .blog-btn-icon { transition:background .3s ease; }
    .blog-page .tag-cloud a { border-radius:999px; border:1px solid rgba(255,255,255,.15); padding:.45rem 1.25rem; }
</style>
@endpush

@section('content')
<div class="blog-page">
    <!-- Hero -->
    <div class="container-fluid page-header py-5">
        <div class="container text-center py-5">
            <h1 class="display-2 text-white mb-4">Our Blog</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item text-white-50">Pages</li>
                    <li class="breadcrumb-item active text-white">Blog</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Stats strip -->
    <div class="container-fluid bg-secondary py-5">
        <div class="container">
            <div class="row g-4 text-white">
                @foreach($stats as $stat)
                    <div class="col-6 col-lg-3">
                        <div class="d-flex stat-card p-4">
                            <h1 class="me-3 text-primary">{{ $stat['value'] }}</h1>
                            <h5 class="mb-0">{{ $stat['label'] }}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <!-- Tag cloud / newsletter CTA -->
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="bg-dark text-white rounded-4 p-5">
                    <h2 class="mb-3">Subscribe for TechMorah updates</h2>
                    <p class="text-white-50">Actionable playbooks, behind-the-scenes engineering write-ups, and growth tactics. No spam.</p>
                    <form class="row g-3 align-items-center">
                        <div class="col-sm">
                            <input type="email" class="form-control form-control-lg" placeholder="Email address" required>
                        </div>
                        <div class="col-sm-auto">
                            <button class="btn btn-secondary btn-lg" type="submit">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bg-light rounded-4 p-4 h-100">
                    <h4 class="mb-4">Popular Tags</h4>
                    <div class="tag-cloud d-flex flex-wrap gap-2">
                        @foreach($tags as $tag)
                            <a href="#" class="text-dark text-decoration-none">#{{ $tag }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TechMorah Solution Stories -->
    <div class="container pb-5">
        <div class="text-center mx-auto pb-4" style="max-width:700px;">
            <h5 class="text-primary text-uppercase">Solution Stories</h5>
            <h2 class="mb-3">TechMorah inside real client launches</h2>
            <p class="text-muted">Snapshots pulled from the systems we already built for Tanzanian businesses—each wired the same way we’ll ship for you.</p>
        </div>
        <div class="row g-4">
            @foreach($solutionStories as $story)
                <div class="col-md-6 col-xl-3">
                    <div class="h-100 border rounded-4 overflow-hidden d-flex flex-column">
                        <div class="ratio ratio-4x3 bg-light">
                            <img src="{{ $story['image'] }}" class="w-100 h-100 object-fit-cover" alt="{{ $story['client'] }}">
                        </div>
                        <div class="p-4 d-flex flex-column flex-grow-1">
                            <span class="badge bg-secondary text-uppercase small mb-2">{{ $story['industry'] }}</span>
                            <h5 class="fw-semibold">{{ $story['client'] }}</h5>
                            <p class="text-muted small mb-1"><strong>Challenge:</strong> {{ $story['challenge'] }}</p>
                            <p class="text-muted small mb-1"><strong>Solution:</strong> {{ $story['solution'] }}</p>
                            <p class="text-muted small mb-3"><strong>Outcome:</strong> {{ $story['outcome'] }}</p>
                            <div class="d-flex flex-wrap gap-2 mb-3">
                                @foreach($story['services'] as $service)
                                    <span class="badge bg-dark text-white">{{ $service }}</span>
                                @endforeach
                            </div>
                            <div class="mt-auto">
                                <a href="{{ $story['cta_url'] }}" class="text-primary fw-semibold">Continue the story &rarr;</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Service Spotlight -->
    <div class="container pb-5">
        <div class="row g-4">
            @foreach($serviceSpotlights as $spotlight)
                <div class="col-md-4">
                    <div class="p-4 h-100 border rounded-4">
                        <h5 class="text-primary">{{ $spotlight['title'] }}</h5>
                        <p class="text-muted mb-3">{{ $spotlight['description'] }}</p>
                        <a href="{{ $spotlight['link'] }}" class="text-primary fw-semibold">{{ $spotlight['label'] }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- CTA -->
    <div class="bg-primary py-5">
        <div class="container text-center text-white">
            <h2 class="mb-3">Ready to Transform Your Business?</h2>
            <p class="mb-4 text-white-75">Talk to TechMorah Solution Limited experts about AI, cloud, and digital experiences tailored to East Africa & beyond.</p>
            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                <a href="{{ route('contact') }}" class="btn btn-light text-primary px-4 py-2">Contact Us</a>
                <a href="{{ route('services') }}" class="btn btn-outline-light px-4 py-2">View Services</a>
            </div>
        </div>
    </div>
</div>
@endsection
