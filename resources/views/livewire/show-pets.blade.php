<div class="grid lg:grid-cols-12 md:grid-cols-10 sm:grid-cols-2 lg:gap-12 gap-8">
    <div class="lg:col-span-3 md:col-span-5 col-span-10">
        <x-card>
            <div class="mb-5">
                <x-input-label class="mb-3 text-lg" for="specie" :value="__('Specie')" />
                <x-specie-select wire:model="specie" placeholder="{{ __('All species') }}" />
            </div>

            <div class="mb-5">
                <x-input-label class="mb-3 text-lg" for="sex" :value="__('Sex')" />
                <x-sex-select wire:model="sex" placeholder="{{ __('All sex') }}" />
            </div>

            <div class="mb-5">
                <x-input-label class="mb-3 text-lg" for="size" :value="__('Size')" />
                <x-size-select wire:model="size" placeholder="{{ __('All sizes') }}" />
            </div>

            <div class="mb-5">
                <x-input-label class="mb-3 text-lg" for="age" :value="__('Age')" />
                <x-age-select wire:model="age" placeholder="{{ __('All ages') }}" />
            </div>

            <div class="mb-5">
                <x-input-label class="mb-3 text-lg" for="state" :value="__('State')" />
                <x-select wire:model="stateId" id="state">
                    <option value>{{ __('Any state') }}</option>

                    @foreach ($states as $state)
                        <option value="{{ $state->id }}">
                            {{ $state->title }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-5">
                <x-input-label class="mb-3 text-lg" for="city" :value="__('City')" />
                <x-select wire:model="cityId" id="city">
                    <option value>{{ __('Any city') }}</option>

                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">
                            {{ $city->title }}
                        </option>
                    @endforeach
                </x-select>
            </div>

            <div class="mb-5">
                <x-input-label class="mb-3 text-lg" for="name" :value="__('Name')" />
                <x-text-input wire:model.lazy="name" id="name" placeholder="{{ __('Pet name') }}" />
            </div>
        </x-card>
    </div>

    <div class="lg:col-span-9 md:col-span-5 col-span-10" wire:loading.delay.class="opacity-50">
        <div class="grid xl:grid-cols-3 lg:grid-cols-2 grid-cols-1 gap-6">
            @forelse ($pets as $pet)
                <x-pet-card :pet="$pet" />

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
</div>
