<div class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden p-4 md:inset-0"
    id="popup-modal" tabindex="-1" backdropClasses="bg-gray-900 bg-opacity-10 dark:bg-opacity-80 fixed inset-0 z-40">
    <div class="relative max-h-full w-full max-w-md">
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
            <button
                class="absolute right-2.5 top-3 ml-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="popup-modal" type="button">
                <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="p-6 text-center">
                <h3 class="mb-3 text-lg font-bold text-gray-500 dark:text-gray-400">
                    {{ $title }}
                </h3>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $content }}
                </p>
            </div>
        </div>
    </div>
</div>
