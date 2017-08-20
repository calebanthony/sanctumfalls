@extends('layout')

@section('content')
    <h1 class="title is-1">Make Changes to Your Guide</h1>

    @foreach($errors->all() as $error)
        <div class="notification is-danger">{{$error}}</div>
    @endforeach

    <form action="/guides/{{ $guide->id }}" method="POST">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="field">
            <label class="label" for="name">Name of Guide</label>
            <div class="control">
                <input class="input" type="text" name="name" placeholder="Guide Name" value="{{ $guide->name }}" required>
            </div>
        </div>
        <div class="field">
            <label class="label" for="summary">Summary</label>
            <div class="control">
                <textarea class="textarea" type="textarea" name="summary" rows="3" value="{{ $guide->summary }}" required>A short summary that will be seen on the guide list page.</textarea>
            </div>
        </div>
        <div class="field">
            <label class="label" for="hero">Hero</label>
            <div class="control">
                <input class="input" type="text" value="{{ $guide->hero }}" disabled>
            </div>
        </div>
        <div class="field is-grouped">
            <div class="control" id="pros">
                <label class="label is-size-4" for="pros">Pros</label>
                @foreach($guide->pros as $pro)
                    <input class="input" type="text" name="pros[]" value="{{ $pro }}">
                @endforeach
            </div>
            <div class="control" id="cons">
                <label class="label is-size-4" for="cons">Cons</label>
                @foreach($guide->cons as $con)
                    <input class="input" type="text" name="cons[]" value="{{ $con }}">
                @endforeach
            </div>
        </div>
        <div class="columns">
            <div class="column is-4 is-offset-4">
                <button type="button" class="button is-success is-wide" id="listMore">List More</button>
            </div>
        </div>
        <div class="field">
            <label class="label" for="build">Skill Build</label>
            <div class="control">
                @include('guides.editBuild', [
                    'hero' => $guide->getHero()
                ])
            </div>
        </div>
        <div class="field">
            <label class="label" for="contents">Guide Contents</label>
            <div class="control">
                <div id="guideContents" name="contents" required>{!! $guide->contents or "Let us know about your guide!" !!}</div>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-primary">Update</button>
            </div>
        </div>
    </form>

@stop
