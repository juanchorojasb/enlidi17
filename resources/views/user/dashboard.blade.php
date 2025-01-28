@extends('layouts.app')

@section('title', 'Dashboard de Usuario')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Bienvenido, {{ Auth::user()->name }}!</h1>

    <section id="project-registration" class="mb-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center space-x-4">
                <i class="fa fa-folder-open text-primary text-3xl"></i>
                <div>
                    <h4 class="text-xl font-semibold text-gray-800">Registro de Proyectos</h4>
                    <p class="text-gray-600">Registra tus proyectos y contribuye a un futuro sostenible.</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('user.projects.create') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                    <i class="fa fa-plus mr-2"></i> Registrar Nuevo Proyecto
                </a>
            </div>
        </div>
    </section>

    @if($projects->isNotEmpty())
        <section id="registered-projects" class="mb-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h4 class="text-xl font-semibold text-gray-800 mb-4">Tus Proyectos Registrados</h4>

                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="py-2 px-4 border-b text-left">Nombre del Proyecto</th>
                                <th class="py-2 px-4 border-b text-left">Nombre del Cliente</th>
                                <th class="py-2 px-4 border-b text-left">Ciudad</th>
                                <th class="py-2 px-4 border-b text-left">Estado</th>
                                <th class="py-2 px-4 border-b text-left">Fecha de Creación</th>
                                <th class="py-2 px-4 border-b text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                                <tr class="hover:bg-gray-100">
                                    <td class="py-2 px-4 border-b">{{ $project->name }}</td>
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
                                    <td class="py-2 px-4 border-b">{{ $project->created_at->format('d/m/Y') }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('user.projects.show', $project->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-2">
                                            <i class="fa fa-eye mr-1"></i> Ver</a>
                                        <a href="{{ route('user.projects.edit', $project->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-2">
                                            <i class="fa fa-pencil mr-1"></i> Editar
                                        </a>
                                        <form action="{{ route('user.projects.destroy', $project->id) }}" method="POST" class="inline-block">
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
                @if ($projects->hasPages())
                <div class="mt-4">
                    {{ $projects->links() }}
                </div>
                @endif
            </div>
        </section>
    @else
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mt-4" role="alert">
            <strong class="font-bold">Información:</strong>
            <span class="block sm:inline">No tienes proyectos registrados actualmente.</span>
        </div>
    @endif
</div>
@endsection