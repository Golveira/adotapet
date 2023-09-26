<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="p-3" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
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

        <!-- Remember Me -->
        <div class="mt-4 flex justify-between">
            <label class="inline-flex items-center" for="remember_me">
                <x-forms.checkbox id="remember_me" name="remember" />
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            <a class="text-sm font-medium text-blue-600 hover:underline" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        </div>

        <div class="mt-4 flex items-center justify-between">
            <x-buttons.primary-button class="mr-0 w-full" type="submit">
                {{ __('Log in') }}
            </x-buttons.primary-button>
        </div>

        <p class="mt-4 text-sm font-light text-gray-500">
            {{ __('Don’t have an account yet?') }}
            <a class="font-medium text-blue-600 hover:underline" href="{{ route('register') }}">
                {{ __('Sign up') }}
            </a>
        </p>
    </form>
</x-guest-layout>
