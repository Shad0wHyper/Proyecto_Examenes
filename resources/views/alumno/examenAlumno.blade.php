@extends('layouts.app')

@section('title', 'Home')

@section('content')


  <!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
<div>
  <center><h1 class="text-5xl text-center text-red font-bold"><i>Examenes disponibles</i></h1></center>
    <div class="sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8">
      <h2 class="sr-only">Products</h2>
        <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            @foreach ($examens as $examen)
            @switch($examen->categoria)
            @case("fm")
            <a class="group" href="{{route('respuesta.alumno')}}?id={{$examen->id}}&nombre={{$examen->nombre}}&maestro={{$examen->users->id}}">
              
                <div style="width: 300px; height: 150px; background-image: url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/40560/vecteezyabstract-backgroundas0420_generated.jpg
                ); background-repeat: round;">
                 <br> <br> <h1 style="text-align:center; color:white; font-size:30px; font-weight:bold;">{{$examen->nombre}}</h1>
                </div>
              {{-- <h3 class="mt-4 text-sm text-gray">{{$examen->users->nombre}}</h3> --}}
              <p style="text-align: center" class="mt-1 text-lg font-medium text-gray" ><b>Fisico-Matematico</b></p>
            </a>
                @break
                @case("lit")
                <a class="group" href="{{route('respuesta.alumno')}}?id={{$examen->id}}&nombre={{$examen->nombre}}&maestro={{$examen->users->id}}">
                  
                    <div style="width: 300px; height: 150px; background-image: url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/38202/ColorfulSunBackground.jpg
                    ); background-repeat: round;">
                     <br> <br> <h1 style="text-align:center; color:white; font-size:30px; font-weight:bold;">{{$examen->nombre}}</h1>
                    </div>
                  {{-- <h3 class="mt-4 text-sm text-gray">{{$examen->users->nombre}}</h3> --}}
                  <p style="text-align: center" class="mt-1 text-lg font-medium text-gray" ><b>Literatura</b></p>
                </a>
                @break
                @case("cn")
                <a class="group" href="{{route('respuesta.alumno')}}?id={{$examen->id}}&nombre={{$examen->nombre}}&maestro={{$examen->users->id}}">
                  
                    <div style="width: 300px; height: 150px; background-image: url(https://freevector-images.s3.amazonaws.com/uploads/vector/preview/40545/Geometric_Bg_generated.jpg); background-repeat: round;">
                     <br> <br> <h1 style="text-align:center; font-size:30px; font-weight:bold;">{{$examen->nombre}}</h1>
                    </div>
                  {{-- <h3 class="mt-4 text-sm text-gray">{{$examen->users->nombre}}</h3> --}}
                  <p style="text-align: center" class="mt-1 text-lg font-medium text-gray" ><b>Ciencias</b></p>
                </a>
                    @break
                    @case("his")
                    <a class="group" href="{{route('respuesta.alumno')}}?id={{$examen->id}}&nombre={{$examen->nombre}}&maestro={{$examen->users->id}}">
                      
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
            @endforeach
     
  
      
@endsection