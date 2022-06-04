<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'uf' => ['required','max:2', Rule::unique('cotacao_fretes')->where(function ($query) {
                return $query->where('uf', strtoupper($this->uf))->where('transportadora_id', $this->transportadora_id);
            })],
            // 'uf' => 'required|string|unique:cotacao_fretes',
            'percentual_cotacao' => 'required|numeric',
            'valor_extra' => 'required|numeric',
            'transportadora_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'unique' => 'O estado(UF) e a transportadora não pode ser repetido.'
        ];
    }
}
