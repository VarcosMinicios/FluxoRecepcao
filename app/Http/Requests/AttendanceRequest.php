<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttendanceRequest extends FormRequest
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
            'date' => 'required',
            'hour' => 'required',
            'doctor' => 'required',
            'id_patient' => 'required'
        ];
    }

    public function messages() 
    {
        return [
            'date.required' => 'O campo é Obrigatório',
            'hour.required' => 'O campo é Obrigatório',
            'doctor.required' => 'O campo é Obrigatório',
            'id_patient.required' => 'O campo é Obrigatório'
        ];
    }
}
