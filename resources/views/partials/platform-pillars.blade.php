@php
    $pillars = config('product-solutions.pillars', []);
    $blend = config('product-solutions.blend', []);
@endphp
<section class="tm-section tm-section--navy" id="platform-stack">
    <div class="container">
        <div class="tm-header text-center mx-auto" style="max-width:760px;margin-left:auto;margin-right:auto;">
            <p class="tm-section-label">Platform stack</p>
            <h2 class="tm-title">Monitoring, profiling, and testing — built into delivery</h2>
            <p class="tm-lead">TechMorah supports the full operational layer around the systems we build: from live traffic metrics and deep code profiles to continuous observability and performance testing in CI/CD — across PHP, Python, Go, Node.js, Ruby, and Rust.</p>
        </div>
        @include('partials.delivery-loop')
        <div class="tm-pillar-stack" style="margin-top:36px;">
            @foreach ($pillars as $i => $pillar)
            <article class="tm-pillar tm-reveal" id="{{ $pillar['id'] }}" @if($i % 2) data-delay="1" @endif>
                <div class="tm-pillar__head">
                    <div class="tm-card__icon"><i class="{{ $pillar['icon'] }}"></i></div>
                    <h3>{{ $pillar['title'] }}</h3>
                </div>
                <p class="tm-pillar__lead">{{ $pillar['lead'] }}</p>
                <ul class="tm-feature-list tm-feature-list--light">
                    @foreach ($pillar['points'] as $point)
                    <li>{{ $point }}</li>
                    @endforeach
                </ul>
            </article>
            @endforeach
        </div>
        @if (! empty($blend))
        <article class="tm-pillar-blend tm-reveal text-center mx-auto" id="platform-blend" style="max-width:820px;margin-left:auto;margin-right:auto;">
            <p class="tm-section-label">Integrated delivery</p>
            <h3 class="tm-title h4">{{ $blend['title'] }}</h3>
            <p class="tm-lead mb-0">{{ $blend['copy'] }}</p>
        </article>
        @endif
    </div>
</section>

<section class="tm-section tm-section--paper" id="integrations">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 tm-reveal" id="php-observability">
                <div class="tm-card h-100">
                    <div class="tm-card__icon"><i class="fab fa-php"></i></div>
                    <h3>PHP profiler &amp; observability</h3>
                    <p>Laravel and PHP stacks — monitoring, profiling, SQL and HTTP visibility, Linux and Windows server paths, and production-safe inspection workflows.</p>
                </div>
            </div>
            <div class="col-lg-4 tm-reveal" data-delay="1" id="python-observability">
                <div class="tm-card h-100">
                    <div class="tm-card__icon"><i class="fab fa-python"></i></div>
                    <h3>Python profiler &amp; observability</h3>
                    <p>Python services and APIs — continuous profiling, browser and CLI triggers, and staging-to-production observability with documented handover.</p>
                </div>
            </div>
            <div class="col-lg-4 tm-reveal" data-delay="2" id="go-observability">
                <div class="tm-card h-100">
                    <div class="tm-card__icon"><i class="fas fa-bolt"></i></div>
                    <h3>Go profiler &amp; observability</h3>
                    <p>Go services — continuous profiling, runtime visibility, and production-safe inspection across staging and live traffic paths.</p>
                </div>
            </div>
            <div class="col-lg-4 tm-reveal" id="node-observability">
                <div class="tm-card h-100">
                    <div class="tm-card__icon"><i class="fab fa-node-js"></i></div>
                    <h3>Node.js profiler &amp; observability</h3>
                    <p>Node.js APIs and apps — tracing, continuous profiling, and CI/CD performance assertions before production release.</p>
                </div>
            </div>
            <div class="col-lg-4 tm-reveal" data-delay="1" id="ruby-observability">
                <div class="tm-card h-100">
                    <div class="tm-card__icon"><i class="fas fa-gem"></i></div>
                    <h3>Ruby profiler &amp; observability</h3>
                    <p>Ruby and Rails workloads — monitoring, profiling, SQL and HTTP breakdowns, and sandbox-to-production validation.</p>
                </div>
            </div>
            <div class="col-lg-4 tm-reveal" data-delay="2" id="rust-observability">
                <div class="tm-card h-100">
                    <div class="tm-card__icon"><i class="fas fa-cogs"></i></div>
                    <h3>Rust profiler &amp; observability</h3>
                    <p>Rust services — low-overhead continuous profiling, resource-hotspot analysis, and production-safe diagnostic workflows.</p>
                </div>
            </div>
            <div class="col-lg-4 tm-reveal" data-delay="2" id="frontend-observability">
                <div class="tm-card h-100">
                    <div class="tm-card__icon"><i class="fas fa-desktop"></i></div>
                    <h3>Front-end observability</h3>
                    <p>Browser monitoring, front-end traces, and user-journey visibility tied to back-end performance data for full-stack diagnosis.</p>
                </div>
            </div>
            <div class="col-lg-4 tm-reveal" id="synthetic-monitoring">
                <div class="tm-card h-100">
                    <div class="tm-card__icon"><i class="fas fa-user-clock"></i></div>
                    <h3>Synthetic user monitoring</h3>
                    <p>Scenario-based synthetic checks that validate critical paths before and after deployment — aligned with sandbox and staging environments.</p>
                </div>
            </div>
            <div class="col-lg-4 tm-reveal" data-delay="1" id="cicd-integration">
                <div class="tm-card h-100">
                    <div class="tm-card__icon"><i class="fas fa-code-branch"></i></div>
                    <h3>CI/CD integration</h3>
                    <p>Performance assertions in build pipelines, deployment verification, and release gates so regressions are caught before production traffic.</p>
                </div>
            </div>
            <div class="col-lg-4 tm-reveal" data-delay="2" id="quality-recommendations">
                <div class="tm-card h-100">
                    <div class="tm-card__icon"><i class="fas fa-award"></i></div>
                    <h3>Quality &amp; security recommendations</h3>
                    <p id="security-recommendations">Documented performance, quality, and security recommendations — with optional add-on planning for debug, quality, and security layers.</p>
                </div>
            </div>
        </div>
    </div>
</section>
