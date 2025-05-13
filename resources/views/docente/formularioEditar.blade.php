
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="block mx-auto my-12 p-8 bg-white w-1/3 border border-gray-200 
rounded-lg shadow-lg">

  <h1 class="text-3xl text-center font-bold">Preguntas del examen</h1>

  <form class="mt-4" method="POST" action="">
    @csrf
    @method('put')
@foreach ($preguntas as $pregunta)
    <input type="hidden" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
    id="id" name="id" value="{{$pregunta->id}}">

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Pregunta"
    id="pregunta" name="pregunta" value="{{$pregunta->pregunta}}">

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Opcion 1"
    id="opcion1" name="opcion1" value="{{$pregunta->opcion1}}">

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Opcion 2"
    id="opcion2" name="opcion2" value="{{$pregunta->opcion2}}">

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Opcion 3"
    id="opcion3" name="opcion3" value="{{$pregunta->opcion3}}">

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Respuesta Correcta"
    id="correcta" name="correcta" value="{{$pregunta->correcta}}">

    <div class="flex justify-center px-9 space">
        <button type="submit" class="rounded-md bg-yellow-500 w-500 text-lg
        text-white font-semibold p-2 my-3 hover:bg-yellow-600">Actualizar</button>

        <a href="{{route('examen.docente')}}" class="rounded-md bg-red-500 w-auto text-lg
        text-white font-semibold p-2 my-3 hover:bg-red-600">Terminar</a>
    </div>
    @endforeach
  </form>
</div>

@endsection