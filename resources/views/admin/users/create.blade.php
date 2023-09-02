@extends('admin.layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 pt-6">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">
                {{ __('Create User') }}
            </h1>

            <x-buttons.primary-button href="{{ route('admin.users.index') }}" outline>
                {{ __('Back') }}
            </x-buttons.primary-button>
        </div>

        <x-users.form route="{{ route('admin.users.store') }}" />
    </div>
@endsection
