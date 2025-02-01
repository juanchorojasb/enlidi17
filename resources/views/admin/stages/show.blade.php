@extends('layouts.admin')

@section('title', $title)

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Etapa: {{ $stage->name }} (Admin)</h1>
            <p>Proyecto: <a href="{{ route('admin.projects.show', $project->id) }}" class="text-primary hover:underline">{{ $project->name }}</a></p>
            <p>Nombre: {{ $stage->name }}</p>
            <p>Estado: {{ $stage->status }}</p>

            {{-- Aquí puedes mostrar más detalles de la etapa para el administrador --}}

            <a href="{{ route('admin.projects.show', $project->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md mt-4">Volver al Proyecto</a>
        </div>
    </div>
@endsection