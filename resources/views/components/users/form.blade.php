@props([
    'user' => null,
    'route',
    'method' => 'POST',
])

<x-card>
    <form action="{{ $route }}" method="{{ $method }}" class="px-6 space-y-6">
        @csrf

        @if ($user)
            @method('PUT')
        @endif

        <div>
            <x-forms.label for="name" value="{{ __('Name') }}*" />
            <x-forms.input id="name" name="name" type="text" :value="old('name', $user?->name)" />
            <x-forms.errors :messages="$errors->get('name')" />
        </div>

        <div>
            <x-forms.label for="username" value="{{ __('Username') }}*" />
            <x-forms.input id="username" name="username" type="text" :value="old('username', $user?->username)" />
            <x-forms.errors :messages="$errors->get('username')" />
        </div>

        <div>
            <x-forms.label for="email" value="{{ __('Email') }}*" />
            <x-forms.input id="email" name="email" type="email" :value="old('email', $user?->email)" />
            <x-forms.errors :messages="$errors->get('email')" />
        </div>

        <div>
            <x-forms.label for="password" :value="__('Password')" />
            <x-forms.input id="password" name="password" type="password" />
            <x-forms.errors :messages="$errors->get('password')" />
        </div>

        <div>
            <x-forms.label for="password_confirmation" :value="__('Confirm Password')" />
            <x-forms.input id="password_confirmation" name="password_confirmation" type="password" />
            <x-forms.errors :messages="$errors->get('password_confirmation')" />
        </div>

        <div>
            <x-toggle name="is_admin" :value="old('is_admin', $user?->is_admin)" label="{{ __('Administrator') }}" />
        </div>

        <div>
            <x-buttons.primary-button type="submit">
                {{ __('Save') }}
            </x-buttons.primary-button>

            <x-buttons.secondary-button href="{{ route('admin.users.index') }}">
                {{ __('Cancel') }}
            </x-buttons.secondary-button>
        </div>
    </form>
</x-card>
