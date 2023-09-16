<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-3xl space-y-6 sm:px-6 lg:px-8">
            <div class="px-10">
                <h2 class="mb-8 text-center text-xl font-bold text-gray-900">
                    {{ __('Edit Pet') }}
                </h2>

                <x-pets.form :pet="$pet" route="{{ route('pets.update', $pet->id) }}" method="PUT" />
            </div>
        </div>
    </div>
</x-app-layout>
