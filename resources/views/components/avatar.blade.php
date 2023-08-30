@props(['avatar' => null])

<img {{ $attributes->merge(['class' => 'w-10 h-10 object-cover']) }} src="{{ $avatar }}" alt="User avatar">
