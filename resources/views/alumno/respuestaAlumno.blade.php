@extends('layouts.app')

@section('title', 'Examen '.$nombre)

@section('content')
    <style>
        .preguntario{
            background:#fff;
            border:5px solid #e3342f;   /* rojo */
            color:#000;
            width:98%;
            border-radius:15px;
            box-shadow:10px 10px 10px rgba(0,0,0,.15);
            padding:20px 50px;
            /* Quitamos el desplazamiento negativo   margin-top:-150px;*/
            overflow:auto;              /* ← muestra todo el contenido */
            max-height:calc(100vh - 8rem); /* no tapa el footer en pantallas bajas */
        }
        .preguntario input[type="text"]{
            background:#E3E3E3;
            border-radius:50px;
            margin-bottom:15px;
            padding:10px 15px;
        }
    </style>

    <div class="preguntario mx-auto mt-6">

        <h1 class="text-3xl font-bold text-center mb-6">Examen {{ $nombre }}</h1>

        <form method="POST" action="" class="space-y-8">
            @csrf

            @foreach ($preguntas as $i => $pregunta)
                @if ($id == $pregunta->id_examen)
                    <div>
                        <legend class="text-lg font-medium mb-2">{{ $pregunta->pregunta }}</legend>

                        {{-- INPUT --}}
                        @if ($pregunta->tipoP == 'input')
                            <input  name="pregunta1{{ $i }}"
                                    value="{{ $pregunta->opcion1 }}"
                                    type="text"
                                    class="w-full" />
                            <input type="hidden" name="kendra{{ $i }}" value="{{ $pregunta->tipoP }}">
                        @endif

                        {{-- CHECKBOX (se conserva el typo “chechbox” por compatibilidad) --}}
                        @if ($pregunta->tipoP == 'chechbox')
                            <div class="space-y-2">
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="pregunta1{{ $i }}" value="{{ $pregunta->opcion1 }}"
                                           class="h-4 w-4 text-red-600 border-gray-300 rounded">
                                    <span>{{ $pregunta->opcion1 }}</span>
                                </label>

                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="pregunta2{{ $i }}" value="{{ $pregunta->opcion2 }}"
                                           class="h-4 w-4 text-red-600 border-gray-300 rounded">
                                    <span>{{ $pregunta->opcion2 }}</span>
                                </label>

                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="pregunta3{{ $i }}" value="{{ $pregunta->opcion3 }}"
                                           class="h-4 w-4 text-red-600 border-gray-300 rounded">
                                    <span>{{ $pregunta->opcion3 }}</span>
                                </label>
                            </div>
                            {{-- metadatos --}}
                            <input type="hidden" name="correcta{{ $i }}" value="{{ $pregunta->correcta }}">
                            <input type="hidden" name="kendra{{ $i }}"   value="{{ $pregunta->tipoP }}">
                            <input type="hidden" name="idDocente"        value="{{ $pregunta->id_usuario }}">
                            <input type="hidden" name="idExamen"         value="{{ $pregunta->id_examen }}">
                            <input type="hidden" name="nombreExamen"     value="{{ $nombre }}">
                        @endif

                        {{-- RADIO --}}
                        @if ($pregunta->tipoP == 'radio')
                            <div class="space-y-2">
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="pregunta1{{ $i }}" value="{{ $pregunta->opcion1 }}"
                                           class="h-4 w-4 text-red-600 border-gray-300 rounded">
                                    <span>{{ $pregunta->opcion1 }}</span>
                                </label>

                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="pregunta2{{ $i }}" value="{{ $pregunta->opcion2 }}"
                                           class="h-4 w-4 text-red-600 border-gray-300 rounded">
                                    <span>{{ $pregunta->opcion2 }}</span>
                                </label>

                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="pregunta3{{ $i }}" value="{{ $pregunta->opcion3 }}"
                                           class="h-4 w-4 text-red-600 border-gray-300 rounded">
                                    <span>{{ $pregunta->opcion3 }}</span>
                                </label>
                            </div>
                            {{-- metadatos --}}
                            <input type="hidden" name="correcta{{ $i }}" value="{{ $pregunta->correcta }}">
                            <input type="hidden" name="kendra{{ $i }}"   value="{{ $pregunta->tipoP }}">
                            <input type="hidden" name="idDocente"        value="{{ $pregunta->id_usuario }}">
                            <input type="hidden" name="idExamen"         value="{{ $pregunta->id_examen }}">
                            <input type="hidden" name="nombreExamen"     value="{{ $nombre }}">
                        @endif
                    </div>
                @endif
            @endforeach

            <button
                type="submit"
                class="w-full py-3 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg transition">
                Enviar
            </button>
        </form>
    </div>
@endsection

