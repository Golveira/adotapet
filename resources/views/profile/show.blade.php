<x-app-layout>
    <div class="mx-auto max-w-screen-xl px-4 py-8">
        <x-card class="mb-10 p-10">
            <div class="grid lg:grid-cols-6 gap-4">
                <div class="md:col-span-1 col-span-6">
                    <x-avatar :avatar="$user->avatar" class="md:w-36 md:h-36 w-20 h-20 rounded ring-2 ring-gray-300" />
                </div>

                <div class="col-span-5 grid lg:grid-cols-2 gap-4">
                    <div class="md:col-span-1 col-span-2">
                        <h3 class="text-3xl font-bold text-blue-700 mb-2">
                            {{ $user->name }}
                        </h3>

                        <div class="flex text-sm text-gray-600">
                            <span class="mr-1">
                                <x-icons.geo />
                            </span>

                            {{ $user->profile?->location }}
                        </div>
                    </div>

                    <div class="md:col-span-1 col-span-2">
                        @if ($user->profile?->website)
                            <div class="flex mb-2">
                                <span class="text-blue-700 mr-3">
                                    <x-icons.globe />
                                </span>

                                <x-link href="{{ $user->profile->website }}" target="_blank"
                                    class="text-sm text-gray-700 hover:no-underline hover:text-blue-700">
                                    {{ $user->profile->website }}
                                </x-link>
                            </div>
                        @endif

                        @if ($user->profile?->whatsapp)
                            <div class="flex mb-2">
                                <span class="text-blue-700 mr-3">
                                    <x-icons.phone />
                                </span>

                                <x-link href="https://wa.me/{{ $user->profile->whatsapp }}"
                                    class="text-sm text-gray-700 hover:no-underline hover:text-blue-700">
                                    {{ $user->profile->whatsapp }}
                                </x-link>
                            </div>
                        @endif

                        @if ($user->email)
                            <div class="flex">
                                <span class="text-blue-700 mr-3">
                                    <x-icons.envelope />
                                </span>

                                <x-link href="mailto:{{ $user->email }}"
                                    class="text-sm text-gray-700 hover:no-underline hover:text-blue-700">
                                    {{ $user->email }}
                                </x-link>
                            </div>
                        @endif
                    </div>

                    <div class="col-span-2">
                        <p class="text-sm text-gray-600">
                            {{ $user->profile?->bio }}
                        </p>
                    </div>
                </div>
            </div>
        </x-card>

        <livewire:show-pets :userId="$user->id" />
    </div>
</x-app-layout>
