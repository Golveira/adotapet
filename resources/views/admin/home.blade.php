@extends('admin.layouts.app')

@section('content')
    <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <x-card class="flex items-center p-4">
            <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-blue-700 lg:h-12 lg:w-12">
                <x-icons.users class="text-white" />
            </div>

            <div class="ml-4 flex flex-grow flex-col">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-gray-500">
                        {{ __('Users') }}
                    </span>
                </div>

                <span class="text-xl font-bold">
                    {{ $totalUsers }}
                </span>
            </div>
        </x-card>

        <x-card class="flex items-center p-4">
            <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-blue-700 text-white lg:h-12 lg:w-12">
                <x-icons.paw class="text-white" />
            </div>

            <div class="ml-4 flex flex-grow flex-col">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-gray-500">
                        Pets
                    </span>
                </div>

                <span class="text-xl font-bold">
                    {{ $totalPets }}
                </span>
            </div>
        </x-card>

        <x-card class="flex items-center p-4">
            <div class="mb-4 flex h-10 w-10 items-center justify-center rounded-full bg-blue-700 lg:h-12 lg:w-12">
                <x-icons.file-check class="text-white" />
            </div>

            <div class="ml-4 flex flex-grow flex-col">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-gray-500">
                        {{ __('Adoptions') }}
                    </span>
                </div>

                <span class="text-xl font-bold">
                    {{ $totalAdoptions }}
                </span>
            </div>
        </x-card>
    </div>
@endsection
