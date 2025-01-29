@extends('layouts.app')

@section('content')
<section class="py-8">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Tus Proyectos Registrados</h2>
            <a href="{{ route('user.projects.create') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                <i class="fa fa-plus mr-2"></i> Crear nuevo proyecto
            </a>
        </div>

        @if($projects->count() > 0)
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-3 px-4 text-left">Nombre del Cliente</th>
                            <th class="py-3 px-4 text-left">Ciudad</th>
                            <th class="py-3 px-4 text-left">Estado</th>
                            <th class="py-3 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">{{ $project->client_name }}</td>
                                <td class="py-2 px-4 border-b">{{ $project->city }}</td>
                                <td class="py-2 px-4 border-b">
                                    @if ($project->status == 'En evaluación')
                                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs font-semibold">En evaluación</span>
                                    @elseif ($project->status == 'Aprobado')
                                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-semibold">Aprobado</span>
                                    @elseif ($project->status == 'Rechazado')
                                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-semibold">Rechazado</span>
                                    @else
                                        <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-xs font-semibold">{{ $project->status }}</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('projects.show', $project->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-2">
                                        <i class="fa fa-eye mr-1"></i> Ver
                                    </a>
                                    <a href="{{ route('user.projects.edit', $project->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-2">
                                        <i class="fa fa-pencil mr-1"></i> Editar
                                    </a>
                                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center" onclick="return confirm('¿Estás seguro de que quieres eliminar este proyecto?')">
                                            <i class="fa fa-trash mr-1"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        @else
            <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Información:</strong>
                <span class="block sm:inline">No tienes proyectos registrados actualmente.</span>
            </div>
        @endif
    </div>
</section>
@endsection