@props(['selected' => null, 'placeholder' => ''])

<x-select id="age" :attributes="$attributes">
    <option value selected>{{ __($placeholder) }}</option>

    @foreach ($ages as $age)
        <option value="{{ $age }}" @selected($selected == $age)>
            {{ __($age) }}
        </option>
    @endforeach
</x-select>
