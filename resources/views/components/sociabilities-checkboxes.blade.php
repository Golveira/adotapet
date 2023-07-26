<div class="flex flex-wrap">
    @foreach ($sociabilities as $sociability)
        <div class="mb-3 mr-3">
            <x-checkbox id="{{ $sociability->name }}" value="{{ $sociability->id }}" :label="$sociability->name"
                name="sociabilities[]"
                checked="{{ is_array(old('sociabilities')) and in_array($sociability->id, old('sociabilities')) }}" />
        </div>
    @endforeach
</div>
