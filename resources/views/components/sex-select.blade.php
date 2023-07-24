@props(['selected' => null, 'placeholder' => ''])

<x-select id="sex" :attributes="$attributes">
    <option value selected>{{ __($placeholder) }}</option>

    @foreach ($sexOptions as $sex)
        <option value="{{ $sex }}" @selected($selected == $sex)>
            {{ __($sex) }}
        </option>
    @endforeach
</x-select>
