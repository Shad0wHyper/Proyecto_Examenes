<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Examen extends Authenticatable
{
    use HasFactory;
    
    public function users(){
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function preguntas(){
        return $this->hasMany(Pregunta::class,'id');
    }

}
