@extends('layout')

@section('content')
<div class="columns">
    <div class="column is-4 is-offset-1">
        <h1 class="title is-1">Login</h1>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="field">
                <label for="email" class="label">Email Address</label>
                <div class="control">
                    <input name="email" type="text" class="input" value="{{ old('email') }}" required autofocus>
                </div>
            </div>

            <div class="field">
                <label for="password" class="label">Password</label>
                <div class="control">
                    <input name="password" type="password" class="input" required>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <label for="remember" class="checkbox">
                        <input name="remember" id="remember" type="checkbox" value="{{ old('remember') ? 'checked' : '' }}">
                        Remember Me
                    </label>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button type="submit" class="button is-primary">
                        Login
                    </button>
                </div>
                <div class="control">
                    <button class="button is-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </button>
                </div>
            </div>
        </form>

        @include('partials.errors')
    </div>
</div>
@endsection
