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
        // Asegura que solo usuarios autenticados puedan acceder
        $this->middleware('auth');
    }

    /**
     * Lista todas las etapas.
     * - Si es admin, ve todas las etapas.
     * - Si es user, ve solo sus etapas (proyectos cuyo user_id = Auth::id()).
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            // Admin: ver todas las etapas
            $stages = Stage::with('project')->get();
            // Retornamos (si existe) una vista de admin o la de user, según tu estructura
            // Por ejemplo, admin.stages.index (si la tienes). Aquí lo ejemplificamos:
            return view('admin.stages.index', compact('stages'));
        } else {
            // Usuario: ver solo etapas de sus proyectos
            $stages = Stage::whereHas('project', function($q) {
                $q->where('user_id', Auth::id());
            })->with('project')->get();

            // Vista de usuario
            return view('user.stages.index', compact('stages'));
        }
    }

    /**
     * Muestra el formulario para crear una nueva etapa.
     * - Si es admin, puede seleccionar cualquier proyecto (opcional).
     * - Si es user, solo proyectos suyos.
     */
    public function create()
    {
        if (Auth::user()->hasRole('admin')) {
            $projects = Project::all(); // todos los proyectos
        } else {
            // Proyectos que pertenecen al user
            $projects = Project::where('user_id', Auth::id())->get();
        }

        // Vista de creación para el user (puedes tener una distinta para admin si lo deseas)
        return view('user.stages.create', compact('projects'));
    }

    /**
     * Guarda la nueva etapa en la BD.
     * - Verifica que el usuario tenga permiso sobre el proyecto elegido.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'name'       => 'required|string|max:255',
            'status'     => 'required|string|max:50',
        ]);

        $project = Project::findOrFail($request->input('project_id'));

        // Verificar permisos:
        // - Admin puede asignar la etapa a cualquier proyecto
        // - User solo si es dueño del proyecto
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para añadir etapas a este proyecto.');
        }

        Stage::create([
            'project_id' => $project->id,
            'name'       => $request->input('name'),
            'status'     => $request->input('status'),
        ]);

        return redirect()
            ->route('stages.index')
            ->with('success', 'Etapa creada exitosamente.');
    }

    /**
     * Muestra el detalle de una etapa.
     * Si el usuario es admin => vista de admin.
     * Si es user y dueño del proyecto => vista de user.
     * Caso contrario => 403.
     */
    public function show(Stage $stage)
    {
        // Cargar los documentos asociados a la etapa (si en 'documents' hay un stage_id)
        // Esto solo aplica si en Document::class has ->belongsTo(Stage::class)
        // y la BD está preparada.
        $documents = $stage->documents; 

        // Admin puede ver cualquier etapa
        if (Auth::user()->hasRole('admin')) {
            return view('admin.stages.show', compact('stage', 'documents'));
        }

        // Usuario normal: debe ser dueño del proyecto de la etapa
        if ($stage->project && $stage->project->user_id === Auth::id()) {
            return view('user.stages.show', compact('stage', 'documents'));
        }

        // Si no cumple, error 403
        abort(403, 'No tienes permiso para ver esta etapa.');
    }

    /**
     * Muestra el formulario para editar la etapa.
     */
    public function edit(Stage $stage)
    {
        // Si es admin => puede editar la etapa
        if (Auth::user()->hasRole('admin')) {
            return view('user.stages.edit', compact('stage'));
            // Podrías crear una vista distinta "admin.stages.edit" si lo deseas.
        }

        // Si es user => debe ser dueño del proyecto
        if ($stage->project && $stage->project->user_id === Auth::id()) {
            return view('user.stages.edit', compact('stage'));
        }

        abort(403, 'No tienes permiso para editar esta etapa.');
    }

    /**
     * Actualiza la etapa en la base de datos.
     */
    public function update(Request $request, Stage $stage)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'status' => 'required|string|max:50',
            // project_id no se cambia si así lo definiste; 
            // de lo contrario, podrías permitirlo si eres admin.
        ]);

        // Verificar permisos
        if (Auth::user()->hasRole('admin')) {
            // Admin => OK
        } else {
            // Usuario => debe ser dueño del proyecto
            if (!$stage->project || $stage->project->user_id !== Auth::id()) {
                abort(403, 'No tienes permiso para editar esta etapa.');
            }
        }

        // Actualizar campos
        $stage->name = $request->input('name');
        $stage->status = $request->input('status');
        // Si no permites cambiar de proyecto, no toques project_id
        $stage->save();

        return redirect()
            ->route('stages.index')
            ->with('success', 'Etapa actualizada exitosamente.');
    }

    /**
     * Elimina una etapa.
     */
    public function destroy(Stage $stage)
    {
        // Permisos: admin o el dueño del proyecto
        if (Auth::user()->hasRole('admin')) {
            // OK
        } else {
            if (!$stage->project || $stage->project->user_id !== Auth::id()) {
                abort(403, 'No tienes permiso para eliminar esta etapa.');
            }
        }

        $stage->delete();

        return redirect()
            ->route('stages.index')
            ->with('success', 'Etapa eliminada correctamente.');
    }
}
