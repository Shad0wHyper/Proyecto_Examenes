@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="pt-10 px-10">
        <div>
            <h1 class="w-full text-white pt-10 pb-10 text-2xl">Tus calificación es:</h1>
        </div>
        <div class="w-auto bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-blue-600 text-xl font-medium text-blue-100 text-center p-0.5 leading-none rounded-full" style="width:{{$correctas}}%"> {{$correctas}}</div>
        </div>
        <br>
        {{-- <div>
            <h1 class="w-full text-white pt-10 pb-10 text-2xl">Has obtenido un total de {{$correctas/20}} respuestas correctas</h1>
        </div> --}}

        <div>
            <a href="{{route('examen.alumno')}}"class="rounded-md bg-red-600 w-full text-lg
            text-white font-semibold p-2 my-3 hover:bg-red-700">Terminar</a>
        </div>
        
    </div>
    
@endsection