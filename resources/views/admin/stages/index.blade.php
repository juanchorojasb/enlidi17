@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Stages</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Proyecto</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Tipo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stages as $stage)
                                <tr>
                                    <td>{{ $stage->id }}</td>
                                    <td>
                                        @if ($stage->project)
                                            <a href="{{ route('admin.projects.show', $stage->project->id) }}">
                                                {{ $stage->project->name }}
                                            </a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $stage->name }}</td>
                                    <td>{{ $stage->status }}</td>
                                    <td>{{ $stage->tipo }}</td>
                                    <td>
                                        <a href="{{ route('admin.stages.show', ['project' => $stage->project, 'stage' => $stage]) }}" class="btn btn-info btn-sm">Ver</a>

                                        <form action="{{ route('admin.stages.destroy', ['project' => $stage->project, 'stage' => $stage]) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este stage?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No hay stages registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection