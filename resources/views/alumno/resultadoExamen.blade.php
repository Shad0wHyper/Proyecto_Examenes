@extends('layouts.app')

@section('title', 'Resultados')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg overflow-hidden">
            {{-- Encabezado --}}
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6">
                <h2 class="text-white text-2xl font-bold text-center">¡Buen trabajo!</h2>
            </div>

            {{-- Cuerpo --}}
            <div class="p-6">
                {{-- Tu calificación --}}
                <p class="text-center text-gray-700 text-lg mb-4">Tu calificación es:</p>
                <div class="flex items-baseline justify-center mb-6">
                    <span class="text-5xl font-extrabold text-blue-600">{{ $correctas }}%</span>
                    <span class="ml-2 text-gray-500 text-sm">de aciertos</span>
                </div>

                {{-- Barra de progreso --}}
                <div class="w-full bg-gray-200 rounded-full h-4 overflow-hidden mb-6">
                    <div
                        class="h-4 rounded-full bg-gradient-to-r from-blue-500 to-indigo-500 transition-all duration-500"
                        style="width: {{ $correctas }}%;"
                    ></div>
                </div>

                {{-- Texto adicional --}}
                <p class="text-center text-gray-600 mb-8">
                    Has respondido correctamente <span class="font-semibold">{{ $correctas }}</span>% del <span class="font-semibold">100</span>% obtenible.
                </p>

                {{-- Botón de terminar --}}
                <div class="text-center">
                    <a
                        href="{{ route('examen.alumno') }}"
                        class="inline-block px-6 py-3 bg-red-600 text-white font-semibold rounded-full shadow hover:bg-red-700 transition"
                    >
                        Finalizar
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
