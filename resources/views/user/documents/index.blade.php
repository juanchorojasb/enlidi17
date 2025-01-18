@extends('layouts.user')

@section('content')
<section id="registered-documents" class="home-services pt-lg-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="box-wrap">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Documentos</h4>
                        <a href="{{ route('stages.documents.create', $stage) }}" class="btn btn-primary">Subir nuevo documento</a> 
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($documents as $document)
                                <tr>
                                    <td>{{ $document->name }}</td>
                                    <td>
                                        <a href="{{ route('documents.show', $document) }}" class="btn btn-primary btn-sm">Ver</a>
                                        <a href="{{ route('documents.edit', $document) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('documents.destroy', $document) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este documento?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection