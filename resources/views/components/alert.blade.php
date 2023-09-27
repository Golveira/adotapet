@props(['type' => 'success', 'message'])

@php
    $color = [
        'success' => 'bg-green-100 text-green-800 border border-green-300',
        'error' => 'bg-red-100 text-red-800 border border-red-300',
        'warning' => 'bg-yellow-100 text-yellow-800 border  border-yellow-300',
        'info' => 'bg-blue-100 text-blue-800 border border-blue-300',
    ][$type];
@endphp

<div role="alert" {{ $attributes->merge(['class' => "p-4 mb-4 text-sm rounded-lg $color"]) }}>
    {{ $message ?? $slot }}
</div>
