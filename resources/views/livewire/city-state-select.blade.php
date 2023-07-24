<div class="grid lg:grid-cols-2 gap-4">
    <div>
        <x-input-label class="mb-3 text-lg" for="state" :value="__('State')" />

        <x-select wire:model="stateId" id="state" name="state_id">
            <option value>{{ __('Select the state') }}</option>

            @foreach ($states as $state)
                <option value="{{ $state->id }}" @selected($state->id == $stateId)>
                    {{ $state->title }}
                </option>
            @endforeach
        </x-select>

        <x-input-error class="mt-2" :messages="$errors->get('state_id')" />
    </div>

    <div>
        <x-input-label class="mb-3 text-lg" for="city" :value="__('City')" />

        <x-select wire:model.defer="cityId" id="city" name="city_id">
            <option value>{{ __('Select the city') }}</option>

            @foreach ($cities as $city)
                <option value="{{ $city->id }}" @selected($city->id == $cityId)>
                    {{ $city->title }}
                </option>
            @endforeach
        </x-select>

        <x-input-error class="mt-2" :messages="$errors->get('city_id')" />
    </div>
</div>
