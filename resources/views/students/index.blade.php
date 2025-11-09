@extends('layouts.app')

@section('title','Listado de Estudiantes')

@section('content')
<div class="bg-white p-6 rounded shadow">
  <div class="flex justify-between items-center mb-4">
    <h2 class="text-xl font-semibold">Estudiantes</h2>
    <div>
      <a href="{{ route('students.create') }}" class="px-3 py-2 bg-blue-600 text-white rounded">Nuevo Estudiante</a>
    </div>
  </div>

  <table class="w-full table-auto">
    <thead>
      <tr class="text-left">
        <th class="px-2 py-1">Nombre</th>
        <th class="px-2 py-1">Correo</th>
        <th class="px-2 py-1">Carrera</th>
        <th class="px-2 py-1">Semestre</th>
        <th class="px-2 py-1">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse($students as $s)
        <tr class="border-t">
          <td class="px-2 py-1">{{ $s->nombre }}</td>
          <td class="px-2 py-1">{{ $s->correo }}</td>
          <td class="px-2 py-1">{{ $s->career->nombre ?? '-' }}</td>
          <td class="px-2 py-1">{{ $s->semestre }}</td>
          <td class="px-2 py-1">
            <a href="{{ route('students.edit', $s) }}" class="text-sm mr-2">Editar</a>
            <form action="{{ route('students.destroy', $s) }}" method="POST" style="display:inline">
              @csrf
              @method('DELETE')
              <button onclick="return confirm('¿Eliminar estudiante?')" class="text-sm text-red-600">Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="5" class="p-4">No hay estudiantes registrados.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection
