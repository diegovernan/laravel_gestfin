<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required|string',
            'new_password' => 'required|string|min:8',
            'password_confirm' => 'required|string|same:new_password'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'old_password.required' => 'A senha atual de usuário é obrigatória.',
            'new_password.required' => 'A nova senha de usuário é obrigatória.',
            'new_password.min' => 'A nova senha de usuário ter no mínimo 8 caracteres.',
            'password_confirm.required' => 'A confirmação de senha de usuário é obrigatória.',
            'password_confirm.same' => 'A confirmação de senha de usuário deve ser igual à nova senha.',
        ];
    }
}
