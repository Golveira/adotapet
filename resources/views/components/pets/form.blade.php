@props([
    'pet' => null,
    'route',
    'method' => 'POST',
    'withUser' => false,
])

<x-card>
    <form class="space-y-6 px-6" action="{{ $route }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method($method)

        @if ($withUser)
            <div class="grid gap-4 lg:grid-cols-2">
                <div>
                    <x-forms.label for="user_id" value="{{ __('User') }}*" />
                    <livewire:user-select :selectedUser="$pet?->user" />
                    <x-forms.errors :messages="$errors->get('user_id')" />
                </div>

                <div>
                    <x-forms.label for="name" value="{{ __('Name') }}*" />
                    <x-forms.input id="name" name="name" type="text" value="{{ old('name', $pet?->name) }}" />
                    <x-forms.errors :messages="$errors->get('name')" />
                </div>
            </div>
        @else
            <div>
                <x-forms.label for="name" value="{{ __('Name') }}*" />
                <x-forms.input id="name" name="name" type="text" value="{{ old('name', $pet?->name) }}" />
                <x-forms.errors :messages="$errors->get('name')" />
            </div>
        @endif

        <div class="grid gap-4 lg:grid-cols-2">
            <div>
                <x-forms.label for="specie" value="{{ __('Specie') }}*" />
                <x-pets.specie-select name="specie" selected="{{ old('specie', $pet?->specie) }}" />
                <x-forms.errors :messages="$errors->get('specie')" />
            </div>

            <div>
                <x-forms.label for="sex" value="{{ __('Sex') }}*" />
                <x-pets.sex-select name="sex" selected="{{ old('sex', $pet?->sex) }}" />
                <x-forms.errors :messages="$errors->get('sex')" />
            </div>
        </div>

        <div class="grid gap-4 lg:grid-cols-2">
            <div>
                <x-forms.label for="age" value="{{ __('Age') }}*" />
                <x-pets.age-select name="age" selected="{{ old('age', $pet?->age) }}" />
                <x-forms.errors :messages="$errors->get('age')" />
            </div>

            <div>
                <x-forms.label for="size" value="{{ __('Size') }}*" />
                <x-pets.size-select name="size" selected="{{ old('size', $pet?->size) }}" />
                <x-forms.errors :messages="$errors->get('size')" />
            </div>
        </div>

        <livewire:city-state-select :stateId="old('state_id', $pet?->state_id)" :cityId="old('city_id', $pet?->city_id)" />

        <div>
            <x-forms.label for="photo" value="{{ __('Photo') }}*" />

            <div class="flex items-center">
                @if ($pet)
                    <div class="mr-10">
                        <x-avatar class="h-20 w-20 rounded-full" :avatar="$pet->main_photo" />
                    </div>
                @endif

                <div class="flex grow flex-col">
                    <x-forms.file-input id="photo" name="photo" />
                    <x-forms.errors :messages="$errors->get('photo')" />
                </div>
            </div>
        </div>

        <div>
            <x-forms.label for="description" value="{{ __('Description') }}*" />
            <x-forms.text-area id="description" name="description">
                {{ old('description', $pet?->description) }}
            </x-forms.text-area>
            <x-forms.errors :messages="$errors->get('description')" />
        </div>

        <div>
            <h3 class="mb-2 text-sm font-medium text-gray-700">
                {{ __('Veterinary Cares') }}
            </h3>

            <x-pets.veterinary-cares-checkboxes :checkedValues="old('veterinary_cares', $pet?->veterinaryCaresId)" />
        </div>

        <div>
            <h3 class="mb-2 text-sm font-medium text-gray-700">
                {{ __('Temperaments') }}
            </h3>

            <x-pets.temperaments-checkboxes :checkedValues="old('temperaments', $pet?->temperamentsId)" />
        </div>

        <div>
            <h3 class="mb-2 text-sm font-medium text-gray-700">
                {{ __('Sociable with') }}
            </h3>

            <x-pets.sociabilities-checkboxes :checkedValues="old('sociabilities', $pet?->sociabilitiesId)" />
        </div>

        <div>
            <x-buttons.primary-button type="submit">
                {{ __('Save') }}
            </x-buttons.primary-button>

            <x-buttons.secondary-button href="{{ url()->previous() }}">
                {{ __('Cancel') }}
            </x-buttons.secondary-button>
        </div>
    </form>
</x-card>
