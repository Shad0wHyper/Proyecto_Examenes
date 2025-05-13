<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de calificaciones</title>
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
</head>
<body>
      <center><h1>Estos fueron tus resultados</h1></center>
      
        <table border="1px solid" style="margin: auto">
          
            <tr>
              <th>Id del Examen</th>
              <th>Alumno</th>
              <th>Examen</th>
              <th>Intentos</th>
              <th>Promedio</th>
            </tr>
        
         
            @foreach ($resultados as $resultado)
            <tr>
              <td>{{$resultado->id}}</td>
              <td>{{$resultado->alumno}}</td>
              <td>{{$resultado->tituloExamen}}</td>
              <td>{{$resultado->intentos}}</td>
              <td>{{$resultado->promedio}}</td>
            </tr>
            @endforeach
      
        </table>

     
      
        <table border="1px solid" style="margin: auto; margin-top: 10px">
          <thead>
            <tr style="background-color: beige">
              <th style="background-color: #D30000; width: 100px">Id del Examen</th>
              <th style="background-color: #D30000; width: 100px">Calificacion</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($calificaciones as $calificacion)
            <tr >
              <td style="background-color: white; text-align: center">{{$calificacion->idResultado}}</td>
              <td style="background-color: white; text-align: center">{{$calificacion->calificacion}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      
        
</body>
</html>