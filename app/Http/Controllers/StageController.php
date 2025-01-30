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
    public function show(Project $project, Stage $stage)
{
    \Log::info('Accediendo a user.stages.show', ['project_id' => $project->id, 'stage_id' => $stage->id]);

    // Verificar permisos:
    // - Admin puede ver cualquier etapa
    // - User solo si es dueño del proyecto
    if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
        abort(403, 'No tienes permiso para ver esta etapa.');
    }
    // Asegúrate de que la etapa pertenece al proyecto correcto.
    if ($stage->project_id !== $project->id) {
        abort(404, 'Etapa no encontrada.');
    }
    
    return view('user.stages.show', compact('stage', 'project'));
}
}
