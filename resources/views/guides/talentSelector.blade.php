<div id="{{ $id }}" style="display: {{ $style }}">
    <div class="columns is-centered is-multiline has-text-centered">
        <div
            class = "is-talent column is-4"
            tooltip-title = "{{ $talent1->description }}"
            id = "talent1"
        >
            {{ $talent1->name }}
        </div>
    </div>
    <div class="columns is-centered is-multiline has-text-centered">
        <div
            class = "is-talent column is-4"
            tooltip-title = "{{ $talent2->description }}"
            id = "talent2"
        >
            {{ $talent2->name }}
        </div>
    </div>
    <div class="columns is-centered is-multiline has-text-centered">
        <div
            class = "is-talent column is-4"
            tooltip-title = "{{ $talent3->description }}"
            id = "talent3"
        >
            {{ $talent3->name }}
        </div>
    </div>
</div>
