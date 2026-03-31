<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Otras Funciones</title>
</head>
<body>
<h2>Mensajes del formulario de contacto</h2>

 {{-- Mostrar mensajes --}}
    @if(isset($mensajes) && $mensajes->isNotEmpty())
    <table border="1" cellpadding="8">
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Mensaje</th>
            <th>Fecha</th>
        </tr>
        @foreach($mensajes as $mensaje)
            <tr>
                <td>{{ $mensaje->nombre }}</td>
                <td>{{ $mensaje->email }}</td>
                <td>{{ $mensaje->mensaje }}</td>
                <td>{{ $mensaje->created_at->format('d/m/Y H:i') }}</td>
            </tr>
        @endforeach
    </table>
@else
    <p>No hay mensajes para mostrar.</p>
@endif

<a href="{{ route('interfaz.admin') }}">Volver a Panel</a>

</body>
</html>
