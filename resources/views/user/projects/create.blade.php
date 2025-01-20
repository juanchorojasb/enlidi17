@extends('layouts.user')

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

        <div class="form-group">
            <label for="rut">Anexar RUT</label>
            <input type="file" name="rut" id="rut" class="form-control-file" required>
        </div>

        <div class="form-group">
            <label for="chamber_of_commerce">Anexar Cámara de Comercio</label>
            <input type="file" name="chamber_of_commerce" id="chamber_of_commerce" class="form-control-file" required>
        </div>

        <div class="form-group">
            <label for="financial_statements">Anexar Estados Financieros Últimos 2 Años</label>
            <input type="file" name="financial_statements" id="financial_statements" class="form-control-file" required>
        </div>

        <div class="form-group">
            <label for="legal_representative_id">Anexar Cédula Representante Legal</label>
            <input type="file" name="legal_representative_id" id="legal_representative_id" class="form-control-file" required>
        </div>

        <div class="form-group">
            <label for="credit_request">Anexo 1: Solicitud de Crédito</label>
            <input type="file" name="credit_request" id="credit_request" class="form-control-file" required>
        </div>

        <div class="form-group">
            <label for="project_information">Anexo 2: Información Proyecto</label>
            <input type="file" name="project_information" id="project_information" class="form-control-file" required>
        </div>

        <div class="form-group">
            <label for="approval_query">Anexo 3: Aprobación Consulta</label>
            <input type="file" name="approval_query" id="approval_query" class="form-control-file" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Crear Proyecto</button>
    </form>
</div>
@endsection