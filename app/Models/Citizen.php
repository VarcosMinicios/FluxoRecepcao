<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Citizen extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cpf',
        'rg',
        'prontuario',
        'name', 
        'mother', 
        'cns',
        'born_day', 
        'gender',
        'breed',
        'nationality',
        'email', 
        'phone', 
        'cellphone', 
        'cep',
        'state',
        'city',
        'district', 
        'adress_type', 
        'adress',
        'number',
        'reference', 
        'city_code',
        'complement'
    ];

    protected $dates = [
        'deleted_at',
        'born_day',
    ];

    protected $casts = [
        'born_day'  => 'datetime:dd/mm/yyyy',
        'deleted_at'  => 'datetime:dd/mm/yyyy'
    ];
}
