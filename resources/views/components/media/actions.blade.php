<ul class="flex py-2">
    <li>
        <x-modal-delete title="Are you sure you want to delete the image?" :action="route('admin.media.destroy', $mediaId)">
            <button x-on:click="open = true">
                <x-icons.trash />
            </button>
        </x-modal-delete>
    </li>
</ul>
