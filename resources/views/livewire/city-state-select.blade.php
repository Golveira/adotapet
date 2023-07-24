<div class="grid lg:grid-cols-2 gap-4">
    <div>
        <x-input-label class="mb-3 text-lg" for="state" :value="__('State')" />
        <x-select wire:model="stateId" id="state" name="state_id">
            <option value>{{ __('Select the state') }}</option>

            @foreach ($states as $state)
                <option value="{{ $state->id }}">
                    {{ $state->title }}
                </option>
            @endforeach
        </x-select>
    </div>

    <div>
        <x-input-label class="mb-3 text-lg" for="city" :value="__('City')" />
        <x-select wire:model.defer="cityId" id="city" name="city_id">
            <option value>{{ __('Select the city') }}</option>

            @foreach ($cities as $city)
                <option value="{{ $city->id }}">
                    {{ $city->title }}
                </option>
            @endforeach
        </x-select>
    </div>
</div>
