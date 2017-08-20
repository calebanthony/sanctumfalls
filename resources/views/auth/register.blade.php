@extends('layout')

@section('content')
<div class="columns">
    <div class="column is-5 is-offset-1">
        <h1 class="title is-1">Register</h1>

        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="field">
                <label for="name" class="label">Display Name</label>
                <div class="control">
                    <input name="name" type="text" class="input" value="{{ old('name') }}" required autofocus>
                </div>
            </div>

            <div class="field">
                <label for="email" class="label">Email</label>
                <div class="control">
                    <input name="email" type="email" class="input" value="{{ old('email') }}" required>
                </div>
            </div>

            <div class="field">
                <label for="password" class="label">Password</label>
                <div class="control">
                    <input name="password" type="password" class="input" value="{{ old('password') }}" required>
                </div>
            </div>

            <div class="field">
                <label for="password_confirmation" class="label">Confirm Password</label>
                <div class="control">
                    <input name="password_confirmation" type="password" class="input" value="{{ old('password_confirmation') }}" required>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-primary is-large">
                        Register
                    </button>
                </div>
            </div>
        </form>

        @include('partials.errors')
    </div>
</div>
@endsection
