@extends('layout')

@section('content')
    <h1 class="title is-1">Select a Hero</h1>
    <div class="columns is-multiline is-mobile is-hero-selection">
        @foreach ($heroes as $hero)
            <div class="column is-4-touch is-2-desktop is-hero-guide-selector">
                <a href="/guides/{{ str_replace(' ', '_', $hero) }}">
                    <img src="/images/{{ preg_replace('/\s+/', '', strtolower($hero)) }}/profile.png">
                    <h4 class="title is-4 has-text-centered">
                        {{ $hero }}
                    </h4>
                </a>
            </div>
        @endforeach
    </div>
@endsection
