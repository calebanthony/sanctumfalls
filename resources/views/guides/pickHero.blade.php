@extends('layout')

@section('content')
    <h2 class="title is-2">Create a Guide</h2>
    <h3 class="subtitle is-3">Which hero is your guide for?</h3>

    <div class="columns is-multiline is-mobile is-hero-selection">
    @foreach ($heroes as $hero)
        <div class="column is-2-desktop is-one-third-touch is-hero-guide-selector">
            <a href="/guides/create/{{ str_replace(' ', '_', $hero) }}">
                <img src="/images/{{ preg_replace('/\s+/', '', strtolower($hero)) }}/profile.png">
                <h4 class="title is-4 has-text-centered">
                    {{ $hero }}
                </h4>
            </a>
        </div>
    @endforeach
    </div>
@endsection
