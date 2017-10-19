@extends('layout')

@section('content')
<div class="columns is-multiline">
    <div class="column is-12">
        <h2 class="title is-2">{{ $username }}'s Profile</h2>
    </div>
    <div class="column is-12">
        <h3 class="title is-3">Total Stats</h3>
        <p class="subtitle">Across all guides</p>
        <div class="columns is-mobile has-text-centered">
            <div class="column">
                <p>Written</p>
                <p class="has-text-weight-bold is-size-4">{{ $stats->guides }}</p>
            </div>
            <div class="column">
                <p><span class="fa fa-eye"></span></p>
                <p class="has-text-weight-bold is-size-4">{{ $stats->views }}</p>
            </div>
            <div class="column">
                <p><span class="fa fa-thumbs-up"></span> Received</p>
                <p class="has-text-weight-bold is-size-4">{{ $stats->thumbUps }}</p>
            </div>
            <div class="column">
                <p><span class="fa fa-thumbs-up"></span> Given</p>
                <p class="has-text-weight-bold is-size-4">{{ $stats->thumbUpsGiven }}</p>
            </div>
        </div>
    </div>
    <div class="column is-7">
        <h3 class="title is-3">Guides Written</h3>
        @foreach ($guides as $guide)
            <div class="columns is-multiline is-mobile is-vertically-aligned">
                <div class="column is-2-desktop is-3-touch">
                    <img src="/images/{{ preg_replace('/\s+/', '', strtolower($guide->hero)) }}/profile_thumb.png">
                </div>
                <div class="column is-3-touch is-1-desktop is-paddingless">
                    <p class="has-text-grey-light has-text-centered">
                        <span class="fa fa-thumbs-up"></span> {{ $guide->votes->count() }}
                    </p>
                    <p class="has-text-grey-light has-text-centered">
                        <span class="fa fa-eye"></span> {{ $guide->views }}
                    </p>
                    {{-- <p class="has-text-grey-light has-text-centered">
                        <span class="fa fa-comment"></span> {{ $guide->comments->count() }}
                    </p> --}}
                </div>
                <div class="column is-6-touch is-4-desktop">
                    <a href="/guides/{{ str_replace(' ', '_', $guide->hero) }}/{{ $guide->id }}" class="title is-3">
                        {{ $guide->name }}
                    </a>
                    <p class="has-text-grey-light">created <time>{{ date("F j, Y", strtotime($guide->created_at)) }}</time></p>
                </div>
                <div class="column is-12-touch is-5-desktop">
                    {{ $guide->summary }}
                </div>
            </div>
        @endforeach
        {{ $guides->links() }}
    </div>
    <div class="column is-5">
        {{-- Other stuff here ;) --}}
    </div>
</div>
@endsection
