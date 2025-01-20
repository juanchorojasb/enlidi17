@extends('layouts.app')

@section('title', 'Dashboard de Usuario')

@section('content')
<section class="w3l-main-slider" id="welcome">
    <div class="companies20-content">
        <div class="owl-one owl-carousel owl-theme">
            <div class="item">
                <li>
                    <div class="slider-info banner-view bg bg2">
                        <div class="banner-info">
                            <div class="container">
                                <div class="banner-info-bg text-center">
                                    <h5>¡Bienvenido al Panel de Administración, {{ Auth::user()->name }}!</h5>
                                    <p class="mt-md-4 mt-3">Gestiona tus proyectos, accede a herramientas y recibe soporte.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </div>
        </div>
    </div>
</section>

<section id="about" class="home-services pt-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mt-lg-0 mt-4">
                <div class="box-wrap">
                    <div class="box-wrap-grid">
                        <div class="icon">
                            <span class="fa fa-folder-open"></span>
                        </div>
                        <div class="info">
                            <h4><a href="#project-registration">Registro de Proyectos</a></h4>
                            <p class="mt-4">Registra tus proyectos y construye un mundo más sostenible.</p>
                            <a class="btn btn-style btn-primary mt-sm-5 mt-4 mr-2" href="{{ route('projects.create') }}">Registrar Nuevo Proyecto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(!$projects->isEmpty())
<section id="registered-projects" class="home-services pt-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-wrap">
                    <h4>Tus Proyectos Registrados</h4>

                    <div class="d-flex justify-content-end mb-3">
                        <form action="{{ route('projects.index') }}" method="GET" class="form-inline">
                            <div class="form-group mr-2">
                                <input type="text" name="search" class="form-control" placeholder="Buscar por nombre" value="{{ request('search') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th><a href="{{ route('projects.index', ['sort' => 'client_name', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Nombre del Cliente</a></th>
                                    <th><a href="{{ route('projects.index', ['sort' => 'city', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}">Ciudad</a></th>
                                    <th>Estado</th>
                                    <th>Fecha de Creación</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                <tr>
                                    <td>{{ $project->client_name }}</td>
                                    <td>{{ $project->city }}</td>
                                    <td>{{ $project->status }}</td>
                                    <td>{{ $project->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                        @if($project->status == 'En evaluación')
                                            <a href="{{ route('projects.approve', $project->id) }}" class="btn btn-success btn-sm">Aprobar</a>
                                            <a href="{{ route('projects.reject', $project->id) }}" class="btn btn-danger btn-sm">Rechazar</a>
                                        @endif

                                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $projects->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@endsection