<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Laravel App</title>
    <script src="https://kit.fontawesome.com/6688103364.js" crossorigin="anonymous"></script>
    <!-- Tailwind CSS Link -->
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
  
    <style>
      nav{
        width: 350px;
        height:90vh;
        box-shadow: 5px 5px 20px gray;
        border-radius:15px;
        margin-right: 10px;
      }
      .menuini{
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
      }
      .direc{
        padding: 10px;
        background: #B40000;
        width: 280px;
        height: 50px;
        margin-left: 35px;
        margin-top: 10px;
        cursor: pointer;
        border-radius:10px;
      }
      .direc a{
        color: white;
        font-weight: bold;
        cursor: pointer;
      }
      .padre{
        width: 100%;
        height: 100vh;
        display: flex;  
        align-items: center;
      }
      .hijo{
        width: 80%;
      }
    </style>
  </head>
  <body>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="padre">>
<nav class="bg-red-600" id="noinicio">
    <div>
      <div class="relative menuini h-16">
        <br>
        <br>
        
        {{-- Foto y nombre --}}
        <div>
          <div>
            {{-- <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow"> --}}
            {{-- <img src="https://web.whatsapp.com/fd47adef-0be8-42cc-9415-74db7befd763" alt="Workflow"> --}}
          </div> 
          @if(auth()->check())
          <div>
            <center>
            {{-- Comenzamos con la validacion de la navbar que sera del docente --}}
            @if(Auth::user()->tipoUsuario == 'Docente')
            <p class="text-xl text-white">Bienvenido docente <b> {{ Auth::user()->nombre }}</b></p>
            @else
            {{-- Comenzamos con la validacion de la navbar que sera del docente --}}
            <p class="text-xl text-white">Bienvenido alumno <b> {{ Auth::user()->nombre }}</b></p>
            @endif
          </center>
          </div> 
        </div>
        <br>

        @if(Auth::user()->tipoUsuario == 'Docente')
        {{-- Menu del nav --}}
        <div >
          <div>
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <div class="direc">
              <span style="font-size: 15px; color: white; margin-right:20px;" >
                <i class="fa-solid fa-home"></i>
              </span>
              <a href="{{route('dashboard.maestro')}}">Inicio</a></div>
              <div class="direc">
                <span style="font-size: 15px; color: white; margin-right:20px;" >
                  <i class="fa-solid fa-copy"></i>
                </span>
                <a href="{{route('examen.docente')}}">Examenes</a></div>
                <div class="direc">
                  <span style="font-size: 15px; color: white; margin-right:20px;" >
                    <i class="fa-solid fa-file-export"></i>
                  </span>
                  <a href="{{route('reporte.docente')}}">Reportes</a></div>
          </div>
        </div>

        {{-- Cerrar sesion --}}
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        <div class="ml-3 relative">
          <br>
          <br>
          <center>
          <div>
              <a href="{{ route('login.destroy')}}" class="font-bold
              py-2 px-4 rounded-md bg-gray-600 hover:bg-gray-700 
              hover:text-white text-white">Salir</a>
          </div>
        </center>
        </div>

      </div>
     
        @else
        {{-- Menu del nav --}}
        <div>
          <div class="direcciones">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <div class="direc">
              <span style="font-size: 15px; color: white; margin-right:20px;" >
                <i class="fa-solid fa-home"></i>
              </span>
              <a href="{{route('dashboard.alumno')}}">Inicio</a></div>
            <div class="direc">
              <span style="font-size: 15px; color: white; margin-right:20px;" >
                <i class="fa-solid fa-copy"></i>
              </span>
              <a href="{{route('examen.alumno')}}">Examenes</a></div>
              <div class="direc">
                <span style="font-size: 15px; color: white; margin-right:20px;" >
                  <i class="fa-solid fa-file-export"></i>
                </span>
                <a href="{{route('reporte.alumno')}}" >Reportes</a></div>
          </div>
        </div>

        {{-- Cerrar sesion --}}
      <div>
        <div>
          <br>
          <br>
          <center>
          <div>
              <a href="{{ route('login.destroy')}}" class="font-bold
              py-2 px-4 rounded-md bg-gray-600 hover:bg-gray-700 
              hover:text-white text-white">Salir</a>
          </div>
        </center>
        </div>

      </div>

        @endif

        @else
        {{-- Si no esta logueado se le mostrara la siguiente nav bar --}}
        <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
        <li class="mx-6">
          <a href="{{ route('login.index') }}" class="font-semibold 
          hover:bg-indigo-700 py-3 px-4 rounded-md text-white">Iniciar Sesion</a>
        </li>
        <li>
          <a href="{{ route('register.index') }}" class="font-semibold
          border-2 border-white py-2 px-4 rounded-md hover:bg-white 
          hover:text-indigo-700 text-white">Registrar</a>
        </li>
        </ul>
        
        @endif
      </div>
    </div>
  
  </nav>
    <div class="hijo">
    @yield('content')
  </div>
</div>
  </body>
</html>