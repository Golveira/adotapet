<div class="flex">
    <a href="{{ route('admin.users.show', $userId) }}" class="text-gray-600 me-2">
        <x-icons.eye />
    </a>

    <a href="{{ route('admin.users.edit', $userId) }}" class="text-gray-600 me-2">
        <x-icons.edit />
    </a>

    <button class="text-gray-600 me-2" data-modal-target="popup-modal{{ $userId }}"
        data-modal-toggle="popup-modal{{ $userId }}" type="button">
        <x-icons.trash />
    </button>

    <x-modal-delete identifier="popup-modal{{ $userId }}"
        title="{{ __('Are you sure you want to delete the user?') }}"
        action="{{ route('admin.users.destroy', $userId) }}" />
</div>
