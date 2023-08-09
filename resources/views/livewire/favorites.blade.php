<section>
    <div class="py-8 px-4 mx-auto max-w-screen-xl">
        <h2 class="mb-8 lg:text-2xl text-xl text-center tracking-tight font-extrabold text-gray-900">
            {{ __('Favorites pets') }}
        </h2>

        <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @forelse ($pets as $pet)
                <livewire:pet-card wire:key="item-{{ $pet->id }}" :pet="$pet" />
            @empty
                <div class="mt-10 col-span-4 text-center">
                    <h3 class="text-xl mb-3"> {{ __("You don't have favorite pets yet") }}</h3>

                    <p class="mb-6 text-gray-600">
                        {{ __('You can search for pets and add them to your favorites') }}
                    </p>

                    <x-button href="{{ route('pets.index') }}">
                        {{ __('Search pets') }}
                    </x-button>
                </div>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $pets->links() }}
        </div>
    </div>
</section>
