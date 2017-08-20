@extends('layout')

@section('content')
<div class="columns">
    <div class="column">
        <h3 class="title is-3">Heroes</h3>
    </div>
</div>
<div class="columns">
    <div class="column text-right">
        @can('add_heroes')
            {!! Form::open(['route' => ['heroes.store'] ]) !!}
                @include('heroes._heroesForm')
            {!! Form::close() !!}
        @endcan
    </div>
</div>
<div class="result-set">
    <table class="table is-bordered is-striped is-fullwidth" id="data-table">
        <thead>
        <tr>
            <th>Hero ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Health</th>
            <th>Front Armor</th>
            <th>Back/Side Armor</th>
            <th>Talent 1</th>
            <th>Talent 2</th>
            <th>Talent 3</th>
            <th>LMB Ability</th>
            <th>RMB Ability</th>
            <th>Focus Ability</th>
            <th>Q Ability</th>
            <th>E Ability</th>
            @can('edit_users', 'delete_users')
                <th class="text-center">Actions</th>
            @endcan
        </tr>
        </thead>
        <tbody>
        @foreach($heroes as $hero)
            <tr>
                <td>{{ $hero->id }}</td>
                <td>{{ $hero->name }}</td>
                <td>{{ $hero->type }}</td>
                <td>{{ $hero->health }}</td>
                <td>{{ $hero->front_armor }}</td>
                <td>{{ $hero->back_armor }}</td>
                <td>{{ \App\Skill::find($hero->talent1)->name }}</td>
                <td>{{ \App\Skill::find($hero->talent2)->name }}</td>
                <td>{{ \App\Skill::find($hero->talent3)->name }}</td>
                <td>{{ \App\Skill::find($hero->lmb_ability)->name }}</td>
                <td>{{ \App\Skill::find($hero->rmb_ability)->name }}</td>
                <td>{{ \App\Skill::find($hero->f_ability)->name }}</td>
                <td>{{ \App\Skill::find($hero->q_ability)->name }}</td>
                <td>{{ \App\Skill::find($hero->e_ability)->name }}</td>
                <td>
                @can('delete_heroes')
                    {!! Form::open([
                        'method' => 'delete',
                        'url' => route('heroes.destroy', $hero->id),
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
