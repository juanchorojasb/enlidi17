@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar Etapa</h1>

        <form action="{{ route('projects.stages.update', ['project' => $stage->project->id, 'stage' => $stage->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="project_id" class="block text-gray-700 text-sm font-bold mb-2">Proyecto</label>
                <select name="project_id" id="project_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" disabled>
                    <option value="{{ $stage->project->id ?? '' }}">
                        {{ $stage->project->name ?? 'Sin proyecto' }}
                    </option>
                </select>
                <small class="text-gray-600 text-xs">No se puede cambiar el proyecto de la etapa una vez creada.</small>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la Etapa</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('name', $stage->name) }}" required>
                @error('name')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
                <select name="status" id="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                    <option value="En revisión" {{ old('status', $stage->status) == 'En revisión' ? 'selected' : '' }}>En revisión</option>
                    <option value="Pendiente" {{ old('status', $stage->status) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="Aprobada" {{ old('status', $stage->status) == 'Aprobada' ? 'selected' : '' }}>Aprobada</option>
                    <option value="Rechazada" {{ old('status', $stage->status) == 'Rechazada' ? 'selected' : '' }}>Rechazada</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md">Actualizar Etapa</button>
                <a href="{{ route('projects.show', $stage->project->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection