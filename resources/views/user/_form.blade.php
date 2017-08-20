<!-- Name Form Input -->
<div class="field @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name', ['class' => 'label']) !!}
    {!! Form::text('name', null, ['class' => 'input', 'placeholder' => 'Name']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<!-- email Form Input -->
<div class="field @if ($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'Email', ['class' => 'label']) !!}
    {!! Form::text('email', null, ['class' => 'input', 'placeholder' => 'Email']) !!}
    @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
</div>

<!-- password Form Input -->
<div class="field @if ($errors->has('password')) has-error @endif">
    {!! Form::label('password', 'Password', ['class' => 'label']) !!}
    {!! Form::password('password', ['class' => 'input', 'placeholder' => 'Password']) !!}
    @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
</div>

<!-- Roles Form Input -->
<div class="select is-multiple @if ($errors->has('roles')) has-error @endif">
    {!! Form::label('roles[]', 'Roles', ['class' => 'label']) !!}
    {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null, ['multiple']) !!}
    @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
</div>

<!-- Permissions -->
@if(isset($user))
    @include('auth._permissions', ['closed' => 'true', 'model' => $user ])
@endif
