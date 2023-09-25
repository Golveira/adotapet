<section>
    <div class="mx-auto max-w-screen-xl px-4 py-8">
        <h2 class="mb-8 text-center text-xl font-extrabold tracking-tight text-gray-900 lg:text-2xl">
            {{ __('Favorites pets') }}
        </h2>

        <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @forelse ($pets as $pet)
                <livewire:pet-card :pet="$pet" :wire:key="$pet->id" />
            @empty
                <div class="col-span-4 mt-10 text-center">
                    <h3 class="mb-3 text-xl"> {{ __("You don't have favorite pets yet") }}</h3>

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
