@extends('layout')

@section('content')
    <h1 class="title is-1">{{ $heroData->name }}</h1>
    <div class="columns">
        <div class="column is-9">
            <div class="tabs">
                <ul>
                    <li class="{{ !request()->exists('popular') ? 'is-active' : '' }}">
                        <a href="{{ request()->url() }}">
                            Most Recent
                        </a>
                    </li>
                    <li class="{{ request()->exists('popular') ? 'is-active' : '' }}">
                        <a href="?popular">
                            Most Popular
                        </a>
                    </li>
                </ul>
            </div>
            @foreach ($guides as $guide)
                @include ('guides.listing')
            @endforeach
            {{ $guides->links() }}
        </div>
        <div class="column is-3 is-hidden-mobile">
            <div class="columns hero-details">
                <a href="/guides/create/{{ str_replace(' ', '_', $heroData->name) }}" class="button is-success is-wide">
                    Create a Guide for This Hero
                </a>
            </div>
            <div class="columns hero-details">
                <a href="/build/{{ str_replace(' ', '_', $heroData->name) }}" class="button is-primary is-wide">
                    Create a Build for This Hero
                </a>
            </div>
            <div class="hero-details">
                <img src="/images/{{ preg_replace('/\s+/', '', strtolower($heroData->name)) }}/profile.png">
            </div>
            <table class="table is-bordered is-fullwidth hero-details">
                <tr>
                    <td>Name:</td>
                    <td>{{ $heroData->name }}</td>
                </tr>
                <tr>
                    <td>Type:</td>
                    <td>{{ $heroData->type }}</td>
                </tr>
                <tr>
                    <td>Health:</td>
                    <td>{{ $heroData->health }}</td>
                </tr>
                <tr>
                    <td>Armor:</td>
                    <td>{{ $heroData->armor }}</td>
                </tr>
            </table>
            <div class="hero-details">
                <p class="title is-4">Skills</p>
                <div class="columns list-hero-skills">
                    <div class="column">
                        @include('partials.tooltipImage', ['tt' => $tooltips->get('lmb')])
                    </div>
                    <div class="column">
                        @include('partials.tooltipImage', ['tt' => $tooltips->get('rmb')])
                    </div>
                    <div class="column">
                        @include('partials.tooltipImage', ['tt' => $tooltips->get('f')])
                    </div>
                    <div class="column">
                        @include('partials.tooltipImage', ['tt' => $tooltips->get('q')])
                    </div>
                    <div class="column">
                        @include('partials.tooltipImage', ['tt' => $tooltips->get('e')])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
