@extends('admin.layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 pt-6">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">
                {{ __('Show User') }}
            </h1>

            <div class="flex gap-2">
                <x-buttons.primary-button href="{{ route('admin.users.edit', $user->id) }}">
                    {{ __('Edit') }}
                </x-buttons.primary-button>

                <x-buttons.secondary-button href="{{ route('admin.users.index') }}">
                    {{ __('Back') }}
                </x-buttons.secondary-button>
            </div>
        </div>

        <x-card class="mb-12">
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col gap-2">
                    <span class="font-bold">{{ __('Name') }}</span>
                    <span>{{ $user->name }}</span>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="font-bold">{{ __('Email') }}</span>
                    <span>{{ $user->email }}</span>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="font-bold">{{ __('Username') }}</span>
                    <span>{{ $user->username }}</span>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="font-bold">{{ __('Administrator') }}</div>
                    <div>
                        @if ($user->is_admin)
                            <x-badge color="red">{{ __('yes') }}</x-badge>
                        @else
                            <x-badge>
                                {{ __('no') }}
                            </x-badge>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="font-bold">{{ __('Created at') }}</span>
                    <span>{{ $user->created_at->format('d/m/Y') }}</span>
                </div>

                <div class="flex flex-col gap-2">
                    <span class="font-bold">{{ __('Updated at') }}</span>
                    <span>{{ $user->updated_at->format('d/m/Y') }}</span>
                </div>
            </div>
        </x-card>


        <div>
            <h1 class="text-xl font-bold mb-4">
                {{ __('Pets') }}
            </h1>

            <livewire:pet-table :userId="$user->id" />
        </div>
    </div>
@endsection
