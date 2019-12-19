<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'category_id' => 'required',
            'type' => 'required|boolean',
            'date' => 'required|date|date_format:Y-m-d',
            'description' => 'required|alpha_num|min:2|max:20',
            'value' => 'required|string'
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
            'category_id.required' => 'A categoria de transação é obrigatória.',
            'type.required' => 'O tipo de transação é obrigatório.',
            'date.required' => 'A data de transação é obrigatória.',
            'description.required' => 'A descrição de transação é obrigatória.',
            'description.alpha_num' => 'A descrição de transação precisa ser alfanumérico.',
            'description.min' => 'A descrição de transação precisa ter no mínimo 2 caracteres.',
            'description.max' => 'A descrição de transação precisa ter no máximo 20 caracteres.',
            'value.required' => 'O valor de transação é obrigatório.',
        ];
    }
}
