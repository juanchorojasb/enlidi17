@extends('layouts.user')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Crear Nuevo Proyecto</h1>

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <h2 class="text-xl font-semibold mb-3">Etapa 1: Financiación</h2>

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Proyecto:</label>
            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('name') }}" required>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="client_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Cliente:</label>
            <input type="text" name="client_name" id="client_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('client_name') }}" required>
            @error('client_name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="nit" class="block text-gray-700 text-sm font-bold mb-2">NIT:</label>
            <input type="text" name="nit" id="nit" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('nit') }}" required>
            @error('nit')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
            <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('email') }}" required>
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
            <input type="text" name="phone" id="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('phone') }}" required>
            @error('phone')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="city" class="block text-gray-700 text-sm font-bold mb-2">Ciudad/Municipio:</label>
            <input type="text" name="city" id="city" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('city') }}" required>
            @error('city')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="project_description" class="block text-gray-700 text-sm font-bold mb-2">Descripción del Proyecto:</label>
            <textarea name="project_description" id="project_description" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('project_description') }}</textarea>
            @error('project_description')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="project_value" class="block text-gray-700 text-sm font-bold mb-2">Valor del Proyecto:</label>
            <input type="number" name="project_value" id="project_value" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('project_value') }}" required>
            @error('project_value')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="start_date">Fecha de Inicio:</label>
            <input type="date" name="start_date" id="start_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('start_date') }}" required>
            @error('start_date')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="department" class="block text-gray-700 text-sm font-bold mb-2">Departamento:</label>
            <input type="text" name="department" id="department" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('department') }}" required>
            @error('department')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="country" class="block text-gray-700 text-sm font-bold mb-2">País:</label>
            <input type="text" name="country" id="country" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('country') }}" required>
            @error('country')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="installation_address" class="block text-gray-700 text-sm font-bold mb-2">Dirección de Instalación:</label>
            <input type="text" name="installation_address" id="installation_address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ old('installation_address') }}" required>
            @error('installation_address')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="rut" class="block text-gray-700 text-sm font-bold mb-2">Anexar RUT:</label>
            <input type="file" name="rut" id="rut" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('rut')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="chamber_of_commerce" class="block text-gray-700 text-sm font-bold mb-2">Anexar Cámara de Comercio:</label>
            <input type="file" name="chamber_of_commerce" id="chamber_of_commerce" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('chamber_of_commerce')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="financial_statements" class="block text-gray-700 text-sm font-bold mb-2">Anexar Estados Financieros Últimos 2 Años:</label>
            <input type="file" name="financial_statements" id="financial_statements" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('financial_statements')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="legal_representative_id" class="block text-gray-700 text-sm font-bold mb-2">Anexar Cédula Representante Legal:</label>
            <input type="file" name="legal_representative_id" id="legal_representative_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('legal_representative_id')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="credit_request" class="block text-gray-700 text-sm font-bold mb-2">Anexo 1: Solicitud de Crédito:</label>
            <input type="file" name="credit_request" id="credit_request" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('credit_request')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="project_information" class="block text-gray-700 text-sm font-bold mb-2">Anexo 2: Información Proyecto:</label>
            <input type="file" name="project_information" id="project_information" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('project_information')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="approval_query" class="block text-gray-700 text-sm font-bold mb-2">Anexo 3: Aprobación Consulta:</label>
            <input type="file" name="approval_query" id="approval_query" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('approval_query')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <input type="hidden" name="status" value="En revisión">

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear Proyecto</button>
            <a href="{{ route('user.dashboard') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Volver al Dashboard</a>
        </div>
    </form>
</div>
@endsection