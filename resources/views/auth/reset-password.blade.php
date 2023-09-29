<x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input name="token" type="hidden" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-forms.label for="email" :value="__('Email')" />
            <x-forms.input id="email" name="email" type="email" :value="old('email', $request->email)" required />
            <x-forms.errors :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-forms.label for="password" :value="__('Password')" />
            <x-forms.input id="password" name="password" type="password" required />
            <x-forms.errors :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-forms.label for="password_confirmation" :value="__('Confirm Password')" />
            <x-forms.input id="password_confirmation" name="password_confirmation" type="password" required />
            <x-forms.errors :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="mt-4">
            <x-buttons.primary-button class="w-full">
                {{ __('Reset Password') }}
            </x-buttons.primary-button>
        </div>
    </form>
</x-guest-layout>
