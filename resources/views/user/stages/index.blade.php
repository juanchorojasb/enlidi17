@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold text-gray-800">Listado de Etapas</h1>
            {{--  Aquí se comenta el botón de crear etapas.  --}}
            {{--  <a href="{{ route('projects.stages.create', $project->id) }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md">
                <i class="fa fa-plus mr-1"></i> Crear Nueva Etapa
            </a>  --}}
        </div>

        @if($stages->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-2 px-4 border-b text-left">Proyecto</th>
                            <th class="py-2 px-4 border-b text-left">Nombre de la Etapa</th>
                            <th class="py-2 px-4 border-b text-left">Estado</th>
                            <th class="py-2 px-4 border-b text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stages as $stage)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">
                                    @if ($stage->project)
                                        <a href="{{ route('projects.show', $stage->project->id) }}" class="text-primary hover:underline">{{ $stage->project->name }}</a>
                                    @else
                                        Sin proyecto
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b">{{ $stage->name }}</td>
                                <td class="py-2 px-4 border-b">
                                    @if ($stage->status == 'En revisión')
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-semibold">En revisión</span>
                                    @elseif ($stage->status == 'Pendiente')
                                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs font-semibold">Pendiente</span>
                                    @elseif ($stage->status == 'Aprobada')
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">Aprobada</span>
                                    @elseif ($stage->status == 'Rechazada')
                                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-semibold">Rechazada</span>
                                    @else
                                        {{ $stage->status }}
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('projects.stages.show', ['project' => $stage->project->id, 'stage' => $stage->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-1">
                                        <i class="fa fa-eye mr-1"></i> Ver
                                    </a>
                                    <a href="{{ route('projects.stages.edit', ['project' => $stage->project->id, 'stage' => $stage->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-1">
                                        <i class="fa fa-pencil mr-1"></i> Editar
                                    </a>
                                    <form action="{{ route('stages.destroy', ['project' => $stage->project->id, 'stage' => $stage->id]) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center" onclick="return confirm('¿Estás seguro de que quieres eliminar esta etapa?')">
                                            <i class="fa fa-trash mr-1"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-gray-600">No hay etapas registradas.</p>
        @endif
    </div>
</div>
@endsection