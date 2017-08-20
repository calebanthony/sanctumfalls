@extends('layout')

@section('content')
<h1 class="title is-1">Reset Password</h1>
<form method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}

    <div class="field">
        <label for="email" class="label">Email Address</label>
        <div class="control">
            <input name="email" type="email" class="input" value="{{ old('email') }}" required>
        </div>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-primary">
                Send Password Reset Link
            </button>
        </div>
    </div>
</form>
@endsection
