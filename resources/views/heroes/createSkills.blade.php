@extends('layout')

@section('content')
<div class="columns">
    <div class="column">
        <h3 class="title is-3">Skills</h3>
    </div>
</div>
<div class="columns">
    <div class="column">
        @can('add_skills')
            {!! Form::open(['route' => ['skills.store'] ]) !!}
                @include('heroes._skillForm')
            {!! Form::close() !!}
        @endcan
    </div>
</div>

<div class="result-set">
    <table class="table is-bordered is-striped is-fullwidth" id="data-table">
        <thead>
        <tr>
            <th>Skill ID</th>
            <th>Parent Skill ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Left / Right</th>
            @can('edit_users', 'delete_users')
                <th class="text-center">Actions</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($skills as $skill)
            <tr>
                <td>{{ $skill->id }}</td>
                <td>{{ $skill->parent_skill ?? "null" }}</td>
                <td>{{ $skill->name }}</td>
                <td>{!! $skill->description !!}</td>
                <td>{{ $skill->left_or_right }}</td>
                <td>
                @can('delete_skills')
                    {!! Form::open([
                        'method' => 'delete',
                        'url' => route('skills.destroy', $skill->id),
                        'style' => 'display: inline',
                        'onSubmit' => 'return confirm("Are you sure you want to delete it?")'
                    ]) !!}
                    <button type="submit" class="button is-danger">
                        <span class="fa fa-trash"></span>
                    </button>
                    {!! Form::close() !!}
                @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
