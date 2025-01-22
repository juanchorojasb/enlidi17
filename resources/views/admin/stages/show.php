@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detalle del Stage</div>

                <div class="card-body">
                    <h5 class="card-title">{{ $stage->name }}</h5>

                    <p class="card-text">
                        <strong>Proyecto:</strong>
                        @if ($stage->project)
                            <a href="{{ route('admin.projects.show', $stage->project->id) }}">
                                {{ $stage->project->name }}
                            </a>
                        @else
                            N/A
                        @endif
                    </p>
                    <p class="card-text">
                        <strong>Estado:</strong> {{ $stage->status }}
                    </p>
                    <p class="card-text">
                        <strong>Tipo:</strong> {{ $stage->tipo }}
                    </p>
                    <p class="card-text">
                        <strong>Creado:</strong> {{ $stage->created_at->format('d/m/Y H:i') }}
                    </p>
                    <p class="card-text">
                        <strong>Actualizado:</strong> {{ $stage->updated_at->format('d/m/Y H:i') }}
                    </p>

                    <a href="{{ route('admin.stages.index') }}" class="btn btn-secondary">Volver a Stages</a>
                    <form action="{{ route('admin.stages.destroy', ['project' => $project, 'stage' => $stage]) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este stage? La acción no podrá ser revertida.')">Eliminar</button>
                    </form>
                </div>
            </div>

            @if($stage->documents->isNotEmpty())
                <div class="card mt-4">
                    <div class="card-header">Documentos adjuntos al stage</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($stage->documents as $document)
                                <li class="list-group-item">
                                    <a href="{{ Storage::disk('public')->url($document->path) }}" target="_blank">
                                        {{ $document->name }}
                                    </a>
                                    <form action="{{ route('admin.documents.destroy', $document) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm float-end" onclick="return confirm('¿Estás seguro de que quieres eliminar este documento?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection