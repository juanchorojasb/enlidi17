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

    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            $documents = Document::with('project')->get();
            return view('admin.documents.index', compact('documents'));
        } else {
            $documents = Document::whereHas('project', function ($query) {
                $query->where('user_id', Auth::id());
            })->with('project')->get();
            return view('user.documents.index', compact('documents'));
        }
    }

    public function create()
    {
        $projects = Auth::user()->projects;
        return view('user.documents.create', compact('projects'));
    }

    public function store(Request $request)
    {
        \Log::info('Inicio del método store en DocumentController - Datos recibidos:', $request->all());

        $request->validate([
            'name'       => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'file'       => 'required|file|max:51200', // 50MB
        ]);

        $project = Project::findOrFail($request->project_id);

        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para agregar documentos a este proyecto.');
        }

        $path = $request->file('file')->store('documents', 'public');
        \Log::info('Archivo subido correctamente en: ' . $path);

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

    public function show(Document $document)
    {
        \Log::info('Intentando mostrar documento:', ['id' => $document->id, 'file_path' => $document->file_path]);
    
        // Verificar si el usuario es dueño del proyecto o es admin
        if (Auth::id() !== $document->project->user_id && !Auth::user()->hasRole('admin')) {
            \Log::warning('Intento de acceso no autorizado al documento', ['user_id' => Auth::id(), 'document_id' => $document->id]);
            abort(403, 'No tienes permiso para ver este documento.');
        }
    
        $filePath = storage_path('app/public/' . $document->file_path);
        \Log::info('Ruta completa del archivo a mostrar:', ['filePath' => $filePath]);
    
        if (!file_exists($filePath)) {
            \Log::error('Archivo no encontrado en la ruta especificada.', ['filePath' => $filePath]);
            abort(404, 'El archivo no se encuentra en el servidor.');
        }
    
        // Devolver el archivo como una respuesta
        try {
            return response()->file($filePath, [
                'Content-Type' => $document->mime_type,
            ]);
        } catch (\Exception $e) {
            \Log::error('Error al abrir el archivo: ' . $e->getMessage());
            abort(500, 'Error al procesar el archivo.');
        }
    }

    public function edit(Document $document)
    {
        // Verifica si el usuario es dueño o admin
        if (!Auth::user()->hasRole('admin') && $document->project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este documento.');
        }

        $projects = Auth::user()->hasRole('admin') ? Project::all() : Auth::user()->projects;

        return view('user.documents.edit', compact('document', 'projects'));
    }

    public function update(Request $request, Document $document)
    {
        // Verifica permiso
        if (!Auth::user()->hasRole('admin') && $document->project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar este documento.');
        }

        $request->validate([
            'name'       => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'file'       => 'nullable|file|max:51200', // 50MB, cambiado a 'file'
        ]);

        $project = Project::findOrFail($request->project_id);
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para asignar el documento a este proyecto.');
        }

        // Si hay archivo nuevo, se sube y se elimina el anterior
        if ($request->hasFile('file')) { // Cambiado a 'file'
            // Elimina el archivo anterior
            Storage::disk('public')->delete($document->file_path);

            // Sube el nuevo
            $path = $request->file('file')->store('documents', 'public'); // Usar 'file'

            $document->file_path  = $path;
            $document->mime_type = $request->file('file')->getClientMimeType(); // Usar 'file'
            $document->size      = $request->file('file')->getSize(); // Usar 'file'
        }

        // Actualiza los demás campos
        $document->name       = $request->input('name');
        $document->project_id = $project->id;
        $document->save();

        return redirect()
            ->route('user.documents.index')
            ->with('success', 'Documento actualizado correctamente.');
    }

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
}