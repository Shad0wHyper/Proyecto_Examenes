<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de calificaciones</title>
</head>
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
<body>
    <h1 style="margin: auto; text-align: center;">PDF de resultados de su materia</h1> <br>
        <table border="1px solid" style="margin: auto">
          <thead>
            <tr style="">
              <th style="width: 100px">Id Pregunta</th>
              <th style="width: 100px">Pregunta</th>
              <th style="width: 100px">Respuesta 1</th>
              <th style="width: 100px">Respuesta 2</th>
              <th style="width: 100px">Respuesta 3</th>
              <th style="width: 100px">Correcto</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($preguntas as $pregunta)
            <tr>
              <td style="text-align: center">{{$pregunta->id}}</td>
              <td style="text-align: center">{{$pregunta->pregunta}}</td>
              <td style="text-align: center">{{$pregunta->opcion1}}</td>
              <td style="text-align: center">{{$pregunta->opcion2}}</td>
              <td style="text-align: center">{{$pregunta->opcion3}}</td>
              <td style="text-align: center">{{$pregunta->correcta}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

     
      
        
        
</body>
</html>