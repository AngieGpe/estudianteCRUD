@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Estudiantes</h1>

    <a href="{{ route('students.create') }}" 
       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
       ➕ Agregar Estudiante
    </a>

    @if ($students->count())
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2 text-left">Nombre</th>
                    <th class="border p-2 text-left">Correo</th>
                    <th class="border p-2 text-left">Carrera</th>
                    <th class="border p-2 text-left">Semestre</th>
                    <th class="border p-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td class="border p-2">{{ $student->nombre }}</td>
                    <td class="border p-2">{{ $student->correo }}</td>
                    <td class="border p-2">{{ $student->career->nombre ?? 'N/A' }}</td>
                    <td class="border p-2">{{ $student->semestre }}</td>
                    <td class="border p-2">
                        <a href="{{ route('students.edit', $student) }}" 
                           class="text-yellow-500 hover:underline">✏️ Editar</a>
                        |
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-500 hover:underline"
                                    onclick="return confirm('¿Seguro que deseas eliminar este estudiante?')">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-500">No hay estudiantes registrados aún.</p>
    @endif
</div>
@endsection
