@props(['color' => 'primary'])

@php
    $classes = [
        'primary' => 'bg-blue-100 text-blue-800 font-medium mr-2 px-2.5 py-0.5 rounded',
        'success' => 'bg-green-100 text-green-800 font-medium mr-2 px-2.5 py-0.5 rounded',
        'warning' => 'bg-yellow-100 text-yellow-800 font-medium mr-2 px-2.5 py-0.5 rounded',
        'danger' => 'bg-red-100 text-red-800 font-medium mr-2 px-2.5 py-0.5 rounded',
        'info' => 'bg-indigo-100 text-indigo-800 font-medium mr-2 px-2.5 py-0.5 rounded',
        'dark' => 'bg-gray-100 text-gray-800 font-medium mr-2 px-2.5 py-0.5 rounded',
    ][$color];
@endphp

<span {{ $attributes->merge(['class' => ' ' . $classes]) }}>
    {{ $slot }}
</span>
