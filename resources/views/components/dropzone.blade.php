<div class="relative mb-10 flex w-full items-center justify-center">
    <label
        class="relative flex h-64 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100"
        for="dropzone-file">
        <div class="flex flex-col items-center justify-center pb-6 pt-5">
            <x-icons.upload />

            <p class="mb-2 text-center text-sm text-gray-500 md:text-base">
                <span class="font-semibold">
                    {{ __('Click to upload or drag and drop an image') }}
                </span>
            </p>

            <p class="text-xs text-gray-500 md:text-sm">
                PNG, JPG, JPEG (MAX. 2MB)
            </p>
        </div>

        <input class="absolute left-0 top-0 h-full w-full cursor-pointer opacity-0" id="dropzone-file" type="file"
            multiple wire:model="photos" />
    </label>
</div>
