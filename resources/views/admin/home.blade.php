@extends('admin.layouts.app')

@section('content')
    <main>
        <div class="px-4 pt-6">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 w-full max-w-6xl">
                <x-card class="flex items-center p-4">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <x-icons.users />
                    </div>

                    <div class="flex-grow flex flex-col ml-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 font-bold">
                                {{ __('Users') }}
                            </span>
                        </div>

                        <span class="text-xl font-bold">
                            {{ $totalUsers }}
                        </span>
                    </div>
                </x-card>

                <x-card class="flex items-center p-4">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <x-icons.paw />
                    </div>

                    <div class="flex-grow flex flex-col ml-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 font-bold">
                                Pets
                            </span>
                        </div>

                        <span class="text-xl font-bold">
                            {{ $totalPets }}
                        </span>
                    </div>
                </x-card>

                <x-card class="flex items-center p-4">
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                        <x-icons.file-check />
                    </div>

                    <div class="flex-grow flex flex-col ml-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 font-bold">
                                {{ __('Adoptions') }}
                            </span>
                        </div>

                        <span class="text-xl font-bold">
                            {{ $totalAdoptions }}
                        </span>
                    </div>
                </x-card>
            </div>
        </div>
    </main>
@endsection
