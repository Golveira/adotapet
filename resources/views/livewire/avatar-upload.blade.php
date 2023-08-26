<div class="p-4 mb-6 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 ">
    <div class="flex gap-8">
        <img class="mb-4 rounded-lg object-cover  w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0" src="{{ $user->avatar }}"
            alt="Avatar">

        <div>
            <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">
                {{ __('Profile Picture') }}
            </h3>

            <div class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                JPG, JPEG or PNG. {{ __('Max size of') }} 2MB
            </div>

            @error('photo')
                <span class="text-sm text-red-500">{{ $message }}</span>
            @enderror

            <div class="mt-4 flex items-center space-x-4">
                <label for="photo"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 cursor-pointer">
                    <x-icons.upload />
                    {{ __('Upload Picture') }}
                </label>

                <input wire:model="photo" type="file" class="hidden" name="photo" id="photo">

                <button wire:click="removeAvatar" type="button"
                    class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                    {{ __('Remove') }}
                </button>
            </div>
        </div>

    </div>
</div>
