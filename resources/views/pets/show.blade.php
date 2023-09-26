<x-app-layout>
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8">
            <!-- Alert -->
            @if (!$pet->is_visible)
                <x-alert type="warning">
                    {{ __('This pet is awaiting for aproval and will be available for adoption soon.') }}
                </x-alert>
            @endif

            <div class="grid gap-8 lg:grid-cols-10">
                <!-- Carousel -->
                <div class="lg:col-span-6">
                    @if (count($pet->images) > 1)
                        <x-pets.pet-carousel :images="$pet->images" />
                    @else
                        <img class="block h-56 w-full rounded-lg object-cover md:h-[32rem]" src="{{ $pet->main_photo }}">
                    @endif
                </div>

                <div class="lg:col-span-4">
                    <!-- Actions -->
                    @can('update', $pet)
                        <div class="mb-2 flex">
                            <x-buttons.primary-button class="flex items-center" href="{{ route('pets.edit', $pet->id) }}">
                                <x-icons.edit />
                                <span class="ml-2">{{ __('Edit') }}</span>
                            </x-buttons.primary-button>

                            <x-buttons.secondary-button class="flex items-center"
                                href="{{ route('pets.images', $pet->id) }}">
                                <x-icons.image />
                                <span class="ml-2">{{ __('Images') }}</span>
                            </x-buttons.secondary-button>

                            <x-modal-delete title="Are you sure you want to delete the pet?" :action="route('pets.destroy', $pet->id)">
                                <x-buttons.danger-button class="flex items-center" x-on:click="open = true">
                                    <x-icons.trash />
                                    <span class="ml-2">{{ __('Delete') }}</span>
                                </x-buttons.danger-button>
                            </x-modal-delete>
                        </div>
                    @endcan

                    <!-- Pet Info -->
                    <x-card class="relative">
                        <div class="absolute right-3 top-3">
                            <livewire:favorite-button classes="h-6 w-6" :pet="$pet" />
                        </div>

                        <div class="mb-5 flex items-center">
                            <div class="w-1/2">
                                <h3 class="text-xl font-bold">
                                    {{ $pet->name }}
                                </h3>
                            </div>

                            <div class="w-1/2">
                                <x-badge :color="$pet->adoption_status_color">
                                    {{ __($pet->adoption_status) }}
                                </x-badge>
                            </div>
                        </div>

                        <div class="mb-3 flex">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Specie') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->specie) }}
                            </div>
                        </div>

                        <div class="mb-3 flex">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Sex') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->sex) }}
                            </div>
                        </div>

                        <div class="mb-3 flex">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Age') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->age) }}
                            </div>
                        </div>

                        <div class="mb-3 flex">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Size') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->size) }}
                            </div>
                        </div>

                        <div class="mb-5 flex">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Address') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ $pet->address }}
                            </div>
                        </div>

                        <div class="mb-5 flex">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Created at') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ $pet->created_at->format('d/m/Y') }}
                            </div>
                        </div>

                        <div class="mb-10 flex last:mb-0">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Published by') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                <x-link href="{{ route('profile.show', $pet->user->username) }}">
                                    {{ $pet->user->name }}
                                </x-link>
                            </div>
                        </div>

                        <!-- Adoption actions -->
                        @can('update', $pet)
                            <div class="w-full">
                                @if ($pet->is_adopted)
                                    <form action="{{ route('pets.mark-as-available', $pet->id) }}" method="POST">
                                        @csrf

                                        <x-buttons.warning-button class="w-full text-center" type="submit">
                                            {{ __('Mark as available') }}
                                        </x-buttons.warning-button>
                                    </form>
                                @else
                                    <form action="{{ route('pets.mark-as-adopted', $pet->id) }}" method="POST">
                                        @csrf

                                        <x-buttons.success-button class="w-full text-center" type="submit">
                                            {{ __('Mark as adopted') }}
                                        </x-buttons.success-button>
                                    </form>
                                @endif
                            </div>
                        @else
                            @if (!$pet->is_adopted)
                                <div class="flex">
                                    <x-buttons.primary-button class="w-full text-center" href="#">
                                        {{ __('Adopt') }}
                                    </x-buttons.primary-button>
                                </div>
                            @endif
                        @endcan
                    </x-card>
                </div>
            </div>

            <div class="mt-8 grid gap-8 lg:grid-cols-10">
                <div class="lg:col-span-6">
                    @if ($pet->hasAdditionalInfo())
                        <x-card>
                            @if ($pet->description)
                                <!-- Pet description -->
                                <div class="mb-5 border-b pb-5 last:border-b-0 last:pb-0">
                                    <h6 class="mb-3 text-lg font-bold">
                                        {{ __('Description') }}
                                    </h6>

                                    <p class="text-gray-500">
                                        {{ $pet->description }}
                                    </p>
                                </div>
                            @endif

                            @if ($pet->veterinaryCares->count() > 0)
                                <!-- Veterinary Cares -->
                                <div class="mb-5 border-b pb-5 last:border-b-0 last:pb-0">
                                    <h6 class="mb-3 font-bold">
                                        {{ __('Vet Info') }}
                                    </h6>

                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($pet->veterinaryCares as $vetCare)
                                            <div class="me-2 flex items-center">
                                                <span class="me-2 text-blue-700">
                                                    <x-icons.badge-check />
                                                </span>

                                                <span class="text-sm text-gray-600">
                                                    {{ __($vetCare->name) }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            @endif

                            @if ($pet->sociabilities->count() > 0)
                                <!-- Sociabilities -->
                                <div class="mb-5 border-b pb-5 last:border-b-0 last:pb-0">
                                    <h6 class="mb-3 font-bold">
                                        {{ __('Sociable with') }}
                                    </h6>

                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($pet->sociabilities as $sociability)
                                            <div class="me-2 flex items-center">
                                                <span class="me-2 text-blue-700">
                                                    <x-icons.badge-check />
                                                </span>

                                                <span class="text-sm text-gray-600">
                                                    {{ __($sociability->name) }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            @endif

                            @if ($pet->temperaments->count() > 0)
                                <!-- Temperaments -->
                                <div class="mb-5 border-b pb-5 last:border-b-0 last:pb-0">
                                    <h6 class="mb-3 font-bold">
                                        {{ __('Temperaments') }}
                                    </h6>

                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($pet->temperaments as $temperament)
                                            <x-badge class="text-xs font-bold" color="info">
                                                {{ __($temperament->name) }}
                                            </x-badge>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </x-card>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
