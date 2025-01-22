@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Listado de Etapas</h1>

    <a href="{{ route('stages.create') }}" class="btn btn-primary mb-3">Crear Nueva Etapa</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Proyecto</th>
                <th>Nombre de la Etapa</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stages as $stage)
                <tr>
                    <td>{{ $stage->project->name ?? 'Sin proyecto' }}</td>
                    <td>{{ $stage->name }}</td>
                    <td>{{ $stage->status }}</td>
                    <td>
                        <a href="{{ route('stages.show', $stage->id) }}" class="btn btn-info btn-sm">
                            Ver
                        </a>
                        <a href="{{ route('stages.edit', $stage->id) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>
                        <form action="{{ route('stages.destroy', $stage->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button 
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Seguro que deseas eliminar esta etapa?')"
                            >
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
