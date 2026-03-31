<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bendis</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
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

    <div class="login-container">
        <div class="login-header">
            <h1>Iniciar sesión</h1>
        </div>
        
        <form method="POST" action="{{ route('login') }}" class="login-form">
            @csrf
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
                <button type="submit" class="login-btn">
                    <span>Iniciar sesión</span>
                </button>
            </div>
        </form>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <div class="register-link">
        <h4>No tienes cuenta, <a href="{{ route('registro') }}">regístrate</a></h4>
    </div>
</body>
</html>

