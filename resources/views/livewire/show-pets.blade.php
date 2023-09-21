<div class="grid gap-8 sm:grid-cols-2 md:grid-cols-10 lg:grid-cols-12 lg:gap-12">
    <div class="col-span-10 md:col-span-5 lg:col-span-3">
        <x-card>
            <div class="mb-5">
                <x-forms.label for="name" :value="__('Name')" />
                <x-forms.input id="name" wire:model.lazy="filters.name" placeholder="{{ __('Pet name') }}" />
            </div>

            <div class="mb-5">
                <x-forms.label for="specie" :value="__('Specie')" />
                <x-pets.specie-select wire:model="filters.specie" placeholder="{{ __('All species') }}" />
            </div>

            <div class="mb-5">
                <x-forms.label for="sex" :value="__('Sex')" />
                <x-pets.sex-select wire:model="filters.sex" placeholder="{{ __('All sex') }}" />
            </div>

            <div class="mb-5">
                <x-forms.label for="size" :value="__('Size')" />
                <x-pets.size-select wire:model="filters.size" placeholder="{{ __('All sizes') }}" />
            </div>

            <div class="mb-5">
                <x-forms.label for="age" :value="__('Age')" />
                <x-pets.age-select wire:model="filters.age" placeholder="{{ __('All ages') }}" />
            </div>

            <div class="mb-5">
                <x-forms.label for="state" :value="__('State')" />
                <x-forms.select id="state" wire:model="filters.stateId">
                    <option value>{{ __('All states') }}</option>

                    @foreach ($states as $state)
                        <option value="{{ $state->id }}">
                            {{ $state->title }}
                        </option>
                    @endforeach
                </x-forms.select>
            </div>

            <div class="mb-5">
                <x-forms.label for="city" :value="__('City')" />
                <x-forms.select id="city" wire:model="filters.cityId">
                    <option value>{{ __('All cities') }}</option>

                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">
                            {{ $city->title }}
                        </option>
                    @endforeach
                </x-forms.select>
            </div>
        </x-card>
    </div>

    <div class="col-span-10 md:col-span-5 lg:col-span-9" wire:loading.delay.class="opacity-50">
        @if ($this->hasFilters())
            <div class="mb-4">
                @foreach ($this->getFilters() as $key => $value)
                    <x-chips wire:click="clearFilter('{{ $key }}')">
                        {{ __($this->displayFilter($key, $value)) }}
                    </x-chips>
                @endforeach

                @if (count($this->getFilters()) > 1)
                    <x-chips wire:click="clearAllFilters">
                        {{ __('Clear filters') }}
                    </x-chips>
                @endif
            </div>
        @endif

        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 xl:grid-cols-3">
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
</div>
