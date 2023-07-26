<?php

namespace App\Http\Requests\User;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
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
            'photo' => ['required', 'image', 'max:2048'],
            'description' => ['nullable', 'string', 'max:1000'],
            'veterinary_cares' => ['nullable', 'array', 'exists:veterinary_cares,id'],
            'temperaments' => ['nullable', 'array', 'exists:temperaments,id'],
            'sociabilities' => ['nullable', 'array', 'exists:sociabilities,id'],
        ];
    }
}