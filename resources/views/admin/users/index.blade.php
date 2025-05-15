@extends('layouts.app')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-lg">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Usuarios registrados</h1>
            <a href="{{ route('admin.users.create') }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                <i class="fa-solid fa-plus mr-2"></i>Agregar nuevo
            </a>
        </div>

        @if(session('status'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                {{ session('status') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-white">Nombre</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-white">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-white">Rol</th>
                </tr>
                </thead>
                <tbody class="text-gray-700">
                @foreach($users as $u)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $u->nombre }}</td>
                        <td class="px-4 py-2">{{ $u->email }}</td>
                        <td class="px-4 py-2">
              <span class="inline-block rounded-full px-3 py-1 text-sm
                {{ $u->tipoUsuario === 'Administrador' ? 'bg-red-200 text-red-800' : ($u->tipoUsuario === 'Docente' ? 'bg-yellow-200 text-yellow-800' : 'bg-green-200 text-green-800') }}">
                {{ $u->tipoUsuario }}
              </span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
