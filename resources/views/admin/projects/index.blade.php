@extends('layouts.admin')

@section('content')
<section id="registered-projects" class="home-services pt-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-wrap">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">Proyectos Registrados</h4>
                        <!-- Si quieres un botón para crear proyectos como admin, puedes agregarlo aquí -->
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
                                            <!-- Número de fila (simplemente un contador) -->
                                            <td>{{ $index + 1 }}</td>

                                            <td>{{ $project->client_name }}</td>
                                            <td>{{ $project->city }}</td>
                                            <td>{{ $project->status }}</td>

                                            <td>
                                                <!-- Ver Detalle (versión de admin) -->
                                                <a href="{{ route('admin.projects.show', $project->id) }}"
                                                   class="btn btn-primary btn-sm">
                                                    Ver
                                                </a>

                                                <!-- Editar Proyecto -->
                                                <!-- Si quieres usar una ruta específica para admin, cambia a:
                                                     route('admin.projects.edit', $project->id)
                                                     y define esa ruta en tu archivo de rutas. -->
                                                <a href="{{ route('projects.edit', $project->id) }}"
                                                   class="btn btn-warning btn-sm">
                                                    Editar
                                                </a>

                                                <!-- Botones de aprobar/rechazar (opcional) -->
                                                {{-- 
                                                <form action="{{ route('projects.approve', $project->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-sm">Aprobar</button>
                                                </form>

                                                <form action="{{ route('projects.reject', $project->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Rechazar</button>
                                                </form>
                                                --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Si usas paginación, agrega aquí -->
                        {{-- <div class="mt-3">
                            {{ $projects->links() }}
                        </div> --}}
                    @else
                        <p class="mt-4">No hay proyectos registrados en este momento.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
