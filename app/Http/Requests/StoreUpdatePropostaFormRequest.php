<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePropostaFormRequest extends FormRequest
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
           'empresa_id'       => 'required',
           'contrato_id'      => 'required',
           'objeto'           => 'required|string|min:10',
           'descricao'        => 'required|string|min:10',
           'inicio_vigencia'  => 'required',
           'fim_vigencia'     => 'required',
        ];
    }
}