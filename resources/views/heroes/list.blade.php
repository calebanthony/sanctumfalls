<div class="column is-hero-guide-selector {{ $classList }} {{ $hero == 'Rutger' ? 'is-new' : ''}}">
    <a href="/guides/{{ str_replace(' ', '_', $hero) }}">
        <img src="/images/{{ preg_replace('/\s+/', '', strtolower($hero)) }}/profile{{ $size === "small" ? "_thumb" : "" }}.png">
        <p class="has-text-centered">
            {{ $hero }}
        </p>
    </a>
</div>
