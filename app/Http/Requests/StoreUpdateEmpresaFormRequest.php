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
            'razao_social'  => 'required',

            'endereco'      => 'required',
            'nro'           => 'required',
            'estado_id'     => 'required',
            'cidade_id'     => 'required',
        ];

        if($this->getMethod() == "POST")
        {
            $rules +=
            [
                'nome'          => 'required|string|max:255|min:3|unique:empresas,nome',
                'cnpj'          => 'required|unique:empresas,cnpj',
            ];
        }

        if($this->getMethod() == "PUT")
        {
            $rules +=
            [
                'nome'  =>
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
