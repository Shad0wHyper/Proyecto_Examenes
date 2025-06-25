<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Muestra el formulario de registro.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Procesa el registro.
     */
    public function store(Request $request)
    {
        // 1) Validamos todos los campos, incluyendo unique para email:
        $validated = $request->validate(
            [
                'nombre'      => ['required', 'string', 'max:255'],
                'email'       => ['required', 'email', 'max:255', 'unique:users,email'],
                'password'    => ['required', 'string', 'min:8'],
                'tipoUsuario' => 'Alumno',
            ],
            [
                'email.unique' => 'Ese correo ya está registrado. ¿Olvidaste tu contraseña?',
            ]
        );

        // 2) Intentamos crear el usuario:
        try {
            $user = User::create([
                'nombre'      => $validated['nombre'],
                'email'       => $validated['email'],
                'password'    => $validated['password'],
                'tipoUsuario' => 'Alumno',
            ]);
        } catch (QueryException $e) {
            // Si por alguna carrera de concurrencia o salto de validación ocurre un duplicado:
            if ($e->errorInfo[1] == 1062) { // código MySQL duplicate entry
                return back()
                    ->withErrors(['email' => 'Ese correo ya está registrado.'])
                    ->withInput();
            }
            // Si es otra excepción, relanzamos:
            throw $e;
        }

        // 3) Logueamos automáticamente al usuario:
        Auth::login($user);

        // 4) Redirigimos
        return redirect()->route('dashboard.alumno');
    }
}
