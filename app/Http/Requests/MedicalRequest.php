<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicalRequest extends FormRequest
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
            'id_patient' => 'required',
            'attendance_code' => 'required',
            'date' => 'required',
            'hour' => 'required',
            'doctor' => 'required',
            'initial_state' => 'required',
            'blood_pressure' => 'required',
            'temperature' => 'required',
            'heart_rate' => 'required',
            'respiratory_frequency' => 'required',
            'weight' => 'required',
            'emotional_state' => 'required',
            'consciousness' => 'required',
            'locomotion' => 'required',
            'obs' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'id_patient.required' => 'O campo é Obrigatório',
            'attendance_code.required' => 'O campo é Obrigatório',
            'date.required' => 'O campo é Obrigatório',
            'hour.required' => 'O campo é Obrigatório',
            'doctor.required' => 'O campo é Obrigatório',
            'initial_state.required' => 'O campo é Obrigatório',
            'blood_pressure.required' => 'O campo é Obrigatório',
            'temperature.required' => 'O campo é Obrigatório',
            'heart_rate.required' => 'O campo é Obrigatório',
            'respiratory_frequency.required' => 'O campo é Obrigatório',
            'weight.required' => 'O campo é Obrigatório',
            'emotional_state.required' => 'O campo é Obrigatório',
            'consciousness.required' => 'O campo é Obrigatório',
            'locomotion.required' => 'O campo é Obrigatório',
            'obs.required' => 'O campo é Obrigatório',
        ];
    }
}
