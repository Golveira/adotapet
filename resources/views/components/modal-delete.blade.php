@push('modals')
    @props(['action' => null, 'identifier' => 'popup-modal', 'title' => 'Are you sure?'])

    <div id="{{ $identifier }}" tabindex="-1" backdropClasses="bg-gray-900 bg-opacity-50"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-dark-700">

        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="{{ $identifier }}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">{{ __('Close modal') }}</span>
                </button>

                <div class="p-6 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>

                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        {{ $title }}
                    </h3>

                    <form action="{{ $action }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')

                        <x-button type="submit" color="red" data-modal-hide="{{ $identifier }}">
                            {{ __('Yes, delete') }}
                        </x-button>
                    </form>

                    <x-button color="alternative" data-modal-hide="{{ $identifier }}">
                        {{ __('No, cancel') }}
                    </x-button>
                </div>
            </div>
        </div>
    </div>
@endpush
