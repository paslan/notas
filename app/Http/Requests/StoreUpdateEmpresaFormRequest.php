<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateEmpresaFormRequest extends FormRequest
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
        $rules =
        [
            'nome'          => 'required|string|max:255|min:3',

            'endereco'      => 'required',
            'nro'           => 'required',
            'estado_id'     => 'required',
            'cidade_id'     => 'required',
        ];

        if($this->getMethod() == "POST")
        {
            $rules +=
            [
                'razao_social'  => 'required|unique:empresas,razao_social',
                'cnpj'          => 'required|unique:empresas,cnpj',
            ];
        }

        if($this->getMethod() == "PUT")
        {
            $rules +=
            [
                'razao_social'  =>
                [
                    'required',
                    Rule::unique('empresas')->ignore($this->empresa),
                ],
                'cnpj'          =>
                [
                    'required',
                    Rule::unique('empresas')->ignore($this->empresa),
                ],
            ];
        }


        return $rules;

    }
}
