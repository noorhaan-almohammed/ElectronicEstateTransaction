<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserForm extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|min:8|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email',
            'password' => 'sometimes|string|min:8',
            'role' => 'sometimes|IN:admin,manager,employee',
        ];
    }
    public function passedValidation(){
        if ($this->filled('password')) {
            $this->merge([
                'password' => bcrypt($this->password),
            ]);
        }
    }
}
