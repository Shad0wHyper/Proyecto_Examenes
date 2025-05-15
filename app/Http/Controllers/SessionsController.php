<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    /**
     * Muestra el formulario de login.
     */
    public function create()
    {
        return view('auth.login');
        // Asegúrate de que exista resources/views/auth/login.blade.php
    }

    /**
     * Procesa el intento de login.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->tipoUsuario;

            return match($role) {
                'Administrador' => redirect()->route('admin.dashboard'),
                'Docente'       => redirect()->route('dashboard.maestro'),
                default         => redirect()->route('dashboard.alumno'),
            };
        }

        return back()
            ->withErrors(['email' => 'Correo o contraseña incorrectos.'])
            ->onlyInput('email');
    }

    /**
     * Cierra la sesión.
     */
    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }
}
