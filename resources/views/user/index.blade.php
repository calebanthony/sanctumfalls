@extends('layout')

@section('content')
    <div class="columns">
        <div class="column">
            <h3 class="is-3">{{ $result->total() }} {{ str_plural('User', $result->count()) }} </h3>
        </div>
        <div class="column page-action text-right">
            @can('add_users')
                <a href="{{ route('users.create') }}" class="button is-primary"> <span class="fa fa-plus"></span> Create</a>
            @endcan
        </div>
    </div>

    <div class="result-set">
        <table class="table is-bordered is-striped is-fullwidth" id="data-table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                @can('edit_users', 'delete_users')
                    <th class="text-center">Actions</th>
                @endcan
            </tr>
            </thead>
            <tbody>
            @foreach($result as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->roles->implode('name', ', ') }}</td>
                    <td>{{ $item->created_at->toFormattedDateString() }}</td>

                    @can('edit_users')
                    <td class="text-center">
                        @include('auth._actions', [
                            'entity' => 'users',
                            'id' => $item->id
                        ])
                    </td>
                    @endcan
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $result->links() }}
        </div>
    </div>
@endsection
