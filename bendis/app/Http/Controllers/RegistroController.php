<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class RegistroController extends Controller
{
    public function mostrarFormulario() {
    return view('registro');
}

    public function registrar(Request $request)
    {
        // Crear el nuevo usuario con la contraseña encriptada
        $usuario = new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password); // Encriptar la contraseña

        // Guardar el usuario
        $usuario->save();

        // Iniciar sesión automáticamente después de registrarse
        session(['usuario' => $usuario]);

        // Redirigir a la página de inicio con un mensaje de éxito
        return redirect()->route('index')->with('success', 'Registro exitoso. ¡Bienvenido!');
    }
}
