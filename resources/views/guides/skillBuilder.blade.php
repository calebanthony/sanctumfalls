<div id="{{ $id }}" style="display: {{ $style }}">
    <div class="columns is-centered is-mobile has-text-centered">
        @include('partials.tooltipDiv', [
            'tt' => App\Queries\TooltipQuery::get($hero, "{$id}_left_left"),
            'id' => "{$id}_left_left",
            'classList' => 'is-skill column is-2-desktop is-3-touch'
        ])
        @include('partials.tooltipDiv', [
            'tt' => App\Queries\TooltipQuery::get($hero, "{$id}_left_right"),
            'id' => "{$id}_left_right",
            'classList' => 'is-skill column is-2-desktop is-3-touch'
        ])
        @include('partials.tooltipDiv', [
            'tt' => App\Queries\TooltipQuery::get($hero, "{$id}_right_left"),
            'id' => "{$id}_right_left",
            'classList' => 'is-skill column is-2-desktop is-3-touch'
        ])
        @include('partials.tooltipDiv', [
            'tt' => App\Queries\TooltipQuery::get($hero, "{$id}_right_right"),
            'id' => "{$id}_right_right",
            'classList' => 'is-skill column is-2-desktop is-3-touch'
        ])
    </div>

    <div class="columns is-centered is-mobile has-text-centered">
        @include('partials.tooltipDiv', [
            'tt' => App\Queries\TooltipQuery::get($hero, "{$id}_left"),
            'id' => "{$id}_left",
            'classList' => 'is-skill column is-2-desktop is-3-touch'
        ])
        @include('partials.tooltipDiv', [
            'tt' => App\Queries\TooltipQuery::get($hero, "{$id}_right"),
            'id' => "{$id}_right",
            'classList' => 'is-skill column is-2-desktop is-3-touch is-offset-3-touch is-offset-2-desktop'
        ])
    </div>

    <div class="columns is-centered is-mobile has-text-centered is-base-skill">
        @include('partials.tooltipImage', [
            'tt' => App\Queries\TooltipQuery::get($hero, "{$id}"),
        ])
    </div>
</div>
