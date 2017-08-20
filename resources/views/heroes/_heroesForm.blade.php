<div class="field is-grouped">
    <p class="control">
        {!! Form::text('name', null, ['class' => 'input', 'placeholder' => 'Hero Name']) !!}
        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
    </p>
    <p class="control">
        {!! Form::text('type', null, ['class' => 'input', 'placeholder' => 'Hero Type']) !!}
        @if ($errors->has('type')) <p class="help-block">{{ $errors->first('type') }}</p> @endif
    </p>
    <p class="control">
        {!! Form::text('health', null, ['class' => 'input', 'placeholder' => 'Health Points']) !!}
        @if ($errors->has('health')) <p class="help-block">{{ $errors->first('health') }}</p> @endif
    </p>
    <p class="control">
        {!! Form::text('front_armor', null, ['class' => 'input', 'placeholder' => 'Front Armor']) !!}
        @if ($errors->has('front_armor')) <p class="help-block">{{ $errors->first('front_armor') }}</p> @endif
    </p>
    <p class="control">
        {!! Form::text('back_armor', null, ['class' => 'input', 'placeholder' => 'Back / Side Armor']) !!}
        @if ($errors->has('back_armor')) <p class="help-block">{{ $errors->first('back_armor') }}</p> @endif
    </p>
</div>
<div class="field is-grouped">
    <p class="control">
        <span class="select">
            {!! Form::select('talent1', $parentSkills, null, ['placeholder' => 'Talent 1']) !!}
        </span>
        @if ($errors->has('talent1')) <p class="help-block">{{ $errors->first('talent1') }}</p> @endif
    </p>
    <p class="control">
        <span class="select">
            {!! Form::select('talent2', $parentSkills, null, ['placeholder' => 'Talent 2']) !!}
        </span>
        @if ($errors->has('talent2')) <p class="help-block">{{ $errors->first('talent2') }}</p> @endif
    </p>
    <p class="control">
        <span class="select">
            {!! Form::select('talent3', $parentSkills, null, ['placeholder' => 'Talent 3']) !!}
        </span>
        @if ($errors->has('talent3')) <p class="help-block">{{ $errors->first('talent3') }}</p> @endif
    </p>
</div>
<div class="field is-grouped">
    <p class="control">
        <span class="select">
            {!! Form::select('lmb_ability', $parentSkills, null, ['placeholder' => 'LMB Ability']) !!}
        </span>
        @if ($errors->has('lmb_ability')) <p class="help-block">{{ $errors->first('lmb_ability') }}</p> @endif
    </p>
    <p class="control">
        <span class="select">
            {!! Form::select('rmb_ability', $parentSkills, null, ['placeholder' => 'RMB Ability']) !!}
        </span>
        @if ($errors->has('rmb_ability')) <p class="help-block">{{ $errors->first('rmb_ability') }}</p> @endif
    </p>
    <p class="control">
        <span class="select">
            {!! Form::select('f_ability', $parentSkills, null, ['placeholder' => 'Focus Ability']) !!}
        </span>
        @if ($errors->has('f_ability')) <p class="help-block">{{ $errors->first('f_ability') }}</p> @endif
    </p>
    <p class="control">
        <span class="select">
            {!! Form::select('q_ability', $parentSkills, null, ['placeholder' => 'Q Ability']) !!}
        </span>
        @if ($errors->has('q_ability')) <p class="help-block">{{ $errors->first('q_ability') }}</p> @endif
    </p>
    <p class="control">
        <span class="select">
            {!! Form::select('e_ability', $parentSkills, null, ['placeholder' => 'E Ability']) !!}
        </span>
        @if ($errors->has('e_ability')) <p class="help-block">{{ $errors->first('e_ability') }}</p> @endif
    </p>
</div>
<div class="field">
    <p class="control">
        {!! Form::submit('Create Hero', ['class' => 'button is-primary']) !!}
    </p>
</div>
