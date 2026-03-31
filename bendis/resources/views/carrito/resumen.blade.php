@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/resumen.css') }}?v={{ time() }}">
@endsection

@section('contenido')
<div class="payment-container">
    <div class="payment-header">
        <h1>Finalizar Compra</h1>
    </div>
    
    <div class="payment-content">
        {{-- Resumen del pedido --}}
        <div class="payment-summary">
            <div class="payment-card">
                <h2 class="payment-title">Tu Pedido</h2>
                
                @if(!empty($carrito))
                    <div class="product-list">
                        @foreach($carrito as $item)
                            <div class="product-item">
                                <span>{{ $item['nombre'] }} x {{ $item['cantidad'] }}</span>
                                <span>{{ number_format($item['precio'] * $item['cantidad'], 2) }} €</span>
                            </div>
                        @endforeach
                    </div>
                    
                    <div class="totals">
                        <p>
                            <strong>Subtotal:</strong>
                            <strong>{{ number_format($subtotal, 2) }} €</strong>
                        </p>
                    </div>
                @else
                    <p>No hay productos en el carrito.</p>
                @endif
            </div>
            
            <div class="payment-card">
                <h2 class="payment-title">Información del Pedido</h2>
                <p><strong>ID del Pedido:</strong> {{ $pedidoId }}</p>
            </div>
        </div>
        
        {{-- Formulario de datos + pago simulado --}}
        <div class="payment-form">
            <form action="{{ route('pago.confirmar') }}" method="POST">
                @csrf
                
                <h2 class="payment-title">Dirección de Envío</h2>
                
                @if($errors->any())
                    <div class="error" style="color: #dc3545; margin-bottom: 15px;">
                        {{ $errors->first() }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="error" style="color: #dc3545; margin-bottom: 15px;">
                        {{ session('error') }}
                    </div>
                @endif
                
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" name="direccion" id="direccion" required>
                </div>

                <div class="form-group">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" id="ciudad" required>
                </div>

                <div class="form-group">
                    <label for="codigo_postal">Código Postal:</label>
                    <input type="text" name="codigo_postal" id="codigo_postal" required>
                </div>

                <div class="form-group">
                    <label for="pais">País:</label>
                    <select name="pais" id="pais" required>
                        <option value="España" selected>España</option>
                        {{-- Más países si quieres --}}
                    </select>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
                
                <h2 class="payment-title">Método de Envío</h2>
                
                <div class="metodo-envio">
                    <label>
                        <input type="radio" name="envio" value="estandar" data-precio="4.95" checked>
                        Envío Estándar 4,95€
                    </label>
                    <small>Entrega en 3-5 días laborables</small>
                </div>

                <div class="metodo-envio">
                    <label>
                        <input type="radio" name="envio" value="express" data-precio="9.95">
                        Envío Express 9,95€
                    </label>
                    <small>Entrega en 24-48 horas</small>
                </div>

                <div class="metodo-envio">
                    <label>
                        <input type="radio" name="envio" value="gratis" data-precio="0">
                        Envío Gratis 0,00€
                    </label>
                    <small>Para pedidos superiores a 100€ (simulado)</small>
                </div>
                
                {{-- Pago simulado: no usamos Stripe real --}}
                <h2 class="payment-title">Método de Pago</h2>
                <p>El pago se realiza en modo <strong>simulado</strong> para la demo del TFG.</p>

                {{-- Para que pase la validación del controlador --}}
                <input type="hidden" name="metodo_pago" value="tarjeta_simulada">
                
                <div class="totals">
                    <h2 class="payment-title">Resumen Final</h2>
                    <p>
                        <span>Subtotal:</span>
                        <span id="subtotal">{{ number_format($subtotal ?? 0, 2) }}€</span>
                    </p>
                    <p>
                        <span>Envío:</span>
                        <span id="coste-envio">4.95€</span>
                    </p>
                    <p>
                        <strong>Total:</strong>
                        <strong><span id="total">{{ number_format(($subtotal ?? 0) + 4.95, 2) }}€</span></strong>
                    </p>
                </div>

                {{-- Campos ocultos que necesita el controlador --}}
                <input type="hidden" name="subtotal" value="{{ $subtotal ?? 0 }}">
                <input type="hidden" name="coste_envio" id="input-envio" value="4.95">
                <input type="hidden" name="total" id="input-total" value="{{ ($subtotal ?? 0) + 4.95 }}">

                <button type="submit">
                    Confirmar pago (simulado)
                </button>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const envioRadios      = document.querySelectorAll('input[name="envio"]');
    const costeEnvioSpan   = document.getElementById('coste-envio');
    const totalSpan        = document.getElementById('total');
    const inputEnvio       = document.getElementById('input-envio');
    const inputTotal       = document.getElementById('input-total');
    const subtotal         = parseFloat("{{ $subtotal ?? 0 }}");

    function actualizarCostes() {
        let costeEnvio = 0;

        envioRadios.forEach(radio => {
            if (radio.checked) {
                costeEnvio = parseFloat(radio.dataset.precio);
            }
        });

        if (isNaN(costeEnvio)) {
            costeEnvio = 0;
        }

        const nuevoTotal = subtotal + costeEnvio;

        costeEnvioSpan.textContent = costeEnvio.toFixed(2) + '€';
        totalSpan.textContent      = nuevoTotal.toFixed(2) + '€';

        inputEnvio.value = costeEnvio.toFixed(2);
        inputTotal.value = nuevoTotal.toFixed(2);
    }

    envioRadios.forEach(radio => {
        radio.addEventListener('change', actualizarCostes);
    });

    // Inicializamos con el valor por defecto (estándar)
    actualizarCostes();
});
</script>
@endsection
