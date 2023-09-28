<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __("Before getting started, you must verify your email address by clicking on the verification link sent tou your email. If you didn't receive verification link, check your spam folder or request a new link.") }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-buttons.primary-button>
                    {{ __('Resend Verification Email') }}
                </x-buttons.primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-buttons.dark-button type="submit">
                {{ __('Log Out') }}
            </x-buttons.dark-button>
        </form>
    </div>
</x-guest-layout>
