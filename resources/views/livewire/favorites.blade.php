<section>
    <div class="py-8 px-4 mx-auto max-w-screen-xl  lg:py-16 lg:px-6">
        <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16 text-center">
            <h2 class="mb-4 lg:text-xl text-3xl tracking-tight font-extrabold text-gray-900">
                {{ __('Favorites') }}
            </h2>
        </div>

        <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @forelse ($pets as $pet)
                <livewire:pet-card wire:key="item-{{ $pet->id }}" :pet="$pet" />
            @empty
                <div class="col-span-4 text-center text-xl">
                    {{ __('No pets found') }}
                </div>
            @endforelse
        </div>

        <div class="mt-5">
            {{ $pets->links() }}
        </div>
    </div>
</section>
