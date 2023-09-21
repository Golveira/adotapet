<x-app-layout>
    <div class="mx-auto max-w-screen-xl px-4 py-8">
        <x-card class="mb-10 p-10">
            <div class="grid gap-4 lg:grid-cols-6">
                <div class="col-span-6 md:col-span-1">
                    <x-avatar class="h-20 w-20 rounded-full md:h-36 md:w-36" :avatar="$user->avatar" />
                </div>

                <div class="col-span-5 grid gap-4 lg:grid-cols-2">
                    <div class="col-span-2 md:col-span-1">
                        <h3 class="mb-2 text-3xl font-bold text-blue-700">
                            {{ $user->name }}
                        </h3>

                        @if ($user->address)
                            <div class="flex text-sm text-gray-600">
                                <span class="mr-1">
                                    <x-icons.geo />
                                </span>

                                {{ $user->address }}
                            </div>
                        @endif
                    </div>

                    <div class="col-span-2 md:col-span-1">
                        @if ($user->website)
                            <div class="mb-2 flex">
                                <span class="mr-3 text-blue-700">
                                    <x-icons.globe />
                                </span>

                                <x-link class="text-sm text-gray-700 hover:text-blue-700 hover:no-underline"
                                    href="{{ $user->website }}" target="_blank">
                                    {{ $user->website }}
                                </x-link>
                            </div>
                        @endif

                        @if ($user->whatsapp)
                            <div class="mb-2 flex">
                                <span class="mr-3 text-blue-700">
                                    <x-icons.phone />
                                </span>

                                <x-link class="text-sm text-gray-700 hover:text-blue-700 hover:no-underline"
                                    href="https://wa.me/{{ $user->whatsapp }}">
                                    {{ $user->whatsapp }}
                                </x-link>
                            </div>
                        @endif

                        @if ($user->email)
                            <div class="flex">
                                <span class="mr-3 text-blue-700">
                                    <x-icons.envelope />
                                </span>

                                <x-link class="text-sm text-gray-700 hover:text-blue-700 hover:no-underline"
                                    href="mailto:{{ $user->email }}">
                                    {{ $user->email }}
                                </x-link>
                            </div>
                        @endif
                    </div>

                    <div class="col-span-2">
                        <p class="text-sm text-gray-600">
                            {{ $user->bio }}
                        </p>
                    </div>
                </div>
            </div>
        </x-card>

        <livewire:show-pets :userId="$user->id" />
    </div>
</x-app-layout>
