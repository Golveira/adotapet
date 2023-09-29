<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __("Before proceeding, please verify your email address. To do so, simply click the button below, and we'll send a verification link to your email.") }}
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

        <x-links.dark-link class="text-sm" href="{{ url()->previous() }}">
            {{ __('Back') }}
        </x-links.dark-link>
    </div>
</x-guest-layout>
