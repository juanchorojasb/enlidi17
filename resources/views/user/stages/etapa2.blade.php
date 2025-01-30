@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Etapa 2: Desembolso</h1>
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Proyecto: {{ $project->name }} - {{ $stage->name }}</h3>

        <form action="{{ route('user.projects.stages.financiacion.update', ['project' => $project, 'stage' => $stage]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

            <div class="mb-4">
                <p class="text-gray-700 mb-2">
                    <strong class="text-gray-900">Descargar Carta Aprobación:</strong>
                </p>
                <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                    <i class="fa fa-download mr-2"></i> Descargar
                </a>
            </div>

            <div class="mb-4">
                <label for="pagare" class="block text-gray-700 text-sm font-bold mb-2">Anexo Pagaré (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
                <input type="file" name="pagare" id="pagare" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                @error('pagare')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="desembolso" class="block text-gray-700 text-sm font-bold mb-2">Anexo Documento Desembolso Anticipo (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
                <input type="file" name="desembolso" id="desembolso" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                @error('desembolso')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="recibo_cliente" class="block text-gray-700 text-sm font-bold mb-2">Anexo Recibo a Satisfacción Cliente (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
                <input type="file" name="recibo_cliente" id="recibo_cliente" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                @error('recibo_cliente')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="factura" class="block text-gray-700 text-sm font-bold mb-2">Cuenta de Cobro Final y Factura (PDF, DOC, DOCX, XLS, XLSX, ZIP, JPG, JPEG, PNG):</label>
                <input type="file" name="factura" id="factura" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                @error('factura')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="imagenes" class="block text-gray-700 text-sm font-bold mb-2">Imágenes Proyecto (JPG, JPEG, PNG):</label>
                <input type="file" name="imagenes[]" id="imagenes" multiple class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                @error('imagenes')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md">Solicitar Financiación</button>
                <a href="{{ route('user.projects.show', $project->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection