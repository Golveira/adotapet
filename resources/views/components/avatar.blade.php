@props(['avatar' => null])

<img {{ $attributes->merge(['class' => 'w-10 h-10 rounded-full']) }} src="{{ $avatar }}" alt="User avatar">
