@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nueva Etapa para el Proyecto: {{ $project->name }}</h1>

    <form action="{{ route('projects.stages.store', $project) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre de la Etapa:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Crear Etapa</button>
    </form>
</div>
@endsection