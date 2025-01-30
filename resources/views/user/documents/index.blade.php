@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Mis Documentos</h1>

        <div class="mb-4">
            <a href="{{ route('user.documents.create') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                <i class="fa fa-plus mr-2"></i> Subir Documento
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Éxito!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if($documents->isEmpty())
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Información:</strong>
                <span class="block sm:inline">No has subido ningún documento aún.</span>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-2 px-4 border-b text-left">Nombre</th>
                            <th class="py-2 px-4 border-b text-left">Proyecto</th>
                            <th class="py-2 px-4 border-b text-left">Fecha de Creación</th>
                            <th class="py-2 px-4 border-b text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $document)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ Storage::disk('public')->url($document->file_path) }}" target="_blank" class="text-primary hover:underline">
                                        {{ $document->name }}
                                    </a>
                                </td>
                                <td class="py-2 px-4 border-b">{{ $document->project->name ?? 'N/A' }}</td>
                                <td class="py-2 px-4 border-b">{{ $document->created_at->format('d/m/Y H:i:s') }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('user.documents.show', $document) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-1">
                                        <i class="fa fa-eye mr-1"></i> Ver
                                    </a>
                                    <a href="{{ route('user.documents.edit', $document) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-1">
                                        <i class="fa fa-pencil mr-1"></i> Editar
                                    </a>
                                    <form action="{{ route('user.documents.destroy', $document) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center" onclick="return confirm('¿Estás seguro de que quieres eliminar este documento?')">
                                            <i class="fa fa-trash mr-1"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-100">
                                <td colspan="4" class="py-2 px-4 border-b">
                                    @if (Str::endsWith($document->file_path, ['.pdf']))
                                        <iframe src="{{ Storage::disk('public')->url($document->file_path) }}" width="100%" height="600px"></iframe>
                                    @elseif (Str::endsWith($document->file_path, ['.jpg', '.jpeg', '.png', '.gif']))
                                        <img src="{{ Storage::disk('public')->url($document->file_path) }}" alt="{{ $document->name }}" class="max-w-full h-auto">
                                    @elseif($document->file_path)
                                        <a href="{{ Storage::disk('public')->url($document->file_path) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center" download>
                                            <i class="fa fa-download mr-1"></i> Descargar Archivo
                                        </a>
                                    @else
                                        <span>No hay archivo adjunto</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection