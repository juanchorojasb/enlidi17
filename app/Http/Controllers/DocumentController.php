<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Stage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Se eliminan los middlewares de permiso en el constructor
    }

    public function create(Stage $stage)
    {
        return view('documents.create', compact('stage'));
    }

    public function store(Request $request, Stage $stage)
    {
        // Validación del formulario, incluyendo la validación del archivo
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png', // Ejemplo: máximo 10MB, tipos permitidos
        ]);

        // Obtener el nombre original del archivo
        $originalFileName = $request->file('file')->getClientOriginalName();

        // Guardar el archivo usando el Storage de Laravel
        $path = $request->file('file')->storeAs(
            'documents/' . $stage->project->id . '/' . $stage->id,
            $originalFileName,
            'public'
        );

        // Crear el documento
        $document = $stage->documents()->create([
            'name' => $request->name,
            'path' => $path,
        ]);

        // Redireccionar a la vista de la etapa
        return redirect()->route('stages.show', $stage)->with('success', 'Documento subido correctamente.');
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // ... otras reglas de validación
        ]);

        $document->update([
            'name' => $request->name,
            // ... otros campos del formulario
        ]);

        return redirect()->route('stages.show', $document->stage)->with('success', 'Documento actualizado correctamente.');
    }

    public function destroy(Document $document)
    {
        // Eliminar el archivo del almacenamiento
        Storage::disk('public')->delete($document->path);

        // Eliminar el documento de la base de datos
        $document->delete();

        return redirect()->route('stages.show', $document->stage)->with('success', 'Documento eliminado correctamente.');
    }

    public function download(Document $document)
    {
        return Storage::disk('public')->download($document->path, $document->name);
    }
}