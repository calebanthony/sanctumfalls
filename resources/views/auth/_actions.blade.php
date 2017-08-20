@can('edit_users')
    <a href="{{ route($entity.'.edit', [str_singular($entity) => $id])  }}" class="button is-warning">
        <i class="fa fa-edit"></i> Edit</a>
@endcan

@can('delete_users')
    {!! Form::open([
        'method' => 'delete',
        'url' => route($entity.'.destroy', ['user' => $id]),
        'style' => 'display: inline',
        'onSubmit' => 'return confirm("Are you sure you want to delete it?")'
    ]) !!}
    <button type="submit" class="button is-danger">
        <span class="fa fa-trash"></span>
    </button>
    {!! Form::close() !!}
@endcan
