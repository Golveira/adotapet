@props(['selected' => null, 'placeholder' => ''])

<x-select id="size" :attributes="$attributes">
    <option value selected>{{ __($placeholder) }}</option>

    @foreach ($sizes as $size)
        <option value="{{ $size }}" @selected($selected == $size)>
            {{ __($size) }}
        </option>
    @endforeach
</x-select>
