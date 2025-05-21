@extends('layouts.app')

@section('title','Reporte de calificaciones')

@section('content')
    <div class="w-full max-w-5xl mx-auto bg-white border-4 border-red-500 rounded-xl shadow-lg p-8 mt-8 mb-12 overflow-auto">

        {{-- Encabezado / logo --}}
        {{-- <div class="flex justify-center mb-10">
             <img
                 src="https://scontent-qro1-1.xx.fbcdn.net/v/t39.30808-6/339731854_744730663729690_7480839995561236373_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=730e14&_nc_ohc=QWsuTrQ5QqUAX_2eS3x&_nc_ht=scontent-qro1-1.xx&oh=00_AfD5L8p3H0S3mn9pomFuBEmN8SEjTrTn5jm74o5vjMWdrw&oe=642E2890"
                 alt="Logo"
                 class="max-h-56 object-contain"
             />
         </div>--}}

         {{-- Tabla de resultados --}}
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Resultados de exámenes</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-green-600 text-white">
                <tr>
                    <th class="px-4 py-2 font-semibold text-left">Id del Examen</th>
                    <th class="px-4 py-2 font-semibold text-left">Alumno</th>
                    <th class="px-4 py-2 font-semibold text-left">Examen</th>
                    <th class="px-4 py-2 font-semibold text-left">Intentos</th>
                    <th class="px-4 py-2 font-semibold text-left">Promedio</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                @foreach ($resultados as $resultado)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $resultado->id }}</td>
                        <td class="px-4 py-2">{{ $resultado->alumno }}</td>
                        <td class="px-4 py-2">{{ $resultado->tituloExamen }}</td>
                        <td class="px-4 py-2">{{ $resultado->intentos }}</td>
                        <td class="px-4 py-2">{{ $resultado->promedio }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- Tabla de calificaciones --}}
        <h2 class="text-2xl font-bold text-gray-800 mt-10 mb-4">Calificaciones individuales</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm">
                <thead class="bg-red-700 text-white">
                <tr>
                    <th class="px-4 py-2 font-semibold text-left">Id del Examen</th>
                    <th class="px-4 py-2 font-semibold text-left">Calificación</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                @foreach ($calificaciones as $calificacion)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $calificacion->idResultado }}</td>
                        <td class="px-4 py-2">{{ $calificacion->calificacion }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
