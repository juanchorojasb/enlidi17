<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Project;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class StageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * No se usa en la logica actual, pero se podria usar para
     * que el admin pueda ver todas las etapas
     */
    public function index(Request $request)
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
            return view('user.stages.index', compact('stages'));
        }
    }

    /**
     * Muestra el detalle de una etapa.
     * Si el usuario es admin, retorna la vista de admin.
     * Si es user y es dueño del proyecto, retorna la vista de user.
     * Caso contrario, lanza 403.
     */
    public function show(Project $project, Stage $stage)
    {
        \Log::info('Accediendo a user.stages.show', ['project_id' => $project->id, 'stage_id' => $stage->id]);
    
        // Verificar permisos:
        // - Admin puede ver cualquier etapa
        // - User solo si es dueño del proyecto
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver esta etapa.');
        }
        // Asegúrate de que la etapa pertenece al proyecto correcto.
        if ($stage->project_id !== $project->id) {
            abort(404, 'Etapa no encontrada o no disponible.');
        }
    
        if (Auth::user()->hasRole('admin')) {
            return view('admin.stages.show', compact('stage', 'project')); // Vista para administradores
        } else {
            return view('user.stages.show', compact('stage', 'project'));
        }
    }

    // public function create()
    // {
    //     //
    // }

    public function store(Request $request)
    {
        //
    }

    public function edit(Project $project, Stage $stage)
    {
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar esta etapa.');
        }
    
        if ($stage->project_id !== $project->id) {
            abort(404, 'Etapa no encontrada en este proyecto.');
        }
    
        return view('user.stages.edit', compact('stage', 'project'));
    }

    public function update(Request $request, Project $project, Stage $stage)
    {
        // Verifica si el usuario es un administrador o el dueño del proyecto
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar esta etapa.');
        }

        // Verifica que la etapa pertenezca al proyecto especificado
        if ($stage->project_id !== $project->id) {
            abort(404, 'La etapa no pertenece al proyecto especificado.');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:En revisión,Pendiente,Aprobada,Rechazada',
        ]);

        $stage->update($validatedData);

        return redirect()->route('user.projects.show', $project->id)
            ->with('success', 'Etapa actualizada correctamente.');
    }

    public function destroy(Project $project, Stage $stage)
    {
        // Verifica si el usuario es un administrador o el dueño del proyecto
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar esta etapa.');
        }
        if ($stage->project_id !== $project->id) {
            abort(404, 'La etapa no pertenece al proyecto especificado.');
        }

        $stage->delete();

        return redirect()->route('user.projects.show', $project->id)->with('success', 'Etapa eliminada correctamente.');
    }


    public function financiacionForm(Project $project, Stage $stage)
    {
        // Verificar si el usuario tiene permiso para acceder a este formulario
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para acceder a este formulario.');
        }

        // Verificar que la etapa sea la correcta
        if ($stage->name != 'Etapa 2: Financiación' || $stage->status != 'En revisión') {
            abort(404, 'Etapa no encontrada o no disponible.');
        }

        return view('user.stages.etapa2', compact('project', 'stage'));
    }

    public function financiacionUpdate(Request $request, Project $project, Stage $stage)
    {
        // Verificar permisos
        if (!Auth::user()->hasRole('admin') && $project->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar esta etapa.');
        }

        // Validar los datos del formulario
        $validatedData = $request->validate([
            'pagare' => 'nullable|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'desembolso' => 'nullable|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'recibo_cliente' => 'nullable|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'factura' => 'nullable|file|max:10240|mimes:pdf,doc,docx,xls,xlsx,zip,jpg,jpeg,png',
            'imagenes.*' => 'nullable|image|max:10240|mimes:jpg,jpeg,png',
        ]);

        // Guardar los archivos subidos y crear/actualizar los documentos
        $documentFields = [
            'pagare' => 'Anexo Pagaré',
            'desembolso' => 'Anexo Documento Desembolso Anticipo',
            'recibo_cliente' => 'Anexo Recibo a Satisfacción Cliente',
            'factura' => 'Cuenta de Cobro Final y Factura',
        ];

        foreach ($documentFields as $field => $name) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $path = $file->store('documents', 'public');

                $document = $project->documents()->firstOrNew(['name' => $name]);
                $document->fill([
                    'file_path' => $path,
                    'name' => $name, // Usar el nombre predefinido
                    'mime_type' => $file->getClientMimeType(),
                    'size' => $file->getSize(),
                ]);
                $document->save();

                \Log::info('Documento creado o actualizado y asociado:', ['project_id' => $project->id, 'document' => $document->toArray()]);
            }
        }

        // Procesar las imágenes
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $image) {
                $path = $image->store('project_images', 'public'); // Guardar en una carpeta diferente si es necesario

                $document = $project->documents()->firstOrNew(['name' => 'Imagen de Proyecto - ' . $image->getClientOriginalName()]);
                $document->fill([
                    'file_path' => $path,
                    'name' => 'Imagen de Proyecto - ' . $image->getClientOriginalName(),
                    'mime_type' => $image->getClientMimeType(),
                    'size' => $image->getSize(),
                ]);
                $document->save();

                \Log::info('Imagen de proyecto subida y asociada:', ['project_id' => $project->id, 'path' => $path]);
            }
        }

        // Actualizar el estado de la etapa y del proyecto si es necesario
        $stage->update(['status' => 'Aprobada']); // o el estado que corresponda
        $project->update(['status' => 'Financiado']); // o el estado que corresponda

        return redirect()->route('user.projects.show', $project->id)->with('success', 'Etapa de financiación actualizada correctamente.');
    }
}