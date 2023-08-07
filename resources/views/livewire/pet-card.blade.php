<div href="#"
    class="group block relative overflow-hidden rounded-lg bg-cover bg-no-repeat h-72 hover:scale-[1.02] transition-all duration-200"
    style="background-image: url({{ $pet->main_photo }});">

    <a href="{{ route('pets.show', $pet->id) }}" class="absolute inset-0 bg-gradient-to-t from-black opacity-60">
    </a>

    <div
        class="absolute top-3 right-3 @if (!$isBookmarked) opacity-0 group-hover:opacity-100 transition-opacity duration-300 @endif">
        <button wire:click="toggleBookmark"
            class='bg-white text-dark-700 font-medium rounded-full text-sm p-2.5 text-center inline-flex
    items-center'>
            @if ($isBookmarked)
                <span class="text-blue-700">
                    <x-icons.heart />
                </span>
            @else
                <x-icons.heart-outline />
            @endif
        </button>
    </div>

    <div class="absolute bottom-0 inset-x-0 ml-5 mb-5">
        <a href="{{ route('pets.show', $pet->id) }}"
            class="font-bold text-xl text-white dark:text-blue-500 hover:underline">
            {{ $pet->name }}
        </a>

        <p class="font-light text-gray-300 text-base">
            {{ $pet->city->title }} - {{ $pet->state->letter }}
        </p>
    </div>
</div>
