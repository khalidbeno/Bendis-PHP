<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function elegirGestion($opcion)
    {
        $vistas = [
            'gestion' => 'gestion',
            'otros' => 'otros',
        ];

        if (array_key_exists($opcion, $vistas)) {
            return view($vistas[$opcion]);
        }

        // Redirige con error si la opción no existe
        return redirect()->route('interfaz.admin')->withErrors('Opción de administración no válida.');
    }
}
