<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Project;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Stage $stage)
    {
        // Verificar si el usuario actual es un administrador
        if (Auth::user()->hasRole('admin')) {
            // Si es un administrador, cargar la vista de administrador para la etapa
            $documents = $stage->documents;
            return view('admin.stages.show', compact('stage', 'documents'));
        } else {
            // Si no es un administrador, verificar si el usuario actual tiene permiso para ver esta etapa
            // Esto se puede hacer comprobando si el proyecto asociado a la etapa pertenece al usuario actual
            if ($stage->project->user_id == Auth::user()->id) {
                $documents = $stage->documents;
                return view('user.stages.show', compact('stage', 'documents'));
            } else {
                // Si el usuario no tiene permiso, abortar con un error 403 (No autorizado)
                abort(403, 'No tienes permiso para ver esta etapa.');
            }
        }
    }
}