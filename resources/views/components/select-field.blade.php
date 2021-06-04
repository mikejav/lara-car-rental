<select class="custom-select" id="{{ $name }}" name="{{ $name }}">

    @foreach ($options as $key => $label)

        @php
            $isSelected = $key == $value;
        @endphp

        <option value="{{$key}}"{{ $isSelected ? ' selected' : '' }}>{{ $label }}</option>

    @endforeach

</select>
