@props([
    'color' => 'blue',
    'colors' => [
        'blue' => 'bg-blue-100 text-blue-800',
        'gray' => 'bg-gray-100 text-gray-800',
        'green' => 'bg-green-100 text-green-800',
        'indigo' => 'bg-indigo-100 text-indigo-800',
        'orange' => 'bg-orange-100 text-orange-800',
        'pink' => 'bg-pink-100 text-pink-800',
        'purple' => 'bg-purple-100 text-purple-800',
        'red' => 'bg-red-100 text-red-800',
        'yellow' => 'bg-yellow-100 text-yellow-800',
    ],
])

<span class="inline-flex items-center px-2 py-1 mr-2 text-sm font-medium rounded {{ $colors[$color] }}"
    {{ $attributes }}>
    {{ $slot }}
    <button type="button" class="inline-flex items-center p-1 ml-2 text-sm bg-transparent rounded-sm"
        data-dismiss-target="#badge-dismiss-default" aria-label="Remove">
        <svg class="w-2 h-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Remove badge</span>
    </button>
</span>
