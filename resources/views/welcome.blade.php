<x-app-layout>
    <!-- Hero -->
    <section class="bg-gray-50">
        <div class="mx-auto grid max-w-screen-xl px-4 py-8 sm:grid-cols-1 lg:grid-cols-12 lg:gap-8 lg:py-16 xl:gap-0">
            <div class="place-self-center text-center sm:mr-0 lg:col-span-7 lg:mr-auto lg:text-start">
                <h1 class="mb-4 max-w-2xl text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl">
                    {{ __('Find your new best friend') }}
                </h1>

                <p class="mb-5 font-light text-gray-500 sm:text-xl">
                    {{ __('We believe that every pet deserves a loving home. Adopt and make the difference.') }}
                </p>

                <div class="flex items-center justify-center lg:justify-start">
                    <x-buttons.primary-button href="{{ route('pets.index') }}">
                        {{ __('Adopt a pet') }}
                    </x-buttons.primary-button>

                    <x-buttons.secondary-button href="{{ route('pets.create') }}">
                        {{ __('Promote a pet') }}
                    </x-buttons.secondary-button>
                </div>
            </div>

            <div class="hidden lg:col-span-5 lg:mt-0 lg:flex">
                <img src="{{ asset('assets/images/pets.png') }}" alt="mockup">
            </div>
        </div>
    </section>

    <!-- Latest Pets -->
    <section class="bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 lg:text-4xl">
                    {{ __('Latest pets for adoption') }}
                </h2>

                <p class="font-light text-gray-500 sm:text-xl">
                    {{ __('Meet a few pets looking for homes.') }}
                </p>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($pets as $pet)
                    <x-pets.card :pet="$pet" />
                @endforeach
            </div>

            <div class="my-16 text-center">
                <x-buttons.primary-button href="{{ route('pets.index') }}">
                    {{ __('View more') }}
                </x-buttons.primary-button>
            </div>
        </div>
    </section>
</x-app-layout>
