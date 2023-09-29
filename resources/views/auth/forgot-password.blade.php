<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Please enter your email, and we will send you instructions to create your new password.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-forms.label for="email" :value="__('Email')" />
            <x-forms.input id="email" name="email" type="email" :value="old('email')" required />
            <x-forms.errors :messages="$errors->get('email')" />
        </div>

        <div class="mt-4 flex items-center justify-between">
            <x-buttons.primary-button>
                {{ __('Send') }}
            </x-buttons.primary-button>

            <x-links.dark-link class="text-sm" href="{{ url()->previous() }}">
                {{ __('Back') }}
            </x-links.dark-link>
        </div>
    </form>
</x-guest-layout>
