<x-app-layout>
    <div class="mx-auto max-w-screen-xl px-4 py-8">
        <x-card class="mb-10 p-10">
            <div class="grid lg:grid-cols-2 mb-3 gap-4">
                <div class="flex items-center">
                    <x-avatar :avatar="$user->avatar" class="w-20 h-20 rounded-full" />

                    <div class="ms-8">
                        <h3 class="text-2xl font-bold">{{ $user->name }}</h3>

                        <div class="text-sm text-gray-700">
                            {{ $user->profile->location }}
                        </div>
                    </div>
                </div>

                <div>
                    @if ($user->profile->website)
                        <div class="flex mb-2">
                            <span class="text-blue-700 mr-3">
                                <x-icons.globe />
                            </span>

                            <x-link href="{{ $user->profile->website }}"
                                class="text-sm text-gray-700 hover:no-underline hover:text-blue-700">
                                {{ $user->profile->website }}
                            </x-link>
                        </div>
                    @endif

                    @if ($user->profile->whatsapp)
                        <div class="flex mb-2">
                            <span class="text-blue-700 mr-3">
                                <x-icons.whatsapp />
                            </span>

                            <x-link href="https://wa.me/{{ $user->profile->whatsapp }}"
                                class="text-sm text-gray-700 hover:no-underline hover:text-blue-700">
                                {{ $user->profile->whatsapp }}
                            </x-link>
                        </div>
                    @endif

                    @if ($user->email)
                        <div class="flex mb-2">
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
            </div>

            <div class="text-gray-700">
                {{ $user->profile->bio }}
            </div>
        </x-card>

        <livewire:show-pets :userId="$user->id" />
    </div>
</x-app-layout>
