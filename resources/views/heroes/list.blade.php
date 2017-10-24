<div class="column is-hero-guide-selector is-1-desktop is-3-touch is-centered {{ $hero == 'Ezren Ghal' ? 'is-new' : ''}}">
    <a href="/{{ $path }}/{{ str_replace(' ', '_', $hero) }}">
        <img src="/images/{{ preg_replace('/\s+/', '', strtolower($hero)) }}/profile_thumb.png">
        <p class="has-text-centered">
            {{ $hero }}
        </p>
    </a>
</div>
