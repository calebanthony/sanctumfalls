@extends('layout')

@section('content')
    <h1 class="title is-3">
        {{ $guide->name }}
    </h1>
    <h2 class="subtitle is-4">
        {{ $guide->hero }}
    </h2>
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