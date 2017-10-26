@extends('layout')

@section('content')
    <h1 class="title is-1">Videos</h1>
    <h3 class="subtitle is-3">User-generated content for this wonderful game.</h3>

    <div class="columns is-multiline is-mobile is-centered">
        @foreach ($videos as $video)
            @include('videos.list', [
                'video' => $video
            ])
        @endforeach
    </div>
@endsection
