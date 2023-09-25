<div
    class="@if ($withOverlay && !$isFavorite) opacity-0 group-hover:opacity-100 transition-opacity duration-300 @endif absolute right-3 top-3">
    <div class="@if ($withOverlay) inline-flex items-center rounded-full bg-white p-2 @endif">
        <button wire:click="toggleFavorite">
            @if ($isFavorite)
                <x-icons.heart class="{{ $classes }} text-blue-700" />
            @else
                <x-icons.heart-outline class="{{ $classes }}" />
            @endif
        </button>
    </div>
</div>
