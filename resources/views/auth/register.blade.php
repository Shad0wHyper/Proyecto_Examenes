@extends('layouts.app')

@section('title','Registrar')

@section('content')
    {{-- Esta capa ocupa todo el viewport y centra su contenido --}}
    <div class="fixed inset-0 flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-2xl font-bold text-center mb-6">Crear cuenta</h1>

            {{-- Notificación Toastr --}}
            @if(session('status'))
                <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register.store') }}" class="space-y-6">
                @csrf

                {{-- Nombre --}}
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input
                        id="nombre"
                        name="nombre"
                        type="text"
                        value="{{ old('nombre') }}"
                        required
                        class="w-full px-5 py-3 mt-1 bg-gray-100 border border-gray-300 rounded-full
                   focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white"
                        placeholder="Tu nombre"
                    >
                    @error('nombre')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-5 py-3 mt-1 bg-gray-100 border border-gray-300 rounded-full
                   focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white"
                        placeholder="tucorreo@ejemplo.com"
                    >
                    @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Contraseña --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        class="w-full px-5 py-3 mt-1 bg-gray-100 border border-gray-300 rounded-full
                   focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white"
                        placeholder="••••••••"
                    >
                    @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Botón Registrar --}}
                <button
                    type="submit"
                    class="w-full py-3 bg-red-600 hover:bg-red-700 text-white font-semibold
                 rounded-full transition"
                >
                    Registrar
                </button>

                {{-- Link a login --}}
                <p class="text-center text-sm">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login.index') }}" class="text-red-600 hover:underline">
                        Inicia sesión
                    </a>
                </p>
            </form>
        </div>
    </div>
@endsection
