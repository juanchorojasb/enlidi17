<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Project;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StageController extends Controller
{
    public function __construct()
    {
        // Asegura que solo usuarios autenticados puedan acceder
        $this->middleware('auth');
    }

    /**
     * Muestra el detalle de una etapa.
     * Si el usuario es admin, retorna la vista de admin.
     * Si es user y es dueño del proyecto, retorna la vista de user.
     * Caso contrario, lanza 403.
     */
    public function show(Stage $stage)
    {
        // Cargar los documentos asociados a la etapa
        $documents = $stage->documents;

        // Si el usuario tiene rol admin
        if (Auth::user()->hasRole('admin')) {
            return view('admin.stages.show', compact('stage', 'documents'));
        }

        // De lo contrario, asumimos que es usuario "normal"
        // Verificamos si la etapa pertenece al proyecto que creó el usuario actual
        if ($stage->project && $stage->project->user_id === Auth::id()) {
            return view('user.stages.show', compact('stage', 'documents'));
        }

        // Si no es admin ni dueño de la etapa, retornamos error 403
        abort(403, 'No tienes permiso para ver esta etapa.');
    }
}
