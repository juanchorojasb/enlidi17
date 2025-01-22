@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Etapa</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('stages.update', $stage) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="project_id">Proyecto</label>
            <!-- Asumimos que NO se puede cambiar el proyecto una vez creada la etapa -->
            <select name="project_id" id="project_id" class="form-control" disabled>
                <option value="{{ $stage->project->id ?? '' }}">
                    {{ $stage->project->name ?? 'Sin proyecto' }}
                </option>
            </select>
            <small class="text-muted">No se puede cambiar el proyecto de la etapa una vez creada.</small>
        </div>

        <div class="form-group mb-3">
            <label for="name">Nombre de la Etapa</label>
            <input 
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ old('name', $stage->name) }}"
                required
            >
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="status">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="En revisión"  {{ $stage->status == 'En revisión'  ? 'selected' : '' }}>En revisión</option>
                <option value="Pendiente"    {{ $stage->status == 'Pendiente'    ? 'selected' : '' }}>Pendiente</option>
                <option value="Aprobado"     {{ $stage->status == 'Aprobado'     ? 'selected' : '' }}>Aprobado</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Etapa</button>
        <a href="{{ route('stages.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
