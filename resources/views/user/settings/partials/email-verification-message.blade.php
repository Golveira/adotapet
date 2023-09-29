@if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
    <div class="mb-6">
        <x-alert type="warning">
            <div class="flex flex-col items-center text-sm text-gray-800 md:flex-row">
                <p class="mr-1">
                    {{ __('Your email address is unverified.') }}
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <button class="rounded-md text-sm text-gray-600 underline hover:text-gray-900" type="submit">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </form>
            </div>

            @if (session('status') === 'verification-link-sent')
                <p class="mt-2 text-sm font-medium text-green-600">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
            @endif
        </x-alert>
    </div>
@endif
