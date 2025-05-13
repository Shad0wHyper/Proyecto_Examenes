
@extends('layouts.app')

@section('title', 'Login')

@section('content')

<style>
  .preguntario{
    background: white;
    border: 5px solid red;
    color: black;
    width: 68%;
    border-radius: 15px;
    margin-top: -150px;
    box-shadow: 10px 10px 10px gray;
    padding: 20px 50px;
  }
  .preguntario input[type="text"],select,.preguntario input[type="checkbox"]{
    background: #E3E3E3;
    color: black;
    border-radius: 50px;
    margin-bottom: 15px;
    padding: 10px 15px;
  }
</style>
<center>
<div class="preguntario">
  <h1 class="text-3xl text-center font-bold">Preguntas del examen {{$nombre}}</h1>

  <form class="mt-4" method="POST" action="">
    @csrf

    <input type="hidden" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white"
    id="examen" name="examen" value="{{$examen}}">

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Pregunta"
    id="pregunta" name="pregunta">

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Opcion 1"
    id="opcion1" name="opcion1">

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Opcion 2"
    id="opcion2" name="opcion2">

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Opcion 3"
    id="opcion3" name="opcion3">

    {{-- <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full
    text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Respuesta Correcta"
    id="correcta" name="correcta"> --}}
    <Label>Seleccione las respuestas correctas</Label><br>
    <input type="checkbox" name="correcta1" id="1" value="1">Respuesta 1 <br>
    <input type="checkbox" name="correcta2" id="2" value="2">Respuesta 2 <br>
    <input type="checkbox" name="correcta3" id="3" value="3">Respuesta 3 <br>
    <select name="tipoP">
  <option value="chechbox">checkbox</option>
  <option value="input" selected>input</option>
  <option value="radio">radio</option>
</select>
    

    <div class="flex justify-center px-9 space">
        <button type="submit" class="rounded-md bg-green-500 w-500 text-lg
        text-white font-semibold p-2 my-3 hover:bg-green-600">Agregar</button>

        <a href="{{route('examen.docente')}}" class="rounded-md bg-red-500 w-auto text-lg
        text-white font-semibold p-2 my-3 hover:bg-red-600">Finalizar</a>
    </div>


  </form></div></center>

@endsection