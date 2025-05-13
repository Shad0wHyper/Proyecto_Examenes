@extends('layouts.app')

@section('title', 'Home')

@section('content')
  <style>
    .botones a{
      padding: 10px 15px;
      border-radius: 25px;
      background: #E20909;
      box-shadow: 5px 5px black;
    }
    .botones a:hover{
      box-shadow:none;
    }
    .botones{
      margin-bottom: 10px;
    }
  </style>
  <center>
<div class="botones my-4">
  <a href="{{route('crearexamen.docente')}}" class="w-200 text-lg
  text-white font-semibold p-2 mx-4">Nuevo examen</a>
  <a href="{{route('eliminarExamen.docente')}}" class="w-200 text-lg
  text-white  font-semibold p-2 mx-4">Eliminar examen</a>
  <a href="{{route('haciaEditar.docente')}}" class="w-200 text-white  text-lg p-2 mx-4
   ">Editar/Listar preguntas</a>
</div>
</center>


<div>
    <div class="sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
      <h2 class="sr-only">Products</h2>
        <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-4 xl:grid-cols-4 xl:gap-x-8">
            {{-- Tiene que mostrar todos los usuarios que coincidan con el id del docente --}}
            @foreach ($examens as $examen)
            @if(Auth::user()->id == $examen->id_usuario)
              @switch($examen->categoria)
              @case("fm")
              <a class="group" href="{{route('crearPreguntas.docente')}}?examen={{$examen->id}}&nombre={{$examen->nombre}}">
                
                  <div style="width: 300px; height: 150px; background-image: url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/40560/vecteezyabstract-backgroundas0420_generated.jpg
                  ); background-repeat: round;">
                   <br> <br> <h1 style="text-align:center; color:white; font-size:30px; font-weight:bold;">{{$examen->nombre}}</h1>
                  </div>
                {{-- <h3 class="mt-4 text-sm text-gray">{{$examen->users->nombre}}</h3> --}}
                <p style="text-align: center" class="mt-1 text-lg font-medium text-gray" ><b>Fisico-Matematico</b></p>
              </a>
                  @break
                  @case("lit")
                  <a class="group" href="{{route('crearPreguntas.docente')}}?examen={{$examen->id}}&nombre={{$examen->nombre}}">
                    
                      <div style="width: 300px; height: 150px; background-image: url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/38202/ColorfulSunBackground.jpg
                      ); background-repeat: round;">
                       <br> <br> <h1 style="text-align:center; color:white; font-size:30px; font-weight:bold;">{{$examen->nombre}}</h1>
                      </div>
                    {{-- <h3 class="mt-4 text-sm text-gray">{{$examen->users->nombre}}</h3> --}}
                    <p style="text-align: center" class="mt-1 text-lg font-medium text-gray" ><b>Literatura</b></p>
                  </a>
                  @break
                  @case("cn")
                  <a class="group" href="{{route('crearPreguntas.docente')}}?examen={{$examen->id}}&nombre={{$examen->nombre}}">
                    
                      <div style="width: 300px; height: 150px; background-image: url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/40545/Geometric_Bg_generated.jpg); background-repeat: round;">
                       <br> <br> <h1 style="text-align:center; font-size:30px; font-weight:bold;">{{$examen->nombre}}</h1>
                      </div>
                    {{-- <h3 class="mt-4 text-sm text-gray">{{$examen->users->nombre}}</h3> --}}
                    <p style="text-align: center" class="mt-1 text-lg font-medium text-gray" ><b>Ciencias</b></p>
                  </a>
                      @break
                      @case("his")
                      <a class="group" href="{{route('crearPreguntas.docente')}}?examen={{$examen->id}}&nombre={{$examen->nombre}}">
                        
                          <div style="width: 300px; height: 150px; background-image: url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/40596/FreevectorYellow-BackgroundAS0521_generated.jpg); background-repeat: round;">
                           <br> <br> <h1 style="text-align:center; font-size:30px; font-weight:bold;">{{$examen->nombre}}</h1>
                          </div>
                        {{-- <h3 class="mt-4 text-sm text-gray">{{$examen->users->nombre}}</h3> --}}
                        <p style="text-align: center" class="mt-1 text-lg font-medium text-gray" ><b>Historia</b></p>
                      </a>
                          @break
                     
                  @default
                  @break
              @endswitch
              

            @endif
            @endforeach


        </div>
    </div>
</div>


     
      
@endsection