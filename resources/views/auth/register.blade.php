<x-guest-layout>
    <form class="p-3" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-forms.label for="name" :value="__('Name')" />
            <x-forms.input id="name" name="name" type="text" :value="old('name')" autofocus />
            <x-forms.errors :messages="$errors->get('name')" />
        </div>

        <!-- Username -->
        <div class="mt-4">
            <x-forms.label for="username" :value="__('Username')" />
            <x-forms.input id="username" name="username" type="text" :value="old('username')" />
            <x-forms.errors :messages="$errors->get('username')" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-forms.label for="email" :value="__('Email')" />
            <x-forms.input id="email" name="email" type="email" :value="old('email')" />
            <x-forms.errors :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-forms.label for="password" :value="__('Password')" />
            <x-forms.input id="password" name="password" type="password" />
            <x-forms.errors :messages="$errors->get('password')" />
        </div>

        <!-- Password Confirmation -->
        <div class="mt-4">
            <x-forms.label for="password_confirmation" :value="__('Confirm Password')" />
            <x-forms.input id="password_confirmation" name="password_confirmation" type="password" />
            <x-forms.errors :messages="$errors->get('password_confirmation')" />
        </div>

        <!-- Terms of use and privacy -->
        <div class="mt-4 text-sm text-gray-500">
            {{ __('By signing up, you agree to our') }}

            <x-links.primary-link href="#">
                {{ __('Terms of Use and Privacy Policy') }}
            </x-links.primary-link>
        </div>

        <div class="mt-4">
            <x-buttons.primary-button class="w-full">
                {{ __('Register') }}
            </x-buttons.primary-button>
        </div>

        <p class="mt-4 text-sm font-light text-gray-500">
            {{ __('Already have an account?') }}

            <x-links.primary-link :href="route('login')">
                {{ __('Log in') }}
            </x-links.primary-link>
        </p>
    </form>
</x-guest-layout>
