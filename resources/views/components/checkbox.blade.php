@props(['label' => ''])

<input
    {{ $attributes->merge(['class' => 'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2']) }}
    type="checkbox" />

<label for="{{ $attributes['id'] }}" class="ml-2 text-sm font-medium text-gray-900">
    {{ __($label) }}
</label>
