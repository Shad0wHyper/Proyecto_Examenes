@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <style>
        /* Nuevo estilo pill para los dos botones */
        .pill-btn{
            /* Tailwind via @apply para no inflar el html */
            @apply inline-flex items-center gap-2 px-6 py-2 rounded-full
            bg-red-600 text-white font-semibold text-lg
            shadow-md hover:shadow-none hover:bg-red-700 transition;
        }

        /* Mantengo tu sombra negra en las tarjetas por compatibilidad */
        .botonera{ margin-bottom:10px; }
    </style>

    {{-- BOTONES --}}
    <div class="botonera flex flex-col sm:flex-row justify-center gap-4 my-6">
        <a href="{{ route('crearexamen.docente') }}"   class="pill-btn">
            <i class="fa-solid fa-plus"></i> Nuevo examen
        </a>
        <a href="{{ route('eliminarExamen.docente') }}" class="pill-btn">
            <i class="fa-solid fa-trash"></i> Eliminar examen
        </a>
        {{--
        <a href="{{ route('haciaEditar.docente') }}"    class="pill-btn">
            <i class="fa-solid fa-pen-to-square"></i> Editar/Listar preguntas
        </a>
        --}}
    </div>

    {{-- GRID ORIGINAL --}}
    <div>
        <div class="sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Products</h2>

            <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-4 xl:grid-cols-4 xl:gap-x-8">

                {{-- Mostrar exámenes del docente actual --}}
                @foreach ($examens as $examen)
                    @if (Auth::id() == $examen->id_usuario)
                        @switch($examen->categoria)

                            @case('fm')
                                <a class="group"
                                   href="{{ route('crearPreguntas.docente') }}?examen={{ $examen->id }}&nombre={{ $examen->nombre }}">
                                    <div style="width:300px;height:150px;
                            background:url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/40560/vecteezyabstract-backgroundas0420_generated.jpg) center/cover;
                            background-repeat:round;">
                                        <h1 class="text-center text-white text-2xl font-bold pt-12">{{ $examen->nombre }}</h1>
                                    </div>
                                    <p class="text-center mt-1 text-lg font-medium text-gray-700"><b>Físico-Matemático</b></p>
                                </a>
                                @break

                            @case('lit')
                                <a class="group"
                                   href="{{ route('crearPreguntas.docente') }}?examen={{ $examen->id }}&nombre={{ $examen->nombre }}">
                                    <div style="width:300px;height:150px;
                            background:url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/38202/ColorfulSunBackground.jpg) center/cover;
                            background-repeat:round;">
                                        <h1 class="text-center text-white text-2xl font-bold pt-12">{{ $examen->nombre }}</h1>
                                    </div>
                                    <p class="text-center mt-1 text-lg font-medium text-gray-700"><b>Literatura</b></p>
                                </a>
                                @break

                            @case('cn')
                                <a class="group"
                                   href="{{ route('crearPreguntas.docente') }}?examen={{ $examen->id }}&nombre={{ $examen->nombre }}">
                                    <div style="width:300px;height:150px;
                            background:url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/40545/Geometric_Bg_generated.jpg) center/cover;
                            background-repeat:round;">
                                        <h1 class="text-center text-white text-2xl font-bold pt-12">{{ $examen->nombre }}</h1>
                                    </div>
                                    <p class="text-center mt-1 text-lg font-medium text-gray-700"><b>Ciencias</b></p>
                                </a>
                                @break

                            @case('his')
                                <a class="group"
                                   href="{{ route('crearPreguntas.docente') }}?examen={{ $examen->id }}&nombre={{ $examen->nombre }}">
                                    <div style="width:300px;height:150px;
                            background:url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/40596/FreevectorYellow-BackgroundAS0521_generated.jpg) center/cover;
                            background-repeat:round;">
                                        <h1 class="text-center text-white text-2xl font-bold pt-12">{{ $examen->nombre }}</h1>
                                    </div>
                                    <p class="text-center mt-1 text-lg font-medium text-gray-700"><b>Historia</b></p>
                                </a>
                                @break

                        @endswitch
                    @endif
                @endforeach

            </div>
        </div>
    </div>
@endsection
