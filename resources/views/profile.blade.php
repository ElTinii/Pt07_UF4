<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Usuario</title>
    <link rel="stylesheet" href="perfil.css">
</head>
<body>
    @if (session('delete_account'))
        <div class="alert">
            ¿Estás seguro de que quieres eliminar tu cuenta?
            <form method="POST" action="/confirm-delete">
                @csrf
                <button type="submit">Sí, eliminar mi cuenta</button>
            </form>
            <a href="/usuari">No, volver a mi perfil</a>
        </div>
    @endif
    <div class="container">
        <div class="profile">
            <img src="profile_picture.jpg" alt="Foto de perfil">
            <form method="POST" action="/update-user">
            @csrf
            <p>Nom d'Usuari <input type="text" name="username" id="" value="{{ auth()->user()->username }}" {{ auth()->user()->password_verified ? '' : 'disabled' }}></p>
            <p>Correo Electrónico: <input type="email" name="email" id="" value="{{ auth()->user()->email }}" {{ auth()->user()->password_verified ? '' : 'disabled' }}></p>
            <button type="submit" {{ auth()->user()->password_verified ? '' : 'disabled' }}>Enviar</button>
            </form>
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
        <form method="POST" action="/delete-account">
            @csrf
            <button type="submit" {{ auth()->user()->password_verified ? '' : 'disabled' }}>Eliminar Cuenta</button>
        </form>
        <form method="POST" action="/return">
    @csrf
    <button type="submit">Tornar</button>
</form>
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