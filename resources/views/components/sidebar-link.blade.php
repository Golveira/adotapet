@props(['active'])

@php
    $classes = $active ?? false ? 'flex items-center p-2 text-gray-900 rounded-lg bg-gray-100 ' : 'flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-100 dark:hover:bg-gray-700 group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
