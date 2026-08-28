@props(['field'])

@error($field)
    <p id="{{ $field }}-error" class="mt-2 text-sm text-rose-300">{{ $message }}</p>
@enderror
