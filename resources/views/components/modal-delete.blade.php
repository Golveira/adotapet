@props(['title', 'action'])

<div x-data="{ open: false }">
    <div>
        {{ $slot }}
    </div>

    <div x-show="open" class="z-50 fixed w-full h-full top-0 left-0 flex items-center justify-center">
        <div x-on:click="open = false" class="absolute w-full h-full bg-gray-900 opacity-50">
        </div>

        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button x-on:click="open = false" type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
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

                        <x-buttons.danger-button x-on:click="open = false" type="submit">
                            {{ __('Delete') }}
                        </x-buttons.danger-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
