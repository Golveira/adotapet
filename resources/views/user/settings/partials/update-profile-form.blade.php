<x-card class="mb-8" id="update-profile">
    <h3 class="mb-4 text-xl font-semibold dark:text-white">
        {{ __('Edit Profile') }}
    </h3>

    <form class="mt-6 space-y-6" action="{{ route('settings.profile.update') }}" method="post">
        @csrf
        @method('put')

        <div>
            <x-forms.label for="name" value="{{ __('Name') }}*" />
            <x-forms.input id="name" name="name" type="text" :value="old('name', $user->name)" />
            <x-forms.errors :messages="$errors->get('name')" />
        </div>

        <div>
            <x-forms.label for="email" value="{{ __('Email') }}*" />
            <x-forms.input id="email" name="email" type="email" :value="old('email', $user->email)" />
            <x-forms.errors :messages="$errors->get('email')" />
        </div>

        <div>
            <x-forms.label for="username" value="{{ __('Username') }}*" />
            <x-forms.input id="username" name="username" type="text" :value="old('username', $user->username)" />
            <x-forms.errors :messages="$errors->get('username')" />
        </div>

        <div>
            <x-forms.label for="whatsapp" :value="__('Whatsapp')" />
            <x-forms.input id="whatsapp" name="whatsapp" type="text" :value="old('whatsapp', $user->profile?->whatsapp)" />
            <x-forms.errors :messages="$errors->get('whatsapp')" />
        </div>

        <div>
            <x-forms.label for="website" :value="__('Website')" />
            <x-forms.input id="website" name="website" type="text" :value="old('website', $user->profile?->website)" />
            <x-forms.errors :messages="$errors->get('website')" />
        </div>

        <div>
            <x-forms.label for="location" :value="__('Location')" />
            <x-forms.input id="location" name="location" type="text" :value="old('location', $user->profile?->location)" />
            <x-forms.errors :messages="$errors->get('location')" />
        </div>

        <div>
            <x-forms.label for="bio" :value="__('About me')" />
            <x-forms.text-area id="bio" name="bio">
                {{ old('bio', $user->profile?->bio) }}
            </x-forms.text-area>
            <x-forms.errors :messages="$errors->get('bio')" />
        </div>

        <div>
            <x-buttons.primary-button type="submit">
                {{ __('Save') }}
            </x-buttons.primary-button>
        </div>
    </form>
</x-card>
