@props(['color' => 'gray'])

@php
    $bg = "bg-{$color}-100 ";
    $text = "text-{$color}-800 ";
@endphp

<span {{ $attributes->merge(['class' => $bg . $text . 'text-sm font-medium mr-2 px-2.5 py-0.5 rounded']) }}>
    {{ $slot }}
</span>
