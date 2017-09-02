@extends('layout')

@section('content')
    <h1 class="title is-1">Select a Hero</h1>
    <div class="columns is-multiline is-mobile is-centered">
        @foreach ($heroes as $hero)
            @include('heroes.list', [
                'hero' => $hero,
                'classList' => 'is-2-desktop is-one-third-touch',
                'size' => 'normal'
            ])
        @endforeach
    </div>
@endsection
