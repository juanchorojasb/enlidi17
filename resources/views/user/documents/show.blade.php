@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Documento: {{ $document->name }}</h1>

        <div class="mb-4">
            <p class="text-gray-700 font-bold mb-2">Proyecto:</p>
            <p class="text-gray-600">
                @if($document->project)
                    <a href="{{ route('projects.show', $document->project->id) }}" class="text-primary hover:underline">{{ $document->project->name }}</a>
                @else
                    No asignado
                @endif
            </p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700 font-bold mb-2">Nombre:</p>
            <p class="text-gray-600">{{ $document->name }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700 font-bold mb-2">Tipo MIME:</p>
            <p class="text-gray-600">{{ $document->mime_type }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700 font-bold mb-2">Tamaño:</p>
            <p class="text-gray-600">{{ number_format($document->size / 1024, 2) }} KB</p>
        </div>

        <div class="mb-4">
            @if (Str::endsWith($document->file_path, ['.pdf', '.jpg', '.jpeg', '.png', '.gif']))
                <p class="text-gray-700 font-bold mb-2">Previsualización:</p>
                <div class="border border-gray-300 rounded-md">
                    @if (Str::endsWith($document->file_path, '.pdf'))
                        <iframe src="{{ Storage::disk('public')->url($document->file_path) }}" width="100%" height="600px"></iframe>
                    @elseif (Str::endsWith($document->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                        <img src="{{ Storage::disk('public')->url($document->file_path) }}" alt="{{ $document->name }}" class="max-w-full h-auto">
                    @endif
                </div>
            @else
                <p class="text-gray-600">Este tipo de archivo no se puede previsualizar. Haz clic en "Descargar" para obtener el archivo.</p>
            @endif
        </div>

        <div class="mt-6 flex space-x-4">
            @if (Str::endsWith($document->file_path, ['.pdf', '.jpg', '.jpeg', '.png', '.gif']))
                <a href="{{ Storage::disk('public')->url($document->file_path) }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                    <i class="fa fa-eye mr-2"></i> Ver Documento
                </a>
            @else
                <a href="{{ Storage::disk('public')->url($document->file_path) }}" download class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                    <i class="fa fa-download mr-2"></i> Descargar
                </a>
            @endif
            <a href="{{ route('documents.edit', $document) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                <i class="fa fa-pencil mr-2"></i> Editar
            </a>
            <form action="{{ route('documents.destroy', $document) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md inline-flex items-center" onclick="return confirm('¿Estás seguro de que quieres eliminar este documento?')">
                    <i class="fa fa-trash mr-2"></i> Eliminar
                </button>
            </form>

            @if($document->project)
                <a href="{{ route('projects.show', $document->project->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                    <i class="fa fa-arrow-left mr-2"></i> Volver al Proyecto
                </a>
            @else
                <a href="{{ route('user.documents.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                    <i class="fa fa-arrow-left mr-2"></i> Volver a Documentos
                </a>
            @endif
        </div>
    </div>
</div>
@endsection