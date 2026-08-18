<?php

return [

    'product' => [
        ['label' => 'Features', 'route' => 'services', 'anchor' => 'platform-stack'],
        ['label' => 'Pricing & packages', 'route' => 'services', 'anchor' => 'packages'],
        ['label' => 'Integrations', 'route' => 'services', 'anchor' => 'integrations'],
        ['label' => 'PHP profiler & observability', 'route' => 'services', 'anchor' => 'php-observability'],
        ['label' => 'Python profiler & observability', 'route' => 'services', 'anchor' => 'python-observability'],
        ['label' => 'Documentation & handover', 'route' => 'case-studies'],
        ['label' => 'Configure sandbox', 'route' => 'services', 'anchor' => 'sandbox'],
        ['label' => 'Subscribe / engage', 'route' => 'contact'],
        ['label' => 'Play with the demo', 'url' => 'https://sandbox.lipapay.co.tz/', 'external' => true],
    ],

    'solutions' => [
        ['label' => 'Performance monitoring', 'route' => 'services', 'anchor' => 'monitoring'],
        ['label' => 'Continuous profiling', 'route' => 'services', 'anchor' => 'continuous-profiling'],
        ['label' => 'Code performance profiler', 'route' => 'services', 'anchor' => 'profiling'],
        ['label' => 'Front-end observability', 'route' => 'services', 'anchor' => 'frontend-observability'],
        ['label' => 'Synthetic user monitoring', 'route' => 'services', 'anchor' => 'synthetic-monitoring'],
        ['label' => 'CI/CD integration', 'route' => 'services', 'anchor' => 'cicd-integration'],
        ['label' => 'Code quality recommendations', 'route' => 'services', 'anchor' => 'quality-recommendations'],
        ['label' => 'Code security recommendations', 'route' => 'services', 'anchor' => 'security-recommendations'],
        ['label' => 'E-commerce & Laravel operations', 'route' => 'services', 'anchor' => 'ecommerce'],
        ['label' => 'Training & onboarding', 'route' => 'contact'],
    ],

    'pillars' => [
        [
            'id' => 'monitoring',
            'icon' => 'fas fa-chart-area',
            'title' => 'Monitoring',
            'lead' => 'Collect performance metrics on live traffic — in production and staging — so teams know when something is wrong before users escalate.',
            'points' => [
                'Detect abnormal behaviour and surface which transactions consume the most server resources.',
                'Break down time spent inside the application versus external services (HTTP, SQL, queues, and more).',
                'Lightweight collection designed to avoid impacting end-users while keeping enough depth to guide investigation.',
            ],
        ],
        [
            'id' => 'profiling',
            'icon' => 'fas fa-project-diagram',
            'title' => 'Profiling',
            'lead' => 'Go deeper than dashboards with deterministic profiling that captures how code behaves while it runs.',
            'points' => [
                'Function-level call counts, caller–callee relationships, wall-time, I/O, CPU, memory, network, HTTP, and SQL detail.',
                'Call-graph and timeline views to understand bottlenecks in context — not just symptoms.',
                'Production-safe profiling workflows for HTTP requests, scripts, crons, and staged synthetic runs.',
            ],
        ],
        [
            'id' => 'continuous-profiling',
            'icon' => 'fas fa-wave-square',
            'title' => 'Continuous profiling',
            'lead' => 'Maximise performance efficiency with ongoing visibility into the most resource-intensive parts of your applications.',
            'points' => [
                'Identify bottlenecks quickly and prioritise tuning where it matters most.',
                'Low-overhead, holistic observability across development, staging, and production paths.',
                'Continuous monitoring of application health with analysis tied to real code execution.',
            ],
        ],
        [
            'id' => 'performance-testing',
            'icon' => 'fas fa-clipboard-check',
            'title' => 'Testing',
            'lead' => 'Integrate performance testing across QA — CI/CD pipelines, deployment checks, and synthetic user monitoring.',
            'points' => [
                'Custom assertions to verify behaviour and respect your performance budget before release.',
                'Scenario-based builds with documented recommendations for performance, quality, and security.',
                'Release-readiness checks aligned with sandbox and staging environments clients can operate.',
            ],
        ],
    ],

    'blend' => [
        'title' => 'A unique blend of delivery capabilities',
        'copy' => 'TechMorah combines monitoring, advanced profiling, continuous observability, and structured testing in one delivery stack. Instead of spending weeks finding issues, clients get actionable reports, sandbox validation, and production handover — so teams fix problems and ship with confidence.',
    ],

];
