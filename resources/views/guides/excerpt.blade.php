<div class="columns is-mobile is-multiline is-featured-guide is-vertically-aligned">
    <div class="column is-2-desktop is-6-touch is-offset-3-touch">
        <img src="/images/{{ preg_replace('/\s+/', '', strtolower($guide->hero)) }}/profile.png">
    </div>
    <div class="column is-10-desktop is-12-touch">
        <div class="columns is-mobile is-multiline">
            <div class="column is-12-touch is-8-desktop">
                <a href="/guides/{{ str_replace(' ', '_', $guide->hero) }}/{{ $guide->id }}">
                    <h3 class="title is-5">{{ $guide->name }}</h3>
                </a>
                <h6 class="subtitle is-6">
                    by <a href="/profile/{{ $guide->author }}">{{ $guide->author }}</a> updated {{ date("F j, Y", strtotime($guide->updated_at)) }}
                </h6>
            </div>
            <div class="column is-12-touch is-4-desktop has-text-grey-light">
                <div class="columns is-mobile">
                    <div class="column is-4 has-text-centered is-guide-stat">
                        {{-- {{ $guide->comments }}
                        <span class="fa fa-comment"></span> --}}
                    </div>
                    <div class="column is-4 has-text-centered is-guide-stat">
                        <p class="fa fa-thumbs-up"></p>
                        <p>{{ $guide->votes->count() }}</p>
                    </div>
                    <div class="column is-4 has-text-centered is-guide-stat">
                        <p class="fa fa-eye"></p>
                        <p>{{ $guide->views }}</p>
                    </div>
                </div>
            </div>

            <div class="column guide-excerpt">
                <p>{{ $guide->summary }}</p>
            </div>
        </div>
    </div>
</div>
