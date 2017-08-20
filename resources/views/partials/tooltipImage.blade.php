<img tooltip-title='
    <div class="columns is-mobile is-multiline is-tooltip">
        <div class="column is-12 is-tooltip-title">
            <span class="skillKey">[{{ $tt->get("skillKey") }}]</span> // <span class="skillName">{{ $tt->get("name")}}</span>
        </div>
        <div class="column is-3 is-tooltip-image">
            <img src="{{ $tt->get("imageUri") }}">
        </div>
        <div class="column is-9 is-tooltip-description">
            {{ $tt->get("description") }}
        </div>
        </div>
    </div>
' src="{{ $tt->get("imageUri") }}">
