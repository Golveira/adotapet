@props(['placeholder' => ''])

<x-select id="age" :attributes="$attributes">
    <option value selected>{{ __($placeholder) }}</option>
    <option value="puppy">{{ __('Puppy') }}</option>
    <option value="adult">{{ __('Adult') }}</option>
    <option value="senior">{{ __('Senior') }}</option>
</x-select>
