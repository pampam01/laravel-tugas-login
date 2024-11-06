<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <input id="{{ $name }}" class="form-control" type="text" name="{{ $name }}"
        value="{{ old($name, $value) }}">
    <span class="text-danger">
        {{ $errors->first($name) }}
    </span>
</div>
