<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-card class="px-10">
                <h2 class="text-xl font-bold text-gray-900 text-center">
                    {{ __('Add Pet') }}
                </h2>

                <form method="post" action="{{ route('pets.store') }}" class="mt-6 space-y-6"
                    enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                            value="{{ old('name') }}" autofocus autocomplete="name" />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div class="grid lg:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="specie" :value="__('Specie')" />
                            <x-specie-select name="specie" :selected="old('specie')" />
                            <x-input-error class="mt-2" :messages="$errors->get('specie')" />
                        </div>

                        <div>
                            <x-input-label for="sex" :value="__('Sex')" />
                            <x-sex-select name="sex" :selected="old('sex')" />
                            <x-input-error class="mt-2" :messages="$errors->get('sex')" />
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="age" :value="__('Age')" />
                            <x-age-select name="age" :selected="old('age')" />
                            <x-input-error class="mt-2" :messages="$errors->get('age')" />
                        </div>

                        <div>
                            <x-input-label for="size" :value="__('Size')" />
                            <x-size-select name="size" :selected="old('size')" />
                            <x-input-error class="mt-2" :messages="$errors->get('size')" />
                        </div>
                    </div>

                    <livewire:city-state-select :stateId="old('state_id')" :cityId="old('city_id')" />

                    <div>
                        <x-input-label for="photo" :value="__('Main photo')" />
                        <x-file-input id="photo" name="photo" />
                        <x-input-error class="mt-2" :messages="$errors->get('photo')" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('About the pet')" />
                        <x-text-area id="description" name="description" class="mt-1">
                            {{ old('description') }}
                        </x-text-area>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div>
                        <h3 class="font-medium text-sm text-gray-700 mb-2">
                            {{ __('Veterinary Cares') }}
                        </h3>

                        <x-veterinary-cares-checkboxes :checkedValues="old('veterinary_cares')" />
                    </div>

                    <div>
                        <h3 class="font-medium text-sm text-gray-700 mb-2">
                            {{ __('Temperaments') }}
                        </h3>

                        <x-temperaments-checkboxes :checkedValues="old('temperaments')" />
                    </div>

                    <div>
                        <h3 class="font-medium text-sm text-gray-700 mb-2">
                            {{ __('Sociable with') }}
                        </h3>

                        <x-sociabilities-checkboxes :checkedValues="old('sociabilities')" />
                    </div>

                    <div class="flex items-center gap-4">
                        <x-button type="submit" class="w-full">
                            {{ __('Save') }}
                        </x-button>
                    </div>
                </form>
            </x-card>
        </div>
    </div>
</x-app-layout>
