@extends('layouts.app')

@section('css')
  <link rel="stylesheet" href="{{ asset('css/producto2.css') }}?v={{ time() }}">
@endsection



@section('contenido')
<main class="product-main">
    <div class="product-container">
        <!-- Decoraciones -->
        <div class="product-decoration">
            <div class="decoration-circle circle-1"></div>
            <div class="decoration-circle circle-2"></div>
            <div class="decoration-circle circle-3"></div>
        </div>


        <!-- Grid principal -->
        <section class="product-grid">
            <!-- Imagen del producto -->
            <figure class="product-image-container">
                <img src="{{ asset('img/LagrimaAdesiva.png') }}" alt="Tapete Bendis" class="product-image">
                <div class="image-overlay"></div>
            </figure>

            <!-- Contenido del producto -->
            <article class="product-content">
                <ul class="product-features">
                    <li><i class="fas fa-check-circle"></i> Neutraliza malos olores</li>
                    <li><i class="fas fa-check-circle"></i> Diseño antisalpicaduras</li>
                    <li><i class="fas fa-check-circle"></i> Fácil de colocar</li>
                    <li><i class="fas fa-check-circle"></i> Fragancia duradera</li>
                </ul>

                <p class="product-description">
                    Ideal para baños con mucho uso. Limpieza, frescura y comodidad en un solo producto.
                    Mantiene el baño fresco todo el día con nuestro exclusivo sistema de neutralización de olores.
                </p>

                <div class="product-price-container">
                    <strong class="product-price">13,90 €</strong>
                    <span class="product-shipping">Envío gratis</span>
                </div>

                <div class="product-actions">
                    <form action="{{ route('carrito.agregar', ['producto_id' => 3]) }}" method="POST">
                        @csrf
                        <button type="submit" class="product-btn">
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
