@props(['title', 'action'])

@push('styles')
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
@endpush

<div x-data="{ open: false }" x-cloak>
    <div>
        {{ $slot }}
    </div>

    <div class="fixed left-0 top-0 z-50 flex h-full w-full items-center justify-center" x-show="open">
        <div class="absolute h-full w-full bg-gray-900 opacity-50" x-on:click="open = false">
        </div>

        <div class="relative max-h-full w-full max-w-md">
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                <button
                    class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                    type="button" x-on:click="open = false">
                    <x-icons.close />

                    <span class="sr-only">
                        Close modal
                    </span>
                </button>

                <div class="p-6 text-center">
                    <x-icons.exclamation />

                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        {{ __($title) }}
                    </h3>

                    <form action="{{ $action }}" method="post">
                        @csrf
                        @method('delete')

                        <x-buttons.secondary-button @click.prevent="open = false">
                            {{ __('Cancel') }}
                        </x-buttons.secondary-button>

                        <x-buttons.danger-button type="submit" x-on:click="open = false">
                            {{ __('Delete') }}
                        </x-buttons.danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
