<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project; // Importa el modelo Project

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        // El middleware 'auth' y 'role:admin' en la ruta ya se encargan de la verificación
        $projects = Project::all(); // Obtener todos los proyectos, por ejemplo
        return view('admin.dashboard', compact('projects'));
    }
}