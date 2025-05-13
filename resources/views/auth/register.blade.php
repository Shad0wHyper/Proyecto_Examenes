
@extends('layouts.app')

@section('title', 'Register')

@section('content')
<style> 
  #noinicio{
    display: none;
  }
 .contenido{
  margin-top: -150px;
  margin-left:-30px; 
  width: 1000px;
  height: 500px;
  display: flex;
  box-shadow: 10px 10px 20px #888888;
 }
 form input,form button, select{
  width: 400px;
 }
 form,.desci{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  width: 1000px;
  height: 500px;
 }
.backg{
 width: 500px;
}
  p{
    width: 300px;
  }
</style>

<center>
  <br>
<div class="backg">
  <br>
  <br>
  <br>
  <div class="contenido">
    <div class="desci bg-red-600">
      <h1 class="text-3xl text-center text-white font-bold"><i>Trivia.net</i></h1><br>
      <h1 class="text-3xl text-center text-white font-bold">¿Ya estás registrado?</h1><br>
      <p class="text-white">Haz click en el siguiente botón para comenzar a contestar nuestra trivia!</p> <br>
      <a href="{{ route('login.index') }}" class="font-semibold 
      bg-red-700 py-3 px-4 rounded-md text-white">Iniciar sesión</a>
    </div>
  

  <form method="POST" action="">
    
    @csrf
    <h1 class="text-3xl text-center font-bold">Registro</h1> <br>
    <input type="tex" class="border border-gray-200 rounded-md bg-gray-100 
    text-lg placeholder-gray-900 p-2 my-2 " placeholder="Nombre"
    id="nombre" name="nombre">

    @error('nombre')
    <p class="border border-red-500 rounded-md bg-red-100  text-red-600 p-2 my-2">* {{$message}}</p>
    @enderror

    <input type="email" class="border border-gray-200 rounded-md bg-gray-100 
    text-lg placeholder-gray-900 p-2 my-2 " placeholder="Correo"
    id="email" name="email">

    @error('email')
    <p class="border border-red-500 rounded-md bg-red-100  text-red-600 p-2 my-2">* {{$message}}</p>
    @enderror

    <input type="password" class="border border-gray-200 rounded-md bg-gray-100  
    text-lg placeholder-gray-900 p-2 my-2" placeholder="Contraseña"
    id="password" name="password">

    @error('password')
    <p class="border border-red-500 rounded-md bg-red-100   text-red-600 p-2 my-2">* {{$message}}</p>
    @enderror
    <p style="font-weight:bold; ">Tipo de usuario:</p>
    <select  class="border border-gray-200 rounded-md bg-gray-100 
    text-lg placeholder-gray-900 p-2 my-2" name="tipoUsuario" id="tipoUsuario">
      <option value="Alumno">Alumno</option>
      <option value="Docente">Maestro</option>
    </select>
  

    @error('tipoUsuario')
    <p class="border border-red-500 rounded-md bg-red-100 text-red-600 p-2 my-2">* {{$message}}</p>
    @enderror

    <button type="submit" class="rounded-md bg-red-500 text-lg
    text-white font-semibold p-2 my-3 hover:bg-red-600">Enviar</button>

  </form>

</div>
</center>
</div>

@endsection