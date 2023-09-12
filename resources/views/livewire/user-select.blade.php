<div x-data="{ open: false }" class="relative">
    <div @click="open = !open; $nextTick(() => { $refs.search.focus(); });"
        class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2.5 inline-flex items-center justify-between">

        <div>
            {{ $selectedUser->name ?? __('Select the user') }}
        </div>

        <div class="flex items-center">
            <span wire:click="resetSelect" @click.stop class="cursor-pointer">
                <x-icons.close class="w-2 h-2" />
            </span>

            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 4 4 4-4" />
            </svg>
        </div>
    </div>

    <div x-show="open" x-transition.duration.200ms class="absolute w-full z-50 bg-white rounded-lg shadow">
        <div class="p-3">
            <x-forms.input type="search" placeholder="{{ __('Search user...') }}" wire:model="search"
                wire:keydown.escape="clear" wire:keydown.tab="clear" x-ref="search"
                x-on:keydown.escape="open = false" x-on:blur="open = false" />

            <input type="hidden" name="user_id" value="{{ $selectedUser?->id }}">
        </div>

        @if (!empty($users) && strlen($search) > 1)
            @if (count($users) > 0)
                <ul class="max-h-48 py-2 overflow-y-auto text-gray-700">
                    @foreach ($users as $user)
                        <li wire:click="selectUser({{ $user->id }})" @click="open = false"
                            class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                            {{ $user->name }}
                        </li>
                    @endforeach
                </ul>
            @elseif (count($users) < 1 && !empty($search))
                <div class="px-4 py-2">
                    {{ __('No results Found') }}
                </div>
            @endif
        @endif
    </div>
</div>
