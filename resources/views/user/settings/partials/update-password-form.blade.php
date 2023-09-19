<x-card class="mb-8" id="update-password">
    <h3 class="mb-4 text-xl font-semibold dark:text-white">
        {{ __('Update Password') }}
    </h3>

    <form class="mt-6 space-y-6" method="post" action="{{ route('settings.password.update') }}">
        @csrf
        @method('put')

        <div>
            <x-forms.label for="current_password" :value="__('Current Password')" />
            <x-forms.input id="current_password" name="current_password" type="password" />
            <x-forms.errors :messages="$errors->get('current_password')" />
        </div>

        <div>
            <x-forms.label for="password" :value="__('New Password')" />
            <x-forms.input id="password" name="password" type="password" />
            <x-forms.errors :messages="$errors->get('password')" />
        </div>

        <div>
            <x-forms.label for="password_confirmation" :value="__('Confirm Password')" />
            <x-forms.input id="password_confirmation" name="password_confirmation" type="password" />
            <x-forms.errors :messages="$errors->get('password_confirmation')" />
        </div>

        <div>
            <x-buttons.primary-button type="submit">
                {{ __('Save') }}
            </x-buttons.primary-button>
        </div>
    </form>
</x-card>
