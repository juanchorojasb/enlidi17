<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function __construct()
    {
        // Todas las acciones requieren usuario autenticado
        $this->middleware('auth');
    }

    /**
     * Lista los documentos:
     * - Si el usuario es "admin", ve todos.
     * - Si es "user", ve solo los de sus proyectos.
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            // Admin ve todos los documentos
            $documents = Document::with('project')->get();
        } else {
            // Usuario normal: documentos de sus proyectos
            $documents = Document::whereHas('project', function ($query) {
                $query->where('user_id', Auth::id());
            })->with('project')->get();
        }

        return view('documents.index', compact('documents'));
    }

    /**
     * Muestra el formulario para subir un nuevo documento.
     * - Admin ve todos los proyectos.
     * - Usuario normal ve solo sus proyectos.
     */
    public function create()
    {
        if (Auth::user()->hasRole('admin')) {
            $projects = Project::all();
        } else {
            $projects = Auth::user()->projects; // Suponiendo que en User tienes ->hasMany(Project)
        }

        return view('documents.create', compact('projects'));
    }

    /**
     * Procesa la creación de un documento (subida de archivo).
     */
    public function store(Request $request)
    {
        // Validaciones mínimas (ajusta según tus necesidades)
        $request->validate([
            'name'       => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'file'       => 'required|file|max:51200', // 50MB p.ej
        ]);

        // Verificar que el usuario tenga permiso de subir a ese proyecto
        $project = Project::findOrFail($request->project_id);

        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para agregar documentos a este proyecto.');
        }

        // Subir el archivo a /storage/app/public/documents
        // Retorna la ruta relativa (p.ej: "documents/abc123.pdf")
        $path = $request->file('file')->store('documents', 'public');

        // Crear el registro
        $document = Document::create([
            'name'       => $request->input('name'),
            'project_id' => $project->id,
            'path'       => $path,
            'mime_type'  => $request->file('file')->getClientMimeType(),
            'size'       => $request->file('file')->getSize(),
        ]);

        return redirect()
            ->route('documents.show', $document->id)
            ->with('success', 'Documento subido correctamente.');
    }

    /**
     * Muestra un documento tras verificar permisos.
     */
    public function show(Document $document)
    {
        // Verificar si el usuario es dueño del proyecto o es admin
        if (Auth::id() !== $document->project->user_id && !Auth::user()->hasRole('admin')) {
            abort(403, 'No tienes permiso para ver este documento.');
        }

        // Ruta física en /storage/app/public/...
        $path = storage_path('app/public/' . $document->path);

        if (!file_exists($path)) {
            abort(404, 'El documento no existe en el servidor.');
        }

        // Devolverlo inline (si es PDF u otro tipo) con las cabeceras adecuadas
        return response()->file($path, [
            'Content-Type'        => $document->mime_type,
            'Content-Disposition' => 'inline; filename="'.$document->name.'"',
        ]);
    }

    /**
     * Formulario para editar un documento (cambiar nombre, proyecto, o archivo).
     */
    public function edit(Document $document)
    {
        // Verifica si el usuario es dueño o admin
        if (!Auth::user()->hasRole('admin') && $document->project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este documento.');
        }

        // Obtener proyectos según rol
        if (Auth::user()->hasRole('admin')) {
            $projects = Project::all();
        } else {
            $projects = Auth::user()->projects;
        }

        return view('documents.edit', compact('document', 'projects'));
    }

    /**
     * Actualiza los datos de un documento (y opcionalmente su archivo).
     */
    public function update(Request $request, Document $document)
    {
        // Verifica permiso
        if (!Auth::user()->hasRole('admin') && $document->project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar este documento.');
        }

        // Validar datos
        $request->validate([
            'name'       => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'file'       => 'nullable|file|max:51200', // 50MB p.ej
        ]);

        // Verificar proyecto
        $project = Project::findOrFail($request->project_id);
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para asignar el documento a este proyecto.');
        }

        // Si hay archivo nuevo, se sube y se elimina el anterior
        if ($request->hasFile('file')) {
            // Elimina el archivo anterior
            Storage::disk('public')->delete($document->path);

            // Sube el nuevo
            $path = $request->file('file')->store('documents', 'public');

            $document->path      = $path;
            $document->mime_type = $request->file('file')->getClientMimeType();
            $document->size      = $request->file('file')->getSize();
        }

        // Actualiza los demás campos
        $document->name       = $request->input('name');
        $document->project_id = $project->id;
        $document->save();

        return redirect()
            ->route('documents.show', $document->id)
            ->with('success', 'Documento actualizado correctamente.');
    }

    /**
     * Elimina un documento (y su archivo físico).
     */
    public function destroy(Document $document)
    {
        // Verifica permiso
        if (!Auth::user()->hasRole('admin') && $document->project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar este documento.');
        }

        // Elimina el archivo del storage
        Storage::disk('public')->delete($document->path);

        // Elimina el registro
        $document->delete();

        return redirect()
            ->route('documents.index')
            ->with('success', 'Documento eliminado correctamente.');
    }
}
