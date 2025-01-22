@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Detalles de la Etapa (Usuario)</h1>

    <p><strong>Proyecto:</strong> {{ $stage->project->name ?? 'Sin proyecto' }}</p>
    <p><strong>Nombre de la Etapa:</strong> {{ $stage->name }}</p>
    <p><strong>Estado:</strong> {{ $stage->status }}</p>

    @if($documents ?? false)
        <hr>
        <h4>Documentos de esta Etapa</h4>
        <ul>
            @foreach($documents as $doc)
                <li>
                    {{ $doc->name }}
                    - 
                    <a href="{{ route('documents.show', $doc) }}" target="_blank">
                        Ver Documento
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('stages.index') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection
