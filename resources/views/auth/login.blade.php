@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="px-6 py-8">
                <h1 class="text-3xl font-bold text-center text-red-600 mb-6">Trivia.net</h1>

                {{-- Errores de validación / credenciales --}}
                @if($errors->any())
                    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-6">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            class="w-full px-4 py-3 mt-1 bg-gray-100 border border-gray-300 rounded-full
                               focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white"
                            placeholder="tucorreo@ejemplo.com"
                        >
                    </div>

                    {{-- Contraseña --}}
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            class="w-full px-4 py-3 mt-1 bg-gray-100 border border-gray-300 rounded-full
                               focus:outline-none focus:ring-2 focus:ring-red-500 focus:bg-white"
                            placeholder="••••••••"
                        >
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full py-3 bg-red-600 hover:bg-red-700 text-white font-semibold
                           rounded-full transition"
                    >
                        Enviar
                    </button>
                </form>

                {{-- Link a registro --}}
                <p class="mt-4 text-center text-sm">
                    ¿No tienes cuenta?
                    <a href="{{ route('register.index') }}"
                       class="text-red-600 hover:underline font-medium">
                        Regístrate aquí
                    </a>
                </p>
            </div>
        </div>
    </div>
@endsection
