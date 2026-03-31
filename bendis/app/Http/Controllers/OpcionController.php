<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OpcionController extends Controller
{
    // Método que maneja la opción seleccionada por el usuario (login o registro)
   public function elegirOpcion($opcion)
{
    if ($opcion == 'login') {
        return view('login');
    } elseif ($opcion == 'registro') {
        return view('registro');
    } elseif ($opcion == 'logout') {
        session()->forget('usuario');
        session()->flash('success', 'Has cerrado sesión correctamente.');
        return redirect()->route('index');
    } elseif ($opcion == 'producto1') {
        return view('producto1');
    } elseif ($opcion == 'producto2') {
        return view('producto2');
    } elseif ($opcion == 'producto3') {
        return view('producto3');
    } elseif ($opcion == 'producto4') {
        return view('producto4');
    } else {
        abort(404); // Si no reconoce la opción, muestra error 404
    }
}

}
