@props(['images' => []])

<div class="relative w-full" id="animation-carousel" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-[32rem]">
        @foreach ($images as $image)
            <div class="hidden duration-200 ease-linear" data-carousel-item>
                <img class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                    src="{{ $image->getUrl() }}">
            </div>
        @endforeach
    </div>

    <!-- Slider controls -->
    <button
        class="group absolute left-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
        data-carousel-prev type="button">
        <span
            class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
            <svg class="h-4 w-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>

    <button
        class="group absolute right-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
        data-carousel-next type="button">
        <span
            class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
            <svg class="h-4 w-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
