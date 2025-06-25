<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') – TRIVIA</title>

    <script src="https://kit.fontawesome.com/6688103364.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css"
          rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800">

@guest
    {{-- LOGIN / REGISTER – vista limpia sin dashboard --}}
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md p-6">
            @yield('content')
        </div>
    </div>
@else
    {{-- DASHBOARD --}}
    <div class="grid grid-cols-12 h-screen">

        {{-- SIDEBAR --}}
        <aside class="col-span-12 md:col-span-2 bg- shadow-lg flex flex-col">
            <div class="px-6 py-8 border-b">
                <h2 class="text-2xl font-bold text-red-600">TRIVIA</h2>
            </div>

            {{-- Bienvenida --}}
            <div class="px-6 py-4 border-b">
                <p class="text-gray-600 text-sm">Hola,</p>
                <p class="font-semibold">{{ Auth::user()->nombre }}</p>
                <p class="text-xs text-gray-500">{{ Auth::user()->tipoUsuario }}</p>
            </div>

            {{-- Menú según rol --}}
            <nav class="flex-1 px-2 py-4 space-y-1 overflow-auto">
                @if(Auth::user()->tipoUsuario === 'Administrador')
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center px-4 py-2 rounded hover:bg-gray-200">
                        <i class="fas fa-chart-pie w-5"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                    <a href="{{ route('admin.users.index') }}"
                       class="flex items-center px-4 py-2 rounded hover:bg-gray-200">
                        <i class="fas fa-users w-5"></i>
                        <span class="ml-3">Usuarios</span>
                    </a>
                @endif

                @if(Auth::user()->tipoUsuario === 'Docente')
                    <a href="{{ route('dashboard.maestro') }}"
                       class="flex items-center px-4 py-2 rounded hover:bg-gray-200">
                        <i class="fas fa-home w-5"></i>
                        <span class="ml-3">Inicio</span>
                    </a>
                    <a href="{{ route('examen.docente') }}"
                       class="flex items-center px-4 py-2 rounded hover:bg-gray-200">
                        <i class="fas fa-copy w-5"></i>
                        <span class="ml-3">Exámenes</span>
                    </a>
                    <a href="{{ route('reporte.docente') }}"
                       class="flex items-center px-4 py-2 rounded hover:bg-gray-200">
                        <i class="fas fa-file-export w-5"></i>
                        <span class="ml-3">Reportes</span>
                    </a>
                @endif

                @if(Auth::user()->tipoUsuario === 'Alumno')
                    <a href="{{ route('dashboard.alumno') }}"
                       class="flex items-center px-4 py-2 rounded hover:bg-gray-200">
                        <i class="fas fa-home w-5"></i>
                        <span class="ml-3">Inicio</span>
                    </a>
                    <a href="{{ route('examen.alumno') }}"
                       class="flex items-center px-4 py-2 rounded hover:bg-gray-200">
                        <i class="fas fa-copy w-5"></i>
                        <span class="ml-3">Exámenes</span>
                    </a>
                    <a href="{{ route('reporte.alumno') }}"
                       class="flex items-center px-4 py-2 rounded hover:bg-gray-200">
                        <i class="fas fa-file-export w-5"></i>
                        <span class="ml-3">Reportes</span>
                    </a>
                @endif
            </nav>

            {{-- Logout --}}
            <div class="px-6 py-4 border-t">
                <form method="POST" action="{{ route('login.destroy') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center justify-center px-4 py-2 bg-red-600
                           text-white font-semibold rounded-lg hover:bg-red-700 transition">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Salir
                    </button>
                </form>
            </div>
        </aside>

        {{-- MAIN CONTENT--}}
        <div class="col-span-12 md:col-span-10 flex flex-col">
            <main class="flex-1 overflow-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>
@endguest

</body>
</html>
