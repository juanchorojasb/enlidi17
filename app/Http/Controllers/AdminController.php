<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class AdminController extends Controller
{
    public function __construct()
    {
        // Si tienes middlewares para admin, colócalos aquí
        // $this->middleware('auth');
        // $this->middleware('role:admin');
    }

    /**
     * Muestra el dashboard de administrador con la lista de proyectos.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        // Obtiene todos los proyectos.
        // Si quieres cargar relaciones (p. ej. documentos, stages, user), puedes usar with:
        // $projects = Project::with(['user', 'documents', 'stages'])->get();
        $projects = Project::all();

        // Retorna la vista "admin.dashboard" con la lista de proyectos
        return view('admin.dashboard', compact('projects'));
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
