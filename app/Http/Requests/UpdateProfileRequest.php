<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required',  'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->id)],
            'username' => ['required', 'max:20', Rule::unique('users')->ignore($this->user()->id)],
            'whatsapp' => ['nullable', 'max:255'],
            'website' => ['nullable', 'max:255'],
            'bio' => ['nullable', 'max:500'],
            'state_id' => ['nullable', 'exists:states,id'],
            'city_id' => ['nullable', 'exists:cities,id'],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ];
    }
}
