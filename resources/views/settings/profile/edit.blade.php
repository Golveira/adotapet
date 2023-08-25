<x-app-layout>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-4 xl:gap-4 dark:bg-gray-900">
            @include('settings.partials.menu')

            <div class="col-span-3">
                <livewire:avatar-upload />

                <div
                    class="p-4 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <h3 class="mb-4 text-xl font-semibold dark:text-white">
                        {{ __('Profile') }}
                    </h3>

                    <form action="{{ route('settings.profile.update') }}" method="post" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div>
                            <x-input-label for="name" value="{{ __('Name') }}*" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                :value="old('name', $user->name)" autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="username" value="{{ __('Username') }}*" />
                            <x-text-input id="username" name="username" type="text" class="mt-1 block w-full"
                                :value="old('username', $user->username)" autofocus autocomplete="username" />
                            <x-input-error class="mt-2" :messages="$errors->get('username')" />
                        </div>

                        <div>
                            <x-input-label for="whatsapp" :value="__('Whatsapp')" />
                            <x-text-input id="whatsapp" name="whatsapp" type="text" class="mt-1 block w-full"
                                :value="old('whatsapp', $user->profile?->whatsapp)" autofocus autocomplete="whatsapp" />
                            <x-input-error class="mt-2" :messages="$errors->get('whatsapp')" />
                        </div>

                        <div>
                            <x-input-label for="website" :value="__('Website')" />
                            <x-text-input id="website" name="website" type="text" class="mt-1 block w-full"
                                :value="old('website', $user->profile?->website)" autofocus autocomplete="website" />
                            <x-input-error class="mt-2" :messages="$errors->get('website')" />
                        </div>

                        <div>
                            <x-input-label for="location" :value="__('Location')" />
                            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full"
                                :value="old('location', $user->profile?->location)" autofocus autocomplete="location" />
                            <x-input-error class="mt-2" :messages="$errors->get('location')" />
                        </div>

                        <div>
                            <x-input-label for="bio" :value="__('About me')" />
                            <x-text-area id="bio" name="bio" class="mt-1">
                                {{ old('bio', $user->profile?->bio) }}
                            </x-text-area>
                            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                        </div>

                        <div class="col-span-6 sm:col-full">
                            <x-button type="submit" class="">
                                {{ __('Save') }}
                            </x-button>
                        </div>
                    </form>
                </div>

                @include('settings.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
