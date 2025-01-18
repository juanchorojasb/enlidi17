@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Etapa: {{ $stage->name }}</h1>

    <p>Estado: {{ $stage->status }}</p>

    <h2>Documentos</h2>

    <a href="{{ route('stages.documents.create', $stage) }}" class="btn btn-primary">Subir nuevo documento</a>

    <ul>
        @foreach ($stage->documents as $document)
            <li>
                <a href="{{ route('documents.show', $document) }}">{{ $document->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection