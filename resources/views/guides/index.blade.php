@extends('layout')

@section('content')
    <h1 class="title is-1">Select a Hero</h1>
    <h3 class="subtitle is-3">Which hero do you want to see guides for?</h3>

    <div class="columns is-multiline is-mobile is-centered">
        @foreach ($heroes as $hero)
            @include('heroes.list', [
                'hero' => $hero,
                'path' => 'guides'
            ])
        @endforeach
    </div>
@endsection
