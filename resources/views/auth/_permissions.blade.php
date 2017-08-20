<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="{{ isset($title) ? str_slug($title) :  'permissionHeading' }}">
        {{ $title or 'Override Permissions' }} {!! isset($user) ? '<span class="text-danger">(' . $user->getDirectPermissions()->count() . ')</span>' : '' !!}
    </div>
    <div class="panel-block" role="tabpanel">
        <div class="columns is-multiline">
            @foreach($permissions as $perm)
                <?php
                    $per_found = null;
                    if( isset($role) ) {
                        $per_found = $role->hasPermissionTo($perm->name);
                    }
                    if( isset($user)) {
                        $per_found = $user->hasDirectPermission($perm->name);
                    }
                ?>

                <div class="column is-3">
                    <label class="{{ str_contains($perm->name, 'delete') ? 'is-danger' : '' }} checkbox">
                        {!! Form::checkbox("permissions[]", $perm->name, $per_found, isset($options) ? $options : []) !!} {{ $perm->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
