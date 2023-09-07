@props(['selected' => null, 'placeholder' => ''])

<x-forms.select id="sex" :attributes="$attributes">
    <option value selected>{{ __($placeholder) }}</option>

    @foreach ($sexOptions as $sex)
        <option value="{{ $sex }}" @selected($selected == $sex)>
            {{ __($sex) }}
        </option>
    @endforeach
</x-forms.select>
