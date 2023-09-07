@props(['selected' => null, 'placeholder' => ''])

<x-forms.select id="specie" :attributes="$attributes">
    <option value selected>{{ __($placeholder) }}</option>

    @foreach ($species as $specie)
        <option value="{{ $specie }}" @selected($selected == $specie)>
            {{ __($specie) }}
        </option>
    @endforeach
</x-forms.select>
