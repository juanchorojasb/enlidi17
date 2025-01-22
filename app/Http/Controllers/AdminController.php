<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Stage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Muestra el dashboard de administrador con estadísticas y enlaces a otras secciones.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        // Obtiene estadísticas para el dashboard
        $pendingProjectsCount = Project::where('status', 'pendiente')->count();
        $approvedProjectsCount = Project::where('status', 'aprobado')->count();
        $rejectedProjectsCount = Project::where('status', 'rechazado')->count();
        $allProjectsCount = Project::count();
        $allStagesCount = Stage::count(); // Obtiene el conteo total de stages

        // Retorna la vista "admin.dashboard" con las estadísticas
        return view('admin.dashboard', compact(
            'pendingProjectsCount',
            'approvedProjectsCount',
            'rejectedProjectsCount',
            'allProjectsCount',
            'allStagesCount' // Pasa el conteo de stages a la vista
        ));
    }

    /**
     * (Opcional) Muestra el detalle de un proyecto específico.
     * Asumiendo que en tu vista querrás ver documentos y etapas,
     * podrías cargar relaciones con ->with().
     */
    public function show($id)
    {
        $project = Project::with(['user', 'documents', 'stages'])->findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }
}