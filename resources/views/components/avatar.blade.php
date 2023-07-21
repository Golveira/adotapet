@props(['avatar' => null])

@if ($avatar)
    <img class="w-10 h-10 rounded-full" src="{{ $avatar }}" alt="User avatar">
@else
    <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
        <x-icons.user-placeholder />
    </div>
@endif
