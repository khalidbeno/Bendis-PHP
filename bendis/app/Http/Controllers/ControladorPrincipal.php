<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorPrincipal extends Controller
{
    // Página de inicio
    public function index()
    {
        // Verificamos si hay un usuario en sesión
        if(session()->has('usuario')) {
            // Si hay un usuario en sesión, pasamos el correo del usuario a la vista
            return view('index', ['usuario' => session('usuario')]);
        }

        // Si no hay usuario en sesión, mostramos la vista con las opciones de login y registro
        return view('index');
    }
}
