<div class="flex flex-wrap">
    @foreach ($veterinaryCares as $care)
        <div class="mb-3 mr-3">
            <x-checkbox id="{{ $care->name }}" value="{{ $care->id }}" :label="$care->name" name="veterinary_cares[]"
                checked="{{ is_array(old('veterinary_cares')) and in_array($care->id, old('veterinary_cares')) }}" />
        </div>
    @endforeach
</div>
