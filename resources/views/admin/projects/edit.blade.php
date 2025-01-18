@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Proyecto</h1>

    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="client_name">Nombre del Cliente</label>
            <input type="text" name="client_name" id="client_name" class="form-control" value="{{ old('client_name', $project->client_name) }}" required>
        </div>

        <div class="form-group">
            <label for="city">Ciudad/Municipio</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $project->city) }}" required>
        </div>

        <div class="form-group">
            <label for="department">Departamento</label>
            <input type="text" name="department" id="department" class="form-control" value="{{ old('department', $project->department) }}" required>
        </div>

        <div class="form-group">
            <label for="country">País</label>
            <input type="text" name="country" id="country" class="form-control" value="{{ old('country', $project->country) }}" required>
        </div>

        <div class="form-group">
            <label for="installation_address">Dirección de Instalación</label>
            <input type="text" name="installation_address" id="installation_address" class="form-control" value="{{ old('installation_address', $project->installation_address) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Proyecto</button>
    </form>
</div>
@endsection