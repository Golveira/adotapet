<div class="group relative block h-72 overflow-hidden rounded-lg bg-cover bg-no-repeat transition-all duration-200 hover:scale-[1.02]"
    style="background-image: url({{ $pet->main_photo }});">

    <a class="absolute inset-0 bg-gradient-to-t from-black opacity-60" href="{{ route('pets.show', $pet->id) }}">
    </a>

    <livewire:favorite-button :pet="$pet" :withOverlay="true" />

    <div class="absolute inset-x-0 bottom-0 mb-5 ml-5">
        <a class="text-xl font-bold text-white hover:underline" href="{{ route('pets.show', $pet->id) }}">
            {{ $pet->name }}
        </a>

        <p class="text-base font-light text-gray-300">
            {{ $pet->address }}
        </p>
    </div>
</div>
