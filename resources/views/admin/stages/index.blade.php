@extends('layouts.admin')

@section('title', 'Listado de Etapas (Admin)')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Listado de Etapas (Administrador)</h1>

        @if($stages->isEmpty())
            <p class="text-gray-600">No hay etapas registradas.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-2 px-4 border-b text-left">Proyecto</th>
                            <th class="py-2 px-4 border-b text-left">Nombre</th>
                            <th class="py-2 px-4 border-b text-left">Estado</th>
                            <th class="py-2 px-4 border-b text-left">Tipo</th>
                            <th class="py-2 px-4 border-b text-left">Fecha de Creación</th>
                            <th class="py-2 px-4 border-b text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stages as $stage)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">
                                    @if($stage->project)
                                        <a href="{{ route('admin.projects.show', $stage->project->id) }}" class="text-primary hover:underline">{{ $stage->project->name }}</a>
                                    @else
                                        N/A
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
                                <td>{{ $stage->tipo ?? 'N/A' }}</td>
                                <td class="py-2 px-4 border-b">{{ $stage->created_at->format('d/m/Y H:i:s') }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('admin.stages.show', ['project' => $stage->project, 'stage' => $stage]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-1">
                                        <i class="fa fa-eye mr-1"></i> Ver
                                    </a>
                                    <form action="{{ route('admin.stages.destroy', ['project' => $stage->project, 'stage' => $stage]) }}" method="POST" class="inline-block">
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
        @endif
    </div>
</div>
@endsection