<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
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
