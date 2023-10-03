<x-app-layout>
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8">
            <!-- Alert -->
            @if (!$pet->is_visible)
                <x-alert type="warning">
                    {{ __('This pet is awaiting for aproval and will be available for adoption soon.') }}
                </x-alert>
            @endif
            <!-- Alert -->

            <div class="grid gap-8 lg:grid-cols-10">
                <!-- Carousel -->
                <div class="lg:col-span-6">
                    @if (!$pet->is_adopted && count($pet->images) > 1)
                        <x-pets.pet-carousel :images="$pet->images" />
                    @else
                        <x-pets.photo :pet="$pet" />
                    @endif
                </div>
                <!-- Carousel -->

                <div class="lg:col-span-4">
                    <!-- Actions -->
                    @can('update', $pet)
                        <div class="mb-2 flex">
                            <x-buttons.primary-button class="flex items-center" href="{{ route('pets.edit', $pet->id) }}">
                                <x-icons.edit />
                                <span class="ml-2">{{ __('Edit') }}</span>
                            </x-buttons.primary-button>

                            <x-buttons.purple-button class="flex items-center"
                                href="{{ route('pets.images.index', $pet->id) }}">
                                <x-icons.image />
                                <span class="ml-2">{{ __('Images') }}</span>
                            </x-buttons.purple-button>

                            <x-modal-delete title="Are you sure you want to delete the pet?" :action="route('pets.destroy', $pet->id)">
                                <x-buttons.danger-button class="flex items-center" x-on:click="open = true">
                                    <x-icons.trash />
                                    <span class="ml-2">{{ __('Delete') }}</span>
                                </x-buttons.danger-button>
                            </x-modal-delete>
                        </div>
                    @endcan
                    <!-- Actions -->

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
                                <x-links.primary-link href="{{ route('profile.show', $pet->user->username) }}">
                                    {{ $pet->user->name }}
                                </x-links.primary-link>
                            </div>
                        </div>

                        @can('update', $pet)
                            <!-- Adoption Status Actions -->
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
                            <!-- Adoption Status Actions -->
                        @else
                            @if (!$pet->is_adopted)
                                <div class="flex">
                                    <x-buttons.primary-button class="w-full text-center" data-modal-target="popup-modal"
                                        data-modal-toggle="popup-modal" href="#">
                                        {{ __('Adopt') }}
                                    </x-buttons.primary-button>
                                </div>
                            @endif
                        @endcan
                    </x-card>
                    <!-- Pet Info -->
                </div>
            </div>

            <div class="mt-8 grid gap-8 lg:grid-cols-10">
                <div class="lg:col-span-6">
                    @if ($pet->hasAdditionalInfo())
                        <x-card>
                            <!-- Pet description -->
                            @if ($pet->description)
                                <div class="mb-5 border-b pb-5 last:border-b-0 last:pb-0">
                                    <h6 class="mb-3 text-lg font-bold">
                                        {{ __('Description') }}
                                    </h6>

                                    <p class="text-gray-500">
                                        {{ $pet->description }}
                                    </p>
                                </div>
                            @endif
                            <!-- Pet description -->

                            <!-- Veterinary Cares -->
                            @if ($pet->veterinaryCares->count() > 0)
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
                            <!-- Veterinary Cares -->

                            <!-- Sociabilities -->
                            @if ($pet->sociabilities->count() > 0)
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
                            <!-- Sociabilities -->

                            <!-- Temperaments -->
                            @if ($pet->temperaments->count() > 0)
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
                            <!-- Temperaments -->
                        </x-card>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @push('modals')
        <x-popup>
            <x-slot name="title">
                {{ __('Contact') }}
            </x-slot>

            <x-slot name="content">
                @if ($pet->user->whatsapp)
                    <div class="mb-1 flex">
                        <span class="mr-3 text-blue-700">
                            <x-icons.phone />
                        </span>

                        <x-links.dark-link class="text-sm" href="https://wa.me/{{ $pet->user->whatsapp }}">
                            {{ $pet->user->whatsapp }}
                        </x-links.dark-link>
                    </div>
                @endif

                <div class="mb-1 flex">
                    <span class="mr-2 text-blue-700">
                        <x-icons.envelope />
                    </span>

                    <x-links.dark-link class="text-sm" href="mailto:{{ $pet->user->email }}">
                        {{ $pet->user->email }}
                    </x-links.dark-link>
                </div>
            </x-slot>
        </x-popup>
    @endpush
</x-app-layout>
