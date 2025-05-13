@extends('layouts.app')

@section('title', 'Home')

@section('content')
{{-- <div class="bg-white">
    
        

    <table class="table-fixed">
        <thead>
          <tr>
            <th>Pregunta</th>
            <th>Opcion 1</th>
            <th>Opcion 2</th>
            <th>Opcion 3</th>
            <th>correcta</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($examenes as $examen)
            @if(Auth::user()->id == $examen->id_usuario)
            @if($examenBuscar == $examen->id)
            @foreach ($preguntas as $pregunta)
            <tr>
                <td>{{$pregunta->pregunta}}</td>
                <td>{{$pregunta->opcion1}}</td>
                <td>{{$pregunta->opcion2}}</td>
                <td>{{$pregunta->opcion3}}</td>
                <td>{{$pregunta->correcta}}</td>
                <td></td>
              </tr>
              @endforeach  
          @endif
          @endif
          @endforeach
        </tbody>
      </table>

</div> --}}
<div style="padding-top: 20px; width: auto;" class="bg-white">

  <table class="table table-success table-striped" style="margin: auto; width: 100%; border: solid 1px bold;">
    <thead>
    <tr>
      <th scope="col">Pregunta</th>
      <th scope="col">Opcion 1</th>
      <th scope="col">Opcion 2</th>
      <th scope="col">Opcion 3</th>
      <th scope="col">Correcta</th>
      <th scope="col">Acción</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($preguntas as $pregunta)
    @if($pregunta->id_usuario == Auth::user()->id && $examenBuscar == $pregunta->id_examen)
    <tr>
      <th scope="row">{{$pregunta->pregunta}}</th>
      <td>{{$pregunta->opcion1}}</td>
      <td>{{$pregunta->opcion2}}</td>
      <td>{{$pregunta->opcion3}}</td>
      <td>{{$pregunta->correcta}}</td>
      <td>
        <div>
          <a href="{{route('editar.docente')}}?pregunta={{$pregunta->id}}" class="font-bold 
            py-2 px-4 rounded-md bg-yellow-600 hover:bg-yellow-700 
            hover:text-white text-white">Editar</a>
          </div>
        </td>
        <td>
          <div>
            <form action="{{route('eliminarPregunta.docente')}}" method="POST">
              @csrf
              @method('delete')
              <input type="hidden" id="id" name="id" value="{{$pregunta->id}}">
              <button type="submit" class="font-bold 
              py-2 px-4 rounded-md bg-red-600 hover:bg-red-700 
              hover:text-white text-white">Eliminar</button>
            </form>
          </div>
        </td>
      </tr>
      @endif
      @endforeach  
    </tbody>
  </table>

</div>



<a href="{{route('pdf2')}}"class="rounded-md bg-red-600 w-full text-lg
  text-white font-semibold p-2 my-3 hover:bg-red-700">Crear PDF</a>


  @endsection