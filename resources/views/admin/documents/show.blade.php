@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Documento: {{ $document->name }}</h1>

    <a href="{{ route('documents.download', $document) }}" class="btn btn-primary">Descargar Documento</a>
</div>
@endsection