@props(['avatar' => null])


@if ($avatar)
    <img {{ $attributes->merge(['class' => 'w-10 h-10 rounded-full']) }} src="{{ $avatar }}" alt="User avatar">
@else
    <img {{ $attributes->merge(['class' => 'w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500']) }}
        src="{{ asset('assets/images/user.png') }}" alt="User avatar">
@endif
