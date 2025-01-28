@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Crear Nuevo Proyecto</h1>

        <form action="{{ route('user.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <h2 class="text-xl font-semibold text-gray-800 mb-4">Etapa 1: Financiación</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Proyecto:</label>
                        <input type="text" name="name" id="name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="client_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Cliente:</label>
                        <input type="text" name="client_name" id="client_name" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('client_name') }}" required>
                        @error('client_name')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="nit" class="block text-gray-700 text-sm font-bold mb-2">NIT:</label>
                        <input type="text" name="nit" id="nit" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('nit') }}" required>
                        @error('nit')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email" name="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('email') }}" required>
                        @error('email')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Teléfono:</label>
                        <input type="text" name="phone" id="phone" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('phone') }}" required>
                        @error('phone')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="city" class="block text-gray-700 text-sm font-bold mb-2">Ciudad/Municipio:</label>
                        <input type="text" name="city" id="city" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('city') }}" required>
                        @error('city')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="department" class="block text-gray-700 text-sm font-bold mb-2">Departamento:</label>
                        <input type="text" name="department" id="department" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('department') }}" required>
                        @error('department')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="country" class="block text-gray-700 text-sm font-bold mb-2">País:</label>
                        <input type="text" name="country" id="country" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('country') }}" required>
                        @error('country')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="mb-4">
                        <label for="project_description" class="block text-gray-700 text-sm font-bold mb-2">Descripción del Proyecto:</label>
                        <textarea name="project_description" id="project_description" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>{{ old('project_description') }}</textarea>
                        @error('project_description')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="project_value" class="block text-gray-700 text-sm font-bold mb-2">Valor del Proyecto:</label>
                        <input type="number" name="project_value" id="project_value" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('project_value') }}" required>
                        @error('project_value')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Fecha de Inicio:</label>
                        <input type="date" name="start_date" id="start_date" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('start_date') }}" required>
                        @error('start_date')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="installation_address" class="block text-gray-700 text-sm font-bold mb-2">Dirección de Instalación:</label>
                        <input type="text" name="installation_address" id="installation_address" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" value="{{ old('installation_address') }}" required>
                        @error('installation_address')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div>
                    <div class="mb-4">
                        <label for="rut" class="block text-gray-700 text-sm font-bold mb-2">Anexar RUT (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
                        <input type="file" name="rut" id="rut" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        @error('rut')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="chamber_of_commerce" class="block text-gray-700 text-sm font-bold mb-2">Anexar Cámara de Comercio (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
                        <input type="file" name="chamber_of_commerce" id="chamber_of_commerce" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        @error('chamber_of_commerce')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="financial_statements" class="block text-gray-700 text-sm font-bold mb-2">Anexar Estados Financieros (Últimos 2 Años):</label>
                        <input type="file" name="financial_statements" id="financial_statements" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        @error('financial_statements')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <label for="legal_representative_id" class="block text-gray-700 text-sm font-bold mb-2">Anexar Cédula Representante Legal (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
                        <input type="file" name="legal_representative_id" id="legal_representative_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        @error('legal_representative_id')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="credit_request" class="block text-gray-700 text-sm font-bold mb-2">Anexo 1: Solicitud de Crédito (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
                        <input type="file" name="credit_request" id="credit_request" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        @error('credit_request')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="project_information" class="block text-gray-700 text-sm font-bold mb-2">Anexo 2: Información Proyecto (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
                        <input type="file" name="project_information" id="project_information" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        @error('project_information')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="approval_query" class="block text-gray-700 text-sm font-bold mb-2">Anexo 3: Aprobación Consulta (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
                        <input type="file" name="approval_query" id="approval_query" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" required>
                        @error('approval_query')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <input type="hidden" name="status" value="En evaluación">

            <div class="flex items-center justify-between mt-6">
                <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:shadow-outline">Crear Proyecto</button>
                <a href="{{ route('user.dashboard') }}" class="inline-block align-baseline font-bold text-sm text-primary hover:text-primary-dark">Volver al Dashboard</a>
            </div>
        </form>
    </div>
</div>
@endsection