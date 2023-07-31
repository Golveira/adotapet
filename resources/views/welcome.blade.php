<x-app-layout>
    <!-- Hero -->
    <section class="bg-gray-50">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 sm:grid-cols-1">
            <div class="lg:mr-auto sm:mr-0 place-self-center lg:col-span-7 lg:text-start text-center">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl">
                    {{ __('Find your new best friend') }}
                </h1>

                <p class="font-light text-gray-500 sm:text-xl mb-5">
                    {{ __('We believe that every pet deserves a loving home. Adopt and make the difference.') }}
                </p>

                <div class="flex lg:justify-start justify-center items-center">
                    <x-button href="{{ route('pets.index') }}">
                        {{ __('Adopt a pet') }}
                    </x-button>

                    <x-button color="alternative" href="#">
                        {{ __('Promote a pet') }}
                    </x-button>
                </div>
            </div>

            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('assets/images/pets.png') }}" alt="mockup">
            </div>
        </div>
    </section>

    <!-- Latest Pets -->
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl  lg:py-16 lg:px-6">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16 text-center">
                <h2 class="mb-4 lg:text-4xl text-3xl tracking-tight font-extrabold text-gray-900">
                    {{ __('Latest pets for adoption') }}
                </h2>

                <p class="font-light text-gray-500 sm:text-xl">
                    {{ __('Meet a few pets looking for homes.') }}
                </p>
            </div>

            <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($pets as $pet)
                    <x-pet-card :pet="$pet" />
                @endforeach
            </div>

            <div class="my-16 text-center">
                <x-button href="{{ route('pets.index') }}">
                    {{ __('View more') }}
                </x-button>
            </div>
        </div>
    </section>
</x-app-layout>
