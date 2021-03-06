@extends('layout')

@section('content')
    <h2 class="title is-2">Create a Guide</h2>
    <h3 class="subtitle is-3">Which hero is your guide for?</h3>

    <div class="columns is-multiline is-mobile is-centered">
    @foreach ($heroes as $hero)
        @include('heroes.list', [
            'hero' => $hero,
            'path' => 'guides/create'
        ])
    @endforeach
    </div>
@endsection
