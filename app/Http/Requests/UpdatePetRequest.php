<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePetRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'specie' => ['required', 'string', Rule::in(['dog', 'cat'])],
            'sex' => ['required', 'string', Rule::in(['male', 'female'])],
            'age' => ['required', 'string', Rule::in(['puppy', 'adult', 'senior'])],
            'size' => ['required', 'string', Rule::in(['small', 'medium', 'large'])],
            'state_id' => ['required', 'integer', 'exists:states,id'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'photo' => ['nullable', 'image', 'max:2048'],
            'description' => ['nullable', 'string', 'max:1000'],
            'veterinary_cares' => ['nullable', 'array', 'exists:veterinary_cares,id'],
            'temperaments' => ['nullable', 'array', 'exists:temperaments,id'],
            'sociabilities' => ['nullable', 'array', 'exists:sociabilities,id'],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'veterinary_cares' => $this->veterinary_cares ?? [],
            'temperaments' => $this->temperaments ?? [],
            'sociabilities' => $this->sociabilities ?? [],
        ]);
    }
}
