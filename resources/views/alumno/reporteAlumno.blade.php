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
<center>
  <img style="margin-top:-200px;" src="https://scontent-qro1-1.xx.fbcdn.net/v/t39.30808-6/339731854_744730663729690_7480839995561236373_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=730e14&_nc_ohc=QWsuTrQ5QqUAX_2eS3x&_nc_ht=scontent-qro1-1.xx&oh=00_AfD5L8p3H0S3mn9pomFuBEmN8SEjTrTn5jm74o5vjMWdrw&oe=642E2890" alt="">

</center>
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
        <th style="background-color: #D30000;">Id del Examen</th>
        <th style="background-color: #D30000;">Calificacion</th>
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
</div> <br><br>
  @endsection
