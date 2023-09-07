<ul class="flex py-2">
    <li class="me-2">
        <a href="{{ route('admin.users.show', $userId) }}">
            <x-icons.eye />
        </a>
    </li>

    <li class="me-2">
        <a href="{{ route('admin.users.edit', $userId) }}">
            <x-icons.edit />
        </a>
    </li>

    <li>
        <x-modal-delete title="Are you sure you want to delete the user?" :action="route('admin.users.destroy', $userId)">
            <button x-on:click="open = true">
                <x-icons.trash />
            </button>
        </x-modal-delete>
    </li>
</ul>
