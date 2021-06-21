<textarea class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}" id="{{ $name }}" name="{{ $name }}" rows="3">{{ $value }}</textarea>
