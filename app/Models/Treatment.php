<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_patient',
        'attendance_code',
        'date',
        'hour',
        'doctor',
        'initial_state',
        'blood_pressure',
        'temperature',
        'heart_rate',
        'respiratory_frequency',
        'weight',
        'emotional_state',
        'consciousness',
        'locomotion',
        'motor_alteration',
        'speaking',
        'allergies',
        'obs',
        'medical_conduct',
        'medicins'
    ];

    protected $dates = [
        'date'
    ];

    protected $casts = [
        'date'  => 'datetime:dd/mm/yyyy',
    ];
}
