<div class="columns is-multiline is-mobile is-vertically-aligned">
    <div class="column is-3-touch is-1-desktop is-paddingless">
        <p class="has-text-grey-light has-text-centered">
            <span class="fa fa-thumbs-up"></span> {{ $guide->votes->count() }}
        </p>
        <p class="has-text-grey-light has-text-centered">
            <span class="fa fa-eye"></span> {{ $guide->views }}
        </p>
        {{-- <p class="has-text-grey-light has-text-centered">
            <span class="fa fa-comment"></span> {{ $guide->comments->count() }}
        </p> --}}
    </div>
    <div class="column is-3-touch is-1-desktop is-paddingless has-text-centered">
        @if ($guide->isFresh)
            <span class="tag is-success is-rounded">Fresh</span>
        @endif
        @if ($guide->isStale)
            <span class="tag is-warning is-rounded">Stale</span>
        @endif
    </div>
    <div class="column is-6-touch is-5-desktop">
        <a href="/guides/{{ str_replace(' ', '_', $guide->hero) }}/{{ $guide->id }}" class="title is-3">
            {{ $guide->name }}
        </a>
        <p class="has-text-grey-light">by <a href="/profile/{{ $guide->author }}">{{ $guide->author }}</a></p>
        <p class="has-text-grey-light">updated <time>{{ date("F j, Y", strtotime($guide->updated_at)) }}</time></p>
    </div>
    <div class="column is-12-touch is-5-desktop">
        {{ $guide->summary }}
    </div>
</div>
