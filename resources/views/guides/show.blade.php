@extends('layout')

@section('content')
    <div class="columns">
        <div class="column is-9">
            <h1 class="title is-3">
                {{ $guide->name }} <span class="subtitle is-5">by <a href="/profile/{{ $guide->author }}">{{ $guide->author }}</a></span>
            </h1>
            <h2 class="subtitle is-4">
                {{ $guide->hero }}
            </h2>
        </div>
        <div class="column is-1">
            <form method="POST" action="/votes/{{ $guide->id }}">
                {{ csrf_field() }}

                <button class="button is-wide
                    {{ Auth::check() && $guide->votes->contains('user_id', Auth::id()) ? 'is-success' : '' }}"
                    {{ Auth::guest() ? 'disabled' : '' }}
                >
                    <span class="fa fa-thumbs-up"></span> {{ $guide->votes->count() }}
                </button>
            </form>
        </div>
        <div class="column is-2">
            @if(\Auth::check() && $guide->ownedBy(\Auth::user()))
                <a href="/guides/{{ str_replace(' ', '_', $guide->hero) }}/{{ $guide->id }}/edit" class="button is-success is-wide">
                    <span class="fa fa-pencil"></span> Edit Guide
                </a>
                <form method="POST" action="/guides/{{ $guide->id }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button class="button is-warning is-wide">
                        <span class="fa fa-ban"></span> Delete
                    </button>
                </form>
            @endif
        </div>
    </div>
    <div class="buildArea">
        <h4 class="title is-4">Build</h4>
        <div class="columns is-multiline is-mobile has-text-centered">
            @foreach ($guide->buildSteps as $level => $step)
                @include('guides.showBuildStep', [
                    'step' => $step,
                    'hero' => $guide->hero
                ])
            @endforeach
        </div>
    </div>
    <div class="columns is-mobile">
        <div class="column">
            <h2 class="title">Pros</h2>
            <ul>
                @foreach ($guide->pros as $pro)
                    @if ($pro != '')
                        <li>{{ $pro }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="column">
            <h2 class="title">Cons</h2>
            <ul>
                @foreach ($guide->cons as $con)
                    @if ($con != '')
                        <li>{{ $con }}</li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
    <div class="fullGuide">
        <h2 class="title">Guide Contents</h2>
        {!! $guide->contents !!}
    </div>
@stop
