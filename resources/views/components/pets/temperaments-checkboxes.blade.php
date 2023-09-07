@props(['checkedValues' => []])

<div class="flex flex-wrap">
    @foreach ($temperaments as $temperament)
        <div class="mb-3 mr-3">
            <x-forms.advanced-checkbox id="{{ $temperament->name }}" name="temperaments[]" value="{{ $temperament->id }}"
                :label="$temperament->name" checked="{{ in_array($temperament->id, $checkedValues) }}" />
        </div>
    @endforeach
</div>
