
@extends('layouts.app')

@section('title', 'Crear Examen')

@section('content')
<center>
  <style>
    .formulario{
      color:white; 
      box-shadow: 10px 10px 5px gray;
      border-radius: 15px;
    }
  </style>
<div style="background: #C10000; width:500px;" class="block formulario my-12 p-8 ">
 
  <h1 class="text-3xl text-center font-bold">Nuevo Examen</h1>

  <form class="mt-4" method="POST" action="">
    @csrf

    <input style="width:300px; color:black;" type="text" class="border border-gray-200 rounded-md bg-gray-200 
    text-lg placeholder-gray-900 p-2 my-2" placeholder="Nombre del examen"
    id="nombre" name="nombre">
    <h1 style="margin-top: 10px;" class="text-2xl text-center font-bold">Categoria</h1> 
    <select style="color:black" class="border border-gray-200 rounded-md bg-gray-200
    text-lg placeholder-gray-900 p-2 my-2" name="categoria" id="categoria">
      <option value="fm">Fisico-Matematico</option>
      <option value="lit">Literatura</option>
      <option value="cn">Ciencias</option>
      <option value="his">Historia</option>
    </select>
    @error('message')
    <p class="border border-red-500 rounded-md bg-red-100 w-full
    text-red-600 p-2 my-2">*{{$message}}</p>
    @enderror
    <br>
    <button style="width: 100px;" type="submit" class="rounded-md bg-gray-500 text-lg
    text-white font-semibold p-2 my-3">Crear</button>
  </form>
</center>
</div>

@endsection