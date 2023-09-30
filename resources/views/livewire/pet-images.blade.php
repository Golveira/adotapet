<div>
    <div class="mb-10">
        <h2 class="mb-6 text-2xl font-extrabold tracking-tight text-gray-900">
            {{ __('Photos of') }} {{ $pet->name }}
        </h2>

        <x-buttons.primary-button href="{{ route('pets.show', $pet->id) }}">
            {{ __('Back') }}
        </x-buttons.primary-button>
    </div>

    @error('photos')
        <x-alert type="error" :message="$message" />
    @enderror

    @error('photos.*')
        <x-alert type="error" :message="$message" />
    @enderror

    <x-dropzone />

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-4">
        @forelse ($images as $image)
            <x-pets.image-card :image="$image" />
        @empty
            <div class="col-span-4 text-center text-xl">
                {{ __('No images found') }}
            </div>
        @endforelse
    </div>
</div>
