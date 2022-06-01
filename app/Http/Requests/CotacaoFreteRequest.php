<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CotacaoFreteRequest extends FormRequest
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
            'uf' => 'required|string|unique:cotacao_fretes',
            'percentual_cotacao' => 'required|numeric',
            'valor_extra' => 'required|numeric',
            'transportadora_id' => 'required|unique:cotacao_fretes'
        ];
    }
}
