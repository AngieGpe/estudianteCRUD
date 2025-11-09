@extends('layouts.app')

@section('title','Registrar Estudiante')

@section('content')
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Registrar Estudiante</h2>

    <form method="POST" action="{{ route('students.store') }}">
      @csrf

      <div class="mb-3">
        <label class="block text-sm">Nombre</label>
        <input name="nombre" value="{{ old('nombre') }}" class="border p-2 w-full rounded" />
      </div>

      <div class="mb-3">
        <label class="block text-sm">Correo</label>
        <input name="correo" value="{{ old('correo') }}" class="border p-2 w-full rounded" />
      </div>

      <div class="mb-3">
        <label class="block text-sm">Carrera</label>
        <select name="career_id" class="border p-2 w-full rounded">
          <option value="">-- Selecciona --</option>
          @foreach($careers as $c)
            <option value="{{ $c->id }}" {{ old('career_id') == $c->id ? 'selected' : '' }}>{{ $c->nombre }}</option>
          @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="block text-sm">Semestre</label>
        <input name="semestre" type="number" min="1" max="12" value="{{ old('semestre',1) }}" class="border p-2 w-full rounded" />
      </div>

      <div class="flex gap-2">
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Guardar</button>
        <a href="{{ route('students.index') }}" class="px-4 py-2 border rounded">Cancelar</a>
      </div>
    </form>
  </div>
@endsection
