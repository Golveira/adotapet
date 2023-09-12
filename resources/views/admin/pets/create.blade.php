@extends('admin.layouts.app')

@section('content')
    <div class="mx-auto max-w-6xl px-4 pt-6">
        <div class="mb-4 flex items-center justify-between">
            <h1 class="text-2xl font-bold">
                {{ __('Create Pet') }}
            </h1>

            <x-buttons.primary-button href="{{ route('admin.pets.index') }}" outline>
                {{ __('Back') }}
            </x-buttons.primary-button>
        </div>

        <x-pets.form route="{{ route('admin.pets.store') }}" withUser />
    </div>
@endsection
