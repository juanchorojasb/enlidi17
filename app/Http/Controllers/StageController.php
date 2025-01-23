<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Lista todas las etapas.
     * - Si es admin, ve todas las etapas.
     * - Si es user, ve solo las etapas de sus proyectos.
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            // Admin: ver todas las etapas
            $stages = Stage::with('project')->get();
            return view('admin.stages.index', compact('stages'));
        } else {
            // Usuario: ver solo etapas de sus proyectos
            $stages = Stage::whereHas('project', function ($q) {
                $q->where('user_id', Auth::id());
            })->with('project')->get();
            return view('user.stages.index', compact('stages')); // Corregido a 'user.stages.index'
        }
    }

    /**
     * Muestra el formulario para crear una nueva etapa.
     * - Solo para usuarios.
     */
    public function create()
    {
        // Proyectos que pertenecen al user
        $projects = Project::where('user_id', Auth::id())->get();
        // Vista de creación para user
        return view('user.stages.create', compact('projects')); // Corregido a 'user.stages.create'
    }

    /**
     * Guarda la nueva etapa en la BD.
     * - Solo para usuarios.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name'       => 'required|string|max:255',
            'status'     => 'required|string|max:50',
        ]);

        $project = Project::findOrFail($request->input('project_id'));

        // Verificar permisos: User solo si es dueño del proyecto
        if ($project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para añadir etapas a este proyecto.');
        }

        $stage = new Stage();
        $stage->project_id = $project->id;
        $stage->name = $request->input('name');
        $stage->status = $request->input('status');
        $stage->tipo = 'usuario'; // Siempre 'usuario' ya que solo los usuarios crean stages
        $stage->save();

        return redirect()->route('projects.show', $project->id)->with('success', 'Etapa creada exitosamente.');
    }

    /**
     * Muestra el detalle de una etapa.
     *
     * @param int $projectId
     * @param int $stageId
     * @return \Illuminate\View\View
     */
    public function show($projectId, $stageId)
    {
        $project = Project::findOrFail($projectId);
        $stage = Stage::findOrFail($stageId);

        // Verificar permisos:
        // - Admin puede ver cualquier etapa
        // - User solo si es dueño del proyecto
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver esta etapa.');
        }

        $documents = $stage->documents;

        if (Auth::user()->hasRole('admin')) {
            return view('admin.stages.show', compact('stage', 'documents', 'project'));
        } else {
            return view('user.stages.show', compact('stage', 'documents', 'project')); // Corregido a 'user.stages.show'
        }
    }

    /**
     * Muestra el formulario para editar una etapa existente.
     *
     * @param int $projectId
     * @param int $stageId
     * @return \Illuminate\View\View
     */
    public function edit($projectId, $stageId)
    {
        $project = Project::findOrFail($projectId);
        $stage = Stage::findOrFail($stageId);

        // Solo los usuarios pueden editar stages
        if ($project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta etapa.');
        }

        return view('user.stages.edit', compact('stage', 'project')); // Corregido a 'user.stages.edit'
    }

    /**
     * Actualiza la etapa en la base de datos.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $projectId
     * @param int $stageId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $projectId, $stageId)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $project = Project::findOrFail($projectId);
        $stage = Stage::findOrFail($stageId);

        // Solo los usuarios pueden actualizar stages
        if ($project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar esta etapa.');
        }

        $stage->name = $request->input('name');
        $stage->status = $request->input('status');
        $stage->save();

        return redirect()->route('projects.show', $project->id)->with('success', 'Etapa actualizada exitosamente.');
    }

    /**
     * Elimina una etapa.
     *
     * @param int $projectId
     * @param int $stageId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($projectId, $stageId)
    {
        $project = Project::findOrFail($projectId);
        $stage = Stage::findOrFail($stageId);

        // Verificar permisos:
        // - Admin puede eliminar cualquier etapa
        // - User solo si es dueño del proyecto
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar esta etapa.');
        }

        $stage->delete();

        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.stages.index')->with('success', 'Etapa eliminada correctamente.');
        }else{
            return redirect()->route('projects.show', $project->id)->with('success', 'Etapa eliminada exitosamente.');
        }

    }
}