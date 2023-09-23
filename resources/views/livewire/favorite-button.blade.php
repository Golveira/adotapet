<button wire:click="toggleFavorite">
    @if ($isFavorite)
        <x-icons.heart class="h-6 w-6 text-blue-700" />
    @else
        <x-icons.heart-outline class="h-6 w-6" />
    @endif
</button>
