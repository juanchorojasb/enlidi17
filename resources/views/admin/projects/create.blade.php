@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nuevo Proyecto</h1>
    
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="mb-3">Etapa 1: Financiación</h2>
        
        <div class="form-group">
            <label for="client_name">Nombre del Cliente</label>
            <input type="text" name="client_name" id="client_name" class="form-control" value="{{ old('client_name') }}" required>
        </div>

        <div class="form-group">
            <label for="city">Ciudad/Municipio</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
        </div>

        <div class="form-group">
            <label for="department">Departamento</label>
            <input type="text" name="department" id="department" class="form-control" value="{{ old('department') }}" required>
        </div>

        <div class="form-group">
            <label for="country">País</label>
            <input type="text" name="country" id="country" class="form-control" value="{{ old('country') }}" required>
        </div>

        <div class="form-group">
            <label for="installation_address">Dirección de Instalación</label>
            <input type="text" name="installation_address" id="installation_address" class="form-control" value="{{ old('installation_address') }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Crear Proyecto</button>
    </form>
</div>
@endsection