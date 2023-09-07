@props(['selected' => null, 'placeholder' => ''])

<x-forms.select id="age" :attributes="$attributes">
    <option value selected>{{ __($placeholder) }}</option>

    @foreach ($ages as $age)
        <option value="{{ $age }}" @selected($selected == $age)>
            {{ __($age) }}
        </option>
    @endforeach
</x-forms.select>
