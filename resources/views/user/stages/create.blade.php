@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Crear Nueva Etapa</h1>

        <form action="{{ route('projects.stages.store', $project) }}" method="POST">
            @csrf
            <input type="hidden" name="project_id" value="{{ $project->id }}">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la Etapa:</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Estado:</label>
                <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                    <option value="En revisión" {{ old('status') == 'En revisión' ? 'selected' : '' }}>En revisión</option>
                    <option value="Pendiente" {{ old('status') == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="Aprobada" {{ old('status') == 'Aprobada' ? 'selected' : '' }}>Aprobada</option>
                    <option value="Rechazada" {{ old('status') == 'Rechazada' ? 'selected' : '' }}>Rechazada</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md">Crear Etapa</button>
            <a href="{{ route('projects.show', $project->id) }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md"
            >
                Cancelar
            </a>
        </form>
    </div>
</div>
@endsection