<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Stage; // Importa el modelo Stage
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        // Se asume que aquí ya tienes los middlewares para autenticación y rol de administrador
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
        \Log::info('Accediendo al dashboard del administrador');
        // Obtiene estadísticas para el dashboard
        $pendingProjectsCount = Project::where('status', 'En evaluación')->count();
        $approvedProjectsCount = Project::where('status', 'Aprobado')->count();
        $rejectedProjectsCount = Project::where('status', 'Rechazado')->count();
        $allProjectsCount = Project::count();
        $allStagesCount = Stage::count(); // Obtiene el conteo total de stages

        // Retorna la vista "admin.dashboard" con las estadísticas
        return view('admin.dashboard', compact(
            'pendingProjectsCount',
            'approvedProjectsCount',
            'rejectedProjectsCount',
            'allProjectsCount',
            'allStagesCount'
        ));
    }

    /**
     * (Opcional) Muestra el detalle de un proyecto específico.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $project = Project::with(['user', 'documents', 'stages'])->findOrFail($id);
        return view('admin.projects.show', compact('project'));
    }
}