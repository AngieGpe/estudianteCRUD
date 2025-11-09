@extends('layouts.app')

@section('title','Crear Carrera')

@section('content')
  <div class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Crear Carrera</h2>

    <form method="POST" action="{{ route('careers.store') }}">
      @csrf
      <div class="mb-3">
        <label class="block text-sm">Nombre</label>
        <input name="nombre" value="{{ old('nombre') }}" class="border p-2 w-full rounded" />
      </div>

      <div class="flex gap-2">
        <button class="px-4 py-2 bg-blue-600 text-white rounded">Guardar</button>
        <a href="{{ route('careers.index') }}" class="px-4 py-2 border rounded">Cancelar</a>
      </div>
    </form>
  </div>
@endsection
