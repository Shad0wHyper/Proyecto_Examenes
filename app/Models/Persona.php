<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// La clase debe de extender de Authenticatable sino dara error
class Persona extends Authenticatable
{
    protected $table = 'personas';
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'usuario',
        'password',
        'tipoUsuario',
    ];

    // Metodo para encriptar contraseñas
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

}
