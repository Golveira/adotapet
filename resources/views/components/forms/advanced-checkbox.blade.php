@props(['id', 'name', 'value', 'label', 'checked' => false])

<input class="peer hidden" id="{{ $id }}" name="{{ $name }}" type="checkbox" value="{{ $value }}"
    {{ $checked ? 'checked' : '' }}>

<label
    class="inline-flex w-full cursor-pointer items-center justify-between rounded-lg border-2 border-gray-200 bg-white p-2 text-gray-500 hover:bg-gray-50 hover:text-gray-600 peer-checked:border-blue-600 peer-checked:text-gray-600"
    for="{{ $id }}">

    <span class="flex items-center">
        <span class="text-sm font-medium">{{ __($label) }}</span>
    </span>
</label>
