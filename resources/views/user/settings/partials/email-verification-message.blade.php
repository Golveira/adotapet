@if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
    <div class="mb-6">
        <x-alert type="warning">
            <p class="mt-2 text-sm text-gray-800">
                {{ __('Your email address is unverified.') }}

                <button
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    form="send-verification">
                    {{ __('Click here to re-send the verification email.') }}
                </button>
            </p>

            @if (session('status') === 'verification-link-sent')
                <p class="mt-2 text-sm font-medium text-green-600">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
            @endif
        </x-alert>
    </div>
@endif
