<div class="p-4 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800"
    id="privacy-settings">
    <h3 class="mb-2 text-xl font-semibold dark:text-white">
        {{ __('Delete Account') }}
    </h3>

    <p class="mb-4 text-sm text-gray-600">
        {{ __('All your data will be permanently deleted from the site.') }}
    </p>

    <x-button color="red" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Delete Account') }}
    </x-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('settings.account.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('All your pets and data will be permanently deleted from the site. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-button href="#" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-button>

                <x-button type="submit" color="red" class="ml-3">
                    {{ __('Delete Account') }}
                </x-button>
            </div>
        </form>
    </x-modal>
</div>
