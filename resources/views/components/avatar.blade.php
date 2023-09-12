@props(['avatar' => null])

<img {{ $attributes->merge(['class' => 'object-cover w-10 h-10 ring-2 ring-gray ring-2 ring-gray']) }}
    src="{{ $avatar }}" alt="User avatar">
