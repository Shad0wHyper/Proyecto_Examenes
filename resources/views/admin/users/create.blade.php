@extends('layouts.app')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-lg max-w-lg mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Agregar usuario</h1>

        <form method="POST" action="{{ route('admin.users.store') }}">
            @csrf

            {{-- Nombre --}}
            <div class="mb-4">
                <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input
                    id="nombre"
                    name="nombre"
                    type="text"
                    value="{{ old('nombre') }}"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2
               focus:ring-blue-500 focus:border-blue-500
               @error('nombre') border-red-500 @enderror"
                >
                @error('nombre')
                <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2
               focus:ring-blue-500 focus:border-blue-500
               @error('email') border-red-500 @enderror"
                >
                @error('email')
                <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contraseña --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2
               focus:ring-blue-500 focus:border-blue-500
               @error('password') border-red-500 @enderror"
                >
                @error('password')
                <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirmar contraseña --}}
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
                <input
                    id="password_confirmation"
                    name="password_confirmation"
                    type="password"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2
               focus:ring-blue-500 focus:border-blue-500"
                >
            </div>

            {{-- Rol --}}
            <div class="mb-6">
                <label for="tipoUsuario" class="block text-sm font-medium text-gray-700">Rol</label>
                <select
                    id="tipoUsuario"
                    name="tipoUsuario"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2
               focus:ring-blue-500 focus:border-blue-500
               @error('tipoUsuario') border-red-500 @enderror"
                >
                    <option value="Alumno" {{ old('tipoUsuario')=='Alumno' ? 'selected' : '' }}>Alumno</option>
                    <option value="Docente" {{ old('tipoUsuario')=='Docente' ? 'selected' : '' }}>Docente</option>
                </select>
                @error('tipoUsuario')
                <p class="mt-1 text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button
                type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow"
            >
                <i class="fa-solid fa-user-plus mr-2"></i>Crear usuario
            </button>
        </form>
    </div>
@endsection
