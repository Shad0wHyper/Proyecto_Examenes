<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function examenes(){
        return $this->belongsTo(Examen::class,'id_examen');
    }
}
