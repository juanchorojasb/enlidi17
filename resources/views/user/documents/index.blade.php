@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Documentos</h1>

    <a href="{{ route('documents.create') }}" class="btn btn-primary mb-3">Subir documento</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Proyecto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $document)
                <tr>
                    <td>
                        @if (Str::endsWith($document->path, ['.pdf', '.jpg', '.jpeg', '.png', '.gif']))
                            <a href="{{ Storage::disk('public')->url($document->path) }}" target="_blank">
                                {{ $document->name }}
                            </a>
                        @else
                            {{ $document->name }}
                        @endif
                    </td>
                    <td>{{ $document->project->name }}</td>
                    <td>
                        @if (Str::endsWith($document->path, ['.pdf', '.jpg', '.jpeg', '.png', '.gif']))
                            <a href="{{ Storage::disk('public')->url($document->path) }}" target="_blank" class="btn btn-sm btn-info">Ver</a>
                        @else
                            <a href="{{ Storage::disk('public')->url($document->path) }}" class="btn btn-sm btn-info" download>Descargar</a>
                        @endif
                        <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('documents.destroy', $document->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este documento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        @if (Str::endsWith($document->path, ['.pdf']))
                        <iframe src="{{ Storage::disk('public')->url($document->path) }}" width="100%" height="600px"></iframe>
                        @elseif (Str::endsWith($document->path, ['.jpg', '.jpeg', '.png', '.gif']))
                        <img src="{{ Storage::disk('public')->url($document->path) }}" alt="{{ $document->name }}" style="max-width: 100%; height: auto;">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection