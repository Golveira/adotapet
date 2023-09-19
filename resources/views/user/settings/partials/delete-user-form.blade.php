<x-card class="mb-8" id="remove-account">
    <h3 class="mb-2 text-xl font-semibold dark:text-white">
        {{ __('Delete Account') }}
    </h3>

    <p class="mb-4 text-sm text-gray-600">
        {{ __('All your data will be permanently deleted from the site.') }}
    </p>

    <x-button color="red" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Delete Account') }}
    </x-button>

    <x-modal name="confirm-user-deletion" focusable>
        <form class="p-6" method="post" action="{{ route('settings.profile.destroy') }}">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('All your pets and data will be permanently deleted from the site.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-buttons.primary-button href="#" x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-buttons.primary-button>

                <x-buttons.danger-button class="ml-3" type="submit">
                    {{ __('Delete Account') }}
                </x-buttons.danger-button>
            </div>
        </form>
    </x-modal>
</x-card>
