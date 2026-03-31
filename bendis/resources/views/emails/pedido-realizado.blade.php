<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido Realizado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            width: 90%;
            margin: auto;
        }
        .resumen-total, .datos-pago {
            margin-top: 20px;
        }
        .resumen-total p, .datos-pago p {
            margin: 5px 0;
        }
        .estado-pedido {
            font-weight: bold;
            padding: 4px 8px;
            border-radius: 4px;
        }
        .estado-pedido.completado {
            background: #000;
            color: #fff;
        }
        .estado-pedido.pendiente {
            background: #eee;
            color: #000;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Resumen del Pedido</h1>

    <div class="resumen-total">
        <p><strong>Subtotal:</strong> {{ number_format($pedido->total / 1.21, 2) }} €</p>
        <p><strong>IVA (21%):</strong> {{ number_format($pedido->total - ($pedido->total / 1.21), 2) }} €</p>
        <p><strong>Total:</strong> {{ number_format($pedido->total, 2) }} €</p>
    </div>

    <p><strong>ID del Pedido:</strong> {{ $pedido->id }}</p>

    <div class="datos-pago">
        <h2>Datos de Pago</h2>
        <p><strong>Email:</strong> {{ $pedido->cliente_email }}</p>
        <p><strong>Dirección:</strong> {{ $pedido->direccion }}, {{ $pedido->ciudad }}, {{ $pedido->codigo_postal }}, {{ $pedido->pais }}</p>
        <p><strong>Método de Pago:</strong> {{ $pedido->metodo_pago }}</p>
        <p><strong>Estado:</strong> 
            <span class="estado-pedido {{ $pedido->estado }}">
                {{ ucfirst($pedido->estado) }}
            </span>
        </p>
    </div>
</div>
</body>
</html>
