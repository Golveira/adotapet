@props(['checkedValues' => []])

<div class="flex flex-wrap">
    @foreach ($veterinaryCares as $vetCare)
        <div class="mb-3 mr-3">
            <x-forms.advanced-checkbox id="{{ $vetCare->name }}" name="veterinary_cares[]" value="{{ $vetCare->id }}"
                :label="$vetCare->name" checked="{{ in_array($vetCare->id, $checkedValues) }}" />
        </div>
    @endforeach
</div>
