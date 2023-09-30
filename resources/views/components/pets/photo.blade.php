@props(['pet'])

<div class="relative">
    <img class="h-56 w-full rounded-lg object-cover last:block md:h-[32rem]" src="{{ $pet->main_photo }}">

    @if ($pet->is_adopted)
        <div class="absolute bottom-0 w-full bg-yellow-400 p-2 text-center text-xl font-extrabold uppercase text-white">
            {{ __('Adopted') }}
        </div>
    @endif
</div>
