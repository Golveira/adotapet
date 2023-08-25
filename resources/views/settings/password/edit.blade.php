<x-app-layout>
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-4 xl:gap-4 dark:bg-gray-900">
            @include('settings.partials.menu')

            <div class="col-span-3">
                <div
                    class="p-4 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                    <h3 class="mb-4 text-xl font-semibold dark:text-white">
                        {{ __('Update Password') }}
                    </h3>

                    <form method="post" action="{{ route('settings.password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')

                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6">
                                <div>
                                    <x-input-label for="current_password" :value="__('Current Password')" />
                                    <x-text-input id="current_password" name="current_password" type="password"
                                        class="mt-1 block w-full" autocomplete="current-password" />
                                    <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-span-6">
                                <div>
                                    <x-input-label for="password" :value="__('New Password')" />
                                    <x-text-input id="password" name="password" type="password"
                                        class="mt-1 block w-full" autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-span-6">
                                <div>
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                    <x-text-input id="password_confirmation" name="password_confirmation"
                                        type="password" class="mt-1 block w-full" autocomplete="new-password" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-full">
                                <x-button type="submit" class="">{{ __('Save') }}</x-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
