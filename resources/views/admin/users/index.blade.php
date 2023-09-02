@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="px-4 pt-6">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold">
                    {{ __('Users') }}
                </h1>

                <x-buttons.primary-button href="{{ route('admin.users.create') }}">
                    {{ __('New user') }}
                </x-buttons.primary-button>
            </div>

            <livewire:user-table />
        </div>
    </main>
@endsection
