<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NameRequest extends FormRequest
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
            'name' => 'required|string|min:2|max:20',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
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
            'name.required' => 'O nome de usuário é obrigatório.',
            'name.string' => 'O nome de usuário não é válido.',
            'name.min' => 'O nome de usuário precisa ter no mínimo 2 caracteres.',
            'name.max' => 'O nome de usuário precisa ter no máximo 20 caracteres.',
            'email.required' => 'O e-mail de usuário é obrigatório.',
            'email.email' => 'O e-mail de usuário não é válido.',
            'email.unique' => 'O e-mail de usuário já está cadastrado no sistema.',
        ];
    }
}
