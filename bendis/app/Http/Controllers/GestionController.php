<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class GestionController extends Controller
{
    // public function index()
    // {
    //     $productos = Producto::all();
    
    //     return view('gestion', compact('productos'));
    // }
// ---------------------------------------------------------
    public function guardar(Request $request)
    {
        if ($request->accion === 'añadir') {
            $request->validate([
                'id' => 'required',
                'nombre' => 'required',
                'descripcion' => 'nullable',
                'precio' => 'required|numeric',
                'stock' => 'required|integer|min:0',
            ]);

            Producto::create($request->only(['nombre', 'descripcion', 'precio', 'stock']));

            return back()->with('mensajeGuardar', 'Producto añadido');
        }

    }
// ---------------------------------------------------------
    public function actualizar(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:productos,id',
            'nombre' => 'nullable|string',
            'precio' => 'nullable|numeric',
        ]);

        $producto = Producto::find($request->id);

        if ($request->filled('nombre')) {
            $producto->nombre = $request->nombre;
        }

        if ($request->filled('precio')) {
            $producto->precio = $request->precio;
        }

        $producto->save();

        return back()->with('mensajeActualizar', 'Producto actualizado correctamente.');
    }
// ---------------------------------------------------------


public function borrar(Request $request)
{
    $request->validate([
        'id' => 'required|integer|exists:productos,id',
    ]);

    $producto = Producto::find($request->id);
    $producto->delete();

    return back()->with('mensajeBorrar', 'Producto borrado correctamente.');
}

// ---------------------------------------------------------
public function mostrarProductos()
{

    $productos = Producto::all();
    return view('gestion', compact('productos'));
}

}
