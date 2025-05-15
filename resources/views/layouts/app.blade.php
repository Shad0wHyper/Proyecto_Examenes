<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Laravel App</title>
    <script src="https://kit.fontawesome.com/6688103364.js" crossorigin="anonymous"></script>
    <!-- Tailwind CSS -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">

    <style>
        nav {
            width: 350px;
            height: 90vh;
            box-shadow: 5px 5px 20px gray;
            border-radius: 15px;
            margin-right: 10px;
        }
        .menuini {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .direc {
            padding: 10px;
            background: #B40000;
            width: 280px;
            height: 50px;
            margin-left: 35px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 10px;
        }
        .direc a, .direc button {
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .padre {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
        }
        .hijo {
            width: 80%;
        }
    </style>
</head>
<body>
<div class="padre">
    <nav class="bg-red-600" id="noinicio">
        <div class="relative menuini h-16">
            <br><br>

            {{-- Bienvenida --}}
            @if(auth()->check())
                <center>
                    @php $user = Auth::user(); @endphp

                    @if($user->tipoUsuario === 'Administrador')
                        <p class="text-xl text-white">
                            Bienvenido Administrador <b>{{ $user->nombre }}</b>
                        </p>
                    @elseif($user->tipoUsuario === 'Docente')
                        <p class="text-xl text-white">
                            Bienvenido Docente <b>{{ $user->nombre }}</b>
                        </p>
                    @elseif($user->tipoUsuario === 'Alumno')
                        <p class="text-xl text-white">
                            Bienvenido Alumno <b>{{ $user->nombre }}</b>
                        </p>
                    @endif
                </center>
            @endif

            <br>

            {{-- Menú según rol --}}
            @if(auth()->check())

                {{-- Docente --}}
                @if($user->tipoUsuario === 'Docente')
                    <div class="direcciones">
                        <div class="direc">
                  <span class="mr-4 text-white text-lg">
                    <i class="fa-solid fa-home"></i>
                  </span>
                            <a href="{{ route('dashboard.maestro') }}">Inicio</a>
                        </div>
                        <div class="direc">
                  <span class="mr-4 text-white text-lg">
                    <i class="fa-solid fa-copy"></i>
                  </span>
                            <a href="{{ route('examen.docente') }}">Exámenes</a>
                        </div>
                        <div class="direc">
                  <span class="mr-4 text-white text-lg">
                    <i class="fa-solid fa-file-export"></i>
                  </span>
                            <a href="{{ route('reporte.docente') }}">Reportes</a>
                        </div>
                    </div>
                    <div class="direc">
                        <form method="POST" action="{{ route('login.destroy') }}">
                            @csrf
                            <button type="submit" class="w-full text-left">
                      <span class="mr-4 text-white text-lg">
                        <i class="fa-solid fa-right-from-bracket"></i>
                      </span>
                                Salir
                            </button>
                        </form>
                    </div>
                @endif

                {{-- Alumno --}}
                @if($user->tipoUsuario === 'Alumno')
                    <div class="direcciones">
                        <div class="direc">
                  <span class="mr-4 text-white text-lg">
                    <i class="fa-solid fa-home"></i>
                  </span>
                            <a href="{{ route('dashboard.alumno') }}">Inicio</a>
                        </div>
                        <div class="direc">
                  <span class="mr-4 text-white text-lg">
                    <i class="fa-solid fa-copy"></i>
                  </span>
                            <a href="{{ route('examen.alumno') }}">Exámenes</a>
                        </div>
                        <div class="direc">
                  <span class="mr-4 text-white text-lg">
                    <i class="fa-solid fa-file-export"></i>
                  </span>
                            <a href="{{ route('reporte.alumno') }}">Reportes</a>
                        </div>
                    </div>
                    <div class="direc">
                        <form method="POST" action="{{ route('login.destroy') }}">
                            @csrf
                            <button type="submit" class="w-full text-left">
                      <span class="mr-4 text-white text-lg">
                        <i class="fa-solid fa-right-from-bracket"></i>
                      </span>
                                Salir
                            </button>
                        </form>
                    </div>
                @endif

                {{-- Administrador --}}
                @if($user->tipoUsuario === 'Administrador')
                    <div class="direcciones">
                        <div class="direc">
                  <span class="mr-4 text-white text-lg">
                    <i class="fa-solid fa-house"></i>
                  </span>
                            <a href="{{ route('admin.dashboard') }}">Inicio</a>
                        </div>
                        <div class="direc">
                  <span class="mr-4 text-white text-lg">
                    <i class="fa-solid fa-users"></i>
                  </span>
                            <a href="{{ route('admin.users.index') }}">Gestionar usuarios</a>
                        </div>
                        <div class="direc">
                            <form method="POST" action="{{ route('login.destroy') }}">
                                @csrf
                                <button type="submit" class="w-full text-left">
                      <span class="mr-4 text-white text-lg">
                        <i class="fa-solid fa-right-from-bracket"></i>
                      </span>
                                    Salir
                                </button>
                            </form>
                        </div>
                    </div>
                @endif

            @else
                {{-- Invitados --}}
                <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1">
                    <li class="mx-6">
                        <a href="{{ route('login.index') }}"
                           class="font-semibold hover:bg-indigo-700 py-3 px-4 rounded-md text-white">
                            Iniciar Sesión
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register.index') }}"
                           class="font-semibold border-2 border-white py-2 px-4 rounded-md hover:bg-white hover:text-indigo-700 text-white">
                            Registrar
                        </a>
                    </li>
                </ul>
            @endif

        </div>
    </nav>

    {{-- Contenido principal --}}
    <div class="hijo">
        @yield('content')
    </div>
</div>
</body>
</html>
