<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; // Solo si usas productos en este controlador
use App\Models\Contacto;

class OtrosController extends Controller
{
    /**
     * Muestra todos los mensajes de contacto en la vista "otros".
     */
    public function verContactos()
    {
        $mensajes = Contacto::all();
        return view('otros', compact('mensajes'));
    }
}
