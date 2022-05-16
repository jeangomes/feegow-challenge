<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSolicitationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'specialty_id' => ['required', 'integer'],
            'professional_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'cpf' => ['required', 'string', 'cpf_cnpj'],
            'source_id' => ['required', 'integer'],
            'birthdate' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'cpf.cpf_cnpj' => 'CPF inválido',
        ];
    }
}
