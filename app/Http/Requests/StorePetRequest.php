<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'state_id' => ['required', 'integer', 'exists:states,id'],
            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'photo' => ['required', 'image', 'max:2048'],
            'description' => ['nullable', 'string', 'max:1000'],
            'veterinary_cares' => ['nullable', 'array', 'exists:veterinary_cares,id'],
            'temperaments' => ['nullable', 'array', 'exists:temperaments,id'],
            'sociabilities' => ['nullable', 'array', 'exists:sociabilities,id'],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => $this->user_id ?? auth()->user()->id,
            'veterinary_cares' => $this->veterinary_cares ?? [],
            'temperaments' => $this->temperaments ?? [],
            'sociabilities' => $this->sociabilities ?? [],
        ]);
    }
}
