@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Proyecto: {{ $project->name }}</h1>

        <div class="mb-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Información del Proyecto</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-700 mb-2"><strong class="text-gray-900">Cliente:</strong> {{ $project->client_name }}</p>
                    <p class="text-gray-700 mb-2"><strong class="text-gray-900">NIT:</strong> {{ $project->nit }}</p>
                    <p class="text-gray-700 mb-2"><strong class="text-gray-900">Email:</strong> {{ $project->email }}</p>
                    <p class="text-gray-700 mb-2"><strong class="text-gray-900">Teléfono:</strong> {{ $project->phone }}</p>
                    <p class="text-gray-700 mb-2"><strong class="text-gray-900">Ciudad:</strong> {{ $project->city }}</p>
                </div>
                <div>
                    <p class="text-gray-700 mb-2"><strong class="text-gray-900">Departamento:</strong> {{ $project->department }}</p>
                    <p class="text-gray-700 mb-2"><strong class="text-gray-900">País:</strong> {{ $project->country }}</p>
                    <p class="text-gray-700 mb-2"><strong class="text-gray-900">Dirección de Instalación:</strong> {{ $project->installation_address }}</p>
                    <p class="text-gray-700 mb-2"><strong class="text-gray-900">Valor del Proyecto:</strong> ${{ number_format($project->project_value, 0, ',', '.') }}</p>
                    <p class="text-gray-700 mb-2"><strong class="text-gray-900">Fecha de Inicio:</strong> {{ $project->start_date->format('d/m/Y') }}</p>
                    <p class="text-gray-700 mb-2"><strong class="text-gray-900">Estado:</strong>
                        @if ($project->status == 'En evaluación')
                            <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-semibold">En evaluación</span>
                        @elseif ($project->status == 'Aprobado')
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">Aprobado</span>
                        @elseif ($project->status == 'Rechazado')
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-semibold">Rechazado</span>
                        @else
                            <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs font-semibold">{{ $project->status }}</span>
                        @endif
                    </p>
                </div>
            </div>
            <p class="text-gray-700 mt-4"><strong class="text-gray-900">Descripción:</strong> {{ $project->project_description }}</p>
        </div>

        <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Etapas ({{ $project->stages->count() }})</h2>
        <div class="mb-6">
            @if($project->stages->isNotEmpty())
                <ul class="space-y-4">
                    @foreach ($project->stages as $stage)
                        <li class="bg-gray-100 p-4 rounded-lg shadow">
                            <h5 class="text-lg font-semibold text-gray-800">{{ $stage->name }}</h5>
                            <p class="text-sm text-gray-600 mb-2">({{ $stage->status }})</p>
                            <a href="{{ route('user.stages.show', ['project' => $project, 'stage' => $stage]) }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md text-sm inline-flex items-center">
                                <i class="fa fa-eye mr-2"></i> Ver Etapa
                            </a>
                            {{--  Añadir el enlace a la etapa de financiación --}}
                            @if ($stage->name == 'Etapa 2: Financiación' && $stage->status == 'En revisión')
                                <a href="{{ route('user.projects.stages.financiacion', ['project' => $project, 'stage' => $stage]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md text-sm inline-flex items-center">
                                    <i class="fa fa-money mr-2"></i> Completar Financiación
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600">No hay etapas registradas para este proyecto.</p>
            @endif
        </div>

        <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Documentos</h2>
        <div class="mb-6">
            @if($project->documents->isNotEmpty())
                <ul class="space-y-4">
                    @foreach ($project->documents as $document)
                        <li class="bg-gray-100 p-4 rounded-lg shadow">
                            <h5 class="text-lg font-semibold text-gray-800">{{ $document->name }}</h5>
                            <p class="text-sm text-gray-600 mb-2">({{ $document->mime_type }} - {{ number_format($document->size / 1024, 2) }} KB)</p>
                            <a href="{{ Storage::disk('public')->url($document->file_path) }}" target="_blank" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-sm inline-flex items-center">
                                <i class="fa fa-eye mr-2"></i> Ver documento
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-gray-600">No hay documentos asociados a este proyecto.</p>
            @endif
        </div>

        <a href="{{ route('user.projects.index') }}" class="bg-secondary hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-md mt-4">Volver a Proyectos</a>
    </div>
</div>
@endsection