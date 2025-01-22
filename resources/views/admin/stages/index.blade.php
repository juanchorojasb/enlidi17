@extends('layouts.admin')

@section('content')
<section id="registered-projects" class="home-services pt-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-wrap">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Proyectos Registrados</h4>
                        {{-- <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Nuevo Proyecto</a> --}}
                    </div>

                    @if($projects->count() > 0)
                        <div class="table-responsive mt-4">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Cliente</th>
                                        <th>Ciudad</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $index => $project)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $project->client_name }}</td>
                                            <td>{{ $project->city }}</td>
                                            <td>
                                                @if ($project->status == 'pendiente')
                                                    <span class="badge bg-warning text-dark">Pendiente</span>
                                                @elseif ($project->status == 'aprobado')
                                                    <span class="badge bg-success">Aprobado</span>
                                                @elseif ($project->status == 'rechazado')
                                                    <span class="badge bg-danger">Rechazado</span>
                                                @else
                                                    {{ $project->status }}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                                {{-- Eliminar o comentar la siguiente línea --}}
                                                {{-- <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Editar</a> --}}

                                                {{-- Botones de aprobar/rechazar --}}
                                                @if ($project->status !== 'aprobado')
                                                    <form action="{{ route('admin.projects.approve', $project->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">Aprobar</button>
                                                    </form>
                                                @endif

                                                @if ($project->status !== 'rechazado')
                                                    <form action="{{ route('admin.projects.reject', $project->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm">Rechazar</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Paginación --}}
                        <div class="mt-3">
                            {{ $projects->links() }}
                        </div>
                    @else
                        <p class="mt-4">No hay proyectos registrados en este momento.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection