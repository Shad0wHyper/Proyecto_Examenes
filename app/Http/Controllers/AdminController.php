<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'password'    => 'required|string|min:8|confirmed',
            'tipoUsuario' => 'required|in:Alumno,Docente',
        ]);

        User::create([
            'nombre'      => $data['nombre'],
            'email'       => $data['email'],
            'password'    => $data['password'], // mutator hará bcrypt
            'tipoUsuario' => $data['tipoUsuario'],
        ]);

        return redirect()->route('admin.users.index')
            ->with('status','Usuario creado.');
    }
}
