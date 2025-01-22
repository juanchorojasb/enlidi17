@extends('layouts.user')

@section('content')
<div class="container">
    <h1>Detalles del Proyecto</h1>

    {{-- Datos básicos del proyecto --}}
    <div class="mb-4">
        <h3>Información del Proyecto</h3>
        <p><strong>Nombre del Cliente:</strong> {{ $project->client_name }}</p>
        <p><strong>Ciudad/Municipio:</strong> {{ $project->city }}</p>
        <p><strong>Departamento:</strong> {{ $project->department }}</p>
        <p><strong>País:</strong> {{ $project->country }}</p>
        <p><strong>Dirección de Instalación:</strong> {{ $project->installation_address }}</p>
        <p><strong>Estado del Proyecto:</strong> {{ $project->status }}</p>
        {{-- Agrega todos los campos que desees mostrar --}}
    </div>

    {{-- Documentos principales (columnas en la tabla projects) --}}
    <div class="mb-4">
        <h3>Documentos Principales</h3>
        
        <p>
            <strong>RUT:</strong><br>
            @if($project->rut_path)
                <a href="{{ Storage::url($project->rut_path) }}" target="_blank">Ver RUT</a>
            @else
                No adjuntado
            @endif
        </p>

        <p>
            <strong>Cámara de Comercio:</strong><br>
            @if($project->chamber_of_commerce_path)
                <a href="{{ Storage::url($project->chamber_of_commerce_path) }}" target="_blank">Ver Cámara de Comercio</a>
            @else
                No adjuntado
            @endif
        </p>

        <p>
            <strong>Estados Financieros:</strong><br>
            @if($project->financial_statements_path)
                <a href="{{ Storage::url($project->financial_statements_path) }}" target="_blank">Ver Estados Financieros</a>
            @else
                No adjuntado
            @endif
        </p>

        <p>
            <strong>Cédula Rep. Legal:</strong><br>
            @if($project->legal_representative_id_path)
                <a href="{{ Storage::url($project->legal_representative_id_path) }}" target="_blank">Ver Cédula</a>
            @else
                No adjuntado
            @endif
        </p>

        <p>
            <strong>Solicitud de Crédito:</strong><br>
            @if($project->credit_request_path)
                <a href="{{ Storage::url($project->credit_request_path) }}" target="_blank">Ver Solicitud</a>
            @else
                No adjuntado
            @endif
        </p>

        <p>
            <strong>Información del Proyecto:</strong><br>
            @if($project->project_information_path)
                <a href="{{ Storage::url($project->project_information_path) }}" target="_blank">Ver Info Proyecto</a>
            @else
                No adjuntado
            @endif
        </p>

        <p>
            <strong>Aprobación Consulta:</strong><br>
            @if($project->approval_query_path)
                <a href="{{ Storage::url($project->approval_query_path) }}" target="_blank">Ver Aprobación Consulta</a>
            @else
                No adjuntado
            @endif
        </p>
    </div>

    {{-- Documentos de la tabla 'documents' asociados al proyecto (si los tienes relacionados) --}}
    <div class="mb-4">
        <h3>Otros Documentos Adjuntos</h3>
        @if($project->documents->count() > 0)
            <ul>
                @foreach($project->documents as $doc)
                    <li>
                        <a href="{{ Storage::url($doc->file_path) }}" target="_blank">
                            {{ $doc->name }}
                        </a>
                        <small> ({{ $doc->mime_type }} - {{ round($doc->size / 1024, 2) }} KB)</small>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay documentos adicionales.</p>
        @endif
    </div>

    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Volver a la lista</a>
</div>
@endsection
