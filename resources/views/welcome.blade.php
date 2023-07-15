<x-app-layout>
    <!-- Hero -->
    <section class="bg-white">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 sm:grid-cols-1">
            <div class="lg:mr-auto sm:mr-0 place-self-center lg:col-span-7 lg:text-start text-center">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl">
                    {{ __('Find your new best friend') }}
                </h1>

                <p class="font-light text-gray-500 sm:text-xl mb-5">
                    {{ __('We believe that every pet deserves a loving home. Adopt and make the difference.') }}
                </p>

                <div class="flex lg:justify-start justify-center">
                    <x-primary-link-button href="#" class="px-6 py-3.5 mr-5">
                        {{ __('Adopt a pet') }}
                    </x-primary-link-button>

                    <x-secondary-link-button href="#" class="px-6 py-3.5">
                        {{ __('Promote a pet') }}
                    </x-secondary-link-button>
                </div>
            </div>

            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="{{ asset('assets/images/pets.png') }}" alt="mockup">
            </div>
        </div>
    </section>

    <!-- Latest Pets -->
    <section class="bg-gray-50">
        <div class="py-8 px-4 mx-auto max-w-screen-xl  lg:py-16 lg:px-6">
            <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16 text-center">
                <h2 class="mb-4 lg:text-4xl text-3xl tracking-tight font-extrabold text-gray-900">
                    {{ __('Latest pets for adoption') }}
                </h2>

                <p class="font-light text-gray-500 sm:text-xl">
                    {{ __('Meet a few pets looking for homes.') }}
                </p>
            </div>

            <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($pets as $pet)
                    <x-pet-card :pet="$pet" />
                @endforeach
            </div>

            <div class="my-16 text-center">
                <x-primary-button>
                    {{ __('View more') }}
                </x-primary-button>
            </div>
        </div>
    </section>

    <!-- Why Adopt -->
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="mb-8 lg:mb-16 text-center">
                <h2 class="mb-4 lg:text-4xl text-3xl tracking-tight font-extrabold text-gray-900">
                    {{ __('Why adopt a pet?') }}
                </h2>
            </div>

            <div class="grid lg:grid-cols-3 gap-16 sm:grid-cols-1">
                <div class="flex items-center align-center">
                    <div class="flex w-1/2 justify-center">
                        <img src="{{ asset('assets/images/banner1.jpg') }}" alt="mockup" style="height: 150px">
                    </div>

                    <div class="w-1/2">
                        <h3 class="mb-2 text-xl font-bold">
                            {{ __('Combating Abandonment') }}
                        </h3>

                        <p class="text-gray-500">
                            {{ __('By adopting a pet instead of buying one, you contribute to reducing the number of animals on the streets and in shelters.') }}
                        </p>
                    </div>
                </div>

                <div class="flex items-center align-center">
                    <div class="flex w-1/2 justify-center">
                        <img src="{{ asset('assets/images/banner2.jpg') }}" alt="mockup" style="height: 150px">
                    </div>

                    <div class="w-1/2">
                        <h3 class="mb-2 text-xl font-bold">
                            {{ __('Transform a Life') }}
                        </h3>

                        <p class="text-gray-500">
                            {{ __('Many pets eagerly wait in shelters and rescue organizations, seeking a loving and caring home.') }}
                        </p>
                    </div>
                </div>

                <div class="flex items-center align-center">
                    <div class="flex w-1/2 justify-center">
                        <img src="{{ asset('assets/images/banner3.jpg') }}" alt="mockup" style="height: 150px">
                    </div>

                    <div class="w-1/2">
                        <h3 class="mb-2 text-xl font-bold">
                            {{ __('Loyalty and Unconditional Love') }}
                        </h3>

                        <p class="text-gray-500">
                            {{ __('By opening the doors of your home to a pet in need of care, you will be creating a unique and special bond.') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-16">
                <x-primary-button>
                    {{ __('Find my new friend') }}
                </x-primary-button>
            </div>
        </div>
    </section>
</x-app-layout>
