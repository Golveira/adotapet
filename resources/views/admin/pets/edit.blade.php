@extends('admin.layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 pt-6">
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-2xl font-bold">
                {{ __('Edit Pet') }}
            </h1>

            <x-buttons.primary-button href="{{ route('admin.pets.index') }}" outline>
                {{ __('Back') }}
            </x-buttons.primary-button>
        </div>

        <x-pets.form :pet="$pet" :route="route('admin.pets.update', $pet->id)" method="PUT" withUser />
    </div>
@endsection
