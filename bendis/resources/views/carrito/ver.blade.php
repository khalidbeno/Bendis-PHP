@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/ver.css') }}?v={{ time() }}">
@endsection

@section('contenido')
<div id="vista-carrito">
    <h1>🛒 Tu Carrito de Compra</h1>

    @if(count($carrito) > 0)
        <ul>
            @foreach($carrito as $id => $producto)
            <li>
               <img src="{{ asset(imagenProducto($producto['nombre'])) }}" alt="{{ $producto['nombre'] }}" class="imagen-producto">


                <div class="producto-info">
                    <strong>{{ $producto['nombre'] }}</strong><br>
                    Precio unitario: {{ number_format($producto['precio'], 2) }} €
                </div>

                <form method="POST" action="{{ route('carrito.actualizar', $id) }}">
                    @csrf
                    @method('PUT')
                    <div class="cantidad-control">
                        <button type="button" onclick="cambiarCantidad(-1, 'cantidad{{ $id }}')">−</button>
                        <input type="number" id="cantidad{{ $id }}" name="cantidad" value="{{ $producto['cantidad'] }}" min="1">
                        <button type="button" onclick="cambiarCantidad(1, 'cantidad{{ $id }}')">+</button>
                        <button type="submit">Actualizar</button>
                    </div>
                </form>

            <form method="POST" action="{{ route('carrito.eliminar', $id) }}" style="display:inline-block; margin-left: 10px;">
                @csrf
                @method('DELETE')
                <button type="submit" style="background-color: red; color: white; padding: 5px 10px;">Eliminar</button>
            </form>


                <div class="producto-info">
                    Total: {{ number_format($producto['cantidad'] * $producto['precio'], 2) }} €
                </div>
            </li>
            @endforeach
        </ul>

        <p class="total">
            Total del carrito: 
            {{ number_format(collect($carrito)->reduce(fn($total, $item) => $total + ($item['precio'] * $item['cantidad']), 0), 2) }} €
        </p>

        <form method="POST" action="{{ route('pago.procesar') }}">
            @csrf
            <button type="submit"> Pago seguro</button>
           
        </form>
         <button class="atras" onclick="window.location.href='{{ route('index') }}'">Volver</button>
    @else
        <p style="text-align: center;">Tu carrito está vacío.</p>
    @endif
  
</div>

@endsection

@section('js')
<script>
function cambiarCantidad(delta, inputId) {
    const input = document.getElementById(inputId);
    let valor = parseInt(input.value);
    if (!isNaN(valor)) {
        valor = Math.max(1, valor + delta);
        input.value = valor;
    }
}



</script>
@endsection
