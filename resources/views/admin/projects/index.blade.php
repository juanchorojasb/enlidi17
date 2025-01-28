@extends('layouts.admin')

@section('content')
<section class="py-8">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Proyectos Registrados</h2>

        @if($projects->count() > 0)
            <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-3 px-4 text-left">#</th>
                            <th class="py-3 px-4 text-left">Cliente</th>
                            <th class="py-3 px-4 text-left">Ciudad</th>
                            <th class="py-3 px-4 text-left">Estado</th>
                            <th class="py-3 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $index => $project)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">{{ $index + 1 }}</td>
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
                                    <a href="{{ route('admin.projects.show', $project->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center mr-2">
                                        <i class="fa fa-eye mr-1"></i> Ver
                                    </a>
                                    {{-- Botones de aprobar/rechazar --}}
                                    @if ($project->status !== 'Aprobado')
                                        <form action="{{ route('admin.projects.approve', $project->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center">
                                                <i class="fa fa-check mr-1"></i> Aprobar
                                            </button>
                                        </form>
                                    @endif

                                    @if ($project->status !== 'Rechazado')
                                        <form action="{{ route('admin.projects.reject', $project->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md text-xs inline-flex items-center">
                                                <i class="fa fa-times mr-1"></i> Rechazar
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Paginación --}}
            <div class="mt-4">
                {{ $projects->links() }}
            </div>
        @else
            <p class="mt-4 text-gray-600">No hay proyectos registrados en este momento.</p>
        @endif
    </div>
</section>
@endsection