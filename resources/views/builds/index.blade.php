@extends('layout')

@section('content')
    <h2 class="title is-2">Create a Build</h2>
    <h3 class="subtitle is-3">Which hero is your build for?</h3>

    <div class="columns is-multiline is-mobile is-centered">
        @foreach ($heroes as $hero)
            @include('heroes.list', [
                'hero' => $hero,
                'classList' => 'is-1-desktop is-3-touch',
                'size' => 'small',
                'path' => 'build'
            ])
        @endforeach
    </div>

@endsection
