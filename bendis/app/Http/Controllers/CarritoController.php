<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function actualizar(Request $request, $id) {
    $cantidad = max(1, (int)$request->input('cantidad'));
    $carrito = session()->get('carrito', []);
    if (isset($carrito[$id])) {
        $carrito[$id]['cantidad'] = $cantidad;
        session()->put('carrito', $carrito);
    }
    return redirect()->back();
}

    public function agregar(Request $request, $producto_id)
    {
        $producto = Producto::findOrFail($producto_id);

        $carrito = session()->get('carrito', []);

        // Si ya existe el producto, incrementamos la cantidad
        if (isset($carrito[$producto_id])) {
            $carrito[$producto_id]['cantidad']++;
        } else {
            // Si no existe, lo añadimos
            $carrito[$producto_id] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => 1,
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto añadido al carrito.');
    }

    public function ver()
    {
    $carrito = session('carrito', []);
    return view('carrito.ver', compact('carrito'));
    }
public function eliminar($id)
{
    $carrito = session()->get('carrito', []);
    unset($carrito[$id]);
    session()->put('carrito', $carrito);

    return redirect()->back()->with('success', 'Producto eliminado del carrito.');
}

}
