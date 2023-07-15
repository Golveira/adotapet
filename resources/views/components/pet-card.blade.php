@props(['pet' => null])

<div href="#" class="block relative overflow-hidden rounded-lg bg-cover bg-no-repeat h-72"
    style="background-image: url({{ $pet->main_photo }});">
    <a href="#div" class="absolute inset-0 bg-gradient-to-t from-black opacity-70 rounded-lg"></a>

    <a href="#p"
        class="absolute top-3 right-3 flex items-center justify-center text-white border border-white hover:bg-red-700 hover:border-red-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center">
        <x-icon-heart class="w-5 h-5" />
    </a>

    <div class="absolute bottom-0 inset-x-0 ml-5 mb-5">
        <a href="#" class="font-bold text-xl text-white dark:text-blue-500 hover:underline">
            {{ $pet->name }}
        </a>

        <p class="font-light text-gray-300 text-base">
            {{ $pet->city }} - {{ $pet->state }}
        </p>
    </div>
</div>
