<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
    <button type="button"
        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
        wire:click="cancel">

        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>

        <span class="sr-only">
            Close modal
        </span>
    </button>

    <div class="p-6 text-center">
        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>

        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
            {{ __($confirmationTitle) }}
        </h3>

        <div class="flex justify-center">
            <x-buttons.secondary-button wire:click="cancel">
                {{ __('Cancel') }}
            </x-buttons.secondary-button>

            <form action="{{ route($route, $modelId) }}" method="post">
                @csrf
                @method('DELETE')

                <x-buttons.danger-button type="submit">
                    {{ __('Confirm') }}
                </x-buttons.danger-button>
            </form>
        </div>
    </div>
</div>
