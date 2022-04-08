<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'cpf' => 'required',
            'mother' => 'required',
            'cns' => 'required',
            'born_day' => 'required|date',
            'gender' => 'required',
            'email' => 'email',
            'cep' => 'required',
            'state' => 'required',
            'city' => 'required',
            'district' => 'required',
            'adress_type' => 'required',
            'adress' => 'required',
            'number' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'O campo é Obrigatório',
            'cpf.required' => 'O campo é Obrigatório',
            'mother.required' => 'O campo é Obrigatório',
            'cns.required' => 'O campo é Obrigatório',
            'born_day.required' => 'O campo é Obrigatório',
            'born_day.date' => 'Informe uma data',
            'gender.required' => 'O campo é Obrigatório',
            'email.email' => 'email',
            'cep.required' => 'O campo é Obrigatório',
            'state.required' => 'O campo é Obrigatório',
            'city.required' => 'O campo é Obrigatório',
            'district.required' => 'O campo é Obrigatório',
            'adress_type.required' => 'O campo é Obrigatório',
            'adress.required' => 'O campo é Obrigatório',
            'number.required' => 'O campo é Obrigatório',
        ];
    }
}
