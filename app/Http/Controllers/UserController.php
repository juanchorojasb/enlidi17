<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $projects = Auth::user()->projects; // Obtener los proyectos del usuario
        return view('user.dashboard', compact('projects'));
    }
}