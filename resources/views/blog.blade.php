@extends('layouts.app')

@section('title', 'Case Studies — TechMorah Solution LTD')
@section('keywords', 'TechMorah case studies, Victoria Lush, LipaPay, Active Targets, fintech Tanzania')
@section('description', 'Selected TechMorah delivery evidence — enterprise SMS, payments, e-commerce, and operations systems with honest attribution.')

@section('content')

<section class="tm-page-hero page-header">
    <div class="container text-center">
        <p class="tm-section-label" style="color:var(--copper-soft)">Delivery evidence</p>
        <h1 class="tm-title" style="color:#fff;font-size:clamp(2rem,5vw,2.8rem)">Case studies</h1>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;color:rgba(255,255,255,0.7)">
            Production systems and capability evidence — labelled by delivery context. Founder employment work is not claimed as a TechMorah contract unless TechMorah was formally engaged.
        </p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Case Studies</li>
            </ol>
        </nav>
    </div>
</section>

<section class="tm-trust">
    <div class="container">
        <div class="tm-trust__grid">
            @foreach ($stats as $stat)
            <div class="tm-reveal">
                <p class="tm-trust__value">{{ $stat['value'] }}</p>
                <p class="tm-trust__label">{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="tm-section">
    <div class="container">
        <div class="tm-header text-center mx-auto" style="max-width:640px;margin-left:auto;margin-right:auto;">
            <p class="tm-section-label">Selected work</p>
            <h2 class="tm-title">Systems shipped in production</h2>
            <p class="tm-lead">Challenge, solution, and outcome — the same stack clients see on the founder portfolio.</p>
        </div>
        <div class="tm-grid tm-grid--2">
            @foreach ($solutionStories as $i => $story)
            <article class="tm-case tm-reveal" @if($i % 2) data-delay="1" @endif>
                <div class="tm-case__media">
                    <img src="{{ $story['image'] }}" alt="{{ $story['client'] }}" loading="lazy" decoding="async">
                </div>
                <div class="tm-case__body">
                    <span class="tm-badge">{{ $story['industry'] }}</span>
                    <h3 class="tm-case__title">{{ $story['client'] }}</h3>
                    <dl class="tm-case__meta">
                        <div><dt>Challenge</dt><dd>{{ $story['challenge'] }}</dd></div>
                        <div><dt>Solution</dt><dd>{{ $story['solution'] }}</dd></div>
                        <div><dt>Outcome</dt><dd>{{ $story['outcome'] }}</dd></div>
                    </dl>
                    <div class="tm-case__tags">
                        @foreach ($story['services'] as $service)
                        <span class="tm-stack-badge">{{ $service }}</span>
                        @endforeach
                    </div>
                    <div class="tm-case__actions">
                        @if (!empty($story['portfolio_url']))
                        <a href="{{ $story['portfolio_url'] }}" target="_blank" rel="noopener" class="btn btn-outline-secondary">Portfolio</a>
                        @endif
                        <a href="{{ $story['cta_url'] }}" class="btn btn-secondary">Start similar work</a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>

<section class="tm-section tm-section--navy text-center">
    <div class="container">
        <h2 class="tm-title">Need a system like one of these?</h2>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;">Share your scope — we reply with clear next steps.</p>
        <a href="{{ route('contact') }}" class="btn btn-light me-2 mb-2">Contact us</a>
        <a href="{{ route('services') }}" class="btn btn-outline-light mb-2">View services</a>
    </div>
</section>

@endsection
