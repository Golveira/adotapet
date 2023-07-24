@props(['placeholder' => ''])

<x-select id="specie" :attributes="$attributes">
    <option value selected>{{ __($placeholder) }}</option>
    <option value="dog">{{ __('Dog') }}</option>
    <option value="cat">{{ __('Cat') }}</option>
</x-select>
