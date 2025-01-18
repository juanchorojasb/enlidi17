@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Etapa</h1>

    <form action="{{ route('stages.update', $stage) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre de la Etapa:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $stage->name) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Etapa</button>
    </form>
</div>
@endsection