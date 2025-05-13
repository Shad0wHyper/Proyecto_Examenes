@extends('layouts.app')

@section('title', 'Home')

@section('content')
<style>
  body{

  }
  table,h1{
    font-family: 'Courier New', Courier, monospace;
border-collapse: collapse;
width: 100%;
}

th, td {
text-align: left;
padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
background-color: #04AA6D;
color: white;
}
</style>
<div class="w-3/4 m-auto pt-10">

  <table class="table-auto bg-white m-auto">
    <thead>
      <tr>
        <th>Id del Examen</th>
        <th>Alumno</th>
        <th>Examen</th>
        <th>Intentos</th>
        <th>Promedio</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($resultados as $resultado)
      <tr>
        <td>{{$resultado->id}}</td>
        <td>{{$resultado->alumno}}</td>
        <td>{{$resultado->tituloExamen}}</td>
        <td>{{$resultado->intentos}}</td>
        <td>{{$resultado->promedio}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="w-3/4 m-auto pt-10">

  <table class="table-auto bg-white m-auto">
    <thead>
      <tr>
        <th>Id del Examen</th>
        <th>Calificacion</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($calificaciones as $calificacion)
      <tr>
        <td>{{$calificacion->idResultado}}</td>
        <td>{{$calificacion->calificacion}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div> <br>


@endsection
