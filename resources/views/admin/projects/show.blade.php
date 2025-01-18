@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $project->name }}</h1>

    <p>Estado: {{ $project->status }}</p>

    <h2>Etapas</h2>

    <ul>
        @foreach ($project->stages as $stage)
            <li>
                <a href="{{ route('stages.show', $stage) }}">{{ $stage->name }}</a>
            </li>
        @endforeach
    </ul>

    <h2>Documentos</h2>

    <ul>
        @foreach ($project->stages as $stage)
            @foreach ($stage->documents as $document)
                <li>
                    <a href="{{ route('documents.show', $document) }}">{{ $document->name }}</a>
                </li>
            @endforeach
        @endforeach
    </ul>
</div>
@endsection