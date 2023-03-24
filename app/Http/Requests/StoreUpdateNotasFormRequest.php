<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateNotasFormRequest extends FormRequest
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
            'empresa_id'    => 'required',
            'contrato_id'   => 'required',
            'nronf'         => 'required',
            'data_emissao'  => 'required',
            'data_vencto'   => 'required',
        ];
    }
}
