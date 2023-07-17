@props(['user' => null])

<div class="flex items-center space-x-4">
    <img class="w-10 h-10 rounded-full" src="{{ $user->profile->avatar }}">

    <div class="font-medium dark:text-white">
        <div>{{ $user->name }}</div>
        <div class="flex text-sm text-gray-500 dark:text-gray-400">
            {{ $user->profile->address }}
        </div>
    </div>
</div>
