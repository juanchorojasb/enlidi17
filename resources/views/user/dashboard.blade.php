@extends('layouts.app')

@section('title', 'Dashboard de Usuario')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Bienvenido, {{ Auth::user()->name }}!</h1>

    <section id="project-registration" class="mb-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center space-x-4">
                <i class="fa fa-folder-open text-primary text-3xl"></i>
                <div>
                    <h4 class="text-xl font-semibold text-gray-800">Registro de Proyectos</h4>
                    <p class="text-gray-600">Registra tus proyectos y contribuye a un futuro sostenible.</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('user.projects.create') }}" class="bg-primary hover:bg-primary-dark text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                    <i class="fa fa-plus mr-2"></i> Registrar Nuevo Proyecto
                </a>
            </div>
        </div>
    </section>

    {{-- Sección de la Calculadora de Créditos --}}
    <section id="calculadora-creditos" class="mb-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h4 class="text-xl font-semibold text-gray-800 mb-4">Calculadora de Créditos</h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <div class="mb-4">
                        <label for="monto" class="block text-gray-700 text-sm font-bold mb-2">Monto del Crédito:</label>
                        <input type="number" id="monto" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Ingrese el monto" required>
                    </div>
                    <div class="mb-4">
                        <label for="cuotas" class="block text-gray-700 text-sm font-bold mb-2">Número de Cuotas:</label>
                        <input type="number" id="cuotas" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" placeholder="Ingrese las cuotas" required>
                    </div>
                    <button onclick="calcularCredito()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Calcular</button>
                </div>
                <div>
                    <p class="mb-2"><strong>Valor de la cuota:</strong> <span id="valorCuota"></span></p>
                    <p><strong>Total a pagar:</strong> <span id="totalPagar"></span></p>
                </div>
            </div>
        </div>
    </section>

    @if($projects->isNotEmpty())
        {{-- ... (resto del código para mostrar la tabla de proyectos) ... --}}
    @else
        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mt-4" role="alert">
            <strong class="font-bold">Información:</strong>
            <span class="block sm:inline">No tienes proyectos registrados actualmente.</span>
        </div>
    @endif
</div>

<script>
    function calcularCredito() {
        const monto = parseFloat(document.getElementById('monto').value);
        const cuotas = parseInt(document.getElementById('cuotas').value);
        const tasaInteresAnual = 0.16; // Tasa de interés efectiva anual del 16%
        const tasaInteresMensual = Math.pow(1 + tasaInteresAnual, 1 / 12) - 1; // Tasa de interés mensual

        if (isNaN(monto) || isNaN(cuotas) || monto <= 0 || cuotas <= 0) {
            alert('Por favor, ingrese valores válidos para el monto y las cuotas.');
            return;
        }

        const valorCuota = (monto * tasaInteresMensual) / (1 - Math.pow(1 + tasaInteresMensual, -cuotas));
        const totalPagar = valorCuota * cuotas;

        document.getElementById('valorCuota').textContent = valorCuota.toLocaleString('es-CO', { style: 'currency', currency: 'COP' });
        document.getElementById('totalPagar').textContent = totalPagar.toLocaleString('es-CO', { style: 'currency', currency: 'COP' });
    }
</script>

@endsection