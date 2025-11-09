@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Carreras</h1>

    <a href="{{ route('careers.create') }}" 
       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded mb-4 inline-block">
       ➕ Agregar Carrera
    </a>

    @if ($careers->count())
        <table class="w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2 text-left">Nombre</th>
                    <th class="border p-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($careers as $career)
                <tr>
                    <td class="border p-2">{{ $career->nombre }}</td>
                    <td class="border p-2">
                        <a href="{{ route('careers.edit', $career) }}" class="text-yellow-500 hover:underline">✏️ Editar</a>
                        |
                        <form action="{{ route('careers.destroy', $career) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="text-red-500 hover:underline"
                                    onclick="return confirm('¿Seguro que deseas eliminar esta carrera :=?')">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-500">No hay carreras registradas aún.</p>
    @endif
</div>
@endsection
