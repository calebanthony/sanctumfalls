@extends('layout')

@section('content')
    <div class="columns has-text-centered">
        <div class="column is-12">
            <h1 class="title h1">Community Tier List</h1>
            <h3 class="subtitle">Click on a hero to place your vote!</h3>
        </div>
    </div>
    <div class="columns">
        <div class="column is-12 has-text-centered">
            <h2 class="title h2">Tier 1</h2>
            <p class="subtitle">The best of the best.</p>
            <div class="columns is-centered is-mobile is-multiline">
                @foreach($tier1 as $hero)
                    @include('tier.votes', compact('hero'))
                @endforeach
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column is-12 has-text-centered">
            <h2 class="title h2">Tier 2</h2>
            <p class="subtitle">Solid picks, but there are usually better choices.</p>
            <div class="columns is-centered is-mobile is-multiline">
                @foreach($tier2 as $hero)
                    @include('tier.votes', compact('hero'))
                @endforeach
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column is-12 has-text-centered">
            <h2 class="title h2">Tier 3</h2>
            <p class="subtitle">Not in a good place. Try to avoid picking.</p>
            <div class="columns is-centered is-mobile is-multiline">
                @foreach($tier3 as $hero)
                    @include('tier.votes', compact('hero'))
                @endforeach
            </div>
        </div>
    </div>
@endsection
