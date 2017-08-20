<div class="column is-3-mobile">
    <p class="is-size-5">Lvl {{ $level + 1 }}</p>
    <p class="is-size-6">{{ strtoupper($step['skill']) }} <span class="fa fa-arrow-{{ $step['build'] }}"></span></p>
    @include('partials.tooltipImage', ['tt' => $step['tooltip']])
    <p class="is-size-6">{{ $step['tooltip']->get('name') }}</p>
</div>
