<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Usuario</title>
    <link rel="stylesheet" href="perfil.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <img src="profile_picture.jpg" alt="Foto de perfil">
            <h1>Nombre del Usuario</h1>
            <p>Correo Electrónico: <input type="text" name="" id="" value="{{ auth()->user()->email }}" {{ auth()->user()->password_verified ? '' : 'disabled' }}></p>
        </div>
        <div class="actions">
        <form method="POST" action="/verify-password">
            @csrf
            <div class="input-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password">
            </div>
            <button type="submit">Verificar Contraseña</button>
        </form>
        <button {{ auth()->user()->password_verified ? '' : 'disabled' }}>Enviar</button>
        <button {{ auth()->user()->password_verified ? '' : 'disabled' }}>Eliminar Cuenta</button>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
</body>
</html>