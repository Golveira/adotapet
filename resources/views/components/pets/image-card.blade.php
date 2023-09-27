<div class="relative max-w-sm">
    <img class="h-72 w-96 rounded-lg object-cover" src="{{ $image->getUrl() }}">

    <button class="absolute inset-x-0 bottom-0 rounded-b-lg bg-red-700 py-2 text-center font-bold text-white"
        wire:click="$emit('delete', {{ $image->id }})">
        {{ __('Remove') }}
    </button>
</div>
