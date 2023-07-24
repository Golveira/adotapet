@props(['placeholder' => ''])

<x-select id="sex" :attributes="$attributes">
    <option value selected>{{ __($placeholder) }}</option>
    <option value="male">{{ __('Male') }}</option>
    <option value="female">{{ __('Female') }}</option>
</x-select>
