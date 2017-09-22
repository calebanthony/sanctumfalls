@extends('layout')

@section('content')

<div class="columns is-vertically-aligned">
    <div class="column is-2 is-hidden-mobile">
        <img src="/images/{{ preg_replace('/\s+/', '', strtolower($hero->name)) }}/profile_thumb.png">
    </div>
    <div class="column is-10">
        <h3 class="title is-3" id="buildPage">{{ $hero->name }} Build</h3>
        <h5 class="subtitle is-5" id="buildPage">Just copy and share the link anywhere!</h5>
    </div>
</div>

@include('guides.editBuild', [
    'hero' => $hero
])

@endsection
