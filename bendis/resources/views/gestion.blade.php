<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Stock</title>
</head>
<body>
    <h2>Gestión de Productos</h2>

   
    
    <!-- Añadir producto -->
    <form method="POST" action="{{ route('gestion.guardar') }}">
        @csrf
        <input type="hidden" name="accion" value="añadir">
        <h2>Añadir producto</h2>
        <input type="number" name="id" placeholder="ID del producto" required>
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="descripcion" placeholder="Descripción">
        <input type="number" name="precio" step="0.01" placeholder="Precio">
        <input type="number" name="stock" placeholder="Stock">
        <button type="submit">Añadir</button>
    </form>
    
    @if(session('mensajeGuardar'))
    <p style="color:green">{{ session('mensajeGuardar') }}</p>
    @endif

    <hr>

    {{-- Editar producto --}}
    <h2>Editar producto</h2>
    <form action="{{ route('gestion.actualizar') }}" method="POST">
        @csrf
        <input type="number" name="id" placeholder="ID del producto" required>
        <input type="text" name="nombre" placeholder="Nuevo nombre">
        <input type="number" name="precio" placeholder="Nuevo precio">
        <button type="submit">Editar</button>
    </form>

    
    @if(session('mensajeActualizar'))
    <p style="color:green">{{ session('mensajeActualizar') }}</p>
    @endif
    


    <hr>


    {{-- Borrar producto --}}
    <h2>Borrar producto</h2>
    <form action="{{ route('gestion.borrar') }}" method="POST">
        @csrf
        <input type="number" name="id" placeholder="ID del producto" required>
        <button type="submit">Borrar</button>
    </form>

    @if(session('mensajeBorrar'))
    <p style="color:green">{{ session('mensajeBorrar') }}</p>
    @endif


    <hr>


   <h2>Lista de productos</h2>

    {{-- Mostrar productos --}}
    <a href="{{ route('gestion.mostrar') }}">
        <button>Ver productos</button>
    </a>


@if(isset($productos) && count($productos) > 0)
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No hay productos para mostrar.</p>
@endif




<a href="{{ route('index') }}">
    <button>Volver al inicio</button>
</a>


</body>
</html>
