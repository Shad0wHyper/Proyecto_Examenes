@extends('layouts.app')

@section('title', 'Preguntas del examen '.$nombre)

@section('content')
    <style>
        /* Sólo pequeños retoques que Tailwind no cubre */
        .preguntario input[type="text"],
        .preguntario select,
        .preguntario input[type="checkbox"]{
            background:#E3E3E3;
            border-radius:50px;
            padding:10px 15px;
            margin-bottom:15px;
        }
    </style>

    <div class="w-full max-w-3xl mx-auto bg-white border-4 border-red-500 rounded-xl
            shadow-lg p-8 mt-8 mb-12 overflow-auto">

        <h1 class="text-3xl font-bold text-center mb-8">
            Preguntas del examen {{ $nombre }}
        </h1>

        <form method="POST" action="" class="space-y-6">
            @csrf

            <input type="hidden" name="examen" value="{{ $examen }}">

            <input  type="text" name="pregunta"
                    placeholder="Pregunta"
                    class="w-full border border-gray-300 focus:outline-none
                       focus:ring-2 focus:ring-red-500" />

            <input  type="text" name="opcion1"
                    placeholder="Opción 1"
                    class="w-full border border-gray-300 focus:outline-none
                       focus:ring-2 focus:ring-red-500" />

            <input  type="text" name="opcion2"
                    placeholder="Opción 2"
                    class="w-full border border-gray-300 focus:outline-none
                       focus:ring-2 focus:ring-red-500" />

            <input  type="text" name="opcion3"
                    placeholder="Opción 3"
                    class="w-full border border-gray-300 focus:outline-none
                       focus:ring-2 focus:ring-red-500" />

            {{-- Selección de respuestas correctas --}}
            <div class="space-y-2">
                <p class="font-medium">Seleccione las respuestas correctas</p>

                <label class="inline-flex items-center space-x-2">
                    <input type="checkbox" name="correcta1" value="1"
                           class="h-4 w-4 text-red-600 border-gray-300 rounded">
                    <span>Respuesta 1</span>
                </label>

                <label class="inline-flex items-center space-x-2">
                    <input type="checkbox" name="correcta2" value="2"
                           class="h-4 w-4 text-red-600 border-gray-300 rounded">
                    <span>Respuesta 2</span>
                </label>

                <label class="inline-flex items-center space-x-2">
                    <input type="checkbox" name="correcta3" value="3"
                           class="h-4 w-4 text-red-600 border-gray-300 rounded">
                    <span>Respuesta 3</span>
                </label>
            </div>

            {{-- Tipo de pregunta (se conserva el typo “chechbox” por compatibilidad) --}}
            <select name="tipoP"
                    class="w-full border border-gray-300 focus:outline-none
                       focus:ring-2 focus:ring-red-500">
                <option value="chechbox">checkbox</option>
                <option value="input" selected>input</option>
                <option value="radio">radio</option>
            </select>

            <div class="flex flex-col sm:flex-row sm:justify-center sm:space-x-4 space-y-4 sm:space-y-0 pt-4">
                <button type="submit"
                        class="flex-1 py-3 bg-green-500 hover:bg-green-600 text-white
                           font-semibold rounded-lg transition">
                    Agregar
                </button>

                <a href="{{ route('examen.docente') }}"
                   class="flex-1 py-3 text-center bg-red-500 hover:bg-red-600 text-white
                      font-semibold rounded-lg transition">
                    Finalizar
                </a>
            </div>
        </form>
    </div>
@endsection
