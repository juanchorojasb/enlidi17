@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Detalles de la Etapa: {{ $stage->name }}</h1>

        <div class="mb-4">
            <p class="text-gray-700 font-bold mb-2">Proyecto:</p>
            <p class="text-gray-600">
                @if ($stage->project)
                    <a href="{{ route('projects.show', $stage->project->id) }}" class="text-primary hover:underline">{{ $stage->project->name }}</a>
                @else
                    Sin proyecto
                @endif
            </p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700 font-bold mb-2">Nombre de la Etapa:</p>
            <p class="text-gray-600">{{ $stage->name }}</p>
        </div>

        <div class="mb-4">
            <p class="text-gray-700 font-bold mb-2">Estado:</p>
            <p class="text-gray-600">{{ $stage->status }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('projects.show', $stage->project->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md inline-flex items-center">
                <i class="fa fa-arrow-left mr-2"></i> Volver al Proyecto
            </a>
        </div>
    </div>
</div>
@endsection