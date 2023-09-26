@props(['avatar' => null])

<img src="{{ $avatar }}" alt="User avatar"
    {{ $attributes->merge(['class' => 'object-cover p-1 w-10 h-10 ring-2 ring-gray-300']) }}>
