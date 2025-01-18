@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Etapa: {{ $stage->name }}</h1>

    <p>Estado: {{ $stage->status }}</p>

    <h2>Documentos</h2>

    <ul>
        @foreach ($stage->documents as $document)
            <li>
                <a href="{{ route('documents.show', $document) }}">{{ $document->name }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection