<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function guardar(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required',
        ]);

        Contacto::create($request->only(['nombre', 'email', 'mensaje']));

        return back()->with('success', 'Mensaje enviado correctamente.');
    }

    public function verMensajes()
    {
        $contactos = Contacto::all();
        return view('ver-contactos', compact('contactos'));
    }
}
