<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project; // Importar el modelo Project

class UserController extends Controller
{
    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function dashboard()
    {
        // El middleware 'auth' y 'role:user' en la ruta ya se encargan de la verificación

        // Obtener los proyectos del usuario autenticado y paginarlos
        $projects = Auth::user()->projects()->paginate(10);

        return view('user.dashboard', compact('projects'));
    }
}