<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Mensajes recibidos</h2>
<table border="1" cellpadding="8">
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Mensaje</th>
        <th>Fecha</th>
    </tr>
    @foreach($contactos as $contacto)
        <tr>
            <td>{{ $contacto->nombre }}</td>
            <td>{{ $contacto->email }}</td>
            <td>{{ $contacto->mensaje }}</td>
            <td>{{ $contacto->created_at->format('d/m/Y H:i') }}</td>
        </tr>
    @endforeach
</table>

</body>
</html>