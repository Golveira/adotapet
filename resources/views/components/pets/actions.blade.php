<ul class="flex py-2">
    <li class="me-2">
        <a href="{{ route('admin.pets.show', $petId) }}">
            <x-icons.eye />
        </a>
    </li>

    <li class="me-2">
        <a href="{{ route('admin.pets.edit', $petId) }}">
            <x-icons.edit />
        </a>
    </li>

    <li>
        <x-modal-delete title="Are you sure you want to delete the pet?" :action="route('admin.pets.destroy', $petId)">
            <button x-on:click="open = true">
                <x-icons.trash />
            </button>
        </x-modal-delete>
    </li>
</ul>
