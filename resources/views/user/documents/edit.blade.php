@extends('layouts.user')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Documento</h1>

    <form action="{{ route('documents.update', $document) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre del Documento:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $document->name) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Documento</button>
    </form>
</div>
@endsection