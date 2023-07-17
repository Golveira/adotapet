<section class="bg-white">
    <div class="max-w-screen-xl px-4 py-8 mx-auto">
        <div class="grid lg:grid-cols-10 md:grid-cols-10 sm:grid-cols-2 lg:gap-12 md:gap-6">
            <div class="lg:col-span-2 md:col-span-5 col-span-10">
                <form wire:submit.prevent="filterPets">
                    <div class="mb-5">
                        <x-input-label class="mb-3 text-lg" for="specie" :value="__('Specie')" />
                        <x-specie-select wire:model.defer="specie" />
                    </div>

                    <div class="mb-5">
                        <x-input-label class="mb-3 text-lg" for="sex" :value="__('Sex')" />
                        <x-sex-select wire:model.defer="sex" />
                    </div>

                    <div class="mb-5">
                        <x-input-label class="mb-3 text-lg" for="size" :value="__('Size')" />
                        <x-size-select wire:model.defer="size" />
                    </div>

                    <div class="mb-5">
                        <x-input-label class="mb-3 text-lg" for="age" :value="__('Age')" />
                        <x-age-select wire:model.defer="age" />
                    </div>

                    <div class="mb-5">
                        <x-button type="submit" color="blue" class="w-full">
                            {{ __('Search') }}
                        </x-button>
                    </div>
                </form>
            </div>

            <div class="lg:col-span-8 md:col-span-5 col-span-10" wire:loading.delay.class="opacity-50">
                <div class="grid xl:grid-cols-4 lg:grid-cols-2 grid-cols-1 gap-6">
                    @foreach ($pets as $pet)
                        <x-pet-card :pet="$pet" />
                    @endforeach

                </div>

                <div class="mt-5">
                    {{ $pets->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
