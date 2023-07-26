<div class="flex flex-wrap">
    @foreach ($temperaments as $temperament)
        <div class="mb-3 mr-3">
            <x-checkbox id="{{ $temperament->name }}" value="{{ $temperament->id }}" :label="$temperament->name"
                name="temperaments[]"
                checked="{{ is_array(old('temperaments')) and in_array($temperament->id, old('temperaments')) }}" />
        </div>
    @endforeach
</div>
