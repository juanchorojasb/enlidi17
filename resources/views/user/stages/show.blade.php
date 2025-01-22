@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles de la Etapa</h1>

    <p><strong>Proyecto:</strong> {{ $stage->project->name ?? 'Sin proyecto' }}</p>
    <p><strong>Nombre de la Etapa:</strong> {{ $stage->name }}</p>
    <p><strong>Estado:</strong> {{ $stage->status }}</p>

    <a href="{{ route('stages.index') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection
