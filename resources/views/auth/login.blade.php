
@extends('layouts.app')

@section('title', 'Login')

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
 form input,form button{
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
      <h1 class="text-3xl text-center text-white font-bold">¿Aún no estás registrado?</h1><br>
      <p class="text-white">Haz click en el siguiente botón para comenzar a contestar nuestra trivia!</p> <br>
      <a href="{{ route('register.index') }}" class="font-semibold 
      bg-red-700 py-3 px-4 rounded-md text-white">Registrarse</a>
    </div>
    <form method="POST" action="">
      @csrf
      <h1 class="text-3xl text-center font-bold">Iniciar sesión</h1><br><br>
      <input type="email" class="border border-gray-200 rounded-md bg-gray-100 
      text-lg placeholder-gray-600 p-2 my-2" placeholder="Correo"
      id="email" name="email">
  
      <input type="password" class="border border-gray-200 rounded-md bg-gray-100 
      text-lg placeholder-gray-600 p-2 my-2" placeholder="Contraseña"
      id="password" name="password">
  
      @error('message')
      <p class="border border-red-500 rounded-md bg-red-100 w-full
      text-red-600 p-2 my-2">{{$message}}</p>
      @enderror
  <br>
      <button type="submit" class="rounded-md bg-red-600 text-lg
      text-white font-semibold p-2 my-3 hover:bg-red-7x00">Enviar</button>
    </form>
  </div>

  
</center>
</div>

@endsection