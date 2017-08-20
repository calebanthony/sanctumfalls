<div class="field is-grouped">
    <p class="control">
        <span class="select">
            {!! Form::select('parent', $parentSkills, null, ['placeholder' => 'Select a parent skill']) !!}
        </span>
        @if ($errors->has('parent')) <p class="help-block">{{ $errors->first('parent') }}</p> @endif
    </p>
    <p class="control">
        {!! Form::text('name', null, ['class' => 'input', 'placeholder' => 'Skill Name']) !!}
        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
    </p>
    <p class="control is-expanded">
        {!! Form::text('description', null, ['class' => 'input', 'placeholder' => 'Skill Description']) !!}
        @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
    </p>
    <p class="control">
        <span class="select">
            {!! Form::select('leftright', ['left' => 'Left', 'right' => 'Right', 'none' => 'None'], null, ['placeholder' => 'Left or Right']) !!}
        </span>
        @if ($errors->has('leftright')) <p class="help-block">{{ $errors->first('leftright') }}</p> @endif
    </p>
    <p class="control">
        {!! Form::submit('Add Skill', ['class' => 'button is-primary']) !!}
    </p>
</div>
