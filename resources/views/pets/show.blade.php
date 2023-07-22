<x-app-layout>
    <section class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8">
            <div class="grid lg:grid-cols-10 gap-8">
                <!-- Pet images -->
                <div class="lg:col-span-6">
                    <x-pet-carousel :images="$pet->images" />
                </div>

                <div class="lg:col-span-4">
                    <!-- Actions -->
                    @auth
                        <div class="flex mb-2">
                            <x-button href="#">
                                <x-icons.edit />
                            </x-button>

                            <x-button href="#">
                                <x-icons.image />
                            </x-button>

                            <x-button href="#">
                                <x-icons.trash />
                            </x-button>
                        </div>
                    @endauth

                    <!-- Pet Info -->
                    <x-card>
                        <div class="flex items-center mb-5">
                            <div class="w-1/2">
                                <h3 class="text-xl font-bold">{{ $pet->name }}</h3>
                            </div>

                            <div class="w-1/2">
                                <x-badge :color="$pet->adoption_status_color">
                                    {{ __($pet->adoption_status) }}
                                </x-badge>
                            </div>
                        </div>

                        <div class="flex mb-3">
                            <div class="w-1/2 font-bold text-gray-800">{{ __('Specie') }}</div>
                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->specie) }}
                            </div>
                        </div>

                        <div class="flex mb-3">
                            <div class="w-1/2 font-bold text-gray-800">{{ __('Sex') }}</div>
                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->sex) }}
                            </div>
                        </div>

                        <div class="flex mb-3">
                            <div class="w-1/2 font-bold text-gray-800">{{ __('Age') }}</div>
                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->age) }}
                            </div>
                        </div>

                        <div class="flex mb-3">
                            <div class="w-1/2 font-bold text-gray-800">{{ __('Size') }}</div>
                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->size) }}
                            </div>
                        </div>

                        <div class="flex mb-5">
                            <div class="w-1/2 font-bold text-gray-800">{{ __('Address') }}</div>
                            <div class="w-1/2 text-gray-600">
                                {{ $pet->address }}
                            </div>
                        </div>

                        <div class="flex mb-5">
                            <div class="w-1/2 font-bold text-gray-800">{{ __('Created at') }}</div>
                            <div class="w-1/2 text-gray-600">
                                {{ $pet->created_at->format('d/m/Y') }}
                            </div>
                        </div>

                        <div class="flex mb-10">
                            <div class="w-1/2 font-bold text-gray-800">{{ __('Published by') }}</div>
                            <div class="w-1/2 text-gray-600">
                                <x-link href="{{ route('profile.show', $pet->user->username) }}">
                                    {{ $pet->user->name }}
                                </x-link>
                            </div>
                        </div>

                        <div class="flex">
                            <x-button color="blue" href="#" class="text-center w-full">
                                {{ __('Adopt') }}
                            </x-button>
                        </div>
                    </x-card>
                </div>
            </div>

            <div class="grid lg:grid-cols-10 gap-8 mt-8">
                <div class="lg:col-span-6">
                    <x-card>
                        <!-- Pet description -->
                        <div class="mb-5">
                            <h3 class="text-lg font-bold mb-3">{{ __('Description') }}</h3>

                            <div class="text-gray-800">
                                {{ $pet->description }}
                            </div>
                        </div>

                        <!-- Veterinary Cares -->
                        <div class="mb-5">
                            <h3 class="text-lg font-bold mb-5">{{ __('Vet Info') }}</h3>

                            <div class="flex flex-wrap gap-2">
                                @foreach ($pet->veterinaryCares as $vetCare)
                                    <x-badge color="blue" class="flex items-center">
                                        <x-icons.badge-check />
                                        <span class="ml-2">{{ __($vetCare->name) }}</span>
                                    </x-badge>
                                @endforeach
                            </div>
                        </div>

                        <!-- Sociabilities -->
                        <div class="mb-5">
                            <h3 class="text-lg font-bold mb-5">{{ __('Sociabilities') }}</h3>

                            <div class="flex flex-wrap gap-2">
                                @foreach ($pet->sociabilities as $sociability)
                                    <x-badge color="blue" class="flex items-center">
                                        <x-icons.badge-check />
                                        <span class="ml-2">{{ __($sociability->name) }}</span>
                                    </x-badge>
                                @endforeach
                            </div>
                        </div>

                        <!-- Temperaments -->
                        <div class="mb-5">
                            <h3 class="text-lg font-bold mb-5">{{ __('Temperaments') }}</h3>

                            <div class="flex flex-wrap gap-2">
                                @foreach ($pet->temperaments as $temperament)
                                    <x-badge color="blue">
                                        {{ __($temperament->name) }}
                                    </x-badge>
                                @endforeach
                            </div>
                        </div>
                    </x-card>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
