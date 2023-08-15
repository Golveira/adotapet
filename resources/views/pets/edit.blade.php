<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card class="px-10">
                <h2 class="text-xl font-bold text-gray-900 text-center">
                    {{ __('Edit Pet') }}
                </h2>

                <form method="post" action="{{ route('pets.update', $pet->id) }}" class="mt-6 space-y-6"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="flex items-center">
                        <div class="mr-10">
                            <x-avatar class="border h-20 w-20" :avatar="$pet->main_photo" />
                        </div>

                        <div class="flex flex-col grow">
                            <x-file-input id="avatar" name="avatar" />
                            <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="name" value="{{ __('Name') }}*" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            value="{{ $pet->name }}" autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="grid lg:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="specie" value="{{ __('Specie') }}*" />
                            <x-specie-select name="specie" :selected="$pet->specie" />
                            <x-input-error class="mt-2" :messages="$errors->get('specie')" />
                        </div>

                        <div>
                            <x-input-label for="sex" value="{{ __('Sex') }}*" />
                            <x-sex-select name="sex" :selected="$pet->sex" />
                            <x-input-error class="mt-2" :messages="$errors->get('sex')" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="age" value="{{ __('Age') }}*" />
                            <x-age-select name="age" :selected="$pet->age" />
                            <x-input-error class="mt-2" :messages="$errors->get('age')" />
                        </div>

                        <div>
                            <x-input-label for="size" value="{{ __('Size') }}*" />
                            <x-size-select name="size" :selected="$pet->size" />
                            <x-input-error class="mt-2" :messages="$errors->get('size')" />
                        </div>
                    </div>

                    <livewire:city-state-select :stateId="$pet->state_id" :cityId="$pet->city_id" />

                    <div>
                        <x-input-label for="description" :value="__('About the pet')" />
                        <x-text-area id="description" name="description" class="mt-1">
                            {{ $pet->description }}
                        </x-text-area>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <h3 class="font-medium text-sm text-gray-700 mb-2">
                            {{ __('Veterinary Cares') }}
                        </h3>

                        <x-veterinary-cares-checkboxes :checkedValues="$veterinaryCares" />
                    </div>

                    <div>
                        <h3 class="font-medium text-sm text-gray-700 mb-2">
                            {{ __('Temperament') }}
                        </h3>

                        <x-temperaments-checkboxes :checkedValues="$temperaments" />
                    </div>

                    <div>
                        <h3 class="font-medium text-sm text-gray-700 mb-2">
                            {{ __('Sociable with') }}
                        </h3>

                        <x-sociabilities-checkboxes :checkedValues="$sociabilities" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-button class="w-full" type="submit">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
