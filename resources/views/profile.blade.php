<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista de Usuario</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="perfil.css">
</head>
<body>
    @if (session('delete_account'))
        <div class="alert alert-warning text-center" role="alert">
            ¿Estás seguro de que quieres eliminar tu cuenta?
            <form method="POST" action="/confirm-delete" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Sí, eliminar mi cuenta</button>
            </form>
            <a href="/usuari" class="btn btn-secondary">No, volver a mi perfil</a>
        </div>
    @endif
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
            @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">
                        Perfil de Usuario
                    </div>
                    <div class="card-body">
                        @if (!(Auth::user()->external_auth ==  "google"))
                            <div class="text-center mb-3">
                                <img src="{{ asset(Auth::user()->avatar) }}" class="rounded-circle" alt="Foto de perfil" width="150" height="150">
                                <form action="/fotoPerfil" method="POST" enctype="multipart/form-data" class="mt-3">
                                    @csrf
                                    <div class="form-group">
                                        <input type="file" class="form-control-file" name="avatar">
                                    </div>
                                    <button type="submit" class="btn btn-primary" {{ auth()->user()->password_verified ? '' : 'disabled' }}>Subir foto de perfil</button>
                                </form>
                            </div>
                        @endif
                        @if ((Auth::user()->external_auth ==  "google"))
                            <div class="text-center mb-3">
                                <img src="{{ Auth::user()->avatar }}" class="rounded-circle" alt="Foto de perfil" width="150" height="150">
                            </div>
                        @endif
                        <form method="POST" action="/update-user">
                            @csrf
                            <div class="form-group">
                                <label for="username">Nom d'Usuari</label>
                                <input type="text" class="form-control" name="username" id="username" value="{{ auth()->user()->username }}" {{ auth()->user()->password_verified ? '' : 'disabled' }}>
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ auth()->user()->email }}" {{ auth()->user()->password_verified ? '' : 'disabled' }}>
                            </div>
                            <button type="submit" class="btn btn-success" {{ auth()->user()->password_verified ? '' : 'disabled' }}>Enviar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
    <!-- ... -->
    <div class="card-body">
        <!-- ... -->
        <button class="btn btn-warning" id="change-password-btn" {{ auth()->user()->password_verified ? '' : 'disabled' }}>Cambiar Contraseña</button>
        <div id="change-password-form" style="display: none;">
            <form method="POST" action="/canviarContrasenya">
                @csrf
                <div class="form-group">
                    <label for="current-password">Contraseña Actual</label>
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="password" id="current-password" required>
                    @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new-password">Nueva Contraseña</label>
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new-password" required>
                    @error('new_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirmar Nueva Contraseña</label>
                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" id="confirm-password" required>
                    @error('confirm_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
            </form>
        </div>
    </div>
</div>
                <div class="card mt-4">
                    <div class="card-header text-center">
                        Acciones
                    </div>
                    <div class="card-body">
                        @if (!(Auth::user()->external_auth ==  "google"))
                            <form method="POST" action="/verify-password" class="mb-3">
                                @csrf
                                <div class="form-group">
                                    <label for="password">Contraseña:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary">Verificar Contraseña</button>
                            </form>
                            <form method="POST" action="/delete-account">
                                @csrf
                                <button type="submit" class="btn btn-danger" {{ auth()->user()->password_verified ? '' : 'disabled' }} onclick="return confirm('¿Estás seguro de que quieres eliminar tu cuenta?');">Eliminar Cuenta</button>
                            </form>
                        @endif
                        @if ((Auth::user()->external_auth ==  "google"))
                            <form method="POST" action="/delete-account">
                                @csrf
                                <input type="text" name="conta_id" value="{{ Auth()->user()->id }}" hidden>
                                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de que quieres eliminar tu cuenta?');">Eliminar Cuenta</button>
                            </form>
                        @endif
                        <form method="POST" action="/return" class="mt-3">
                            @csrf
                            <button type="submit" class="btn btn-secondary">Tornar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('change-password-btn').addEventListener('click', function() {
        var form = document.getElementById('change-password-form');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });
</script>
</body>

</html>