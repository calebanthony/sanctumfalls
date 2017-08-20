@extends('layout')

@section('content')
    <div class="columns">
        <div class="column">
            <h3>Create</h3>
        </div>
        <div class="column">
            <a href="{{ route('users.index') }}" class="button is-small"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="columns">
        <div class="column">
            {!! Form::open(['route' => ['users.store'] ]) !!}
                @include('user._form')
                <!-- Submit Form Button -->
                {!! Form::submit('Create', ['class' => 'button is-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
