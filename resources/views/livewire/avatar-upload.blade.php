<div class="mb-6 rounded-lg border border-gray-200 bg-white p-4 shadow-sm 2xl:col-span-2">
    <div class="flex gap-8">
        <img class="mb-4 h-28 w-28 rounded-lg object-cover sm:mb-0 xl:mb-4 2xl:mb-0" src="{{ $user->avatar }}"
            alt="Avatar">

        <div>
            <h3 class="mb-1 text-xl font-bold text-gray-900">
                {{ __('Profile Picture') }}
            </h3>

            <div class="mb-4 text-sm text-gray-500">
                JPG, JPEG or PNG. {{ __('Max size of') }} 2MB
            </div>

            @error('photo')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            <div class="mt-4 flex flex-col gap-2 md:flex-row">
                <label
                    class="inline-flex cursor-pointer items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white"
                    for="photo">
                    <x-icons.upload class="mr-3 h-4 w-4" />
                    {{ __('Upload Picture') }}
                </label>

                <input class="hidden" id="photo" name="photo" type="file" wire:model="photo">

                <button
                    class="rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-200"
                    type="button" wire:click="removeAvatar">
                    {{ __('Remove') }}
                </button>
            </div>
        </div>

    </div>
</div>
