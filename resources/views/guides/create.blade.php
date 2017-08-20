@extends('layout')

@section('content')
<div class="column is-10 is-offset-1">
    <h1 class="title is-3">Create a Guide for {{ $hero->name }}</h1>

    @foreach($errors->all() as $error)
        <div class="notification is-danger">{{$error}}</div>
    @endforeach

    <form action="/guides" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="hero" value="{{ $hero->name }}">
        <div class="field">
            <label class="label is-size-4" for="name">Name of Guide</label>
            <div class="control">
                <input class="input" type="text" name="name" placeholder="Guide Name" value="{{ old('name') }}" required>
            </div>
        </div>
        <div class="field">
            <label class="label is-size-4" for="summary">Summary</label>
            <div class="control">
                <textarea class="textarea" type="textarea" name="summary" rows="3" value="{{ old('summary') }}" required>A short summary that will be seen on the guide list page.</textarea>
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control" id="pros">
                <label class="label is-size-4" for="pros">Pros</label>
                <input class="input" type="text" name="pros[]" placeholder="Some good things about this build/hero">
                <input class="input" type="text" name="pros[]">
                <input class="input" type="text" name="pros[]">
            </div>
            <div class="control" id="cons">
                <label class="label is-size-4" for="cons">Cons</label>
                <input class="input" type="text" name="cons[]" placeholder="Some downsides about this build/hero">
                <input class="input" type="text" name="cons[]">
                <input class="input" type="text" name="cons[]">
            </div>
        </div>
        <div class="columns">
            <div class="column is-4 is-offset-4">
                <button type="button" class="button is-success is-wide" id="listMore">List More</button>
            </div>
        </div>
        <div class="field skill-build">
            <label class="label is-size-4" for="build">Skill Build</label>
            <div class="control">
                @include('guides.editBuild', $hero)
            </div>
        </div>
        <div class="field">
            <label class="label is-size-4" for="contents">Guide Contents</label>
            <p class="subtitle">Highlight some text to see editing options!</p>
            <div class="control">
                <div id="guideContents" name="contents" required>{!! old('guideContents') !!}</div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-4 is-offset-4">
                <button type="submit" class="button is-success is-large is-wide">Submit Guide</button>
            </div>
        </div>
    </form>
</div>
@stop
