<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'administracion@app.com'], // condición para buscarlo
            [
                'nombre'      => 'Administrador',
                'password'    => Hash::make('12345678'),
                'tipoUsuario' => 'Administrador',
            ]
        );
    }
}
