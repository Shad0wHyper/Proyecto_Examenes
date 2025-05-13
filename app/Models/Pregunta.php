<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    public function examenes(){
        return $this->belognsTo(Examen::class,'id_examen');
    }

    public function users(){
        return $this->belognsTo(User::class,'id_pregunta');
    }
}
