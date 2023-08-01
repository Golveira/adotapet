<div
    class="absolute top-3 right-3 @if (!$pet->is_bookmarked) opacity-0 group-hover:opacity-100 transition-opacity duration-300 @endif">
    <button wire:click="toggleBookmark"
        class='bg-white text-dark-700 font-medium rounded-full text-sm p-2.5 text-center inline-flex
    items-center'>

        @if ($pet->is_bookmarked)
            <span class="text-blue-700">
                <x-icons.heart />
            </span>
        @else
            <x-icons.heart-outline />
        @endif
    </button>
</div>
