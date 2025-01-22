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

        $path = storage_path('app/public/' . $document->file_path);

        if (!file_exists($path)) {
            abort(404, 'El documento no existe.');
        }

        return response()->file($path, [
            'Content-Type' => $document->mime_type,
            'Content-Disposition' => 'inline; filename="' . $document->name . '"', // Usa el nombre del documento
        ]);
    }
}