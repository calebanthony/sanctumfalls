@extends('layout')

@section('content')
    <h2 class="title is-4">View Guides By Hero</h2>
    <div class="columns is-multiline is-mobile is-hero-selection">
        @foreach ($heroes as $hero)
            <div class="column is-1-desktop is-3-touch is-hero-guide-selector {{ $hero == 'Oru' ? 'is-new' : ''}}">
                <a href="/guides/{{ str_replace(' ', '_', $hero) }}">
                    <img src="/images/{{ preg_replace('/\s+/', '', strtolower($hero)) }}/profile.png">
                    <p class="has-text-centered">
                        {{ $hero }}
                    </p>
                </a>
            </div>
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
            <h2 class="title is-4">Most Popular</h2>
            @foreach ($popularGuides as $guide)
                @include('guides.excerpt', compact('guide'))
            @endforeach
        </div>
    </div>
@stop
