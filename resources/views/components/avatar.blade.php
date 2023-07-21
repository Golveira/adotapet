@props(['avatar' => null])

@if ($avatar)
    <img class="w-10 h-10 p-1 rounded-full ring-2 ring-gray-300 dark:ring-gray-500" src="{{ $avatar }}"
        alt="Bordered avatar">
@else
    <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
        <x-icons.user-placeholder />
    </div>
@endif
