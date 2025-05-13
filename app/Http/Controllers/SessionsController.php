<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hamcrest\Core\HasToString;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\Environment\Console;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    // Para validar nuestro inicio de sesion debemos importar el modelo que estamos utilizando
    // en el cual buscaremos la similitud
    public function store(){
        //Metodo para validar el inicio de sesion
        if(auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again',
            ]);
        }

        // Metodo para validar le login y verificar a cual le corresponde
        if(auth()->user()->tipoUsuario == 'Docente'){
            return redirect()->to('/dashboardMaestro');
           
        }else{
            return redirect()->to('/dashboardAlumno');
        }

    }

    // Metodo para cerrar la sesión
    public function destroy(){
        auth()->logout();
        return redirect()->to('/login');
    }
}
