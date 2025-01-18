@extends('layouts.admin')

@section('content')
<section id="registered-projects" class="home-services pt-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-wrap">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Proyectos Registrados</h4>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre del Cliente</th>
                                    <th>Ciudad</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->client_name }}</td>
                                    <td>{{ $project->city }}</td>
                                    <td>{{ $project->status }}</td>
                                    <td>
                                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection