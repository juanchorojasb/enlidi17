<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Document $document)
    {
        // Verificar que el usuario tenga permiso para ver el documento
        if (Auth::user()->id !== $document->project->user_id && !Auth::user()->hasRole('admin')) {
            abort(403, 'No tienes permiso para ver este documento.');
        }

        // Obtener la ruta completa del archivo
        $path = storage_path('app/public/' . $document->path); // Usar 'path' en lugar de 'file_path'

        // Verificar si el archivo existe
        if (!file_exists($path)) {
            abort(404, 'El documento no existe.');
        }

        // Devolver el archivo con las cabeceras apropiadas
        return response()->file($path, [
            'Content-Type' => $document->mime_type,
            'Content-Disposition' => 'inline; filename="' . $document->name . '"',
        ]);
    }
}
