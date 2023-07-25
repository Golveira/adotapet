@props(['color' => 'default'])

@php
    $classes = [
        'default' => 'bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded',
        'dark' => 'bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded',
        'red' => 'bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded',
        'green' => 'bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded',
        'yellow' => 'bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded',
        'indigo' => 'bg-indigo-100 text-indigo-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded',
        'purple' => 'bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded',
        'pink' => 'bg-pink-100 text-pink-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded',
    ][$color];
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
