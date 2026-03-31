<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi sitio</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    @yield('css')
</head>
<style>
    /* --------------------------------------------------------------- CABECERA ---------------------------------------------------------- */
header {
  width: 100%;
  max-width: 1200px;
  position: fixed;
  left: 50%;
  transform: translateX(-50%);
  background-color: #29c4f5;
  color: white;
  padding: 15px 40px;
  border-radius: 200px;
  display: flex;
  align-items: center;
  justify-content: space-between;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  z-index: 999;
}

/* LOGO */
.logo {
  font-size: 2.5em;
  font-style: italic;
  margin-right: 30px;
}

/* ENLACES */
.nav-links {
  display: flex;
  gap: 30px;

}

.nav-link {
  text-decoration: none;
  color: white;
  font-size: 1.1em;
  font-weight: 500;
  transition: color 0.3s ease;
}

.nav-link:hover {
  color: #cceeff;
}

/* USUARIO */
.usuario {
  display: flex;
  align-items: center;
  gap: 10px;
}

.bienvenido {
  display: flex;
  align-items: center;
  gap: 10px;
  white-space: nowrap;
}

.bienvenido-mensaje {
  margin: 0;
  font-size: 0.95em;
}

.logout-btn {
  background-color: transparent; /* mejor que none */
  border: 1px solid white;       /* borde blanco sólido de 1px */
  border-radius: 100px;          /* bordes muy redondeados */
  padding: 6px 12px;
  cursor: pointer;
  color: white;
  font-size: 0.9em;
}

.login select {
  background-color: transparent; /* mejor que none */
  border: 1px solid white;       /* borde blanco sólido de 1px */
  border-radius: 100px;          /* bordes muy redondeados */
  padding: 6px 12px;
  cursor: pointer;
  color: black;
  font-size: 0.9em;
}

.cerrar-session {
  margin: 0;
  padding: 0;
}

/* CARRITO */
.carrito-icon {
  margin-left: 20px;
}

.carrito-link {
  color: white;
  text-decoration: none;
  font-size: 1.3em;
}
</style>
<body>
    <!-- CABECERA -->
    <header>
        <h1 class="logo">BENDIS</h1>

        <nav class="nav-links">
            <a href="{{ route('index') }}" class="nav-link">HOME</a>
            <a href="{{ route('index') }}#productos" class="nav-link">PRODUCTOS</a>
            <a href="{{ route('index') }}#contactos" class="nav-link">CONTACTO</a>
        </nav>

        <div class="usuario">
            @if(session('usuario'))
                <div class="bienvenido">
                    <p class="bienvendio-mensaje">
                        Bienvenido, <span class="username">{{ session('usuario')->nombre }}</span>
                    </p>
                    <form method="POST" action="{{ route('opcion', ['opcion' => 'logout']) }}" class="cerrar-session">
                        @csrf
                        <button type="submit" class="logout-btn">Cerrar sesión</button>
                    </form>
                </div>

                @if(session('usuario')->es_admin)
                    <a href="{{ route('interfaz.admin') }}" class="admin-link">Interfaz Admin</a>
                @endif
            @else
                <div class="login">
                    <select name="opciones" id="opciones" onchange="window.location.href=this.value;">
                        <option value="#">Selecciona</option>
                        <option value="{{ route('opcion', ['opcion' => 'login']) }}">Iniciar sesión</option>
                        <option value="{{ route('opcion', ['opcion' => 'registro']) }}">Registrarse</option>
                    </select>
                </div>
            @endif
        </div>

        <div class="carrito-icon">
            <a href="{{ route('carrito.ver') }}" class="carrito-link">
                🛒 <span class="carrito-count">({{ array_sum(array_column(session('carrito', []), 'cantidad')) }})</span>
            </a>
        </div>
    </header>

    <!-- CONTENIDO -->
    <main>
        @yield('contenido')
    </main>
</body>
@yield('js')
</html>