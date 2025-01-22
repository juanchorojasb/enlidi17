<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    public function __construct()
    {
        // Asegura que todas las acciones requieran autenticación
        $this->middleware('auth');
    }

    /**
     * Muestra el documento seleccionado tras verificar permisos.
     */
    public function show(Document $document)
    {
        // 1. Verificar si el usuario es el dueño del proyecto o tiene rol 'admin'
        if (Auth::id() !== $document->project->user_id && !Auth::user()->hasRole('admin')) {
            abort(403, 'No tienes permiso para ver este documento.');
        }

        // 2. Construir la ruta física al archivo en storage/app/public
        $path = storage_path('app/public/' . $document->path);

        // 3. Verificar que el archivo realmente exista
        if (!file_exists($path)) {
            abort(404, 'El documento no existe en el servidor.');
        }

        // 4. Devolver el archivo con las cabeceras apropiadas (inline PDF u otro tipo)
        return response()->file($path, [
            'Content-Type'        => $document->mime_type,
            'Content-Disposition' => 'inline; filename="' . $document->name . '"',
        ]);
    }
}
