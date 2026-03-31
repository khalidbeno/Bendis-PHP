@extends('layouts.app');

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}?v={{ time() }}">
@endsection

@section('contenido')
<!-- PANTALLA INICIAL MEJORADA -->
<section class="hero-bendis">

<section class="hero-bendis">
    <!-- Video de fondo -->
    <video class="hero-video" autoplay muted loop playsinline>
        <source src="video/playa.mp4" type="video/mp4">
    </video>

    <!-- Capa oscura para mejorar la legibilidad -->
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1 class="hero-title">BENDIS</h1>
        <p class="hero-subtitle">Frescura duradera. Higiene profesional. Una experiencia diferente.</p>

        <div class="hero-scroll">
            <span>Desliza para descubrir</span>
            <div class="scroll-icon"></div>
        </div>
    </div>
</section>

  <!-- <div class="hero-content"> -->
    <!-- Productos flotantes -->
    <!-- <div class="floating-products">
      <div class="product-item" data-speed="0.05">
        <img src="img/Tapete.png" alt="Tapete Bendis" class="product-img">
      </div>
      <div class="product-item" data-speed="0.1">
        <img src="img/BendisSupreme.png" alt="Supreme" class="product-img">
      </div>
      <div class="product-item" data-speed="0.15">
        <img src="img/LagrimaAdesiva.png" alt="Lágrima Bendis" class="product-img">
      </div>
      <div class="product-item" data-speed="0.2">
        <img src="img/Clip.png" alt="Clip Bendis" class="product-img">
      </div>
    </div> -->

    <!-- Contenedor de texto con mejor espaciado -->
    <!-- <div class="text-container">
      <div class="hero-text">
        <h1 class="hero-title">
          <span class="title-line highlight">BENDIS</span>
           <img src="img/Dueño.png" alt="Dueño Bendis" class="dueño-img">
        </h1>
        <p class="hero-subtitle">Frescura duradera, menos residuos. Bendis cuida tu espacio y el planeta.</p>
      </div>
    </div> -->

    <!-- <div class="hero-scroll">
      <span>Desliza para descubrir</span>
      <div class="scroll-icon"></div>
    </div>
  </div> -->

  <!-- Fondos decorativos -->
  <!-- <div class="hero-background">
    <div class="bg-wave"></div>
  </div> -->
</section>


<!-- PRODUCTOS -->
<section class="productos-section" id="productos">
    <div class="producto-wrapper">

        <!-- PRODUCTO 1 -->
        <div class="producto-activo" id="producto0" style="display: flex;">
            <div class="producto-imagen-area">
                <img src="img/Tapete.png" alt="Producto 1" class="producto-imagen">
            </div>
            <div class="producto-info-area">
                <h1>Tapete</h1>
                <p>Tapete aromático para urinario que elimina malos olores y mantiene una frescura constante en el ambiente. Diseño antisalpicaduras y duración prolongada.</p>
                <form method="POST" action="{{ route('opcion', ['opcion' => 'producto1']) }}">
                    @csrf
                    <button type="submit" class="leer-mas">Leer más</button>
                </form>
            </div>
        </div>

        <!-- PRODUCTO 2 -->
        <div class="producto-activo" id="producto1" style="display: none;">
            <div class="producto-imagen-area">
                <img src="img/BendisSupreme.png" alt="Producto 2" class="producto-imagen">
            </div>
            <div class="producto-info-area">
                <h1>Bendis Supreme</h1>
                <p>Potente bloque desodorante premium con fórmula intensiva que neutraliza olores fuertes. Ideal para zonas de alto tránsito. Efecto duradero.</p>
                <form method="POST" action="{{ route('opcion', ['opcion' => 'producto2']) }}">
                    @csrf
                    <button type="submit" class="leer-mas">Leer más</button>
                </form>
            </div>
        </div>

        <!-- PRODUCTO 3 -->
        <div class="producto-activo" id="producto2" style="display: none;">
            <div class="producto-imagen-area">
                <img src="img/LagrimaAdesiva.png" alt="Producto 3" class="producto-imagen">
            </div>
            <div class="producto-info-area">
                <h1>Lágrimas Adesivas</h1>
                <p>Lágrimas perfumadas que se adhieren fácilmente en cualquier superficie del urinario. Liberan fragancia gradualmente hasta por 30 días.</p>
                <form method="POST" action="{{ route('opcion', ['opcion' => 'producto3']) }}">
                    @csrf
                    <button type="submit" class="leer-mas">Leer más</button>
                </form>
            </div>
        </div>

        <!-- PRODUCTO 4 -->
        <div class="producto-activo" id="producto3" style="display: none;">
            <div class="producto-imagen-area">
                <img src="img/Clip.png" alt="Producto 4" class="producto-imagen">
            </div>
            <div class="producto-info-area">
                <h1>Clip</h1>
                <p>Clip perfumado para inodoro que se coloca fácilmente en el borde. Discreto, elegante y eficaz, proporciona limpieza y buen olor tras cada uso.</p>
                <form method="POST" action="{{ route('opcion', ['opcion' => 'producto4']) }}">
                    @csrf
                    <button type="submit" class="leer-mas">Leer más</button>
                </form>
            </div>
        </div>
    </div>

    <!-- MINIATURAS Y FLECHA -->
    <div class="producto-miniaturas">
        <button class="flecha-izquierda" onclick="cambiarProducto(-1)">&#8592;</button>
        <img src="img/Tapete.png" alt="Mini 1">
        <img src="img/BendisSupreme.png" alt="Mini 2">
        <img src="img/LagrimaAdesiva.png" alt="Mini 3">
        <img src="img/Clip.png" alt="Mini 4">
        <button class="flecha-derecha" onclick="cambiarProducto(1)">&#8594;</button>
    </div>
</section>

<!-- FORMULARIO -->
<section class="formulario-section" id="contactos">
    <div class="cuadro-formulario">
        <div class="form-header">
            <h2>Contáctanos</h2>
            <p>¿Tienes alguna pregunta? Escríbenos y te responderemos lo antes posible.</p>
        </div>
        
        <form action="{{ route('contacto.guardar') }}" method="POST" class="contact-form">
            @csrf
            <div class="form-group floating-label">
                <input type="text" name="nombre" id="nombre" required>
                <label for="nombre">Nombre completo</label>
                <span class="focus-border"></span>
            </div>
            
            <div class="form-group floating-label">
                <input type="email" name="email" id="email" required>
                <label for="email">Correo electrónico</label>
                <span class="focus-border"></span>
            </div>
            
            <div class="form-group floating-label">
                <textarea name="mensaje" id="mensaje" required></textarea>
                <label for="mensaje">Tu mensaje</label>
                <span class="focus-border"></span>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="submit-btn">
                    <span>Enviar mensaje</span>
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <path fill="currentColor" d="M2,21L23,12L2,3V10L17,12L2,14V21Z" />
                    </svg>
                </button>
            </div>
        </form>

        @if(session('success'))
            <div class="success-message">
                <svg viewBox="0 0 24 24" width="24" height="24">
                    <path fill="currentColor" d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M10 17L5 12L6.41 10.59L10 14.17L17.59 6.58L19 8L10 17Z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif
    </div>
    
    <div class="form-decoration">
        <div class="decoration-circle circle-1"></div>
        <div class="decoration-circle circle-2"></div>
        <div class="decoration-circle circle-3"></div>
    </div>
</section>


   <script>

    // Efecto de movimiento parallax para los productos
    document.addEventListener('DOMContentLoaded', function() {
  const products = document.querySelectorAll('.product-item');
  
  window.addEventListener('mousemove', (e) => {
    const x = e.clientX / window.innerWidth;
    const y = e.clientY / window.innerHeight;
    
    products.forEach(product => {
      const speed = parseFloat(product.getAttribute('data-speed'));
      const xMove = (x - 0.5) * speed * 100;
      const yMove = (y - 0.5) * speed * 100;
      
      product.style.transform = `translate(${xMove}px, ${yMove}px) rotate(${xMove * 0.1}deg)`;
    });
  });
});


    let indiceActual = 0;
    const totalProductos = 4;

    function actualizarMiniaturas() {
        document.querySelectorAll('.producto-miniaturas img').forEach((img, i) => {
            img.classList.toggle('active', i === indiceActual);
        });
    }

    function cambiarProducto(direccion) {
        document.getElementById(`producto${indiceActual}`).style.display = "none";
        indiceActual += direccion;
        if (indiceActual >= totalProductos) indiceActual = 0;
        if (indiceActual < 0) indiceActual = totalProductos - 1;
        document.getElementById(`producto${indiceActual}`).style.display = "flex";
        actualizarMiniaturas();
    }

    // Activar miniaturas como botones
    document.querySelectorAll(".producto-miniaturas img").forEach((img, index) => {
        img.addEventListener("click", () => {
            document.getElementById(`producto${indiceActual}`).style.display = "none";
            indiceActual = index;
            document.getElementById(`producto${indiceActual}`).style.display = "flex";
            actualizarMiniaturas();
        });
    });

    // Inicializar miniaturas activas
    actualizarMiniaturas();
</script>




@endsection

