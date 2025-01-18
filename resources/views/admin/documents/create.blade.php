@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Subir Nuevo Documento para la Etapa: {{ $stage->name }}</h1>

    <form action="{{ route('stages.documents.store', $stage) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nombre del Documento:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="file">Archivo:</label>
            <input type="file" name="file" id="file" class="form-control-file" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Subir Documento</button>
    </form>
</div>
@endsection