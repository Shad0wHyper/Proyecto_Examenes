@extends('layouts.app')

@section('title', 'Preguntas del examen '.$nombre)

@section('content')
    <style>
        .preguntario input[type="text"],
        .preguntario select,
        .preguntario input[type="checkbox"] {
            background: #E3E3E3;
            border-radius: 50px;
            padding: 10px 15px;
            margin-bottom: 15px;
        }
        .error-text { color: #e53e3e; font-size: 0.875rem; margin-top: -10px; }
    </style>

    <div class="w-full max-w-3xl mx-auto bg-white border-4 border-red-500
                rounded-xl shadow-lg p-8 mt-8 mb-12 overflow-auto">
        <h1 class="text-3xl font-bold text-center mb-8">
            Preguntas del examen {{ $nombre }}
        </h1>

        <form id="preguntaForm" method="POST" action="{{ route('crearPreguntas.docente') }}" class="space-y-6">
            @csrf
            <input type="hidden" name="examen" value="{{ $examen }}">
            <input type="hidden" name="nombre" value="{{ $nombre }}">

            <input type="text" name="pregunta" required placeholder="Pregunta"
                   class="w-full border border-gray-300 focus:ring-2 focus:ring-red-500" />
            <input type="text" name="opcion1" required placeholder="Opción 1" class="w-full border..." />
            <input type="text" name="opcion2" required placeholder="Opción 2" class="w-full border..." />
            <input type="text" name="opcion3" required placeholder="Opción 3" class="w-full border..." />

            <div class="space-y-2 preguntario">
                <p class="font-medium">Seleccione las respuestas correctas</p>
                @for ($j = 1; $j <= 3; $j++)
                    <label class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="correcta{{ $j }}" value="{{ $j }}"
                               class="h-4 w-4 text-red-600 border-gray-300 rounded" />
                        <span>Respuesta {{ $j }}</span>
                    </label>
                @endfor
                <p id="errorCheckbox" class="error-text hidden">
                    Debe marcar al menos una respuesta correcta.
                </p>
            </div>

            <select name="tipoP" class="w-full border border-gray-300 focus:ring-2 focus:ring-red-500">
                <option value="checkbox">checkbox</option>
                <option value="input" selected>input</option>
                <option value="radio">radio</option>
            </select>

            <div class="flex space-x-4 pt-4">
                <button type="submit" class="flex-1 py-3 bg-green-500 hover:bg-green-600 text-white rounded-lg">
                    Agregar
                </button>
                <a href="{{ route('examen.docente') }}"
                   class="flex-1 py-3 bg-red-500 hover:bg-red-600 text-white rounded-lg text-center">
                    Finalizar
                </a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('preguntaForm').addEventListener('submit', e => {
            const checks = e.target.querySelectorAll('input[type="checkbox"][name^="correcta"]');
            const any = Array.from(checks).some(ch => ch.checked);
            const err = document.getElementById('errorCheckbox');
            if (!any) {
                e.preventDefault(); err.classList.remove('hidden');
            } else {
                err.classList.add('hidden');
            }
        });
    </script>
@endsection
