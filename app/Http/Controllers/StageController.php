<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Project;
use App\Models\Document;
use Illuminate\Http\Request;

class StageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Aplicar el middleware 'auth' a todos los métodos
    }

    public function create(Project $project)
    {
        return view('stages.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // ... otras reglas de validación
        ]);

        $stage = $project->stages()->create([
            'name' => $request->name,
            // ... otros campos del formulario
        ]);

        return redirect()->route('projects.show', $project);
    }

    public function show(Stage $stage)
    {
        return view('stages.show', compact('stage'));
    }

    public function edit(Stage $stage)
    {
        return view('stages.edit', compact('stage'));
    }

    public function update(Request $request, Stage $stage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // ... otras reglas de validación
        ]);

        $stage->update([
            'name' => $request->name,
            // ... otros campos del formulario
        ]);

        return redirect()->route('projects.show', $stage->project);
    }

    public function destroy(Stage $stage)
    {
        $stage->delete();
        return redirect()->route('projects.show', $stage->project);
    }

    public function download(Document $document)
    {
        $path = storage_path('app/public/' . $document->path);

        return response()->download($path, $document->name);
    }
}