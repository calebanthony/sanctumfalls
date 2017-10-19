@extends('layout')

@section('content')
<div class="columns">
    <div class="column is-12">
        <h2 class="title is-2">My Guides</h2>
        @foreach ($guides as $guide)
            <div class="columns is-multiline is-mobile is-vertically-aligned">
                <div class="column is-1-desktop is-3-touch">
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
                    <p class="has-text-grey-light">updated <time>{{ date("F j, Y", strtotime($guide->updated_at)) }}</time></p>
                </div>
                <div class="column is-12-touch is-4-desktop">
                    {{ $guide->summary }}
                </div>
                <div class="column is-2-desktop">
                    @if($guide->ownedBy(\Auth::user()))
                        <a href="/guides/{{ str_replace(' ', '_', $guide->hero) }}/{{ $guide->id }}/edit" class="button is-success is-wide">
                            <span class="fa fa-pencil"></span> Edit Guide
                        </a>
                        <form method="POST" action="/guides/{{ $guide->id }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button class="button is-warning is-wide">
                                <span class="fa fa-ban"></span> Delete Guide
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
        {{ $guides->links() }}
    </div>
</div>
@endsection
