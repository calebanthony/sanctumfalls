@extends('layout')

@section('content')
<h1 class="title is-1">Reset Password</h1>
<form method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}">

    <div class="field">
        <label for="email" class="label">Email Address</label>
        <div class="control">
            <input name="email" type="email" class="input" value="{{ $email or old('email') }}" required autofocus>
        </div>
    </div>

    <div class="field">
        <label for="password" class="label">Password</label>
        <div class="control">
            <input name="password" type="password" class="input" required>
        </div>
    </div>

    <div class="field">
        <label for="password-confirm" class="label">Confirm Password</label>
        <div class="control">
            <input name="password-confirm" type="password" class="input" required>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-primary">
                Reset Password
            </button>
        </div>
    </div>
</form>
@endsection
