<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user->id)
            ],
            'username' => [
                'required',
                'string',
                'min:3',
                'max:40',
                Rule::unique('users')->ignore($this->user->id)
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'is_admin' => ['nullable', 'boolean']
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->password == null) {
            $this->request->remove('password');
        }
    }
}
