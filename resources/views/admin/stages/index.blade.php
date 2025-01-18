@extends('layouts.admin')

@section('content')
<section id="registered-stages" class="home-services pt-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-wrap">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Etapas del Proyecto: {{ $project->name }}</h4>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($stages as $stage)
                                <tr>
                                    <td>{{ $stage->name }}</td>
                                    <td>{{ $stage->status }}</td>
                                    <td>
                                        <a href="{{ route('stages.show', $stage) }}" class="btn btn-primary btn-sm">Ver</a>
                                        <a href="{{ route('stages.edit', $stage) }}" class="btn btn-warning btn-sm">Editar</a>
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