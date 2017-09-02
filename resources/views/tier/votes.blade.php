<div id="select{{$hero->id}}" class="heroSelector column is-2-desktop is-4-mobile">
    <img src="{{ $hero->profile('thumb') }}">
    <h4 class="h4 is-title">{{$hero->name}}</h4>

    <div class="tierMenu">
        @if (\Auth::check())
            <h5 class="">Vote on a tier!</h5>
            <form action="/tierlist" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="heroID" value={{ $hero->id }}>
                <button class="button is-wide
                    @if ($hero->votedForBy(\Auth::user(), 1))
                        is-success
                    @endif
                " value=1 name="voteTier">Tier 1</button>
                <button class="button is-wide
                    @if ($hero->votedForBy(\Auth::user(), 2))
                        is-success
                    @endif
                " value=2 name="voteTier">Tier 2</button>
                <button class="button is-wide
                    @if ($hero->votedForBy(\Auth::user(), 3))
                        is-success
                    @endif
                " value=3 name="voteTier">Tier 3</button>
            </form>
        @else
            <p>Log in to place your vote!</p>
            <a href="/login" class="has-text-centered is-size-5">Log In Here</a>
        @endif
    </div>
</div>
