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
        <div class="field">
            <label class="label" for="pros">Pros</label>
            <div class="control">
                <input class="input" type="text" name="pros[0]" value="{{ $guide->pros[0] }}" placeholder="A good thing about this build/hero" required>
                <input class="input" type="text" name="pros[1]" value="{{ $guide->pros[1] }}">
                <input class="input" type="text" name="pros[2]" value="{{ $guide->pros[2] }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="cons">Cons</label>
            <div class="control">
                <input class="input" type="text" name="cons[0]" value="{{ $guide->cons[0] }}" placeholder="A downside about this build/hero" required>
                <input class="input" type="text" name="cons[1]" value="{{ $guide->cons[1] }}">
                <input class="input" type="text" name="cons[2]" value="{{ $guide->cons[2] }}">
            </div>
        </div>
        <div class="field">
            <label class="label" for="build">Skill Build</label>
            <div class="control">
                <input class="input" type="text" name="build" placeholder="Coming eventually" required>
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
