@props(['placeholder' => ''])

<x-select id="size" :attributes="$attributes">
    <option value selected>{{ __($placeholder) }}</option>
    <option value="small">{{ __('Small') }}</option>
    <option value="medium">{{ __('Medium') }}</option>
    <option value="large">{{ __('Large') }}</option>
</x-select>
