@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Subir Nuevo Documento</h1>

        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Documento:</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="project_id" class="block text-gray-700 text-sm font-bold mb-2">Proyecto:</label>
                <select name="project_id" id="project_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                    <option value="">Selecciona un proyecto</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
                @error('project_id')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="file" class="block text-gray-700 text-sm font-bold mb-2">Archivo:</label>
                <input type="file" name="file" id="file" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                @error('file')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between">
              <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md">
                Subir Documento
              </button>
              <a href="{{ route('user.documents.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection