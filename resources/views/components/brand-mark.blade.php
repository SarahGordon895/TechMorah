@props([
    'size' => 'md',
    'alt' => 'TechMorah Solution LTD',
    'showWordmark' => null,
])

@php
    $sizes = [
        'sm' => 'brand-mark--sm',
        'md' => 'brand-mark--md',
        'lg' => 'brand-mark--lg',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $srText = trim($slot) ?: 'TechMorah Solution LTD';
    $logoSrc = config('branding.logo', 'img/techmorah-icon.png');
    $cropBottom = (int) config('branding.logo_crop_bottom_percent', 0);
    $cropStyle = $cropBottom > 0 ? 'clip-path: inset(0 0 ' . $cropBottom . '% 0);' : '';
    $wordmark = $showWordmark ?? config('branding.show_wordmark', true);
@endphp

<span {{ $attributes->merge(['class' => "brand-mark {$sizeClass}"]) }}>
    <span class="brand-mark__icon-slot">
        <img
            src="{{ asset($logoSrc) }}"
            alt="{{ $alt }}"
            class="brand-mark__logo-img"
            @if($cropStyle !== '') style="{{ $cropStyle }}" @endif
            loading="lazy"
            decoding="async"
        >
    </span>
    @if($wordmark && $size === 'lg')
        <span class="brand-mark__wordmark d-none d-sm-inline">TechMorah <small class="brand-mark__tagline">Solution LTD</small></span>
    @endif
    <span class="visually-hidden">{{ $srText }}</span>
</span>
