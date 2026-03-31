<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario; // Modelo Usuario
use Illuminate\Support\Facades\Hash; // Usamos Hash para comparar contraseñas

class LoginController extends Controller
{
    public function mostrarFormulario() {
    return view('login');
    }

    // Método para procesar el login
    public function login(Request $request)
    {
        // Validar que los campos sean los correctos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Buscar el usuario en la base de datos
        $usuario = Usuario::where('email', $request->email)->first();

        // Verificar si el usuario existe
        if (!$usuario) {
            // Si no existe el usuario, redirigir con un mensaje de error
            return back()->with('error', 'Usuario no encontrado');
        }

        // Verificar si la contraseña es correcta
        if (Hash::check($request->password, $usuario->password)) {
            // Si la contraseña es correcta, iniciar sesión
            session(['usuario' => $usuario]); // Guardar nombre en sesión (por ejemplo)
            return redirect()->route('index'); // Redirigir a la página principal
        } else {
            // Si la contraseña no es correcta, redirigir con mensaje de error
            return back()->with('error', 'Contraseña incorrecta');
        }
    }
}
