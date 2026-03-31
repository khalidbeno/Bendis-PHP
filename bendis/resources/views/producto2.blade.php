@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/producto2.css') }}?v={{ time() }}">
@endsection

@section('contenido')
<main class="product-main">
    <div class="product-container">
        <!-- Decoraciones -->
        <div class="product-decoration">
            <div class="decoration-circle circle-1" style="background: rgba(255, 152, 0, 0.08);"></div>
            <div class="decoration-circle circle-2" style="background: rgba(76, 175, 80, 0.08);"></div>
            <div class="decoration-circle circle-3" style="background: rgba(156, 39, 176, 0.08);"></div>
        </div>

        <!-- Grid principal -->
        <section class="product-grid">
            <!-- Imagen del producto -->
            <figure class="product-image-container">
                <img src="{{ asset('img/BendisSupreme.png') }}" alt="Ambientador Bendis" class="product-image">
                <div class="image-overlay"></div>
            </figure>

            <!-- Contenido del producto -->
            <article class="product-content">
                <ul class="product-features">
                    <li><i class="fas fa-check-circle" style="color: #FF9800;"></i> Fragancia premium duradera</li>
                    <li><i class="fas fa-check-circle" style="color: #FF9800;"></i> Diseño moderno y compacto</li>
                    <li><i class="fas fa-check-circle" style="color: #FF9800;"></i> Fácil instalación</li>
                    <li><i class="fas fa-check-circle" style="color: #FF9800;"></i> Neutralización activa de olores</li>
                </ul>

                <p class="product-description">
                    Ambientador profesional para espacios reducidos. Tecnología de liberación prolongada que mantiene
                    tu baño con una fragancia agradable hasta por 30 días. Elimina los malos olores en lugar de solo
                    enmascararlos.
                </p>

                <div class="product-price-container">
                    <strong class="product-price">45,90 €</strong>
                    <span class="product-shipping">Envío gratis</span>
                    <span class="product-badge">¡Novedad!</span>
                </div>

                <div class="product-actions">
                    <form action="{{ route('carrito.agregar', ['producto_id' => 2]) }}" method="POST">
                        @csrf
                        <button type="submit" class="product-btn" style="background: linear-gradient(135deg, #FF9800, #FF5722);">
                            <i class="fas fa-cart-plus btn-icon"></i>
                            <span class="btn-text">Añadir al carrito</span>
                        </button>
                    </form>
                </div>
            </article>
            <button class="atras" onclick="window.location.href='{{ route('index') }}'">Volver</button>
        </section>
    </div>
</main>
@endsection