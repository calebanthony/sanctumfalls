@extends('layout')

@section('content')
    <div class="columns">
        <div class="column">
            <h3>Edit {{ $user->first_name }}</h3>
        </div>
        <div class="column">
            <a href="{{ route('users.index') }}" class="button is-small"> <i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>
    <div class="columns">
        {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update',  $user->id ] ]) !!}
            @include('user._form')
            <!-- Submit Form Button -->
        {!! Form::submit('Save Changes', ['class' => 'button is-primary']) !!}
        {!! Form::close() !!}
    </div>
@endsection
