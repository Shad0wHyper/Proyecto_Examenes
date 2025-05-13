@extends('layouts.app')

@section('title', 'Home')

@section('content')

<style>
  .preguntario{
    background: white;
    border: 5px solid red;
    color: black;
    width: 98%;
    border-radius: 15px;
    margin-top: -150px;
    box-shadow: 10px 10px 10px gray;
    padding: 20px 50px;
  }
  .preguntario input[type="text"]{
    background: #E3E3E3;
    color: black;
    border-radius: 50px;
    margin-bottom: 15px;
    padding: 10px 15px;
  }
</style>

<div class="preguntario">

  <h1 class="text-3xl text-center font-bold">Examen {{$nombre}}</h1>


  <form class="mt-4" method="POST" action="">
   @csrf
  
   @foreach ($preguntas as $i => $pregunta)
   {{-- @if($i<5) --}}
   @if($id == $pregunta->id_examen)
   <div>
      <legend class="text-base font-medium">{{$pregunta->pregunta}}</legend>
  </div>

  {{-- //validacion de tipo input --}}
   @if($pregunta->tipoP=="input")
   <div class="mt-4 space-y-4" height="500px" with ="500px" >
    <div class="flex items-center">
      <input id="push-everything" name="pregunta1{{$i}}" value="{{$pregunta->opcion1}}" type="text" height="500px" with ="500px" >
      <label for="push-everything" class="ml-3 block text-sm font-medium"></label>
      <input type="hidden" name="kendra{{$i}}" value="{{$pregunta->tipoP}}" />
    </div>
  </div>
  @endif

  
  {{-- //validacion de tipo checkbox --}}

   @if($pregunta->tipoP=="chechbox")
   <div class="mt-4 space-y-4">
    <div class="flex items-center">
      <input id="push-everything" name="pregunta1{{$i}}" value="{{$pregunta->opcion1}}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
      <label for="push-everything" class="ml-3 block text-sm font-medium d">{{$pregunta->opcion1}}</label>
    </div>
    <div class="flex items-center">
      <input id="push-email" name="pregunta2{{$i}}" value="{{$pregunta->opcion2}}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
      <label for="push-email" class="ml-3 block text-sm font-medium d">{{$pregunta->opcion2}}</label>
    </div>
    <div class="flex items-center">
      <input id="push-nothing" name="pregunta3{{$i}}" value="{{$pregunta->opcion3}}"  type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
      <label for="push-nothing" class="ml-3 block text-sm font-medium d">{{$pregunta->opcion3}} </label>
      
      {{-- DECLARAMOS LA REPUESTA CORRECTA CON UN INPUT--}} 
      <input type="hidden" name="correcta{{$i}}" value="{{$pregunta->correcta}}" />
      <input type="hidden" name="kendra{{$i}}" value="{{$pregunta->tipoP}}" />
      <input type="hidden" name="idDocente" value="{{$pregunta->id_usuario}}" />
      <input type="hidden" name="idExamen" value="{{$pregunta->id_examen}}" />
      <input type="hidden" name="nombreExamen" value="{{$nombre}}" />
    </div>
    <p></p>
  </div>
   @endif

   {{-- //validacion de tipo radio --}}
   @if($pregunta->tipoP=="radio")
   <div class="mt-4 space-y-4">
    <div class="flex items-center">
      <input id="push-everything" name="pregunta1{{$i}}" value="{{$pregunta->opcion1}}" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
      <label for="push-everything" class="ml-3 block text-sm font-medium d">{{$pregunta->opcion1}}</label>
    </div>
    <div class="flex items-center">
      <input id="push-email" name="pregunta2{{$i}}" value="{{$pregunta->opcion2}}" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
      <label for="push-email" class="ml-3 block text-sm font-medium d">{{$pregunta->opcion2}}</label>
    </div>
    <div class="flex items-center">
      <input id="push-nothing" name="pregunta3{{$i}}" value="{{$pregunta->opcion3}}"  type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
      <label for="push-nothing" class="ml-3 block text-sm font-medium d">{{$pregunta->opcion3}} </label>
      
      {{-- DECLARAMOS LA REPUESTA CORRECTA CON UN INPUT--}}
      <input type="hidden" name="correcta{{$i}}" value="{{$pregunta->correcta}}" />
      <input type="hidden" name="kendra{{$i}}" value="{{$pregunta->tipoP}}" />
      <input type="hidden" name="idDocente" value="{{$pregunta->id_usuario}}" />
      <input type="hidden" name="idExamen" value="{{$pregunta->id_examen}}" />
      <input type="hidden" name="nombreExamen" value="{{$nombre}}" />
    </div>
    <p></p>
  </div>
   @endif
   


    


  
    {{-- @endif --}}

   

  {{-- Después se procedera a realizar una consulta a la tabla preguntas el campo 
    tipoP donde se guardara el tipo de pregunta para saber en que campo se vaciaria --}}

  {{-- Ejemplo del funcionamiento suponga que ya esta funcionando y tiene la validacion
    del tipo de pregunta entonces con un if se realizaria lo siguiente
    
    
    if(tipoP == radio)
    <div class="flex items-center">
        <input id="push-everything" name="pregunta1{{$i}}" value="{{$pregunta->opcion1}}" type="radioButton" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
        <label for="push-everything" class="ml-3 block text-sm font-medium d">{{$pregunta->opcion1}}</label>
      </div>
    @endif
    
    
    (if(tipoP == checbox)
    <div class="flex items-center">
        <input id="push-everything" name="pregunta1{{$i}}" value="{{$pregunta->opcion1}}" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
        <label for="push-everything" class="ml-3 block text-sm font-medium d">{{$pregunta->opcion1}}</label>
      </div>
    @endif
    
    
    
    if(tipoP == input)
    
    <div class="flex items-center">
        <input id="push-everything" name="pregunta1{{$i}}" value="{{$pregunta->opcion1}}" type="input" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
        <label for="push-everything" class="ml-3 block text-sm font-medium d">{{$pregunta->opcion1}}</label>
      </div>
    @endif--}}



   

      @endif
      @endforeach
  
    <button type="submit" class="rounded-md bg-red-500 w-full text-lg
    text-white font-semibold p-2 my-3 hover:bg-red-600">Enviar</button>
  </form>

      
@endsection