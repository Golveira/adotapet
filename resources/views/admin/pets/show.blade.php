@extends('admin.layouts.app')

@section('content')
    <div class="mx-auto max-w-6xl px-4 pt-6">
        <div class="mb-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold">
                {{ __('Pet Details') }}
            </h1>

            <div class="flex gap-2">
                <x-buttons.primary-button href="{{ route('admin.pets.edit', $pet->id) }}">
                    {{ __('Edit') }}
                </x-buttons.primary-button>

                <x-buttons.secondary-button href="{{ route('admin.pets.index') }}">
                    {{ __('Back') }}
                </x-buttons.secondary-button>
            </div>
        </div>

        <x-card class="mb-12">
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <div class="mb-1 font-bold">{{ __('Name') }}</div>
                    <div>{{ $pet->name }}</div>
                </div>

                <div>
                    <div class="mb-1 font-bold">{{ __('User') }}</div>
                    <div>
                        <x-links.primary-link :href="route('admin.users.show', $pet->user->id)">
                            {{ $pet->user->name }}
                        </x-links.primary-link>
                    </div>
                </div>

                <div>
                    <div class="mb-1 font-bold">{{ __('Specie') }}</div>
                    <div>{{ __($pet->specie) }}</div>
                </div>

                <div>
                    <div class="mb-1 font-bold">{{ __('Sex') }}</div>
                    <div>{{ __($pet->sex) }}</div>
                </div>

                <div>
                    <div class="mb-1 font-bold">{{ __('Age') }}</div>
                    <div>{{ __($pet->age) }}</div>
                </div>

                <div>
                    <div class="mb-1 font-bold">{{ __('Size') }}</div>
                    <div>{{ __($pet->size) }}</div>
                </div>

                <div>
                    <div class="mb-1 font-bold">{{ __('City') }}</div>
                    <div>{{ __($pet->city->title) }}</div>
                </div>

                <div>
                    <div class="mb-1 font-bold">{{ __('State') }}</div>
                    <div>{{ __($pet->state->letter) }}</div>
                </div>

                <div>
                    <div class="mb-1 font-bold">{{ __('Status') }}</div>

                    <div>
                        <x-badge :color="$pet->adoption_status_color">
                            {{ __($pet->adoption_status) }}
                        </x-badge>
                    </div>
                </div>

                <div>
                    <div class="mb-1 font-bold">{{ __('Visible') }}</div>
                    <div>
                        <x-badge>
                            {{ __($pet->visibility_status) }}
                        </x-badge>
                    </div>
                </div>

                <div>
                    <div class="mb-1 font-bold">{{ __('Created at') }}</div>
                    <div>{{ $pet->created_at->format('d/m/Y') }}</div>
                </div>

                <div>
                    <div class="mb-1 font-bold">{{ __('Updated at') }}</div>
                    <div>{{ $pet->updated_at->format('d/m/Y') }}</div>
                </div>
            </div>
        </x-card>

        <div>
            <h1 class="mb-4 text-xl font-bold">
                {{ __('Images') }}
            </h1>

            <livewire:pet-images-table :petId="$pet->id" />
        </div>
    </div>
@endsection
