<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:crear proyectos')->only(['create', 'store']);
        $this->middleware('permission:editar proyectos')->only(['edit', 'update']);
        $this->middleware('permission:ver proyectos')->only(['show']);
        $this->middleware('permission:aprobar proyectos')->only(['approve']);
        $this->middleware('permission:rechazar proyectos')->only(['reject']);
        // ... otros permisos
    }

    public function index()
    {
        $projects = auth()->user()->projects()->paginate(10);
        return view('projects.index', compact('projects')); 
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // ... otras reglas de validación para los campos del formulario
        ]);

        // Crea el proyecto con el estado inicial "En evaluación"
        $project = auth()->user()->projects()->create([
            'name' => $request->name,
            'status' => 'En evaluación', 
            // ... otros campos del formulario
        ]);

        // Crea las dos etapas del proyecto
        $project->stages()->createMany([
            ['name' => 'Etapa 1: Aprobación', 'status' => 'En revisión'],
            ['name' => 'Etapa 2: Financiación', 'status' => 'Pendiente'], 
        ]);

        return redirect()->route('projects.show', $project)->with('success', 'Proyecto creado correctamente.');
    }

    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // ... otras reglas de validación
        ]);

        $project->update([
            'name' => $request->name,
            // ... otros campos del formulario
        ]);

        return redirect()->route('projects.show', $project)->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Proyecto eliminado correctamente.');
    }

    public function approve(Project $project)
    {
        $currentStage = $project->stages()->where('status', 'En revisión')->first();

        if (!$currentStage) {
            return redirect()->back()->with('error', 'Este proyecto no tiene etapas en revisión.');
        }

        $currentStage->update(['status' => 'Aprobada']);

        if ($currentStage->name === 'Etapa 1: Aprobación') {
            $project->update(['status' => 'Aprobado']); 
            // Opcional: activar la siguiente etapa
            $project->stages()->where('name', 'Etapa 2: Financiación')->first()->update(['status' => 'En revisión']);
        }

        if ($currentStage->name === 'Etapa 2: Financiación') {
            $project->update(['status' => 'Financiado']);
        }

        // Enviar notificaciones (opcional)
        // ...

        return redirect()->route('projects.show', $project)->with('success', 'Etapa aprobada correctamente.');
    }

    public function reject(Project $project)
    {
        $currentStage = $project->stages()->where('status', 'En revisión')->first();

        if (!$currentStage) {
            return redirect()->back()->with('error', 'Este proyecto no tiene etapas en revisión.');
        }

        $currentStage->update(['status' => 'Rechazada']);

        $project->update(['status' => 'Rechazado']);

        // Enviar notificaciones (opcional)
        // ...

        return redirect()->route('projects.show', $project)->with('success', 'Etapa rechazada.');
    }

    // ... otros métodos
}