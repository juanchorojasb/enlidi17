<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class DocumentController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Lista los documentos:
     * - Si el usuario es "admin", ve todos.
     * - Si es "user", ve solo los de sus proyectos.
     */
    public function index(Request $request)
    {
        \Log::info('Accediendo a la función index del DocumentController');
        if ($request->user()->hasRole('admin')) {
            // Admin ve todos los documentos
            $documents = Document::with('project')->get();
            return view('admin.documents.index', compact('documents'));
        } else {
            // Usuario normal: documentos de sus proyectos
            $documents = Document::whereHas('project', function ($query) {
                $query->where('user_id', Auth::id());
            })->with('project')->get();
            return view('user.documents.index', compact('documents'));
        }
    }

    /**
     * Muestra el formulario para subir un nuevo documento.
     * - Usa la vista para usuarios normales.
     */
    public function create()
    {
        \Log::info('Accediendo a la función index del DocumentController');
        $projects = Auth::user()->projects; // Obtiene solo los proyectos del usuario.
        return view('user.documents.create', compact('projects'));
    }

    /**
     * Procesa la creación de un documento (subida de archivo).
     */
    public function store(Request $request)
    {
        
        \Log::info('Inicio del método store en DocumentController - Datos recibidos:', $request->all());

        $request->validate([
            'name'       => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'file'       => 'required|file|max:51200', // 50MB
        ]);

        // Verificar que el usuario tenga permiso de subir a ese proyecto
        $project = Project::findOrFail($request->project_id);

        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para agregar documentos a este proyecto.');
        }

        // Subir el archivo a /storage/app/public/documents
        $path = $request->file('file')->store('documents', 'public');
        \Log::info('Archivo subido correctamente en: ' . $path);

        // Crear el registro asociado al proyecto a través de la relación
        $document = $project->documents()->create([
            'name'       => $request->input('name'),
            'file_path'  => $path,
            'mime_type'  => $request->file('file')->getClientMimeType(),
            'size'       => $request->file('file')->getSize(),
        ]);

        \Log::info('Documento creado:', $document->toArray());

        return redirect()
            ->route('user.documents.index')
            ->with('success', 'Documento subido correctamente.');
    }

    /**
     * Muestra un documento tras verificar permisos.
     * 
     * Modificado para servir el archivo directamente.
     */
    public function show(Document $document)
    {
        // Verificar si el usuario es dueño del proyecto o es admin
        if (Auth::id() !== $document->project->user_id && !Auth::user()->hasRole('admin')) {
            abort(403, 'No tienes permiso para ver este documento.');
        }

        $filePath = storage_path('app/public/' . $document->file_path);
    
        if (!file_exists($filePath)) {
            \Log::error('Archivo no encontrado: ' . $filePath);
            abort(404, 'Archivo no encontrado.');
        }

        // Intentar abrir el archivo
        try {
            return response()->file($filePath, [
                'Content-Type' => $document->mime_type,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al abrir el archivo: ' . $e->getMessage());
            abort(500, 'Error al procesar el archivo.');
        }
    }

    /**
     * Formulario para editar un documento (cambiar nombre, proyecto, o archivo).
     */
    public function edit(Document $document)
    {
        \Log::info('Accediendo a la función index del DocumentController');
        // Verifica si el usuario es dueño o admin
        if (!Auth::user()->hasRole('admin') && $document->project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este documento.');
        }

        // Obtener proyectos según rol
        $projects = Auth::user()->hasRole('admin') ? Project::all() : Auth::user()->projects;

        return view('user.documents.edit', compact('document', 'projects'));
    }

    /**
     * Actualiza los datos de un documento (y opcionalmente su archivo).
     */
    public function update(Request $request, Document $document)
    {
        \Log::info('Accediendo a la función index del DocumentController');
        // Verifica permiso
        if (!Auth::user()->hasRole('admin') && $document->project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar este documento.');
        }

        // Validar datos
        $request->validate([
            'name'       => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'file_path'  => 'nullable|file|max:51200', // 50MB
        ]);

        // Verificar proyecto
        $project = Project::findOrFail($request->project_id);
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para asignar el documento a este proyecto.');
        }

        // Si hay archivo nuevo, se sube y se elimina el anterior
        if ($request->hasFile('file_path')) {
            // Elimina el archivo anterior
            Storage::disk('public')->delete($document->file_path);

            // Sube el nuevo
            $path = $request->file('file_path')->store('documents', 'public');

            $document->file_path  = $path;
            $document->mime_type = $request->file('file_path')->getClientMimeType();
            $document->size      = $request->file('file_path')->getSize();
        }

        // Actualiza los demás campos
        $document->name       = $request->input('name');
        $document->project_id = $project->id;
        $document->save();

        return redirect()
            ->route('user.documents.index')
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
        Storage::disk('public')->delete($document->file_path);

        // Elimina el registro
        $document->delete();

        return redirect()
            ->route('user.documents.index')
            ->with('success', 'Documento eliminado correctamente.');
    }

    // Si necesitas agregar más métodos al controlador, puedes hacerlo aquí.
}