<section class="bg-white mb-10">
    <div class="mx-auto max-w-screen-xl px-4 py-8">
        <h2 class="mb-10 text-3xl tracking-tight font-extrabold text-gray-900">
            {{ __('Photos of') }} {{ $pet->name }}
        </h2>

        @error('photos')
            <x-alert :message="$message" />
        @enderror

        @error('photos.*')
            <x-alert :message="$message" />
        @enderror

        <x-dropzone wire:model="photos" />

        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-8">
            @forelse ($images as $image)
                <div class="relative max-w-sm">
                    <img class="rounded-lg object-cover	h-72 w-96" src="{{ $image->getUrl() }}">

                    <button wire:click="$emit('delete', {{ $image->id }})"
                        class="absolute bg-red-700 bottom-0 inset-x-0 py-2 rounded-b-lg text-white text-center font-bold">
                        {{ __('Remove') }}
                    </button>
                </div>
            @empty
                <div class="col-span-4 text-center text-xl">
                    {{ __('No images found') }}
                </div>
            @endforelse
        </div>
    </div>
</section>
