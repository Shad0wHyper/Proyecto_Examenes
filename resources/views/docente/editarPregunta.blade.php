
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
    select{
      color: black;
    }
  </style>
<div style="background: #C10000; width:500px;" class="block formulario my-12 p-8 ">

  <h1 class="text-3xl text-center font-bold">Selecciona el examen</h1>

  <form class="mt-4" method="POST" action="">
    @csrf
      
    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
          <select class="form-select appearance-none
            block
            w-full
            px-3
            py-1.5
            text-base
            font-normal
            d
            bg-white bg-clip-padding bg-no-repeat
            border border-solid border-gray-300
            rounded
            transition
            ease-in-out
            m-0
            focus:d focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"
             id="opcion" name="mi_select">
              @foreach ($examenes as $examen)
            @if(Auth::user()->id == $examen->id_usuario) 
              <option value="{{$examen->id}}">{{$examen->nombre}}</option>
              @endif
              @endforeach
          </select>
        </div>
      </div>

      <button style="width: 100px;" type="submit" class="rounded-md bg-gray-500 text-lg
      text-white font-semibold p-2 my-3">Editar</button>
  </form>
</div>
</div>

</center>

@endsection