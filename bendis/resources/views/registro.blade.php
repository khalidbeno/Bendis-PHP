<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrarse</title>
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="form-decoration">
        <div class="decoration-circle circle-1"></div>
        <div class="decoration-circle circle-2"></div>
        <div class="decoration-circle circle-3"></div>
    </div>

    <div class="logo">
        <h1><a href="{{ route('index') }}">BENDIS</a></h1>
    </div>

    <div class="register-container">
        <div class="register-header">
            <h1>Registrarse</h1>
        </div>
        
        <form method="POST" action="{{ route('registro') }}" class="register-form">
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
                <input type="password" name="password" id="password" required>
                <label for="password">Contraseña</label>
                <span class="focus-border"></span>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="register-btn">
                    <span>Registrarme</span>
                </button>
            </div>
        </form>

        @if(session('error'))
            <div class="error-message">
                <p>{{ session('error') }}</p>
            </div>
        @endif
    </div>

    <div class="login-link">
        <h4>¿Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia sesión</a></h4>
    </div>
</body>
</html>
   

