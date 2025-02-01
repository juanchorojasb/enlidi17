<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
    
        // Filtro por estado para administradores
        $status = $request->input('status');
    
        if ($user->hasRole('admin')) {
            $query = Project::query();
            if ($status) {
                $query->where('status', $status);
            }
            $projects = $query->paginate(10);
            $view = 'admin.projects.index'; // Vista para administradores
            $title = "Proyectos"; // Define el título para la vista de administrador
        } else {
            $projects = $user->projects()->paginate(10);
            $view = 'user.projects.index'; // Vista para usuarios
            $title = "Tus Proyectos"; // Define el título para la vista de usuario
        }
    
        return view($view, compact('projects', 'title')); // Pasa la variable $title a la vista
    }

    public function create()
    {
        \Log::info('Accediendo a la función create del ProjectController');
        return view('user.projects.create');
    }

    public function store(Request $request)
{
    \Log::info('Inicio del método store - Datos recibidos:', $request->all());

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'client_name' => 'required|string|max:255',
        'nit' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'department' => 'required|string|max:255',
        'country' => 'required|string|max:255',
        'installation_address' => 'required|string|max:255',
        'project_description' => 'required|string',
        'project_value' => 'required|numeric',
        'start_date' => 'required|date',
        'rut' => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
        'chamber_of_commerce' => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
        'financial_statements' => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
        'legal_representative_id' => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
        'credit_request' => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
        'project_information' => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
        'approval_query' => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
    ]);

    \Log::info('Datos validados:', $validatedData);

    try {
        // Crea el proyecto con el estado inicial "En evaluación"
        $project = auth()->user()->projects()->create([
            'name' => $validatedData['name'],
            'client_name' => $validatedData['client_name'],
            'nit' => $validatedData['nit'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'city' => $validatedData['city'],
            'department' => $validatedData['department'],
            'country' => $validatedData['country'],
            'installation_address' => $validatedData['installation_address'],
            'project_description' => $validatedData['project_description'],
            'project_value' => $validatedData['project_value'],
            'start_date' => $validatedData['start_date'],
            'status' => 'En evaluación',
        ]);

        \Log::info('Proyecto creado:', $project->toArray());

        // Crea las dos etapas del proyecto
        $project->stages()->createMany([
            ['name' => 'Etapa 1: Aprobación', 'status' => 'En revisión', 'tipo' => 'usuario'],
            ['name' => 'Etapa 2: Financiación', 'status' => 'Pendiente', 'tipo' => 'usuario'],
        ]);

        \Log::info('Etapas creadas para el proyecto: ' . $project->id);

        // Subir y asociar documentos
        $documentFields = [
            'rut', 'chamber_of_commerce', 'financial_statements',
            'legal_representative_id', 'credit_request',
            'project_information', 'approval_query'
        ];

        foreach ($documentFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $path = $file->store('documents', 'public');
                \Log::info('Archivo subido:', ['field' => $field, 'path' => $path]);

                // Obtener la extensión del archivo
                $extension = $file->getClientOriginalExtension();

                // Limpiar el nombre del archivo para la base de datos
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $originalName = preg_replace('/[^a-zA-Z0-9\s]/', '', $originalName);
                $originalName = Str::limit($originalName, 100, ''); // Limitar a 100 caracteres

                // Añadir la extensión al nombre del archivo que se guardará en la base de datos
                $nameForDatabase = $originalName . '.' . $extension;

                $document = new Document([
                    'file_path' => $path,
                    'name' => $nameForDatabase, // Usar el nombre original del archivo
                    'mime_type' => $file->getMimeType(),
                    'size' => $file->getSize(),
                ]);

                $project->documents()->save($document);
                \Log::info('Documento creado y asociado:', ['project_id' => $project->id, 'document' => $document->toArray()]);
            }
        }

        // Redirigir a la vista de detalles del proyecto
        return redirect()->route('user.projects.show', $project->id)
            ->with('success', 'Proyecto creado exitosamente.');

    } catch (\Exception $e) {
        \Log::error('Error al crear el proyecto: ' . $e->getMessage());
        return redirect()->back()->withInput()->with('error', 'Error al crear el proyecto: ' . $e->getMessage());
    }
}
    
    // ... (resto del controlador: show, edit, update, destroy, approve, reject) ...

    public function show(Project $project)
    {
        // Permitir que los administradores vean cualquier proyecto
        if (Auth::user()->hasRole('admin')) {
            $project->load(['stages', 'documents']); // Carga las relaciones necesarias
            return view('admin.projects.show', compact('project'), ['title' => 'Detalles del Proyecto']);
        }
    
        // Para usuarios normales, verificar que el proyecto les pertenezca
        if ($project->user_id == Auth::user()->id) {
            return view('user.projects.show', compact('project'));
        }
    
        abort(403, 'No tienes permiso para ver este proyecto.');
    }
    public function edit(Project $project)
    {
        // Asegúrate de que el usuario autenticado puede editar este proyecto
        if (Auth::user()->id !== $project->user_id) {
            abort(403, 'No tienes permiso para editar este proyecto.');
        }

        // Retornar la vista para editar proyectos (para usuarios normales)
        return view('user.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        // Asegúrate de que el usuario autenticado puede actualizar este proyecto
        if (Auth::user()->id !== $project->user_id) {
            abort(403, 'No tienes permiso para actualizar este proyecto.');
        }
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'client_name' => 'required|string|max:255',
            'nit' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'project_description' => 'required|string',
            'project_value' => 'required|numeric',
            'start_date' => 'required|date',
            'rut' => 'nullable|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'chamber_of_commerce' => 'nullable|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'financial_statements' => 'nullable|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'legal_representative_id' => 'nullable|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'credit_request' => 'nullable|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'project_information' => 'nullable|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'approval_query' => 'nullable|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            // ... otras reglas de validación para los campos del formulario
        ]);

        // Guarda los archivos y obtén las rutas
        $rutPath = $request->file('rut') ? $request->file('rut')->store('documents', 'public') : $project->rut_path;
        $chamberOfCommercePath = $request->file('chamber_of_commerce') ? $request->file('chamber_of_commerce')->store('documents', 'public') : $project->chamber_of_commerce_path;
        $financialStatementsPath = $request->file('financial_statements') ? $request->file('financial_statements')->store('documents', 'public') : $project->financial_statements_path;
        $legalRepresentativeIdPath = $request->file('legal_representative_id') ? $request->file('legal_representative_id')->store('documents', 'public') : $project->legal_representative_id_path;
        $creditRequestPath = $request->file('credit_request') ? $request->file('credit_request')->store('documents', 'public') : $project->credit_request_path;
        $projectInformationPath = $request->file('project_information') ? $request->file('project_information')->store('documents', 'public') : $project->project_information_path;
        $approvalQueryPath = $request->file('approval_query') ? $request->file('approval_query')->store('documents', 'public') : $project->approval_query_path;

        $project->update([
            'name' => $validatedData['name'], // Incluir el campo 'name'
            'client_name' => $validatedData['client_name'],
            'nit' => $validatedData['nit'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'city' => $validatedData['city'],
            'address' => $validatedData['address'],
            'project_description' => $validatedData['project_description'],
            'project_value' => $validatedData['project_value'],
            'start_date' => $validatedData['start_date'],
            'rut_path' => $rutPath,
            'chamber_of_commerce_path' => $chamberOfCommercePath,
            'financial_statements_path' => $financialStatementsPath,
            'legal_representative_id_path' => $legalRepresentativeIdPath,
            'credit_request_path' => $creditRequestPath,
            'project_information_path' => $projectInformationPath,
            'approval_query_path' => $approvalQueryPath,
        ]);

        return redirect()->route('projects.show', $project)->with('success', 'Proyecto actualizado correctamente.');
    }

    public function destroy(Project $project)
    {
        // Asegúrate de que el usuario autenticado puede eliminar este proyecto
        if (Auth::user()->id !== $project->user_id) {
            abort(403, 'No tienes permiso para eliminar este proyecto.');
        }
    
        // Eliminar los documentos asociados al proyecto a través de la relación
        foreach ($project->documents as $document) {
            Storage::disk('public')->delete($document->file_path);
            $document->delete();
        }
    
        // Eliminar las etapas asociadas al proyecto
        $project->stages()->delete();
    
        // Finalmente, eliminar el proyecto
        $project->delete();
    
        return redirect()->route('user.projects.index')->with('success', 'Proyecto eliminado correctamente.');
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

        // Si estamos en la Etapa 1, aprobar el proyecto también
        if ($currentStage->name === 'Etapa 1: Aprobación') {
            $project->update(['status' => 'Aprobado']);
            // Activar la Etapa 2
            $nextStage = $project->stages()->where('name', 'Etapa 2: Financiación')->first();
            if ($nextStage) {
                $nextStage->update(['status' => 'En revisión']);
            }
        }

        // Si estamos en la Etapa 2, actualizar el estado del proyecto a 'Financiado'
        if ($currentStage->name === 'Etapa 2: Financiación') {
            $project->update(['status' => 'Financiado']);
        }

        // Independientemente de la etapa, actualizamos el estado de la etapa actual a 'Aprobado'
        $currentStage->update(['status' => 'Aprobada']);

        return redirect()->route('admin.projects.show', $project)->with('success', 'Etapa aprobada correctamente.');
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

        return redirect()->route('admin.projects.show', $project)->with('success', 'Etapa rechazada.');
    }

    // Si necesitas agregar más métodos al controlador, puedes hacerlo aquí.

} // Fin de la clase ProjectController