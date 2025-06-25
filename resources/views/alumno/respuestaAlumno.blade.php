@extends('layouts.app')

@section('title', 'Examen ' . $nombre)

@section('content')
    <style>
        .preguntario {
            background: #fff;
            border: 5px solid #e3342f;
            border-radius: 15px;
            box-shadow: 10px 10px 10px rgba(0,0,0,.15);
            padding: 20px 50px;
            max-height: calc(100vh - 8rem);
            overflow: auto;
            width: 98%;
        }
        .preguntario input[type="text"] {
            background: #E3E3E3;
            border-radius: 50px;
            padding: 10px 15px;
            margin-bottom: 15px;
        }
    </style>

    <div class="preguntario mx-auto mt-6">
        <h1 class="text-3xl font-bold text-center mb-6">Examen {{ $nombre }}</h1>

        <form method="POST" action="{{ route('respuesta.alumno') }}" class="space-y-8">
            @csrf

            {{-- metadatos globales --}}
            <input type="hidden" name="idExamen"     value="{{ $id }}" />
            <input type="hidden" name="nombreExamen" value="{{ $nombre }}" />
            <input type="hidden" name="idDocente"    value="{{ $maestro }}" />

            @foreach ($preguntas as $i => $pregunta)
                <div>
                    <legend class="text-lg font-medium mb-2">{{ $pregunta->pregunta }}</legend>

                    @switch($pregunta->tipoP)
                        @case('input')
                            <input name="respuesta{{ $i }}" type="text" class="w-full"
                                   value="{{ old('respuesta'.$i) }}" />
                            @break

                        @case('radio')
                            <div class="space-y-2">
                                @foreach ([$pregunta->opcion1,$pregunta->opcion2,$pregunta->opcion3] as $op)
                                    <label class="flex items-center space-x-2">
                                        <input type="radio" name="respuesta{{ $i }}" value="{{ $op }}"
                                               class="h-4 w-4 border-gray-300 rounded" />
                                        <span>{{ $op }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @break

                        @case('chechbox') {{-- o "checkbox" --}}
                        @case('checkbox')
                            <div class="space-y-2">
                                @foreach ([$pregunta->opcion1,$pregunta->opcion2,$pregunta->opcion3] as $op)
                                    <label class="flex items-center space-x-2">
                                        <input type="checkbox" name="respuesta{{ $i }}[]" value="{{ $op }}"
                                               class="h-4 w-4 border-gray-300 rounded checkbox-group-{{ $i }}" />
                                        <span>{{ $op }}</span>
                                    </label>
                                @endforeach
                            </div>
                            @break
                    @endswitch
                </div>
            @endforeach

            <button type="submit"
                    class="w-full py-3 bg-red-500 hover:bg-red-600 text-white rounded-lg">
                Enviar
            </button>
        </form>
    </div>

    {{-- Script para limitar checkbox a una selección por pregunta --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Para cada grupo de checkboxes por pregunta
            @foreach ($preguntas as $i => $pregunta)
            const checkboxes{{ $i }} = document.querySelectorAll('.checkbox-group-{{ $i }}');
            checkboxes{{ $i }}.forEach(ch => {
                ch.addEventListener('change', function() {
                    if (this.checked) {
                        checkboxes{{ $i }}.forEach(other => {
                            if (other !== this) other.checked = false;
                        });
                    }
                });
            });
            @endforeach
        });
    </script>
@endsection
