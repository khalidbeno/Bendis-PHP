<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Pedido;
use App\Models\Producto; // Asegúrate de importar si usas la relación
use Illuminate\Support\Facades\Mail;
use App\Mail\PedidoRealizado;
use Illuminate\Support\Str;
use Stripe\PaymentIntent;


class PagoController extends Controller
{
    public function procesarPago(Request $request)
    {
        $carrito = session('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('carrito.ver')->with('error', 'El carrito está vacío.');
        }

        $subtotal = collect($carrito)->sum(fn($item) => $item['precio'] * $item['cantidad']);
        $iva = $subtotal * 0.21;
        $coste_envio = 0; // Por ejemplo, si no hay envío todavía o default

        $total = $subtotal + $coste_envio;

        $pedidoId = uniqid('PED-'); // Mejor que rand()


        session([
            'pedidoId' => $pedidoId,
            'subtotal' => $subtotal,
            'coste_envio' => $coste_envio,
            'total' => $total,
            'carrito' => $carrito,
        ]);

        return redirect()->route('pago.resumen');
    }
public function confirmarPago(Request $request)
{
    $request->validate([
        'email'         => 'required|email',
        'direccion'     => 'required|string',
        'ciudad'        => 'required|string',
        'codigo_postal' => 'required|string',
        'pais'          => 'required|string',
        'envio'         => 'required|string',
    ]);

    // Datos del carrito y totales desde la sesión
    $carrito     = session('carrito', []);
    $subtotal    = session('subtotal');
    $coste_envio = session('coste_envio', 0);
    $total       = session('total');

    if (empty($carrito) || $total === null) {
        return redirect()->route('carrito.ver')
            ->with('error', 'No se encontró la información del pedido. Vuelve a intentarlo.');
    }

    // Crear pedido directamente como "pagado" (pago simulado)
    $pedido = \App\Models\Pedido::create([
        'cliente_email'   => $request->email,
        'direccion'       => $request->direccion,
        'ciudad'          => $request->ciudad,
        'codigo_postal'   => $request->codigo_postal,
        'pais'            => $request->pais,
        'envio'           => $request->envio,
        'metodo_pago'     => 'tarjeta (simulado)',
        'total'           => $total,
        'estado'          => 'pagado',
        'stripe_charge_id'=> 'simulado_' . uniqid(),
    ]);

    // Guardar productos del carrito en la tabla pivot
    foreach ($carrito as $producto) {
        if (!isset($producto['id'])) {
            continue;
        }

        $pedido->productos()->attach($producto['id'], [
            'cantidad' => $producto['cantidad'],
            'precio'   => $producto['precio'],
        ]);
    }

    // (Opcional) enviar mail, envuélvelo en try/catch para que no rompa la demo
    try {
        \Illuminate\Support\Facades\Mail::to($pedido->cliente_email)
            ->send(new \App\Mail\PedidoRealizado($pedido));
    } catch (\Exception $e) {
        \Log::error('Error enviando email de pedido: ' . $e->getMessage());
    }

    // Limpiar sesión
    session()->forget(['carrito', 'pedidoId', 'subtotal', 'iva', 'total', 'coste_envio']);

    // Redirigir a la página de gracias
    return redirect()->route('pedido.gracias');
}



}
