<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Obtén el usuario autenticado
        $user = Auth::user();

        // Si el usuario es un administrador, obtén todos los proyectos.
        // De lo contrario, obtén solo los proyectos del usuario.
        if ($user->hasRole('admin')) {
            $projects = Project::paginate(10);
        } else {
            $projects = $user->projects()->paginate(10);
        }

        return view('user.projects.index', compact('projects'));
    }

    public function create()
    {
        // La vista correcta ahora está en 'user.projects.create'
        return view('user.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_name'          => 'required|string|max:255',
            'city'                 => 'required|string|max:255',
            'department'           => 'required|string|max:255',
            'country'              => 'required|string|max:255',
            'installation_address' => 'required|string|max:255',
            'rut'                  => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'chamber_of_commerce'   => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'financial_statements'  => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'legal_representative_id' => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'credit_request'        => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'project_information'   => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'approval_query'       => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            // ... otras reglas de validación para los campos del formulario
        ]);

        // Guarda los archivos y obtén las rutas
        $rutPath = $request->file('rut')->store('documents', 'public');
        $chamberOfCommercePath = $request->file('chamber_of_commerce')->store('documents', 'public');
        $financialStatementsPath = $request->file('financial_statements')->store('documents', 'public');
        $legalRepresentativeIdPath = $request->file('legal_representative_id')->store('documents', 'public');
        $creditRequestPath = $request->file('credit_request')->store('documents', 'public');
        $projectInformationPath = $request->file('project_information')->store('documents', 'public');
        $approvalQueryPath = $request->file('approval_query')->store('documents', 'public');

        // Crea el proyecto con el estado inicial "En evaluación"
        $project = auth()->user()->projects()->create([
            'client_name'          => $request->client_name,
            'city'                 => $request->city,
            'department'           => $request->department,
            'country'              => $request->country,
            'installation_address' => $request->installation_address,
            'rut_path'             => $rutPath,
            'chamber_of_commerce_path' => $chamberOfCommercePath,
            'financial_statements_path' => $financialStatementsPath,
            'legal_representative_id_path' => $legalRepresentativeIdPath,
            'credit_request_path'    => $creditRequestPath,
            'project_information_path' => $projectInformationPath,
            'approval_query_path'   => $approvalQueryPath,
            'status'               => 'En evaluación',
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
        // Asegúrate de que el usuario autenticado puede ver este proyecto
        if (Auth::user()->id !== $project->user_id && !Auth::user()->hasRole('admin')) {
            abort(403, 'No tienes permiso para ver este proyecto.');
        }

        return view('user.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        // Asegúrate de que el usuario autenticado puede editar este proyecto
        if (Auth::user()->id !== $project->user_id) {
            abort(403, 'No tienes permiso para editar este proyecto.');
        }

        return view('user.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        // Asegúrate de que el usuario autenticado puede actualizar este proyecto
        if (Auth::user()->id !== $project->user_id) {
            abort(403, 'No tienes permiso para actualizar este proyecto.');
        }

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
        // Asegúrate de que el usuario autenticado puede eliminar este proyecto
        if (Auth::user()->id !== $project->user_id) {
            abort(403, 'No tienes permiso para eliminar este proyecto.');
        }

        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Proyecto eliminado correctamente.');
    }

    public function approve(Project $project)
    {
        // Solo los administradores pueden aprobar
        if (!auth()->user()->hasRole('admin')) {
            abort(403);
        }

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
        // Solo los administradores pueden rechazar
        if (!auth()->user()->hasRole('admin')) {
            abort(403);
        }

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

    // ... otros métodos si los hubiera
}