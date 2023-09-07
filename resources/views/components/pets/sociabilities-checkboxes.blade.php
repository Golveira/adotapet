@props(['checkedValues' => []])

<div class="flex flex-wrap">
    @foreach ($sociabilities as $sociability)
        <div class="mb-3 mr-3">
            <x-forms.advanced-checkbox id="{{ $sociability->name }}" name="sociabilities[]" value="{{ $sociability->id }}"
                :label="$sociability->name" checked="{{ in_array($sociability->id, $checkedValues) }}" />
        </div>
    @endforeach
</div>
