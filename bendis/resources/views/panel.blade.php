<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Bendis</title>
</head>
<body>
    <div>
        <h1>Panel de Administración</h1>
        
        <div>
            <a href="{{ route('opcionAdmin', ['opcionAdmin' => 'gestion']) }}"><h5>Gestion de stock</h5></a>
        </div>

        <div>
            <a href="{{ route('opcionAdmin', ['opcionAdmin' => 'otros'])  }}"><h5>contactos</h5></a>
        </div>
        <div>
            <a href="{{ url('/') }}">
                <button>Volver al inicio</button>
            </a>
        </div>
    </body>
</html>

    

