@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Crear Nuevo Proyecto</h1>

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2 class="mb-3">Etapa 1: Financiación</h2>

        {{-- Nombre del proyecto --}}
        <div class="form-group">
            <label for="name">Nombre del Proyecto:</label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   class="form-control" 
                   value="{{ old('name') }}" 
                   required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nombre del cliente --}}
        <div class="form-group">
            <label for="client_name">Nombre del Cliente:</label>
            <input type="text" 
                   name="client_name" 
                   id="client_name" 
                   class="form-control" 
                   value="{{ old('client_name') }}" 
                   required>
            @error('client_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- NIT --}}
        <div class="form-group">
            <label for="nit">NIT:</label>
            <input type="text" 
                   name="nit" 
                   id="nit" 
                   class="form-control" 
                   value="{{ old('nit') }}" 
                   required>
            @error('nit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email --}}
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" 
                   name="email" 
                   id="email" 
                   class="form-control" 
                   value="{{ old('email') }}" 
                   required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Teléfono --}}
        <div class="form-group">
            <label for="phone">Teléfono:</label>
            <input type="text" 
                   name="phone" 
                   id="phone" 
                   class="form-control" 
                   value="{{ old('phone') }}" 
                   required>
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Ciudad/Municipio --}}
        <div class="form-group">
            <label for="city">Ciudad/Municipio:</label>
            <input type="text" 
                   name="city" 
                   id="city" 
                   class="form-control" 
                   value="{{ old('city') }}" 
                   required>
            @error('city')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Dirección de instalación (manteniendo solo uno) --}}
        <div class="form-group">
            <label for="installation_address">Dirección de instalación:</label>
            <input type="text" 
                   name="installation_address" 
                   id="installation_address" 
                   class="form-control" 
                   value="{{ old('installation_address') }}" 
                   required>
            @error('installation_address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Descripción del proyecto --}}
        <div class="form-group">
            <label for="project_description">Descripción del Proyecto:</label>
            <textarea name="project_description" 
                      id="project_description" 
                      class="form-control" 
                      rows="3" 
                      required>{{ old('project_description') }}</textarea>
            @error('project_description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Valor del proyecto --}}
        <div class="form-group">
            <label for="project_value">Valor del Proyecto:</label>
            <input type="number" 
                   name="project_value" 
                   id="project_value" 
                   class="form-control" 
                   value="{{ old('project_value') }}" 
                   required>
            @error('project_value')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Fecha de inicio --}}
        <div class="form-group">
            <label for="start_date">Fecha de Inicio:</label>
            <input type="date" 
                   name="start_date" 
                   id="start_date" 
                   class="form-control" 
                   value="{{ old('start_date') }}" 
                   required>
            @error('start_date')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Departamento --}}
        <div class="form-group">
            <label for="department">Departamento:</label>
            <input type="text" 
                   name="department" 
                   id="department" 
                   class="form-control" 
                   value="{{ old('department') }}" 
                   required>
            @error('department')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- País --}}
        <div class="form-group">
            <label for="country">País:</label>
            <input type="text" 
                   name="country" 
                   id="country" 
                   class="form-control" 
                   value="{{ old('country') }}" 
                   required>
            @error('country')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Documentos (RUT, Cámara de Comercio, Estados Financieros, etc.) --}}
        <div class="form-group">
            <label for="rut">Anexar RUT (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
            <input type="file" name="rut" id="rut" class="form-control-file" required>
            @error('rut')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="chamber_of_commerce">Anexar Cámara de Comercio (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
            <input type="file" name="chamber_of_commerce" id="chamber_of_commerce" class="form-control-file" required>
            @error('chamber_of_commerce')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="financial_statements">Anexar Estados Financieros Últimos 2 Años (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
            <input type="file" name="financial_statements" id="financial_statements" class="form-control-file" required>
            @error('financial_statements')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="legal_representative_id">Anexar Cédula Representante Legal (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
            <input type="file" name="legal_representative_id" id="legal_representative_id" class="form-control-file" required>
            @error('legal_representative_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="credit_request">Anexo 1: Solicitud de Crédito (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
            <input type="file" name="credit_request" id="credit_request" class="form-control-file" required>
            @error('credit_request')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="project_information">Anexo 2: Información Proyecto (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
            <input type="file" name="project_information" id="project_information" class="form-control-file" required>
            @error('project_information')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="approval_query">Anexo 3: Aprobación Consulta (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
            <input type="file" name="approval_query" id="approval_query" class="form-control-file" required>
            @error('approval_query')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- Estado inicial del proyecto --}}
        <input type="hidden" name="status" value="En evaluación">

        {{-- Botones de acción --}}
        <button type="submit" class="btn btn-primary">Crear Proyecto</button>
        <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
