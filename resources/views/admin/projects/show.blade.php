@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Proyecto: {{ $project->name }}</h1>
    
    {{-- Información básica del proyecto --}}
    <div class="mb-3">
        <p><strong>Cliente:</strong> {{ $project->client_name }}</p>
        <p><strong>NIT:</strong> {{ $project->nit }}</p>
        <p><strong>Email:</strong> {{ $project->email }}</p>
        <p><strong>Teléfono:</strong> {{ $project->phone }}</p>
        <p><strong>Ciudad:</strong> {{ $project->city }}</p>
        <p><strong>Departamento:</strong> {{ $project->department }}</p>
        <p><strong>País:</strong> {{ $project->country }}</p>
        <p><strong>Dirección de Instalación:</strong> {{ $project->installation_address }}</p>
        <p><strong>Valor del Proyecto:</strong> {{ $project->project_value }}</p>
        <p><strong>Fecha de Inicio:</strong> {{ $project->start_date }}</p>
        <p><strong>Estado:</strong> {{ $project->status }}</p>
        <p><strong>Descripción:</strong> {{ $project->project_description }}</p>
    </div>

    {{-- Sección de Etapas --}}
    <h2 class="mt-4">Etapas ({{ $project->stages->count() }})</h2>
    @if($project->stages->isNotEmpty())
        <ul class="list-group">
            @foreach ($project->stages as $stage)
                <li class="list-group-item">
                    <h5 class="mb-1">
                        {{ $stage->name }} 
                        <small class="text-muted">({{ $stage->status }})</small>
                    </h5>
                    <a href="{{ route('stages.show', $stage) }}" class="btn btn-sm btn-primary">Ver Detalle de Etapa</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay etapas registradas para este proyecto.</p>
    @endif

    {{-- Sección de Documentos agrupados por etapa --}}
    <h2 class="mt-4">Documentos</h2>
    @php
        // Contar el total de documentos (sumando los de cada etapa)
        $totalDocs = $project->stages->sum(function ($stage) {
            return $stage->documents->count();
        });
    @endphp

    @if($totalDocs > 0)
        <div class="accordion" id="documentsAccordion">
            @foreach ($project->stages as $stageIndex => $stage)
                @if($stage->documents->count() > 0)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ $stageIndex }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $stageIndex }}" aria-expanded="false" aria-controls="collapse-{{ $stageIndex }}">
                                Etapa: {{ $stage->name }} ({{ $stage->documents->count() }} documentos)
                            </button>
                        </h2>
                        <div id="collapse-{{ $stageIndex }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $stageIndex }}" data-bs-parent="#documentsAccordion">
                            <div class="accordion-body">
                                <ul class="list-group">
                                    @foreach ($stage->documents as $document)
                                        <li class="list-group-item">
                                            <strong>{{ $document->name }}</strong>
                                            <br>
                                            <a href="{{ route('documents.show', $document) }}" target="_blank">
                                                Ver / Descargar
                                            </a>
                                            <span class="text-muted">
                                                ({{ $document->mime_type }}, 
                                                {{ round($document->size / 1024, 2) }} KB)
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @else
        <p>No hay documentos asociados a las etapas.</p>
    @endif

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mt-4">Volver al Dashboard</a>
</div>
@endsection
