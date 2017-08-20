@extends('layout')

@section('content')
    <!-- Modal -->
    <div class="modal" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="roleModalLabel">
        <div class="modal-background"></div>
        <div class="modal-content" role="document">
            {!! Form::open(['method' => 'post']) !!}

            <div class="modal-card">
                <div class="modal-card-head">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="roleModalLabel">Role</h4>
                </div>
                <div class="modal-card-body">
                    <!-- name Form Input -->
                    <div class="form-group @if ($errors->has('name')) has-error @endif">
                        {!! Form::label('name', 'Name') !!}
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Role Name']) !!}
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div>
                <button type="button" class="modal-close is-large" data-dismiss="modal">Close</button>

                <!-- Submit Form Button -->
                {!! Form::submit('Submit', ['class' => 'button is-success']) !!}
            </div>
        </div>
    </div>

    <div class="columns">
        <div class="column is-5">
            <h3>Roles</h3>
        </div>
        <div class="column is-7 has-text-right">
            @can('add_roles')
                <a href="#" class="button is-primary" data-toggle="modal" data-target="#roleModal"> <span class="fa fa-plus"></span> New</a>
            @endcan
        </div>
    </div>


    @forelse ($roles as $role)
        {!! Form::model($role, ['method' => 'PUT', 'route' => ['roles.update',  $role->id ], 'class' => 'm-b']) !!}

        @if($role->name === 'Admin')
            @include('auth._permissions', [
                          'title' => $role->name .' Permissions',
                          'options' => ['disabled'] ])
        @else
            @include('auth._permissions', [
                          'title' => $role->name .' Permissions',
                          'model' => $role ])
          @can('edit_roles')
              {!! Form::submit('Save', ['class' => 'button is-primary']) !!}
          @endcan
        @endif

        {!! Form::close() !!}

    @empty
        <p>No Roles defined, please run <code>php artisan db:seed</code> to seed some dummy data.</p>
    @endforelse
@endsection
