<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-4xl space-y-6 sm:px-6 lg:px-8">
            <div class="px-2 md:px-10">
                <h2 class="mb-8 text-center text-xl font-bold text-gray-900">
                    {{ __('Add Pet') }}
                </h2>

                <x-pets.form route="{{ route('pets.store') }}" />
            </div>
        </div>
    </div>
</x-app-layout>
