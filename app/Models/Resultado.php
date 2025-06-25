<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    // Desactivar created_at / updated_at
    public $timestamps = false;

    protected $fillable = [
        'idAlumno',
        'alumno',
        'idDocente',
        'idExamen',
        'tituloExamen',
        'intentos',
        'promedio',
    ];
}
