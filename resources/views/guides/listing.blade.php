<div class="columns is-multiline is-mobile is-vertically-aligned">
    <div class="column is-3-touch is-1-desktop is-paddingless">
        <form method="POST" action="/votes/{{ $guide->id }}">
            {{ csrf_field() }}

            <button class="button is-wide
                {{ Auth::check() && $guide->votes->contains('user_id', Auth::id()) ? 'is-success' : '' }}"
                {{ Auth::guest() ? 'disabled' : '' }}
            >
                <span class="fa fa-thumbs-up"></span> {{ $guide->votes->count() }}
            </button>
        </form>
        <p class="has-text-grey-light has-text-centered">
            <span class="fa fa-eye"></span> {{ $guide->views }}
        </p>
    </div>
    <div class="column is-9-touch is-4-desktop">
        <a href="/guides/{{ str_replace(' ', '_', $heroData->name) }}/{{ str_replace(' ', '_', $guide->name) }}" class="title is-3">
            {{ $guide->name }}
        </a>
        <p class="has-text-grey-light">by {{ $guide->author }}</p>
        <p class="has-text-grey-light">updated <time>{{ date("F j, Y", strtotime($guide->updated_at)) }}</time></p>
    </div>
    <div class="column is-12-touch is-7-desktop">
        {{ $guide->summary }}
    </div>
</div>
