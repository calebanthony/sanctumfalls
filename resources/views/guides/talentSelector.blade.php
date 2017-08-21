<div id="{{ $id }}" style="display:{{ $style }}">
    <div class="columns is-centered is-multiline has-text-centered">
        @include('partials.tooltipDiv', [
            'tt' => App\Queries\TooltipQuery::get($name, $talent1->name),
            'id' => "talent1",
            'classList' => 'is-talent column is-4'
        ])
    </div>
    <div class="columns is-centered is-multiline has-text-centered">
        @include('partials.tooltipDiv', [
            'tt' => App\Queries\TooltipQuery::get($name, $talent2->name),
            'id' => "talent2",
            'classList' => 'is-talent column is-4'
        ])
    </div>
    <div class="columns is-centered is-multiline has-text-centered">
        @include('partials.tooltipDiv', [
            'tt' => App\Queries\TooltipQuery::get($name, $talent3->name),
            'id' => "talent3",
            'classList' => 'is-talent column is-4'
        ])
    </div>
</div>
