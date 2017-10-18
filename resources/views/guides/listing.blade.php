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
    <div class="column is-9-touch is-6-desktop">
        <a href="/guides/{{ str_replace(' ', '_', $guide->hero) }}/{{ $guide->id }}" class="title is-3">
            {{ $guide->name }}
        </a>
        <p class="has-text-grey-light">by {{ $guide->author }}</p>
        <p class="has-text-grey-light">created <time>{{ date("F j, Y", strtotime($guide->created_at)) }}</time></p>
    </div>
    <div class="column is-12-touch is-5-desktop">
        {{ $guide->summary }}
    </div>
</div>
