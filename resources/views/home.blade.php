@extends('layout')

@section('content')
    <h2 class="title is-4">View Guides by Hero</h2>
    <div class="columns is-multiline is-mobile is-centered">
        @foreach ($heroes as $hero)
            @include('heroes.list', [
                'hero' => $hero,
                'path' => 'guides'
            ])
        @endforeach
    </div>

    <div class="columns">
        <div class="column">
            <h2 class="title is-4">Most Recent</h2>
            @foreach ($recentGuides as $guide)
                @include('guides.excerpt', compact('guide'))
            @endforeach
        </div>
        <div class="column">
            <h2 class="title is-4">Most Popular <span class="subtitle">(Updated in last 30 days)</span></h2>
            @foreach ($popularGuides as $guide)
                @include('guides.excerpt', compact('guide'))
            @endforeach
        </div>
    </div>
@stop
