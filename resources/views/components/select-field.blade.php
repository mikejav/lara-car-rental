<select class="custom-select{{ $errors->has($name) ? ' is-invalid' : '' }}" id="{{ $name }}" name="{{ $name }}">

    <option value=""></option>

    @foreach ($options as $key => $label)

        @php
            $isSelected = $key == $value;
        @endphp

        <option value="{{$key}}"{{ $isSelected ? ' selected' : '' }}>{{ $label }}</option>

    @endforeach

</select>
