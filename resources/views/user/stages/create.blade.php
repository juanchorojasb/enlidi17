@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nueva Etapa</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('stages.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="project_id">Proyecto</label>
            <select name="project_id" id="project_id" class="form-control" required>
                <option value="">-- Selecciona un proyecto --</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
            @error('project_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="name">Nombre de la Etapa</label>
            <input type="text" name="name" id="name" 
                   class="form-control" required 
                   value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="status">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="En revisión">En revisión</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Aprobado">Aprobado</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear Etapa</button>
        <a href="{{ route('stages.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
