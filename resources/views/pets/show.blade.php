<x-app-layout>
    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8">
            <!-- Alert -->
            @if (!$pet->is_visible)
                <x-alert type="warning">
                    {{ __('This pet is awaiting for aproval by the administrator and will be available soon for adoption.') }}
                </x-alert>
            @endif

            <div class="grid lg:grid-cols-10 gap-8">
                <!-- Carousel -->
                <div class="lg:col-span-6">
                    <x-pet-carousel :images="$pet->images" />
                </div>

                <div class="lg:col-span-4">
                    <!-- Actions -->
                    @auth
                        @can('update', $pet)
                            <div class="flex mb-2">
                                <x-button href="{{ route('pets.edit', $pet->id) }}" class="me-3">
                                    <x-icons.edit />
                                </x-button>

                                <x-button href="{{ route('pets.images', $pet->id) }}" color="purple" class="me-3">
                                    <x-icons.image />
                                </x-button>

                                <x-button color="red" href="#" data-modal-target="popup-modal"
                                    data-modal-toggle="popup-modal">
                                    <x-icons.trash />
                                </x-button>
                            </div>
                        @endcan
                    @endauth

                    <!-- Pet Info -->
                    <x-card>
                        <div class="flex
                                items-center mb-5">
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

                        <div class="flex mb-3">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Specie') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->specie) }}
                            </div>
                        </div>

                        <div class="flex mb-3">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Sex') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->sex) }}
                            </div>
                        </div>

                        <div class="flex mb-3">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Age') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->age) }}
                            </div>
                        </div>

                        <div class="flex mb-3">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Size') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ __($pet->size) }}
                            </div>
                        </div>

                        <div class="flex mb-5">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Address') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ $pet->address }}
                            </div>
                        </div>

                        <div class="flex mb-5">
                            <h6 class="w-1/2 font-bold text-gray-800">
                                {{ __('Created at') }}
                            </h6>

                            <div class="w-1/2 text-gray-600">
                                {{ $pet->created_at->format('d/m/Y') }}
                            </div>
                        </div>

                        <div class="flex mb-10">
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
                        <div class="flex">
                            @can('update', $pet)
                                <div class="w-full">
                                    @if ($pet->is_adopted)
                                        <form action="{{ route('pets.mark-as-available', $pet->id) }}" method="POST">
                                            @csrf

                                            <x-button type="submit" color="yellow" class="text-center w-full">
                                                {{ __('Mark as available') }}
                                            </x-button>
                                        </form>
                                    @else
                                        <form action="{{ route('pets.mark-as-adopted', $pet->id) }}" method="POST">
                                            @csrf

                                            <x-button type="submit" color="green" class="text-center w-full">
                                                {{ __('Mark as adopted') }}
                                            </x-button>
                                        </form>
                                    @endif
                                </div>
                            @else
                                <x-button href="#" class="text-center w-full">
                                    {{ __('Adopt') }}
                                </x-button>
                            @endcan
                        </div>
                    </x-card>
                </div>
            </div>

            <div class="grid lg:grid-cols-10 gap-8 mt-8">
                <div class="lg:col-span-6">
                    @if ($pet->hasAdditionalInfo())
                        <x-card>
                            @if ($pet->description)
                                <!-- Pet description -->
                                <div class="mb-5 border-b pb-5 last:border-b-0 last:pb-0">
                                    <h6 class="text-lg font-bold mb-3">
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
                                    <h6 class="font-bold mb-3">
                                        {{ __('Vet Info') }}
                                    </h6>

                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($pet->veterinaryCares as $vetCare)
                                            <div class="flex items-center me-2">
                                                <span class="text-blue-700 me-2">
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
                                    <h6 class="font-bold mb-3">
                                        {{ __('Sociable with') }}
                                    </h6>

                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($pet->sociabilities as $sociability)
                                            <div class="flex items-center me-2">
                                                <span class="text-blue-700 me-2">
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
                                    <h6 class="font-bold mb-3">
                                        {{ __('Temperaments') }}
                                    </h6>

                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($pet->temperaments as $temperament)
                                            <x-badge color="indigo" class="text-xs font-bold">
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

    @push('modals')
        <x-modal-delete title="{{ __('Are you sure you want to delete the pet?') }}"
            route="{{ route('pets.destroy', $pet->id) }}" />
    @endpush
</x-app-layout>
