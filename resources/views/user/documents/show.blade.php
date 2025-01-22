@extends('layouts.user')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-2xl font-bold mb-4">{{ $document->name }}</h1>

        <div class="mb-4">
            <p><strong class="font-semibold">Proyecto:</strong> {{ $document->project->name }}</p>
        </div>

        <div class="mb-4">
            <p><strong class="font-semibold">Nombre:</strong> {{ $document->name }}</p>
        </div>

        <div class="mb-4">
            <p><strong class="font-semibold">Tipo MIME:</strong> {{ $document->mime_type }}</p>
        </div>

        <div class="mb-4">
            <p><strong class="font-semibold">Tamaño:</strong> {{ $document->size }} bytes</p>
        </div>

        <div class="mt-6">
    <a href="{{ route('documents.show', $document->id) }}"
       target="_blank"
       class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Ver Documento
    </a>
    <a href="{{ route('documents.edit', $document) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Editar</a>
    
    <form action="{{ route('documents.destroy', $document) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                onclick="return confirm('¿Estás seguro de que quieres eliminar este documento?')">
            Eliminar
        </button>
    </form>

    <a href="{{ route('projects.show', $document->project->id) }}"
       class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
        Volver al Proyecto
    </a>
</div>

    </div>
</div>
@endsection