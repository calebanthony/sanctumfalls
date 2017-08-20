<div class="columns" hero="{{ $hero->name }}">
    <div class="column skill-selector is-3">
        <button id="lmb-toggle" type="button" class="button is-primary is-wide">{{ $hero->lmbAbility->name }} (LMB)</button>
        <button id="rmb-toggle" type="button" class="button is-primary is-wide">{{ $hero->rmbAbility->name }} (RMB)</button>
        <button id="f-toggle" type="button" class="button is-primary is-wide">{{ $hero->fAbility->name }} (Focus)</button>
        <button id="q-toggle" type="button" class="button is-primary is-wide">{{ $hero->qAbility->name }} (Q)</button>
        <button id="e-toggle" type="button" class="button is-primary is-wide">{{ $hero->eAbility->name }} (E)</button>
        <button id="talent-toggle" type="button" class="button is-primary is-wide">Talents</button>
    </div>
    <div class="column is-9">
        @include('guides.skillBuilder', ['id' => 'lmb', 'style' => 'block', 'hero' => $hero->name])
        @include('guides.skillBuilder', ['id' => 'rmb', 'style' => 'none', 'hero' => $hero->name])
        @include('guides.skillBuilder', ['id' => 'f', 'style' => 'none', 'hero' => $hero->name])
        @include('guides.skillBuilder', ['id' => 'q', 'style' => 'none', 'hero' => $hero->name])
        @include('guides.skillBuilder', ['id' => 'e', 'style' => 'none', 'hero' => $hero->name])
        @include('guides.talentSelector', [
            'talent1' => $hero->getTalent1,
            'talent2' => $hero->getTalent2,
            'talent3' => $hero->getTalent3,
            'id' => 'talent',
            'style' => 'none'
        ])
    </div>

    <input type="hidden" id="buildOrder" name="build" value="">
</div>
<div class="columns is-mobile is-multiline" id="skill-level-breakdown">
    <div class="column is-4-touch is-level-build"></div>
    <div class="column is-4-touch is-level-build"></div>
    <div class="column is-4-touch is-level-build"></div>
    <div class="column is-4-touch is-level-build"></div>
    <div class="column is-4-touch is-level-build"></div>
    <div class="column is-4-touch is-level-build"></div>
    <div class="column is-4-touch is-level-build"></div>
    <div class="column is-4-touch is-level-build"></div>
    <div class="column is-4-touch is-level-build"></div>
    <div class="column is-4-touch is-level-build"></div>
    <div class="column is-4-touch is-offset-4-touch" id="build-talent"></div>
</div>
<div class="columns is-hidden-mobile has-text-centered">
    <div class="column"><span class="is-size-2">1</span></div>
    <div class="column"><span class="is-size-2">2</span></div>
    <div class="column"><span class="is-size-2">3</span></div>
    <div class="column"><span class="is-size-2">4</span></div>
    <div class="column"><span class="is-size-2">5</span></div>
    <div class="column"><span class="is-size-2">6</span></div>
    <div class="column"><span class="is-size-2">7</span></div>
    <div class="column"><span class="is-size-2">8</span></div>
    <div class="column"><span class="is-size-2">9</span></div>
    <div class="column"><span class="is-size-2">10</span></div>
    <div class="column"><span class="is-size-2">T</span></div>
</div>
