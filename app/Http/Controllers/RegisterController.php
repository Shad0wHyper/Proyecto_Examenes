<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

class RegisterController extends Controller
{
    /** Mostrar el formulario */
    public function create()
    {
        return view('auth.register'); // o la ruta a tu Blade
    }

    /** Procesar el registro */
    public function store(Request $request)
    {
        // 1) Validar TODOS los campos, incluyendo el unique para email
        $validated = $request->validate(
            [
                'nombre'      => ['required','string','max:255'],
                'email'       => ['required','email','max:255','unique:users,email'],
                'password'    => ['required','string','min:8'],
                'tipoUsuario' => ['required','in:Alumno,Docente'],
            ],
            [
                'email.unique' => 'Ese correo ya está registrado. ¿Olvidaste tu contraseña?',
            ]
        );

        // 2) Intentar crear el usuario dentro de un try/catch
        try {
            User::create([
                'nombre'      => $validated['nombre'],
                'email'       => $validated['email'],
                'password'    => Hash::make($validated['password']),
                'tipoUsuario' => $validated['tipoUsuario'],
            ]);
        } catch (QueryException $e) {
            // Código 23000 = violación de unique en MySQL
            if ($e->getCode() === '23000') {
                return back()
                    ->withErrors(['email' => 'Ese correo ya está registrado.'])
                    ->withInput();
            }
            // Cualquier otro error, relanzarlo
            throw $e;
        }

        // 3) Redirigir al login con mensaje de éxito
        return redirect()
            ->route('login.index')
            ->with('status', 'Usuario registrado con éxito. ¡Bienvenido!');
    }
}
