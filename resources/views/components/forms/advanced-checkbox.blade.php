@props(['id', 'name', 'value', 'label', 'checked' => false])

<input class="hidden peer" type="checkbox" id="{{ $id }}" name="{{ $name }}" value="{{ $value }}"
    {{ $checked ? 'checked' : '' }}>

<label for="{{ $id }}"
    class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer peer-checked:border-blue-600 hover:text-gray-600  peer-checked:text-gray-600 hover:bg-gray-50">

    <span class="flex items-center">
        <span class="text-sm font-medium">{{ __($label) }}</span>
    </span>
</label>