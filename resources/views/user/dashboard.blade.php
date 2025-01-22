@extends('layouts.user')

@section('title', 'Dashboard de Usuario')

@section('content')
<div class="container">
    <h1 class="mt-4 mb-4 text-center">Bienvenido, {{ Auth::user()->name }}!</h1>

    <section id="about" class="home-services">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h4 class="card-title"><i class="fa fa-folder-open"></i> Registro de Proyectos</h4>
                        <p class="card-text">Registra tus proyectos y contribuye a un futuro sostenible.</p>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">Registrar Nuevo Proyecto</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($projects->isNotEmpty())
        <section id="registered-projects" class="home-services">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <h4 class="card-title">Tus Proyectos Registrados</h4>

                            <div class="table-responsive mt-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nombre del Proyecto</th>
                                            <th>Nombre del Cliente</th>
                                            <th>Ciudad</th>
                                            <th>Estado</th>
                                            <th>Fecha de Creación</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($projects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ $project->client_name }}</td>
                                            <td>{{ $project->city }}</td>
                                            <td>{{ $project->status }}</td>
                                            <td>{{ $project->created_at->format('d/m/Y') }}</td>
                                            <td>
                                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este proyecto?')">Eliminar</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @if ($projects->hasPages())
                            <div class="d-flex justify-content-center mt-4">
                                {{ $projects->links() }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="alert alert-info">
                    No tienes proyectos registrados actualmente.
                </div>
            </div>
        </div>
    @endif
</div>
@endsection