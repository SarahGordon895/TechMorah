@php
    $productLinks = config('product-solutions.product', []);
    $solutionLinks = config('product-solutions.solutions', []);
    $resolveHref = function (array $item): string {
        if (! empty($item['url'])) {
            return $item['url'];
        }
        $href = route($item['route'] ?? 'services');
        if (! empty($item['anchor'])) {
            $href .= '#' . $item['anchor'];
        }
        return $href;
    };
@endphp
<div class="col-md-6 col-lg-3">
    <p class="tm-footer__col-label">Product</p>
    <ul class="list-unstyled tm-footer__link-list">
        @foreach ($productLinks as $item)
        <li>
            <a href="{{ $resolveHref($item) }}" @if(!empty($item['external'])) target="_blank" rel="noopener" @endif>{{ $item['label'] }}</a>
        </li>
        @endforeach
    </ul>
</div>
<div class="col-md-6 col-lg-3">
    <p class="tm-footer__col-label">Solutions</p>
    <ul class="list-unstyled tm-footer__link-list">
        @foreach ($solutionLinks as $item)
        <li>
            <a href="{{ $resolveHref($item) }}">{{ $item['label'] }}</a>
        </li>
        @endforeach
    </ul>
</div>
