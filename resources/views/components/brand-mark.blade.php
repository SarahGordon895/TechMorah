@props([
    'size' => 'md',
    'alt' => 'TechMorah Solution LTD logo',
])

@php
    $sizes = [
        'sm' => 'brand-mark--sm',
        'md' => 'brand-mark--md',
        'lg' => 'brand-mark--lg',
    ];
    $sizeClass = $sizes[$size] ?? $sizes['md'];
    $srText = trim($slot) ?: 'TechMorah Solution LTD';
@endphp

<span {{ $attributes->merge(['class' => "brand-mark {$sizeClass}"]) }}>
    <img src="{{ asset('img/TechMorahSolution.png') }}" alt="{{ $alt }}" class="brand-mark__logo">
    <span class="visually-hidden">{{ $srText }}</span>
</span>
