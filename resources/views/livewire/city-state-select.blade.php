<div class="grid gap-4 lg:grid-cols-2">
    <div>
        <x-forms.label for="state" :value="__('State')" />

        <x-forms.select id="state" name="state_id" wire:model="stateId">
            <option value>{{ __('Select the state') }}</option>

            @foreach ($states as $state)
                <option value="{{ $state->id }}" @selected($state->id == $stateId)>
                    {{ $state->title }}
                </option>
            @endforeach
        </x-forms.select>

        <x-forms.errors :messages="$errors->get('state_id')" />
    </div>

    <div>
        <x-forms.label for="city" :value="__('City')" />

        <x-forms.select id="city" name="city_id" wire:model.defer="cityId">
            <option value>{{ __('Select the city') }}</option>

            @foreach ($cities as $city)
                <option value="{{ $city->id }}" @selected($city->id == $cityId)>
                    {{ $city->title }}
                </option>
            @endforeach
        </x-forms.select>

        <x-forms.errors :messages="$errors->get('city_id')" />
    </div>
</div>
